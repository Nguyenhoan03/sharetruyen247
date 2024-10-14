<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\chapter;
use App\Repositories\basecategoryInterface;
use App\Repositories\UserRepository;
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
    protected $category,$UserRepository;
    public function __construct(basecategoryInterface $basecategory,UserRepository $UserRepository){
        $this->category = $basecategory;
        $this->UserRepository = $UserRepository;
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
            $users_id =  $this->UserRepository->getUserId();
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
        // Validate request
        // $request->validate([
        //     'title' => 'required|string|max:255',
        //     'chapter' => 'required|string|max:255',
        //     'linhthach_grant' => 'required|numeric|min:0',
        //     'message' => 'nullable|string',
        //     'to_users_id' => 'required|exists:users,id',
        // ]);
    
        $user_grant =  $this->UserRepository->getUserId();
        
        // Insert grant record
        $this->createGrantRecord($request, $user_grant);
    
        // Update linh thach for the granting user and recipient
        $this->updateUserLinhThach($user_grant, $request->to_users_id, $request['linhthach_grant']);
        
        // Send emails
        $this->sendEmails($request, $user_grant);
    
        return response()->json(['message' => 'Linh thach granted successfully.'], 200);
    }
    
    private function createGrantRecord(Request $request, $user_grant)
    {
        DB::table('grant_linhthach')->insert([
            'title' => $request->title,
            'chapter' => $request->chapter,
            'linhthach_grant' => $request['linhthach_grant'],
            'message' => $request->input('message'),
            'users_id' => $user_grant,
            'to_users_id' => $request->to_users_id,
        ]);
    }
    
    private function updateUserLinhThach($user_grant, $to_users_id, $linhthach_grant)
    {
        // Update granting user linh thach
        $grantingUser = DB::table('users')->where('id', $user_grant)->first();
        $linhthachAfter = $grantingUser->linh_thach - $linhthach_grant;
        
        DB::table('users')->where('id', $user_grant)->update([
            'linh_thach' => $linhthachAfter,
        ]);
    
        // Update receiving user linh thach
        $receivingUser = DB::table('users')->where('id', $to_users_id)->first();
        $linhthachForReceiver = $receivingUser->linh_thach + ($linhthach_grant * 0.7);
        
        DB::table('users')->where('id', $to_users_id)->update([
            'linh_thach' => $linhthachForReceiver,
        ]);
    
        // Update admin linh thach
        $adminUserId = 6; // Assuming admin ID is 6
        $adminUser = DB::table('users')->where('id', $adminUserId)->first();
        $linhthachForAdmin = $adminUser->linh_thach + ($linhthach_grant * 0.3);
        
        DB::table('users')->where('id', $adminUserId)->update([
            'linh_thach' => $linhthachForAdmin,
        ]);
    }
    
    private function sendEmails(Request $request, $user_grant)
    {
        $datanguoigui = [
            'title' => $request->title,
            'chapter' => $request->chapter,
            'linhthach_grant' => $request['linhthach_grant'],
            'message' => $request->input('message'),
            'users_id' => $user_grant,
            'to_users_id' => $request->to_users_id,
        ];
    
        // Send email to the granting user
        Mail::send('mail', compact('datanguoigui'), function ($email) {
            $email->to(auth()->user()->email, 'ban quản trị');
        });
    
        // Send email to the recipient
        Mail::send('maildocgia', compact('datanguoigui'), function ($email) use ($request) {
            $email->to($request->to_users_id, 'ban quản trị');
        });
    }
    
}
