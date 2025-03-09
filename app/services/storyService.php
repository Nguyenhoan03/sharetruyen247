<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class storyService
{
    public function getUserStories($userId)
    {
        return DB::table('product')
            ->join('detail_product', 'product.title', '=', 'detail_product.title')
            ->where('product.users_id', $userId)
            ->orderBy('product.id', 'DESC')
            ->get();
    }

    public function getStoryStatistics($userId)
    {
        $stories = $this->getUserStories($userId);
        $totalViews = $stories->sum('viewers');
        $totalChapters = $this->getTotalChaptersForUser($userId);
        $totalProducts = $stories->count();

        return compact('totalViews', 'totalChapters', 'totalProducts');
    }

    public function createStory($request, $userId)
    {
        $fileName = $this->uploadImage($request);
        $genres = $this->getGenres($request);
        $title = $request->input('titletruyen');
        $slug = Str::slug($title);
    
       
        $activeGenres = array_filter($genres, function($value) {
            return $value == 1;
        });
    
        // Insert vào bảng product
        DB::table('product')->insert([
            'title' => $title,
            'slug' => $slug,
            'image' => $fileName,
            'users_id' => $userId,
            'trang_thai' => 'chờ duyệt',
        ] + $genres);
    
        $descripts = strip_tags($request->input('descripts'));
    
        
        DB::table('detail_product')->insert([
            'title' => $title,
            'slug' => $slug,
            'descripts' => $descripts,
            'tacgia' => $request->input('tacgia'),
            'theloai' => implode(", ", array_keys($activeGenres)),
            'nguon' => $request->input('truyen_type'),
            'trangthai' => $request->input('story-status'),
            'capnhatmoi' => '',
            'viewers' => 0,
        ]);
    
        return true;
    }
    private function uploadImage($request)
    {
        if ($request->hasFile('fileInput')) {
            $file = $request->file('fileInput');
            $fileName = $file->getClientOriginalName();
            $file->move(public_path('upload'), $fileName);
            return $fileName;
        }
        return "";
    }

    private function getGenres($request)
    {
        $genreList = ['tienhiep', 'ngontinh', 'quantruong', 'khoanguyen', 'huyenhuyen', 'dinang', 'kiemhiep', 'dammy', 'vongdu', 'haihuoc', 'kinhdi', 'dothi', 'lichsu', 'truyenma', 'truyenngan', 'tieuthuyet', 'truyenteen', 'quansu', 'xuyenkhong', 'trinhtham'];
        
        $genres = [];
        foreach ($genreList as $genre) {
            $genres[$genre] = $request->has($genre) ? 1 : 0;
        }
        
        return $genres;
    }

    public function getTotalChaptersForUser($userId)
    {
        return DB::table('chapter')
            ->join('product', 'chapter.title', '=', 'product.title')
            ->where('product.users_id', $userId)
            ->count();
    }

    public function getStoriesWithChapterCount(){
        $chapterCounts = DB::table('chapter')
        ->select('title', DB::raw('COUNT(id) as total_chapters'))
        ->groupBy('title');

        return DB::table('product')
        ->select('users.*', 'product.*', 'cc.total_chapters')
        ->join('users', 'product.users_id', '=', 'users.id')
        ->leftJoinSub($chapterCounts, 'cc', function ($join) {
            $join->on('product.title', '=', 'cc.title');
        })
        ->whereNotNull('users_id')
        ->orderBy('product.id', 'DESC')
        ->paginate(28);

    }
    public function updateStoryStatus($ids, $trangThaiArray): void 
    {
        foreach ($ids as $key => $id) {
            $trangThai = $trangThaiArray[$key];
            
            // Cập nhật trạng thái trong database
            DB::table('product')
                ->where('id', $id)
                ->update(['trang_thai' => $trangThai]);
        }
    }

    public function getChaptersByTitle($title){
        $data = DB::table('chapter')
        ->where('title',$title)
        ->get();
       
    }
  
    public function deleteStory($id){
        $story = DB::table('detail_product')->find($id);

        if ($story) {
            DB::table('detail_product')->where('id', $id)->delete();
            DB::table('product')->where('title', $story->title)->delete();
            DB::table('chapter')->where('title', $story->title)->delete();
        
            return true;
        }
        
    }

    public function getStoryByTitle($title) {
        return DB::table('product')
        ->join('detail_product','product.title','=','detail_product.title')
        ->where('product.title',$title)->first();
    }

    public function updateStory($request, $title, $userId)
    {
        $file_name1 = '';
        $descripts = "";
    
        $product = DB::table('product')->where('title', $title)->first();
        if (!$product) {
            return false;
        }
    
        // Xử lý upload ảnh
        if ($request->hasFile('fileInput')) {
            $file1 = $request->file('fileInput');
            $file_name1 = $file1->getClientOriginalName();
            $file1->move(public_path('upload'), $file_name1);
        } else {
            $file_name1 = $product->image;
        }
    
        $genres = $this->getGenres($request);
        $newTitle = $request->input('titletruyen');
        $newSlug = Str::slug($newTitle); // Tạo slug mới từ title mới
    
        // Update bảng product
        DB::table('product')
            ->where('title', $title)
            ->update([
                'title' => $newTitle,
                'slug' => $newSlug,
                'image' => $file_name1,
                'users_id' => $userId,
            ] + $genres);
    
        if ($request->has('descripts')) {
            $descripts = strip_tags($request->input('descripts'));
        }
    
        // Update bảng detail_product
        DB::table('detail_product')
            ->where('title', $title)
            ->update([
                'title' => $newTitle,
                'slug' => $newSlug,
                'descripts' => $descripts,
                'tacgia' => $request->input('tacgia'),
                'theloai' => implode(", ", array_keys($genres)),
                'nguon' => $request->input('truyen_type'),
                'trangthai' => $request->input('story-status'),
                'capnhatmoi' => '',
            ]);
    
        // Update bảng chapter nếu title thay đổi
        if ($title !== $newTitle) {
            DB::table('chapter')
                ->where('title', $title)
                ->update([
                    'title' => $newTitle,
                    'title_slug' => $newSlug
                ]);
        }
    
        return true;
    }



}