<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\services\homeService;
use App\services\categoryService;
use App\services\userService;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    protected $homeService;
    protected $categoryService;
    protected $userService;

    public function __construct(UserService $userService, 
                              CategoryService $categoryService, 
                              HomeService $homeService)
    {
        $this->homeService = $homeService;
        $this->categoryService = $categoryService;
        $this->userService = $userService;
    }
    

    public function index()
    {
        $data = $this->homeService->getHomePageData();
        return view('index', $data);
    }

    public function search(Request $request)
    {
        $search = $request->input('key_word');
        $data = $this->homeService->searchStories($search);
        $dmcategory = $this->categoryService->getAllCategories();
        return view('search', compact('data', 'search', 'dmcategory'));
    }

    public function loginUser()
    {
        return view('loginregister.login');
    }

    public function registerUser()
    {
        return view('loginregister.register');
    }

    public function postRegisterUser(Request $request)
    {
        $result = $this->userService->registerUser($request);
        if ($result['success']) {
            Session::flash('success', 'Tạo tài khoản thành công. Bạn có thể đăng nhập bây giờ');
            return redirect('/author/loginuser');
        }
        Session::flash('defeat', $result['message']);
        return redirect('/author/registeruser');
    }

    public function postLoginUser(Request $request)
    {
        $result = $this->userService->loginUser($request);
        if ($result['success']) {
            return redirect($result['redirect']);
        }
        return redirect('/author/loginuser')->with('errorlogin', 'Đăng nhập không thành công! Xin hãy kiểm tra lại tài khoản mật khẩu');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}