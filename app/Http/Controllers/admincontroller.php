<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Mail;
use Log;
use Illuminate\Support\Facades\Session;

class admincontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
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
    public function dashboardadmin(){
        return view('hoanadmin.dashboardadmin');
    }

    public function thong_tin_user(){
        $data = DB::table('users')->get();
       return view('hoanadmin.ttuser',compact('data'));
    }
    public function lich_su_nap_linh_thach_user(){
        $data = DB::table('admin_nap_linh_thach')->get();
        return view('hoanadmin.lichsunaplinhthachuser',compact('data'));
    }

    public function nap_linh_thach_user($id){
          $data = DB::table('users')
          ->where('id',$id)
          ->first();

          return view('hoanadmin.naplinhthachuser',compact('data'));
    }

    public function postnap_linh_thach_user(Request $request){
        DB::table('admin_nap_linh_thach')->insert([
           
            'name' => $request->name,
            'email' => $request->email,
            'solinhthach_nap' => $request->linh_thach,
            'thoigian' => now()->timezone('Asia/Ho_Chi_Minh'),
        ]);
        $thoigian = now()->timezone('Asia/Ho_Chi_Minh');
        $solinhthachnap = $request->linh_thach;
        Mail::send('mailadminnaplinhthach',compact('request','thoigian','solinhthachnap'),function ($email) use ($request) {
            $email->to($request->email,'ban quản trị');
        });
        
          $user_id = DB::table('users')
          ->where('email',$request->email)
          ->first();

          DB::table('users')
          ->where('email',$request->email)
          ->update([
            'linh_thach'=>$user_id->linh_thach + $request->linh_thach,
          ]);

          Session::flash('naplinhthachthanhcong', "Bạn đã nạp linh thạch thành công cho {$request->email}");

        return redirect('/pageadmin/thong_tin_user');
    }

    public function duyettruyenuser(){
        $data = DB::table('product')
            ->select('users.*','product.*', DB::raw('COUNT(chapter.id) as total_chapters'))
            ->join('users', 'product.users_id', '=', 'users.id')
            ->leftJoin('detail_product', 'product.title', '=', 'detail_product.title')
            ->leftJoin('chapter', 'product.title', '=', 'chapter.title')
            ->groupBy('product.id')
            ->whereNotNull('users_id')
            ->orderBy('product.id','DESC')
            ->get();
    
        return view('hoanadmin.duyettruyen',compact('data'));
    }

    public function updateTrangThai(Request $request) {
        $ids = $request->ids;
        $trangThaiArray = $request->trang_thai;
    
        foreach ($ids as $key => $id) {
            $trangThai = $trangThaiArray[$key];
            // Log the data sent to the server
            Log::info('ID: ' . $id . ', Trạng thái: ' . $trangThai);
    
            // Update the corresponding record in the database
            DB::table('product')->where('id', $id)->update(['trang_thai' => $trangThai]);
        }
    
        return back();
    }

    public function xemchapter($title){
        $data = DB::table('chapter')
        ->where('title',$title)
        ->get();

        return view('hoanadmin.xemchapter',compact('data'));
    }
    
    
    
    
}
