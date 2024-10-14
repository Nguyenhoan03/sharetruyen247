<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use SebastianBergmann\Type\VoidType;

// use Illuminate\Support\Facades\Session;
class storyRepository
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

        DB::table('product')->insert([
            'title' => $request->input('titletruyen'),
            'image' => $fileName,
            'users_id' => $userId,
            'trang_thai' => 'chờ duyệt',
        ] + $genres);

        $descripts = strip_tags($request->input('descripts'));

        DB::table('detail_product')->insert([
            'title' => $request->input('titletruyen'),
            'descripts' => $descripts,
            'tacgia' => $request->input('tacgia'),
            'theloai' => implode(", ", array_keys($genres)),
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
        ->get();

    }
    public function updateStoryStatus($ids, $trangThaiArray) : void 
    {
        foreach ($ids as $key => $id) {
            $trangThai = $trangThaiArray[$key];
            DB::table('product')->where('id', $id)->update(['trang_thai' => $trangThai]);
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
    
        // Lấy sản phẩm và xử lý lỗi nếu không tìm thấy
        $product = DB::table('product')->where('title', $title)->first();
        if (!$product) {
            return false;
        }
    
        // Xử lý file upload (nếu có)
        if ($request->hasFile('fileInput')) {
            $file1 = $request->file('fileInput');
            $file_name1 = $file1->getClientOriginalName();
            $file1->move(public_path('upload'), $file_name1);
        } else {
            // Sử dụng ảnh cũ nếu không có tệp tải lên
            $file_name1 = $product->image;
        }
    
        // Xử lý các thể loại
        $genres = $request->only([
            'tienhiep', 'ngontinh', 'quantruong', 'khoanguyen', 'huyenhuyen', 'dinang',
            'kiemhiep', 'dammy', 'vongdu', 'haihuoc', 'kinhdi', 'dothi', 'lichsu', 
            'truyenma', 'truyenngan', 'tieuthuyet', 'truyenteen', 'quansu', 'xuyenkhong', 'trinhtham'
        ]);
    
        // Tạo danh sách thể loại để lưu trong bảng `detail_product`
        $genreKeys = array_keys(array_filter($genres));
    
        // Cập nhật sản phẩm
        DB::table('product')
            ->where('title', $title)
            ->update([
                'title' => $request->input('titletruyen'),
                'image' => $file_name1,
                // Xử lý tất cả các thể loại bằng cách lặp qua mảng
                'tienhiep' => isset($genres['tienhiep']) ? 1 : 0,
                'ngontinh' => isset($genres['ngontinh']) ? 1 : 0,
                'quantruong' => isset($genres['quantruong']) ? 1 : 0,
                'khoanguyen' => isset($genres['khoanguyen']) ? 1 : 0,
                'huyenhuyen' => isset($genres['huyenhuyen']) ? 1 : 0,
                'dinang' => isset($genres['dinang']) ? 1 : 0,
                'kiemhiep' => isset($genres['kiemhiep']) ? 1 : 0,
                'dammy' => isset($genres['dammy']) ? 1 : 0,
                'vongdu' => isset($genres['vongdu']) ? 1 : 0,
                'haihuoc' => isset($genres['haihuoc']) ? 1 : 0,
                'kinhdi' => isset($genres['kinhdi']) ? 1 : 0,
                'dothi' => isset($genres['dothi']) ? 1 : 0,
                'lichsu' => isset($genres['lichsu']) ? 1 : 0,
                'truyenma' => isset($genres['truyenma']) ? 1 : 0,
                'truyenngan' => isset($genres['truyenngan']) ? 1 : 0,
                'tieuthuyet' => isset($genres['tieuthuyet']) ? 1 : 0,
                'truyenteen' => isset($genres['truyenteen']) ? 1 : 0,
                'quansu' => isset($genres['quansu']) ? 1 : 0,
                'xuyenkhong' => isset($genres['xuyenkhong']) ? 1 : 0,
                'trinhtham' => isset($genres['trinhtham']) ? 1 : 0,
                'users_id' => $userId,
            ]);
    
        // Cập nhật mô tả truyện (nếu có)
        if ($request->has('descripts')) {
            $descripts = strip_tags($request->input('descripts'));
        }
    
        // Cập nhật chi tiết sản phẩm
        DB::table('detail_product')
            ->where('title', $title)
            ->update([
                'title' => $request->input('titletruyen'),
                'descripts' => $descripts,
                'tacgia' => $request->input('tacgia'),
                'theloai' => implode(", ", $genreKeys),  // Lưu thể loại dưới dạng chuỗi
                'nguon' => $request->input('truyen_type'),
                'trangthai' => $request->input('story-status'),
                'capnhatmoi' => '',  // Xử lý phần này tùy theo logic
                'viewers' => 0,  // Cài đặt viewers về 0, có thể điều chỉnh tùy logic
            ]);
    
        return true;
    }



}