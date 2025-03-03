<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Repositories\basecategoryInterface;
use App\services\UserService;
use App\services\chapterService;
use Illuminate\Support\Facades\DB as DB;
use Illuminate\Support\Facades\Auth;

use Mail;

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
    public function index($slug, $chapter_slug)
    {
        // Find story by slug
        $story = DB::table('detail_product')
            ->where('slug', $slug)
            ->first();
        
        if (!$story) {
            abort(404);
        }
        
        // Find chapter using both story slug and chapter slug
        $data = DB::table('product')
            ->join('chapter', 'product.slug', '=', 'chapter.title_slug')
            ->where('chapter.title_slug', $slug)
            ->where('chapter.chapter_slug', $chapter_slug)
            ->first();
        
        if (!$data) {
            abort(404);
        }
    
        // Get next chapter
        $nextchapter = DB::table('chapter')
            ->where('title_slug', $slug)
            ->where('chapter.id', '>', $data->id)
            ->orderBy('chapter.id', 'ASC')
            ->select('chapter.*', 'chapter_slug') 
            ->first();
    
        // Get previous chapter
        $previouschapter = DB::table('chapter')
            ->where('title_slug', $slug)
            ->where('chapter.id', '<', $data->id)
            ->orderBy('chapter.id', 'DESC')
            ->select('chapter.*', 'chapter_slug') 
            ->first();
    
        $dmcategory = $this->category->allcategory();
    
        
        $boolpurchased = null;
        if (Auth::check()) {
            $users_id = $this->userService->getUserId();
            $boolpurchased = DB::table('purchased_products')
                ->where('title', $story->title)
                ->where('chapter', $data->chapter)
                ->where('users_id', $users_id)
                ->first();
        }
    
        return view('chapter', compact(
            'data', 
            'nextchapter', 
            'previouschapter', 
            'dmcategory', 
            'story',
            'boolpurchased'
        ));
    }
    public function grant_linhthach(Request $request)
    {
        $user_grant = $this->userService->getUserId();  
        $this->chapterService->createGrantRecord($request, $user_grant); 
        $this->chapterService->updateUserLinhThach($user_grant, $request->to_users_id, $request['linhthach_grant']); 
        $this->chapterService->sendEmails($request, $user_grant);
        return response()->json(['message' => 'Linh thach granted successfully.'], 200);
    }
}