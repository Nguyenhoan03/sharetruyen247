<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\services\storyService;
use App\services\chapterService;
use App\services\billingService;
use App\services\userService;
use Illuminate\Support\Facades\Session;

class StoryUserController extends Controller
{
    protected $storyService;
    protected $chapterService;
    protected $billingService;
    protected $userService;

    public function __construct(
        StoryService $storyService,
        ChapterService $chapterService,
        BillingService $billingService,
        UserService $userService
    ) {
        $this->storyService = $storyService;
        $this->chapterService = $chapterService;
        $this->billingService = $billingService;
        $this->userService = $userService;
    }

    public function index()
    {
        $userId = $this->userService->getUserId();
        $data = $this->storyService->getUserStories($userId);
        $stats = $this->storyService->getStoryStatistics($userId);
        return view('storyuser.homestory', compact('data', 'stats'));
    }

    public function createstory(Request $request)
    {
        return view('storyuser.themstoryuser');
    }

    public function postcreatestory(Request $request)
    {
        $userId = $this->userService->getUserId();
        $result = $this->storyService->createStory($request, $userId);
        if ($result) {
            Session::flash('successcreatestory', 'Thêm truyện thành công.');
        }
        return redirect('/story_user/createstory');
    }

    public function danhsachstory()
    {
        $userId = $this->userService->getUserId();
        $data = $this->storyService->getStoriesWithChapterCount($userId);
        return view('storyuser.danhsachstory', compact('data'));
    }

    public function deletestoryuser($id)
    {
        $result = $this->storyService->deleteStory($id);
        if ($result) {
            Session::flash('deleteStory', 'Xóa truyện thành công!');
        } else {
            Session::flash('deleteStoryError', 'Không tìm thấy truyện để xóa!');
        }
        return redirect('/story_user/danhsachstory');
    }

    public function editerstory($title)
    {
        $data = $this->storyService->getStoryByTitle($title);
        return view('storyuser.editerstory', compact('data'));
    }

    public function putediterstory(Request $request, $title)
    {
        $userId = $this->userService->getUserId();
        $result = $this->storyService->updateStory($request, $title, $userId);
        if ($result) {
            Session::flash('successediterestory', 'Sửa truyện thành công.');
            return redirect('/story_user/danhsachstory');
        }
        Session::flash('failededit', 'Không tìm thấy tiêu đề truyện.');
        return redirect('/story_user');
    }

    public function createchapterstory($title)
    {
        return view('storyuser.createchapteruser', compact('title'));
    }

    public function postediterstory(Request $request, $title)
    {
        $result = $this->chapterService->createChapter($request, $title);
        if ($result > 0) {
            Session::flash('successcreatechapter', 'Thêm chapter thành công.');
        }
        return back();
    }

    public function danhsachchapter($title)
    {
        $userId = $this->userService->getUserId();
        $data = $this->chapterService->getChaptersByTitle($title, $userId);
        return view('storyuser.danhsachchapter', compact('title', 'data'));
    }

    public function editerchapter($title, $chapter)
    {
        $userId = $this->userService->getUserId();
        $data = $this->chapterService->getChapterByTitleAndNumber($title, $chapter, $userId);
        return view('storyuser.editerchapter', compact('title', 'chapter', 'data'));
    }

    public function postediterchapter(Request $request, $title, $chapter)
    {
        $result = $this->chapterService->updateChapter($request, $title, $chapter);
        if ($result > 0) {
            Session::flash('successediterchapter', 'Sửa chapter thành công.');
        }
        return redirect('/story_user/danhsachchapter/'.$title);
    }

    public function views()
    {
        $userId = $this->userService->getUserId();
        $data = $this->storyService->getStoryStatistics($userId);
        return view('storyuser.thongkeluotxem', compact('data'));
    }

    public function billingsetup()
    {
        $userId = $this->userService->getUserId();
        $data = $this->billingService->getBankInformation($userId);
        return view('storyuser.settingpay', compact('data'));
    }

    public function deletebillingsetup($id)
    {
        $this->billingService->deleteBankInformation($id);
        return back();
    }

    public function createpptt(Request $request)
    {
        $userId = $this->userService->getUserId();
        $result = $this->billingService->createBankInformation($request, $userId);
        if ($result) {
            Session::flash('dknganhangthanhcong', 'Bạn đã đăng ký thành công');
        }
        return back();
    }

    public function thuphiuser($title)
    {
        $userId = $this->userService->getUserId();
        $chapters = $this->chapterService->getChaptersByTitle($title,$userId);
        return response()->json($chapters);
    }

    public function postthuphiuser(Request $request)
    {
        $result = $this->chapterService->updateChapterFees($request);
        if ($result > 0) {
            Session::flash('capnhatthanhcong', 'Bạn đã cập nhật thành công');
        } else {
            Session::flash('khongcothaydoi', 'Không có thay đổi nào được thực hiện');
        }
        return back();
    }

    public function traphichapter(Request $request)
    {
        $result = $this->billingService->processChapterPayment($request);
        if ($result['success']) {
            Session::flash('traphixemtruyensuccess', 'Bạn đã mua linh thạch truyện thành công.');
            return back();
        }
        return redirect()->back()->withErrors(['error' => $result['message']]);
    }
    
   
    
}