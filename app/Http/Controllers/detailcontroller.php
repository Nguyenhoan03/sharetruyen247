<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\detail_product;
use App\Models\chapter;
use App\Repositories\basecategoryInterface;
use DB;

class detailcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     protected $category;
     public function __construct(basecategoryInterface $basecategory){
        $this->category = $basecategory;
    }

    public function index($title)
    {
        $data = DB::table('detail_product')
            ->where('detail_product.title', $title)
            ->join('product', 'detail_product.title', '=', 'product.title')
            ->select('detail_product.*', 'product.image')
            ->first();
    
        $datachapter = chapter::where('title', $title)->paginate(30);
    
        $dmcategory = $this->category->allcategory();
        // $truyen = Truyen::find($truyenId);

        // // Tăng số lượt viewers
        // $truyen->viewers += 1;
        // $truyen->save();

        $viewers = DB::table('detail_product')->where('title', $title)->first();

if ($viewers) {
    DB::table('detail_product')->where('title', $title)->increment('viewers');
}



        return view('story', compact('data', 'datachapter','dmcategory'));
    }
    
    
    
        
          
      
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
