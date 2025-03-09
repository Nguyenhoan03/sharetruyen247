<?php

namespace App\Http\Controllers;


use App\Models\chapter;
use App\Repositories\basecategoryInterface;
use Illuminate\Support\Facades\DB as DB;;

class DetailController extends Controller
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
    public function index($slug)
    {
        $data = DB::table('detail_product')
            ->where('detail_product.slug', $slug)
            ->join('product', 'detail_product.title', '=', 'product.title')
            ->select('detail_product.*', 'product.image')
            ->first();
        if (!$data) {
            abort(404);
        }
        $datachapter = chapter::where('title_slug', $slug)->paginate(30);
        $dmcategory = $this->category->allcategory();
        $viewers = DB::table('detail_product')->where('slug', $slug)->first();

        if ($viewers) {
            DB::table('detail_product')->where('slug', $slug)->increment('viewers');
        }
        return view('story', compact('data', 'datachapter', 'dmcategory'));
    }
}
