<?php

namespace App\services;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Jobs\SendMailJob;
class chapterService
{
    public function getChapterData($title, $chapter)
    {
        $data = DB::table('product')
            ->join('chapter', 'product.title', '=', 'chapter.title')
            ->where('product.title', $title)
            ->where('chapter.chapter', $chapter)
            ->first();

        $nextChapter = $this->getNextChapter($title, $data->id);
        $previousChapter = $this->getPreviousChapter($title, $data->id);

        return compact('data', 'nextChapter', 'previousChapter');
    }

    private function getNextChapter($title, $currentId)
    {
        return DB::table('chapter')
            ->where('title', $title)
            ->where('id', '>', $currentId)
            ->orderBy('id', 'ASC')
            ->first();
    }

    private function getPreviousChapter($title, $currentId)
    {
        return DB::table('chapter')
            ->where('title', $title)
            ->where('id', '<', $currentId)
            ->orderBy('id', 'DESC')
            ->first();
    }

    public function checkPurchasedChapter($title, $chapter)
    {
        if (auth()->check()) {
            $userId = auth()->id();
            return DB::table('purchased_products')
                ->where('title', $title)
                ->where('chapter', $chapter)
                ->where('users_id', $userId)
                ->first();
        }
        return null;
    }

  
    public function createGrantRecord(Request $request, $user_grant)
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
    
    public function updateUserLinhThach($user_grant, $to_users_id, $linhthach_grant)
    {
     
        $grantingUser = DB::table('users')->where('id', $user_grant)->first();
        $linhthachAfter = $grantingUser->linh_thach - $linhthach_grant;
        
        DB::table('users')->where('id', $user_grant)->update([
            'linh_thach' => $linhthachAfter,
        ]);
    
      
        $receivingUser = DB::table('users')->where('id', $to_users_id)->first();
        $linhthachForReceiver = $receivingUser->linh_thach + ($linhthach_grant * 0.7);
        
        DB::table('users')->where('id', $to_users_id)->update([
            'linh_thach' => $linhthachForReceiver,
        ]);
    
       
        $adminUserId = 6;
        $adminUser = DB::table('users')->where('id', $adminUserId)->first();
        $linhthachForAdmin = $adminUser->linh_thach + ($linhthach_grant * 0.3);
        
        DB::table('users')->where('id', $adminUserId)->update([
            'linh_thach' => $linhthachForAdmin,
        ]);
    }
    
    public function sendEmails(Request $request, $user_grant)
    {
        $datanguoigui = [
            'title' => $request->title,
            'chapter' => $request->chapter,
            'linhthach_grant' => $request['linhthach_grant'],
            'message' => $request->input('message'),
            'users_id' => $user_grant,
            'to_users_id' => $request->to_users_id,
        ];
    
      
        // Mail::send('mail', compact('datanguoigui'), function ($email) {
        //     $email->to(auth()->user()->email, 'ban quản trị');
        // });
        
        // Mail::send('maildocgia', compact('datanguoigui'), function ($email) use ($request) {
        //         $email->to($request->to_users_id, 'ban quản trị');
        //     });


            SendMailJob::dispatch(new SendMailJob('mail', compact('datanguoigui'), auth()->user()->email));
            SendMailJob::dispatch(new SendMailJob('maildocgia', compact('datanguoigui'), $request->to_users_id));
    }

    
public function createChapter($request,$title){
    return DB::table('chapter')->insert([
     'title' => $title,
     'chapter' => 'chương' . $request->chapter_number . ':' .$request->chapter_name,
     'content' => $request->chapter_content,
   ]);
 }
 public function getChaptersByTitle ($title,$userId){
    
    return DB::table('product')
    ->join('chapter','product.title','=','chapter.title')

    ->where('product.users_id',$userId)
    ->where('product.title','=',$title)
    ->get();
}
public function getChapterByTitleAndNumber($title,$chapter,$userId){
   return DB::table('product')
    ->join('chapter','product.title','=','chapter.title')
    
    ->where('chapter.chapter','=',$chapter)
    ->where('product.users_id',$userId)
    ->first();
}
public function updateChapterFees($request) {
    $title = $request['title'];
    $selectedChapters = $request['selectedChapters'];
    $form_doc = $request['form_doc'];
    
    $affectedRows = 0;

    foreach ($selectedChapters as $chapter) {
        $updated = DB::table('chapter')
            ->where('title', $title)
            ->where('chapter', $chapter)
            ->update([
                'form_doc' => $form_doc,
            ]);
        
        $affectedRows += $updated; 
    }

    return $affectedRows;
}
public function updateChapter($request, $title, $chapter){
    return DB::table('chapter')
    ->where('chapter.chapter','=',$chapter)
    ->update([
        'title' => $title,
        'chapter' => 'chương' . $request->chapter_number . ':' .$request->chapter_name,
        'content' => $request->chapter_content,
      ]);
}
}