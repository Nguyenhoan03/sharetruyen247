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
    public function __construct(basecategoryInterface $basecategory)
    {
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
        $viewers = DB::table('detail_product')->where('title', $title)->first();

        if ($viewers) {
            DB::table('detail_product')->where('title', $title)->increment('viewers');
        }
        return view('story', compact('data', 'datachapter', 'dmcategory'));
    }
}
