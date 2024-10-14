<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Repositories\basecategoryInterface;
use App\Repositories\danhmucRepository;

class danhmuccategorycontroller extends Controller
{

    protected $category;
    protected $dm_Repo;

    public function __construct(basecategoryInterface $basecategory, danhmucRepository $danhmucRepository){
        $this->category = $basecategory;
        $this->dm_Repo = $danhmucRepository;
    }
   

    public function tienhiep(){
        $data = $this->dm_Repo->data_pageCategory('tienhiep');
        $dmcategory = $this->category->allcategory();
        return view('danhmuccategory.tienhiep', compact('data', 'dmcategory'));
    }

    public function truyentienhiepfull(){
        $data = $this->dm_Repo->data_pageCategory_truyenfull('tienhiep');  
        return response()->json($data);  
    }

    public function truyentienhiephot(){
        $data = $this->dm_Repo->data_pageCategory_truyenhot('tienhiep');
        return response()->json($data);
    }
    //kiếm hiệp
   
    public function kiemhiep() {
        $data = $this->dm_Repo->data_pageCategory('kiemhiep');
        $dmcategory = $this->category->allcategory();
        return view('danhmuccategory.kiemhiep', compact('data', 'dmcategory'));
    }

    public function truyenkiemhiepfull(){
        $data = $this->dm_Repo->data_pageCategory_truyenfull('kiemhiep');  
        return response()->json($data);  
    }
    public function truyenkiemhiephot(){
        $data = $this->dm_Repo->data_pageCategory_truyenhot('kiemhiep');
        return response()->json($data);
    }
  
    public function ngontinh() {
        $data = $this->dm_Repo->data_pageCategory('ngontinh');
        $dmcategory = $this->category->allcategory();
        return view('danhmuccategory.ngontinh', compact('data', 'dmcategory'));
    }
    
    public function quantruong() {
        $data = $this->dm_Repo->data_pageCategory('quantruong');
        $dmcategory = $this->category->allcategory();
        return view('danhmuccategory.quantruong', compact('data', 'dmcategory'));
    }
    
    public function khoahuyen() {
        $data = $this->dm_Repo->data_pageCategory('khoahuyen');
        $dmcategory = $this->category->allcategory();
        return view('danhmuccategory.khoahuyen', compact('data', 'dmcategory'));
    }
    
    public function huyenhuyen() {
        $data = $this->dm_Repo->data_pageCategory('huyenhuyen');
        $dmcategory = $this->category->allcategory();
        return view('danhmuccategory.huyennguyen', compact('data', 'dmcategory'));
    }
    
    public function dinang() {
        $data = $this->dm_Repo->data_pageCategory('dinang');
        $dmcategory = $this->category->allcategory();
        return view('danhmuccategory.dinang', compact('data', 'dmcategory'));
    }
    
    public function dammy() {
        $data = $this->dm_Repo->data_pageCategory('dammy');
        $dmcategory = $this->category->allcategory();
        return view('danhmuccategory.dammy', compact('data', 'dmcategory'));
    }
    
    public function vongdu() {
        $data = $this->dm_Repo->data_pageCategory('vongdu');
        $dmcategory = $this->category->allcategory();
        return view('danhmuccategory.vongdu', compact('data', 'dmcategory'));
    }
    
    public function haihuoc() {
        $data = $this->dm_Repo->data_pageCategory('haihuoc');
        $dmcategory = $this->category->allcategory();
        return view('danhmuccategory.haihuoc', compact('data', 'dmcategory'));
    }
    
    public function kinhdi() {
        $data = $this->dm_Repo->data_pageCategory('kinhdi');
        $dmcategory = $this->category->allcategory();
        return view('danhmuccategory.kinhdi', compact('data', 'dmcategory'));
    }
    
    public function dothi() {
        $data = $this->dm_Repo->data_pageCategory('dothi');
        $dmcategory = $this->category->allcategory();
        return view('danhmuccategory.dothi', compact('data', 'dmcategory'));
    }
    
    public function lichsu() {
        $data = $this->dm_Repo->data_pageCategory('lichsu');
        $dmcategory = $this->category->allcategory();
        return view('danhmuccategory.lichsu', compact('data', 'dmcategory'));
    }
    
    public function truyenma() {
        $data = $this->dm_Repo->data_pageCategory('truyenma');
        $dmcategory = $this->category->allcategory();
        return view('danhmuccategory.truyenma', compact('data', 'dmcategory'));
    }
    
    public function truyenngan() {
        $data = $this->dm_Repo->data_pageCategory('truyenngan');
        $dmcategory = $this->category->allcategory();
        return view('danhmuccategory.truyenngan', compact('data', 'dmcategory'));
    }
    
    public function tieuthuyet() {
        $data = $this->dm_Repo->data_pageCategory('tieuthuyet');
        $dmcategory = $this->category->allcategory();
        return view('danhmuccategory.tieuthuyet', compact('data', 'dmcategory'));
    }
    
    public function truyenteen() {
        $data = $this->dm_Repo->data_pageCategory('truyenteen');
        $dmcategory = $this->category->allcategory();
        return view('danhmuccategory.truyenteen', compact('data', 'dmcategory'));
    }
    
    public function quansu() {
        $data = $this->dm_Repo->data_pageCategory('quansu');
        $dmcategory = $this->category->allcategory();
        return view('danhmuccategory.quansu', compact('data', 'dmcategory'));
    }
    
    public function xuyenkhong() {
        $data = $this->dm_Repo->data_pageCategory('xuyenkhong');
        $dmcategory = $this->category->allcategory();
        return view('danhmuccategory.xuyenkhong', compact('data', 'dmcategory'));
    }
    
    public function trinhtham() {
        $data = $this->dm_Repo->data_pageCategory('trinhtham');
        $dmcategory = $this->category->allcategory();
        return view('danhmuccategory.trinhtham', compact('data', 'dmcategory'));
    }
    

   
}
