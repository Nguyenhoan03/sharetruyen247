<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\services\adminService;
use App\services\UserService;
use App\services\storyService;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    protected $adminService;
    protected $userService;
    protected $storyService;

    public function __construct(adminService $adminService, UserService $userService, storyService $storyService)
    {
        $this->adminService = $adminService;
        $this->userService = $userService;
        $this->storyService = $storyService;
    }

    public function dashboardadmin()
    {
        return view('hoanadmin.dashboardadmin');
    }

    public function thong_tin_user()
    {
        $data = $this->userService->getAllUsers(20);
        return view('hoanadmin.ttuser', compact('data'));
    }

    public function lich_su_nap_linh_thach_user()
    {
        $data = $this->adminService->getLinhThachHistory();
        return view('hoanadmin.lichsunaplinhthachuser', compact('data'));
    }

    public function nap_linh_thach_user($id)
    {
        $data = $this->userService->getUserById($id);
        return view('hoanadmin.naplinhthachuser', compact('data'));
    }

    public function post_nap_linh_thach_user(Request $request)
    {
        $result = $this->adminService->addLinhThach($request);
        if ($result) {
            Session::flash('naplinhthachthanhcong', "Bạn đã nạp linh thạch thành công cho {$request->email}");
        }
        return redirect('/pageadmin/thong_tin_user');
    }

    public function duyettruyenuser()
    {
        $userId = $this->userService->getUserId();
        $data = $this->storyService->getStoriesWithChapterCount($userId);
        return view('hoanadmin.duyettruyen', compact('data'));
    }

    public function updateTrangThai(Request $request)
    {
        $this->storyService->updateStoryStatus($request->ids, $request->trang_thai);
        return back();
    }

    public function xemchapter($title)
    {
        $data = $this->storyService->getChaptersByTitle($title);
        return view('hoanadmin.xemchapter', compact('data'));
    }

    public function thongkedoanhthuadmin()
    {
        $data = $this->adminService->getAdminRevenue();
        return view('hoanadmin.thongkedoanhthuadmin', compact('data'));
    }
}