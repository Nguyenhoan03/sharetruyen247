<?php
namespace App\Repositories;
use DB;

  class danhmucRepository{
    public function data_pageCategory($title_category){
        $data = DB::table('product')
            ->join('detail_product', 'product.title', '=', 'detail_product.title')
            ->join('chapter', function ($join) {
                $join->on('product.title', '=', 'chapter.title')
                    ->whereRaw('chapter.id = (select max(id) from chapter where chapter.title = product.title)');
            })
            ->where("product.$title_category", '=', 1)
            ->select('product.title', 'product.image', 'detail_product.*', 'chapter.chapter')
            ->orderBy('product.id', 'DESC')
            ->paginate(30);

        return $data;
    }

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
