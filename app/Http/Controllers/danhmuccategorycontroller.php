<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Repositories\basecategoryInterface;
use App\Models\category;
class danhmuccategorycontroller extends Controller
{

    protected $category;
    public function __construct(basecategoryInterface $basecategory){
        $this->category = $basecategory;
    }

    public function tienhiep(){

        $data = DB::table('product')
        ->join('detail_product', 'product.title', '=', 'detail_product.title')
        ->join('chapter', function ($join) {
            $join->on('product.title', '=', 'chapter.title')
                ->whereRaw('chapter.id = (select max(id) from chapter where chapter.title = product.title)');
        })
        ->where('product.tienhiep', '=', 1)
        ->select('product.title', 'product.image', 'detail_product.*', 'chapter.chapter')
        ->orderBy('product.id', 'DESC')
        ->paginate(30);


        
        $dmcategory = $this->category->allcategory();

        
        return view('danhmuccategory.tienhiep',compact('data','dmcategory'));
    }

 

    public function truyentienhiepfull(){
        $data = DB::table('product')
        ->join('detail_product', function($join){
             $join->on('product.title', '=', 'detail_product.title')
             ->where('detail_product.trangthai','=','Hoàn Thành');
        })
        ->join('chapter', function ($join) {
            $join->on('product.title', '=', 'chapter.title')
                ->whereRaw('chapter.id = (select max(id) from chapter where chapter.title = product.title)');
        })
       
        ->where('product.tienhiep','=',1)     
        ->orderBy('product.id','DESC')
        ->get();

        return response()->json($data);
    }
    public function truyentienhiephot(){
        $data = DB::table('detail_product')
            ->join('product', function($join){
                $join->on('product.title', '=', 'detail_product.title')
                    ->where('product.tienhiep', '=', 1);
            })
            ->join('chapter', function ($join) {
                $join->on('detail_product.title', '=', 'chapter.title')
                    ->whereRaw('chapter.id = (select max(id) from chapter where chapter.title = product.title)');
            })
            ->orderBy('detail_product.viewers', 'DESC') // Order by viewers in descending order
            ->take(500)
            ->orderBy('product.id','DESC')
            ->get(); // Use get() to execute the query and retrieve the results
    
        return response()->json($data);
    }


    //kiếm hiệp

    public function kiemhiep(){

        $data = DB::table('product')
        ->join('detail_product', 'product.title', '=', 'detail_product.title')
        ->join('chapter', function ($join) {
            $join->on('product.title', '=', 'chapter.title')
                ->whereRaw('chapter.id = (select max(id) from chapter where chapter.title = product.title)');
        })
        ->where('product.kiemhiep', '=', 1)
        ->select('product.title', 'product.image', 'detail_product.*','chapter.chapter')
              ->orderBy('product.id','DESC')
        ->paginate(30);

        
        $dmcategory = $this->category->allcategory();

        
        return view('danhmuccategory.kiemhiep',compact('data','dmcategory'));
    }

    public function truyenkiemhiepfull(){
        $data = DB::table('product')
        ->join('detail_product', function($join){
             $join->on('product.title', '=', 'detail_product.title')
             ->where('detail_product.trangthai','=','Hoàn Thành');
        })
        ->join('chapter', function ($join) {
            $join->on('product.title', '=', 'chapter.title')
                ->whereRaw('chapter.id = (select max(id) from chapter where chapter.title = product.title)');
        })
       
        ->where('product.kiemhiep','=',1)     
        ->orderBy('product.id','DESC')
        ->paginate(30);

        return response()->json($data);
    }
    public function truyenkiemhiephot(){
        $data = DB::table('detail_product')
            ->join('product', function($join){
                $join->on('product.title', '=', 'detail_product.title')
                    ->where('product.kiemhiep', '=', 1);
            })
            ->join('chapter', function ($join) {
                $join->on('detail_product.title', '=', 'chapter.title')
                    ->whereRaw('chapter.id = (select max(id) from chapter where chapter.title = product.title)');
            })
            ->orderBy('detail_product.viewers', 'DESC') // Order by viewers in descending order
            ->take(500)
            ->orderBy('product.id','DESC')
            ->paginate(30); // Use get() to execute the query and retrieve the results
    
        return response()->json($data);
    }
    public function ngontinh(){

        $data = DB::table('product')
        ->join('detail_product', 'product.title', '=', 'detail_product.title')
        ->join('chapter', function ($join) {
            $join->on('product.title', '=', 'chapter.title')
                ->whereRaw('chapter.id = (select max(id) from chapter where chapter.title = product.title)');
        })
        ->where('product.ngontinh', '=', 1)
        ->select('product.title', 'product.image', 'detail_product.*', 'chapter.chapter')
        ->orderBy('product.id', 'DESC')
        ->paginate(30);


        
        $dmcategory = $this->category->allcategory();

        
        return view('danhmuccategory.ngontinh',compact('data','dmcategory'));
    }

    public function quantruong(){

        $data = DB::table('product')
        ->join('detail_product', 'product.title', '=', 'detail_product.title')
        ->join('chapter', function ($join) {
            $join->on('product.title', '=', 'chapter.title')
                ->whereRaw('chapter.id = (select max(id) from chapter where chapter.title = product.title)');
        })
        ->where('product.quantruong', '=', 1)
        ->select('product.title', 'product.image', 'detail_product.*', 'chapter.chapter')
        ->orderBy('product.id', 'DESC')
        ->paginate(30);


        
        $dmcategory = $this->category->allcategory();

        
        return view('danhmuccategory.quantruong',compact('data','dmcategory'));
    }


    public function khoahuyen(){

        $data = DB::table('product')
        ->join('detail_product', 'product.title', '=', 'detail_product.title')
        ->join('chapter', function ($join) {
            $join->on('product.title', '=', 'chapter.title')
                ->whereRaw('chapter.id = (select max(id) from chapter where chapter.title = product.title)');
        })
        ->where('product.khoahuyen', '=', 1)
        ->select('product.title', 'product.image', 'detail_product.*', 'chapter.chapter')
        ->orderBy('product.id', 'DESC')
        ->paginate(30);


        
        $dmcategory = $this->category->allcategory();

        
        return view('danhmuccategory.khoahuyen',compact('data','dmcategory'));
    }


    public function huyenhuyen(){

        $data = DB::table('product')
        ->join('detail_product', 'product.title', '=', 'detail_product.title')
        ->join('chapter', function ($join) {
            $join->on('product.title', '=', 'chapter.title')
                ->whereRaw('chapter.id = (select max(id) from chapter where chapter.title = product.title)');
        })
        ->where('product.huyenhuyen', '=', 1)
        ->select('product.title', 'product.image', 'detail_product.*', 'chapter.chapter')
        ->orderBy('product.id', 'DESC')
        ->paginate(30);


        
        $dmcategory = $this->category->allcategory();

        
        return view('danhmuccategory.huyenhuyen',compact('data','dmcategory'));
    }


    public function dinang(){

        $data = DB::table('product')
        ->join('detail_product', 'product.title', '=', 'detail_product.title')
        ->join('chapter', function ($join) {
            $join->on('product.title', '=', 'chapter.title')
                ->whereRaw('chapter.id = (select max(id) from chapter where chapter.title = product.title)');
        })
        ->where('product.dinang', '=', 1)
        ->select('product.title', 'product.image', 'detail_product.*', 'chapter.chapter')
        ->orderBy('product.id', 'DESC')
        ->paginate(30);


        
        $dmcategory = $this->category->allcategory();

        
        return view('danhmuccategory.dinang',compact('data','dmcategory'));
    }


    


    public function dammy(){

        $data = DB::table('product')
        ->join('detail_product', 'product.title', '=', 'detail_product.title')
        ->join('chapter', function ($join) {
            $join->on('product.title', '=', 'chapter.title')
                ->whereRaw('chapter.id = (select max(id) from chapter where chapter.title = product.title)');
        })
        ->where('product.dammy', '=', 1)
        ->select('product.title', 'product.image', 'detail_product.*', 'chapter.chapter')
        ->orderBy('product.id', 'DESC')
        ->paginate(30);


        
        $dmcategory = $this->category->allcategory();

        
        return view('danhmuccategory.dammy',compact('data','dmcategory'));
    }

    public function vongdu(){

        $data = DB::table('product')
        ->join('detail_product', 'product.title', '=', 'detail_product.title')
        ->join('chapter', function ($join) {
            $join->on('product.title', '=', 'chapter.title')
                ->whereRaw('chapter.id = (select max(id) from chapter where chapter.title = product.title)');
        })
        ->where('product.vongdu', '=', 1)
        ->select('product.title', 'product.image', 'detail_product.*', 'chapter.chapter')
        ->orderBy('product.id', 'DESC')
        ->paginate(30);


        
        $dmcategory = $this->category->allcategory();

        
        return view('danhmuccategory.vongdu',compact('data','dmcategory'));
    }


    public function haihuoc(){

        $data = DB::table('product')
        ->join('detail_product', 'product.title', '=', 'detail_product.title')
        ->join('chapter', function ($join) {
            $join->on('product.title', '=', 'chapter.title')
                ->whereRaw('chapter.id = (select max(id) from chapter where chapter.title = product.title)');
        })
        ->where('product.haihuoc', '=', 1)
        ->select('product.title', 'product.image', 'detail_product.*', 'chapter.chapter')
        ->orderBy('product.id', 'DESC')
        ->paginate(30);


        
        $dmcategory = $this->category->allcategory();

        
        return view('danhmuccategory.haihuoc',compact('data','dmcategory'));
    }


    public function kinhdi(){

        $data = DB::table('product')
        ->join('detail_product', 'product.title', '=', 'detail_product.title')
        ->join('chapter', function ($join) {
            $join->on('product.title', '=', 'chapter.title')
                ->whereRaw('chapter.id = (select max(id) from chapter where chapter.title = product.title)');
        })
        ->where('product.kinhdi', '=', 1)
        ->select('product.title', 'product.image', 'detail_product.*', 'chapter.chapter')
        ->orderBy('product.id', 'DESC')
        ->paginate(30);


        
        $dmcategory = $this->category->allcategory();

        
        return view('danhmuccategory.kinhdi',compact('data','dmcategory'));
    }

    public function dothi(){

        $data = DB::table('product')
        ->join('detail_product', 'product.title', '=', 'detail_product.title')
        ->join('chapter', function ($join) {
            $join->on('product.title', '=', 'chapter.title')
                ->whereRaw('chapter.id = (select max(id) from chapter where chapter.title = product.title)');
        })
        ->where('product.dothi', '=', 1)
        ->select('product.title', 'product.image', 'detail_product.*', 'chapter.chapter')
        ->orderBy('product.id', 'DESC')
        ->paginate(30);


        
        $dmcategory = $this->category->allcategory();

        
        return view('danhmuccategory.dothi',compact('data','dmcategory'));
    }


    public function lichsu(){

        $data = DB::table('product')
        ->join('detail_product', 'product.title', '=', 'detail_product.title')
        ->join('chapter', function ($join) {
            $join->on('product.title', '=', 'chapter.title')
                ->whereRaw('chapter.id = (select max(id) from chapter where chapter.title = product.title)');
        })
        ->where('product.lichsu', '=', 1)
        ->select('product.title', 'product.image', 'detail_product.*', 'chapter.chapter')
        ->orderBy('product.id', 'DESC')
        ->paginate(30);


        
        $dmcategory = $this->category->allcategory();

        
        return view('danhmuccategory.lichsu',compact('data','dmcategory'));
    }


    public function truyenma(){

        $data = DB::table('product')
        ->join('detail_product', 'product.title', '=', 'detail_product.title')
        ->join('chapter', function ($join) {
            $join->on('product.title', '=', 'chapter.title')
                ->whereRaw('chapter.id = (select max(id) from chapter where chapter.title = product.title)');
        })
        ->where('product.truyenma', '=', 1)
        ->select('product.title', 'product.image', 'detail_product.*', 'chapter.chapter')
        ->orderBy('product.id', 'DESC')
        ->paginate(30);


        
        $dmcategory = $this->category->allcategory();

        
        return view('danhmuccategory.truyenma',compact('data','dmcategory'));
    }


    public function truyenngan(){

        $data = DB::table('product')
        ->join('detail_product', 'product.title', '=', 'detail_product.title')
        ->join('chapter', function ($join) {
            $join->on('product.title', '=', 'chapter.title')
                ->whereRaw('chapter.id = (select max(id) from chapter where chapter.title = product.title)');
        })
        ->where('product.truyenngan', '=', 1)
        ->select('product.title', 'product.image', 'detail_product.*', 'chapter.chapter')
        ->orderBy('product.id', 'DESC')
        ->paginate(30);


        
        $dmcategory = $this->category->allcategory();

        
        return view('danhmuccategory.truyenngan',compact('data','dmcategory'));
    }


    public function tieuthuyet(){

        $data = DB::table('product')
        ->join('detail_product', 'product.title', '=', 'detail_product.title')
        ->join('chapter', function ($join) {
            $join->on('product.title', '=', 'chapter.title')
                ->whereRaw('chapter.id = (select max(id) from chapter where chapter.title = product.title)');
        })
        ->where('product.tieuthuyet', '=', 1)
        ->select('product.title', 'product.image', 'detail_product.*', 'chapter.chapter')
        ->orderBy('product.id', 'DESC')
        ->paginate(30);


        
        $dmcategory = $this->category->allcategory();

        
        return view('danhmuccategory.tieuthuyet',compact('data','dmcategory'));
    }

    public function truyenteen(){

        $data = DB::table('product')
        ->join('detail_product', 'product.title', '=', 'detail_product.title')
        ->join('chapter', function ($join) {
            $join->on('product.title', '=', 'chapter.title')
                ->whereRaw('chapter.id = (select max(id) from chapter where chapter.title = product.title)');
        })
        ->where('product.truyenteen', '=', 1)
        ->select('product.title', 'product.image', 'detail_product.*', 'chapter.chapter')
        ->orderBy('product.id', 'DESC')
        ->paginate(30);


        
        $dmcategory = $this->category->allcategory();

        
        return view('danhmuccategory.truyenteen',compact('data','dmcategory'));
    }


    public function quansu(){

        $data = DB::table('product')
        ->join('detail_product', 'product.title', '=', 'detail_product.title')
        ->join('chapter', function ($join) {
            $join->on('product.title', '=', 'chapter.title')
                ->whereRaw('chapter.id = (select max(id) from chapter where chapter.title = product.title)');
        })
        ->where('product.quansu', '=', 1)
        ->select('product.title', 'product.image', 'detail_product.*', 'chapter.chapter')
        ->orderBy('product.id', 'DESC')
        ->paginate(30);


        
        $dmcategory = $this->category->allcategory();

        
        return view('danhmuccategory.quansu',compact('data','dmcategory'));
    }


    public function xuyenkhong(){

        $data = DB::table('product')
        ->join('detail_product', 'product.title', '=', 'detail_product.title')
        ->join('chapter', function ($join) {
            $join->on('product.title', '=', 'chapter.title')
                ->whereRaw('chapter.id = (select max(id) from chapter where chapter.title = product.title)');
        })
        ->where('product.xuyenkhong', '=', 1)
        ->select('product.title', 'product.image', 'detail_product.*', 'chapter.chapter')
        ->orderBy('product.id', 'DESC')
        ->paginate(30);


        
        $dmcategory = $this->category->allcategory();

        
        return view('danhmuccategory.xuyenkhong',compact('data','dmcategory'));
    }

    public function trinhtham(){

        $data = DB::table('product')
        ->join('detail_product', 'product.title', '=', 'detail_product.title')
        ->join('chapter', function ($join) {
            $join->on('product.title', '=', 'chapter.title')
                ->whereRaw('chapter.id = (select max(id) from chapter where chapter.title = product.title)');
        })
        ->where('product.trinhtham', '=', 1)
        ->select('product.title', 'product.image', 'detail_product.*', 'chapter.chapter')
        ->orderBy('product.id', 'DESC')
        ->paginate(30);


        
        $dmcategory = $this->category->allcategory();

        
        return view('danhmuccategory.trinhtham',compact('data','dmcategory'));
    }
}
