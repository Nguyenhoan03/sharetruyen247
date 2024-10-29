<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Repositories\basecategoryInterface;
use App\services\userService;
use App\services\chapterService;
use Illuminate\Support\Facades\DB as DB;;

use Mail;
use Auth;

class chaptercontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $category, $userService, $chapterService;

    public function __construct(
        BaseCategoryInterface $baseCategory,
        UserService $userService,
        ChapterService $chapterService
    ) {
        $this->category = $baseCategory;
        $this->userService = $userService;
        $this->chapterService = $chapterService;
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
            $users_id =  $this->userService->getUserId();
            $boolpurchased = DB::table('purchased_products')
                ->where('title', $title)
                ->where('chapter', $chapter)
                ->where('users_id', $users_id)
                ->first();
        }


        return view('chapter', compact('data', 'nextchapter', 'previouschapter', 'dmcategory', 'boolpurchased'));
    }

    public function grant_linhthach(Request $request)
    {
        $user_grant = $this->userService->getUserId();  // Changed from UserRepository

        // Insert grant record
        $this->chapterService->createGrantRecord($request, $user_grant);  // Changed from chapterRepository

        // Update linh thach for the granting user and recipient
        $this->chapterService->updateUserLinhThach($user_grant, $request->to_users_id, $request['linhthach_grant']);  // Changed from chapterRepository

        // Send emails
        $this->chapterService->sendEmails($request, $user_grant);  // Changed from chapterRepository

        return response()->json(['message' => 'Linh thach granted successfully.'], 200);
    }
}
