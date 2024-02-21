<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;
use App\Models\chapter;
use App\Models\category;
use App\Models\detail_product;
use DB;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Auth;
use Illuminate\Support\Facades\Hash;
use App\Repositories\basecategoryInterface;

class homecontroller extends Controller
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
    public function index()
    {
        // $data = DB::table('product')->select('title','image')->orderBy('id','DESC')->get();

         $truyenhot = DB::table('detail_product')->join('product','detail_product.title','=','product.title')->select('detail_product.viewers','detail_product.trangthai','product.title','product.image')
         ->where(function($query) {
            $query->where('product.trang_thai', '=', 'đã duyệt')
                ->orWhereNull('product.trang_thai');
        })
         ->orderBy('detail_product.viewers','DESC')->take(16)->get();
        
      

    $truyenmoi = DB::table('product')
    ->join('detail_product', 'product.title', '=', 'detail_product.title')
    ->join('chapter', function ($join) {
        $join->on('product.title', '=', 'chapter.title')
            ->whereRaw('chapter.id = (select max(id) from chapter where chapter.title = product.title)');
    })
    ->where(function($query) {
        $query->where('product.trang_thai', '=', 'đã duyệt')
            ->orWhereNull('product.trang_thai');
    })
    ->select('product.title', 'detail_product.theloai', 'detail_product.trangthai', 'chapter.chapter') // Add the chapter_number or any other column you need
    ->orderBy('product.id', 'DESC')
    ->paginate(30);
    


    

         
    $truyenfull = DB::table('detail_product')
    ->join('product', 'detail_product.title', '=', 'product.title')
    ->select(
        'detail_product.trangthai',
        'product.title',
        'product.image',
        DB::raw('(SELECT COUNT(*) FROM chapter WHERE chapter.title = detail_product.title) as total_chapters')
    )
    ->where('detail_product.trangthai', '=', 'Hoàn Thành')
    ->where(function($query) {
        $query->where('product.trang_thai', '=', 'đã duyệt')
            ->orWhereNull('product.trang_thai');
    })
    ->orderBy('product.id', 'DESC')
    ->take(16)
    ->get();

    
    $toptruyen = DB::table('detail_product')
    ->join('chapter', function ($join) {
        $join->on('detail_product.title', '=', 'chapter.title');
    })
    ->join('product', 'detail_product.title', '=', 'product.title')
    ->where(function($query) {
        $query->where('product.trang_thai', '=', 'đã duyệt')
            ->orWhereNull('product.trang_thai');
    })
    ->select('detail_product.title', 'detail_product.viewers', DB::raw('SUM(detail_product.viewers) as total_viewers'), DB::raw('COUNT(chapter.id) as total_chapters'))
    ->groupBy('detail_product.title', 'detail_product.viewers') // Bao gồm 'detail_product.viewers' trong GROUP BY
    ->orderBy('total_chapters', 'asc')
    ->take(10)
    ->get();



   

   $dmcategory = category::all();
        
        return view('index', compact('truyenhot','truyenmoi','truyenfull','dmcategory','toptruyen'));
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
    public function search(Request $request){
        $search = $request->input('key_word');
    
        $data = DB::table('product')->join('detail_product','product.title','=','detail_product.title')
        ->join('chapter', function ($join) {
            $join->on('product.title', '=', 'chapter.title')
                ->whereRaw('chapter.id = (select max(id) from chapter where chapter.title = product.title)');
        })
        ->select('product.title','product.image','detail_product.theloai','chapter.chapter')->where('product.title','like','%' . $search .'%')->get();
 
       
        $dmcategory = $this->category->allcategory();
        return view('search', compact('data','search','dmcategory'));
    }
    
    public function loginuser(){
        return view ('loginregister.login');
    }

    public function registeruser(){
        return view ('loginregister.register');
    }

    public function postregisteruser(Request $request){
        // Kiểm tra xem password và confirmpassword khớp nhau hay không
        if($request->password !== $request->confirmpassword) {
            // Nếu không khớp, hiển thị thông báo và chuyển hướng lại trang đăng ký
            Session::flash('defeat', 'Đăng kí thất bại! Mật khẩu và xác nhận mật khẩu không khớp.');
            return redirect('/author/registeruser');
        }
    
        // Kiểm tra xem email đã tồn tại hay chưa
        $existingUser = DB::table('users')->where('email', $request->email)->first();
    
        if($existingUser) {
            // Nếu email đã tồn tại, hiển thị thông báo và chuyển hướng lại trang đăng ký
            Session::flash('defeat', 'Đăng kí thất bại! Email đã tồn tại.');
            return redirect('/author/registeruser');
        }
        $hashedPassword = bcrypt($request->password);

        // Nếu mọi kiểm tra đều ổn, tiến hành chèn dữ liệu vào bảng users
        DB::table('users')->insert([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => $hashedPassword,
        ]);
    
        // Hiển thị thông báo thành công và chuyển hướng đến trang đăng nhập
        Session::flash('success', 'Tạo tài khoản thành công. Bạn có thể đăng nhập bây giờ');
        return redirect('/author/loginuser');
    }


    public function postloginuser(Request $request)
    {
        $credentials = $request->only('email', 'password');
       
        // Thực hiện kiểm tra đăng nhập
        if (Auth::attempt($credentials)) {
            // Lấy thông tin người dùng đã đăng nhập
            $user = Auth::user();
            
            // Kiểm tra xem người dùng có vai trò 'admin' không
            if ($user->hasRole('admin')) {
                return redirect('/pageadmin');
            } else {
                return redirect('/'); // Hoặc chuyển hướng đến trang mong muốn khác cho người dùng không phải admin
            }
        } else {
            // Nếu đăng nhập không thành công, hiển thị thông báo lỗi và chuyển hướng lại trang đăng nhập
            return redirect('/author/loginuser')->with('errorlogin', 'Đăng nhập không thành công! Xin hãy kiểm tra lại tài khoản mật khẩu');
        }
    }

    public function logout()
{
    Auth::logout();

    return redirect('/');
}
    
    
}
