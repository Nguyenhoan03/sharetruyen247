<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Session;
use DB;
use App\Models\chapter;
use Mail;

class storyusercontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $auth = auth()->user()->id;
 

        $data = DB::table('product')
            ->join('detail_product', 'product.title', '=', 'detail_product.title')
            ->where('product.users_id', $auth)
            ->orderBy('product.id', 'DESC')
            ->get();
    
            $totalViews = $data->sum('viewers');
            $totalChapters = 0; // Khởi tạo biến tổng số lượng chapter
            foreach ($data as $item) {
                // Đếm số lượng chapter cho mỗi truyện và cộng vào tổng số lượng chapter
                $totalChapters += DB::table('chapter')
                    ->where('title', $item->title) // Lọc theo title của truyện
                    ->count();
            }
            $totalproduct = $data->count('id');
          
        return view('storyuser.homestory',compact('data','totalViews','totalChapters','totalproduct'));
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

public function createstory(Request $request){
    return view('storyuser.themstoryuser');
}
public function postcreatestory(Request $request)
{
    $file_name1 = "";
    $descripts = "";
    if ($request->hasFile('fileInput')) {
        $file1 = $request->file('fileInput');
        $file_name1 = $file1->getClientOriginalName();
     
        $file1->move(public_path('upload'), $file_name1);

    }

    $genres = $request->only(['tienhiep', 'ngontinh', 'quantruong', 'khoanguyen', 'huyenhuyen', 'dinang', 'kiemhiep', 'dammy', 'vongdu', 'haihuoc', 'kinhdi', 'dothi', 'lichsu', 'truyenma', 'truyenngan', 'tieuthuyet', 'truyenteen', 'quansu', 'xuyenkhong', 'trinhtham']);

    

    DB::table('product')->insert([
        'title' => $request->input('titletruyen'),
        'image' => $file_name1,
        
        'tienhiep' => isset($genres['tienhiep']) ? 1 : 0,
        'ngontinh' => isset($genres['ngontinh']) ? 1 : 0,
        'quantruong' => isset($genres['quantruong']) ? 1 : 0,
        'khoanguyen' => isset($genres['khoanguyen']) ? 1 : 0,
        'huyenhuyen' => isset($genres['huyenhuyen']) ? 1 : 0,
        'dinang' => isset($genres['dinang']) ? 1 : 0,
        'kiemhiep' => isset($genres['kiemhiep']) ? 1 : 0,
        'dammy' => isset($genres['dammy']) ? 1 : 0,
        'vongdu' => isset($genres['vongdu']) ? 1 : 0,
        'haihuoc' => isset($genres['haihuoc']) ? 1 : 0,
        'kinhdi' => isset($genres['kinhdi']) ? 1 : 0,
        'dothi' => isset($genres['dothi']) ? 1 : 0,
        'lichsu' => isset($genres['lichsu']) ? 1 : 0,
        'truyenma' => isset($genres['truyenma']) ? 1 : 0,
        'truyenngan' => isset($genres['truyenngan']) ? 1 : 0,
        'tieuthuyet' => isset($genres['tieuthuyet']) ? 1 : 0,
        'truyenteen' => isset($genres['truyenteen']) ? 1 : 0,
        'quansu' => isset($genres['quansu']) ? 1 : 0,
        'xuyenkhong' => isset($genres['xuyenkhong']) ? 1 : 0,
        'trinhtham' => isset($genres['trinhtham']) ? 1 : 0,
      
        'users_id' => auth()->user()->id,
        'trang_thai' => 'chờ duyệt',
        // 'descripts' => $request->input('descripts'),
    ]);
    if ($request->has('descripts')) {
        $descripts = strip_tags($request->input('descripts'));
    }
    DB::table('detail_product')->insert([
        'title' => $request->input('titletruyen'),
        'descripts' =>$descripts,
        'tacgia' =>$request->input('tacgia'),
        'theloai' => implode(", ", array_keys($genres)),
        'nguon' => $request->input('truyen_type'),
        'trangthai' => $request->input('story-status'),
        'capnhatmoi' => '',

     
        'viewers' =>0,
    ]);

    Session::flash('successcreatestory', 'thêm truyện thành công. Bạn cần có ít nhất 5 chap để có thể yêu cầu duyệt, khi được duyệt truyện mới xuất hiện ngoài website.');
    return redirect('/story_user/createstory');
}

public function danhsachstory(){
    $auth = auth()->user()->id;
    $data = DB::table('product')
        ->join('users', 'product.users_id', '=', 'users.id')
        ->where('product.users_id', $auth)
        ->join('detail_product', 'product.title', '=', 'detail_product.title')
        ->select('product.*', 'detail_product.*', DB::raw('(SELECT COUNT(*) FROM chapter WHERE chapter.title = detail_product.title) as total_chapters'))
        ->orderBy('product.id','DESC')
        ->get();

        
       
    return view('storyuser.danhsachstory', compact('data'));
}



public function createchapterstory($title){
    
    return view('storyuser.createchapteruser',compact('title'));
}
public function deletestoryuser($id){
    $detail_product_delete = DB::table('detail_product')->find($id);

   

    // Tìm sản phẩm tương ứng trong bảng product
    $product_delete = DB::table('product')->where('title', $detail_product_delete->title)->first();

    $chapter_delete = DB::table('chapter')->where('title', $detail_product_delete->title)->get();

    
 

    // Xóa bản ghi từ bảng detail_product
    DB::table('detail_product')->where('id', $id)->delete();

    // Xóa bản ghi từ bảng product
    DB::table('product')->where('title', $detail_product_delete->title)->delete();
    DB::table('chapter')->where('title', $detail_product_delete->title)->delete();

    Session::flash('deletestoryuser', 'Xóa truyện thành công!');
    return redirect('/story_user/danhsachstory');
}

public function editerstory($title){
   
    $data = DB::table('product')
    ->join('detail_product','product.title','=','detail_product.title')
    ->where('product.title',$title)->first();

    return view('storyuser.editerstory',compact('data'));
}
public function putediterstory(Request $request, $title)
{
 
    $descripts = "";
    $imagefirst = DB::table('product')->where('title',$title)->first();
    $file_name1 = $imagefirst->image  ?? ''; 


    if ($request->hasFile('fileInput')) {
        $file1 = $request->file('fileInput');
        $file_name1 = $file1->getClientOriginalName();
    
        $file1->move(public_path('upload'), $file_name1);
    }
    
    

    $genres = $request->only(['tienhiep', 'ngontinh', 'quantruong', 'khoanguyen', 'huyenhuyen', 'dinang', 'kiemhiep', 'dammy', 'vongdu', 'haihuoc', 'kinhdi', 'dothi', 'lichsu', 'truyenma', 'truyenngan', 'tieuthuyet', 'truyenteen', 'quansu', 'xuyenkhong', 'trinhtham']);
    // Lấy ra dữ liệu của tiêu đề trong bảng 'product'
    $product = DB::table('product')->where('title', $title)->first();

    if($product) {
        DB::table('product')
        ->where('title', $title)
        ->update([
        'title' => $request->input('titletruyen'),
        'image' => $file_name1,
        
        'tienhiep' => isset($genres['tienhiep']) ? 1 : 0,
        'ngontinh' => isset($genres['ngontinh']) ? 1 : 0,
        'quantruong' => isset($genres['quantruong']) ? 1 : 0,
        'khoanguyen' => isset($genres['khoanguyen']) ? 1 : 0,
        'huyenhuyen' => isset($genres['huyenhuyen']) ? 1 : 0,
        'dinang' => isset($genres['dinang']) ? 1 : 0,
        'kiemhiep' => isset($genres['kiemhiep']) ? 1 : 0,
        'dammy' => isset($genres['dammy']) ? 1 : 0,
        'vongdu' => isset($genres['vongdu']) ? 1 : 0,
        'haihuoc' => isset($genres['haihuoc']) ? 1 : 0,
        'kinhdi' => isset($genres['kinhdi']) ? 1 : 0,
        'dothi' => isset($genres['dothi']) ? 1 : 0,
        'lichsu' => isset($genres['lichsu']) ? 1 : 0,
        'truyenma' => isset($genres['truyenma']) ? 1 : 0,
        'truyenngan' => isset($genres['truyenngan']) ? 1 : 0,
        'tieuthuyet' => isset($genres['tieuthuyet']) ? 1 : 0,
        'truyenteen' => isset($genres['truyenteen']) ? 1 : 0,
        'quansu' => isset($genres['quansu']) ? 1 : 0,
        'xuyenkhong' => isset($genres['xuyenkhong']) ? 1 : 0,
        'trinhtham' => isset($genres['trinhtham']) ? 1 : 0,
      
        'users_id' => auth()->user()->id,
        // 'descripts' => $request->input('descripts'),
    ]);

    if ($request->has('descripts')) {
        $descripts = strip_tags($request->input('descripts'));
    }
    DB::table('detail_product')
    ->where('title', $title) // Chỉ cập nhật dòng có tiêu đề là $title
    ->update([
        'title' => $request->input('titletruyen'),
        'descripts' =>$descripts,
        'tacgia' =>$request->input('tacgia'),
        'theloai' => implode(", ", array_keys($genres)),
        'nguon' => $request->input('truyen_type'),
        'trangthai' => $request->input('story-status'),
        'capnhatmoi' => '',

     
        'viewers' =>0,
    ]);

    Session::flash('successediterestory', 'Sửa truyện thành công.');
    return redirect('/story_user/danhsachstory');
}

// Trường hợp không tìm thấy tiêu đề trong bảng 'product'
// Xử lý lỗi hoặc thông báo cho người dùng

Session::flash('failededit', 'Không tìm thấy tiêu đề truyện.');
return redirect('/story_user');
}

public function postediterstory(Request $request,$title){
      DB::table('chapter')->insert([
        'title' => $title,
        'chapter' => 'chương' . $request->chapter_number . ':' .$request->chapter_name,
        'content' => $request->chapter_content,
      ]);
      Session::flash('successcreatechapter', 'Thêm chapter thành công.');
      return back();

}

public function danhsachchapter($title){
    $id = auth()->user()->id;
    $data = DB::table('product')
    ->join('chapter','product.title','=','chapter.title')

    ->where('product.users_id',$id)
    ->where('product.title','=',$title)
    ->get();

  
    return view('storyuser.danhsachchapter',compact('title','data'));
}
public function editerchapter($title,$chapter){
    $id = auth()->user()->id;
    $data = DB::table('product')
    ->join('chapter','product.title','=','chapter.title')
    
    ->where('chapter.chapter','=',$chapter)
    ->where('product.users_id',$id)
    ->first();
  
     return view('storyuser.editerchapter',compact('title','chapter','data'));
}

public function postediterchapter(Request $request,$title,$chapter){
    DB::table('chapter')
    ->where('chapter.chapter','=',$chapter)
    ->update([
        'title' => $title,
        'chapter' => 'chương' . $request->chapter_number . ':' .$request->chapter_name,
        'content' => $request->chapter_content,
      ]);
      Session::flash('successediterchapter', 'Sửa chapter thành công.',compact('title','chapter'));
      return redirect('/story_user/danhsachchapter/'.$title);


}
public function views(){
    $auth = auth()->user()->id;
 

    $data = DB::table('product')
        ->join('detail_product', 'product.title', '=', 'detail_product.title')
        ->where('product.users_id', $auth)
        ->orderBy('product.id', 'DESC')
        ->get();

        $totalViews = $data->sum('viewers');
        $totalChapters = 0; // Khởi tạo biến tổng số lượng chapter
        foreach ($data as $item) {
            // Đếm số lượng chapter cho mỗi truyện và cộng vào tổng số lượng chapter
            $totalChapters += DB::table('chapter')
                ->where('title', $item->title) // Lọc theo title của truyện
                ->count();
        }
      
    return view('storyuser.thongkeluotxem', compact('data','totalViews','totalChapters'));
}
public function billingsetup(){
    $user = auth()->user()->id;
    $data = DB::table('informbank_user')->where('users_id',$user)->get();
    return view('storyuser.settingpay',compact('data'));
}
public function deletebillingsetup($id){
    $datadelete = DB::table('informbank_user')->find($id);
    
    if ($datadelete) {
        DB::table('informbank_user')->where('id', $id)->delete();
    }

    return back();
}

public function createpptt(Request $request ){
    $user = auth()->user()->id;
      DB::table('informbank_user')->insert([
        'users_id' => $user,
        'information_bank' => $request['bank'],
        'account_name_bank' => $request['account_owner'],
      ]);
      Session::flash('dknganhangthanhcong', 'bạn đã đăng kí thành công');
      return back();
      
}

public function thuphiuser(Request $request, $title) {
    $dschapter = DB::table('chapter')
        ->where('title', $title)
        ->select('chapter')
        ->get();

    return response()->json($dschapter);
}

public function postthuphiuser(Request $request){
    $title = $request['title'];
    $selectedChapters = $request['selectedChapters'];
    $form_doc = $request['form_doc'];

    // Kiểm tra xem form_doc có giá trị null hay không

    foreach ($selectedChapters as $chapter) {
        DB::table('chapter')
            ->where('title', $title)
            ->where('chapter', $chapter)
            ->update([
                'form_doc' => $form_doc,
            ]);
    }

    Session::flash('capnhatthanhcong', 'bạn đã cập nhật thành công');
      return back();
}

public function traphichapter(Request $request) {
    $nguoidoc = auth()->user();
    $title = $request->input('title');
    $chapter = $request->input('chapter');
    $phidoc = $request->input('phidoc');

    if ($nguoidoc->linh_thach < $phidoc) {
        return redirect()->back()->withErrors(['error' => 'Số linh thạch của bạn không đủ để mua chương này.Xin hãy nạp thêm linh thạch']);
    } 
    
    
    else {
        $linh_thach_nguoidoc = $nguoidoc->linh_thach - $phidoc;

        $tacgia = DB::table('product')
            ->join('users', 'product.users_id', '=', 'users.id')
            ->join('chapter', function ($join) use ($chapter, $title) {
                $join->on('product.title', '=', 'chapter.title')
                    ->where('chapter.chapter', '=', $chapter)
                    ->where('chapter.title', '=', $title);
            })
            ->where('product.title', '=', $title)
            ->first();
         
            $linh_thach_tacgiaafter = $tacgia->linh_thach + ($phidoc*0.7);

            DB::table('users')
           ->where('id',$nguoidoc->id)
            ->update([
                'linh_thach' => $linh_thach_nguoidoc,
            ]);

             DB::table('users')
            ->where('id',$tacgia->users_id)
            ->update([
                'linh_thach' => $linh_thach_tacgiaafter,
            ]);
         
            $dataphidoctruyen = [
                'phidoc' => $phidoc,
                'nguoimua' => $nguoidoc->name,
            ];

            $linhthachadminafterbefore = DB::table('users')->where('id',6)->first();
       
            $linhthachadminafter = $linhthachadminafterbefore->linh_thach + $phidoc*0.3;
    
            DB::table('users')
            ->where('id',6)
            ->update([
                'linh_thach' => $linhthachadminafter,
            ]);

            Mail::send('mailphidoctruyen',compact('dataphidoctruyen'),function ($email) use ($tacgia){
                $email->to($tacgia->email,'ban quản trị');
              });  
// Kiểm tra xem bản ghi đã tồn tại trong cơ sở dữ liệu hay chưa
            $existingRecord = DB::table('purchased_products')
            ->where('title', $title)
            ->where('chapter', $chapter)
            ->where('users_id', $nguoidoc->id)
            ->first();

// Nếu bản ghi chưa tồn tại, thêm mới
        if (!$existingRecord) {
        DB::table('purchased_products')->insert([
            'title' => $title,
            'chapter' => $chapter,
            'users_id' => $nguoidoc->id,
    ]);
}

              
    Session::flash('traphixemtruyensuccess', 'bạn đã mua linh thạch truyện thành công.');
    return back();
        
    }
}




} 