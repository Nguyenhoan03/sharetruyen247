<?php

namespace App\services;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;
use Elasticsearch\ClientBuilder;

class homeService
{   
   
    public function getHomePageData()
    {
        $dmcategory = Cache::remember('dmcategory', 60 * 60, function () {
            return $this->getCategories();
        });
    
        $truyenhot = Cache::remember('truyenhot', 60 * 60, function () {
            return $this->getHotStories();
        });
    
        $truyenmoi = Cache::remember('truyenmoi', 60 * 60, function () {
            return $this->getNewStories();
        });
    
        $truyenfull = Cache::remember('truyenfull', 60 * 60, function () {
            return $this->getCompletedStories();
        });
    
        $toptruyen = Cache::remember('toptruyen', 60 * 60, function () {
            return $this->getTopStories();
        });
    
        return compact('dmcategory', 'truyenhot', 'truyenmoi', 'truyenfull', 'toptruyen');
    }

  

    private function getCategories()
    {
            return DB::table('category')->get();
    }

    private function getHotStories()
    {
        return DB::table('detail_product')
            ->join('product', 'detail_product.title', '=', 'product.title')
            ->select('detail_product.viewers', 'detail_product.trangthai', 'product.title', 'product.image')
            ->where('product.trang_thai', 'đã duyệt')
            ->orWhereNull('product.trang_thai')
            ->orderBy('detail_product.viewers', 'DESC')
            ->take(16)
            ->get();
    }

    private function getNewStories()
    {
        return DB::table('product')
            ->join('detail_product', 'product.title', '=', 'detail_product.title')
            ->join('chapter', function ($join) {
                $join->on('product.title', '=', 'chapter.title')
                    ->whereRaw('chapter.id = (select max(id) from chapter where chapter.title = product.title)');
            })
            ->where('product.trang_thai', 'đã duyệt')
            ->orWhereNull('product.trang_thai')
            ->select('product.title', 'detail_product.theloai', 'detail_product.trangthai', 'chapter.chapter')
            ->orderBy('product.id', 'DESC')
            ->paginate(28);
    }

    private function getCompletedStories()
    {
        return DB::table('detail_product')
            ->join('product', 'detail_product.title', '=', 'product.title')
            ->select(
                'detail_product.trangthai',
                'product.title',
                'product.image',
                DB::raw('(SELECT COUNT(*) FROM chapter WHERE chapter.title = detail_product.title) as total_chapters')
            )
            ->where('detail_product.trangthai', 'Hoàn Thành')
            ->where('product.trang_thai', 'đã duyệt')
            ->orWhereNull('product.trang_thai')
            ->orderBy('product.id', 'DESC')
            ->take(16)
            ->get();
    }

    private function getTopStories()
    {
        return DB::table('detail_product')
            ->join('chapter', 'detail_product.title', '=', 'chapter.title')
            ->join('product', 'detail_product.title', '=', 'product.title')
            ->where(function($query) {
                $query->where('product.trang_thai', '=', 'đã duyệt')
                    ->orWhereNull('product.trang_thai');
            })
            ->select('detail_product.title', 'detail_product.viewers', DB::raw('SUM(detail_product.viewers) as total_viewers'), DB::raw('COUNT(chapter.id) as total_chapters'))
            ->groupBy('detail_product.title', 'detail_product.viewers')
            ->orderBy('total_chapters', 'asc')
            ->take(10)
            ->get();
    }

    public function searchStories($search)
    {

        return DB::table('product')
            ->join('detail_product', 'product.title', '=', 'detail_product.title')
            ->join('chapter', function ($join) {
                $join->on('product.title', '=', 'chapter.title')
                    ->whereRaw('chapter.id = (select max(id) from chapter where chapter.title = product.title)');
            })
            ->select('product.title', 'product.image', 'detail_product.theloai', 'chapter.chapter')
            ->where('product.title', 'like', '%' . $search . '%')
            ->get();
    }
   
   
}