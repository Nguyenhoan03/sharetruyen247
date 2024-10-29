<?php
namespace App\services;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\DB;
  class danhmucService{
    public function data_pageCategory($title_category)
    {
        $redis = Redis::connection();
        $currentPage = request()->get('page', 1);
        $cacheKey = "category:{$title_category}:page:{$currentPage}";
        
        // Kiểm tra cache
        if ($redis->exists($cacheKey)) {
            return unserialize($redis->get($cacheKey));
        }
        
      
        $data = DB::table('product')
            ->join('detail_product', 'product.title', '=', 'detail_product.title')
            ->join('chapter', function ($join) {
                $join->on('product.title', '=', 'chapter.title')
                    ->whereRaw('chapter.id = (select max(id) from chapter where chapter.title = product.title)');
            })
            ->where([
                ["product.$title_category", '=', 1],
                ['product.trang_thai', '=', 'đã duyệt']
            ])
            ->select('product.title', 'product.image', 'detail_product.*', 'chapter.chapter')
            ->orderBy('product.id', 'DESC')
            ->paginate(30);
    
       
        $redis->setex($cacheKey, 3600, serialize($data));
       
        return $data;
    }
    
   
    // public function clearCategoryCache($title_category)
    // {
    //     $redis = Redis::connection();
    //     $keys = $redis->keys("category:{$title_category}:page:*");
        
    //     foreach ($keys as $key) {
    //         $redis->del($key);
    //     }
    // }

    public function data_pageCategory_truyenfull($title_category){
        $data = DB::table('product')
        ->join('detail_product', function($join){
             $join->on('product.title', '=', 'detail_product.title')
             ->where('detail_product.trangthai','=','Hoàn Thành');
        })
        ->join('chapter', function ($join) {
            $join->on('product.title', '=', 'chapter.title')
                ->whereRaw('chapter.id = (select max(id) from chapter where chapter.title = product.title)');
        })
       
        ->where("product.$title_category",'=',1)     
        ->orderBy('product.id','DESC')
        ->get();

        return $data;
    }

    public function data_pageCategory_truyenhot($title_category){
        $data = DB::table('detail_product')
        ->join('product', function($join) use ($title_category) {
            $join->on('product.title', '=', 'detail_product.title')
                 ->where("product.$title_category", '=', 1);
        })
            ->join('chapter', function ($join) {
                $join->on('detail_product.title', '=', 'chapter.title')
                    ->whereRaw('chapter.id = (select max(id) from chapter where chapter.title = product.title)');
            })
            ->orderBy('detail_product.viewers', 'DESC')
            ->take(500)
            ->orderBy('product.id', 'DESC')
            ->paginate(30);
        return $data;
    }
  }

?>
