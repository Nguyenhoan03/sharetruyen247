<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\chapter;
use App\Repositories\basecategoryInterface;
use DB;
use Mail;
use Auth;
class chaptercontroller extends Controller
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
    public function index($title, $chapter)
    {
        $data = DB::table('product')
            ->join('chapter', 'product.title', '=', 'chapter.title')
            ->where('product.title', $title)
            ->where('chapter.chapter', $chapter)
            ->first();
    
        $nextchapter = DB::table('chapter')
            ->where('title', $title)
            ->where('chapter.id', '>', $data->id)
            ->orderBy('chapter.id', 'ASC')
            ->first();
    
        $previouschapter = DB::table('chapter')
            ->where('title', $title)
            ->where('chapter.id', '<', $data->id)
            ->orderBy('chapter.id', 'DESC')
            ->first();
    
        $dmcategory = $this->category->allcategory();
    
        $boolpurchased = null; // Khởi tạo giá trị mặc định là null
    
        if (Auth::check()) {
            $users_id = auth()->user()->id;
            $boolpurchased = DB::table('purchased_products')
                ->where('title', $title)
                ->where('chapter', $chapter)
                ->where('users_id', $users_id)
                ->first();
        }
       
    
        return view('chapter', compact('data', 'nextchapter', 'previouschapter', 'dmcategory', 'boolpurchased'));
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

    public function grant_linhthach(Request $request){
        $user_grant = auth()->user()->id;
        DB::table('grant_linhthach')->insert([
            'title' => $request->title,
            'chapter' => $request->chapter,
            'linhthach_grant' => $request['linhthach_grant'],
            'message' => $request->input('message'),
            'users_id' => $user_grant,
            'to_users_id' => $request->to_users_id,
        ]);



        $datanguoigui = [
            'title' => $request->title,
            'chapter' => $request->chapter,
            'linhthach_grant' => $request['linhthach_grant'],
            'message' => $request->input('message'),
            'users_id' => $user_grant,
            'to_users_id' => $request->to_users_id,
        ];

       


        $linhthachremaining =  DB::table('users')
        ->where('id',$user_grant)
        ->first();

        $linhthachafter = $linhthachremaining->linh_thach - $request['linhthach_grant'];

        DB::table('users')
        ->where('id',$user_grant)
        ->update([
            'linh_thach' => $linhthachafter,
        ]);


        // 
        $linhthachdocgiaremaining =  DB::table('users')
        ->where('id',$request->to_users_id)
        ->first();

        $linhthachdocgia = $linhthachdocgiaremaining->linh_thach + ($request['linhthach_grant'])*0.7;
        // $linhthachadminloi = $linhthachdocgiaremaining->linh_thach + ($request['linhthach_grant'])*0.3;
       
        DB::table('users')
        ->where('id',$request->to_users_id)
        ->update([
            'linh_thach' => $linhthachdocgia,
        ]);   

        $linhthachadminafterbefore = DB::table('users')->where('id',6)->first();
       
        $linhthachadminafter = $linhthachadminafterbefore->linh_thach + ($request['linhthach_grant'])*0.3;

        DB::table('users')
        ->where('id',6)
        ->update([
            'linh_thach' => $linhthachadminafter,
        ]);
      
        Mail::send('mail',compact('datanguoigui'),function ($email){
            $email->to(auth()->user()->email,'ban quản trị');
          });  

          Mail::send('maildocgia',compact('datanguoigui'),function ($email){
            $email->to($request->to_users_id,'ban quản trị');
          });  

          
    }

}
