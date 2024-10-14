<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use SebastianBergmann\Type\VoidType;

class chapterRepository
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

    public function grantLinhThach($request, $userId)
    {
        DB::beginTransaction();

        try {
            $this->createGrantRecord($request, $userId);
            $this->updateUserLinhThach($userId, $request->to_users_id, $request['linhthach_grant']);
            $this->sendEmails($request, $userId);

            DB::commit();
            return ['message' => 'Linh thach granted successfully.', 'status' => 200];
        } catch (\Exception $e) {
            DB::rollback();
            return ['message' => 'An error occurred while granting linh thach.', 'status' => 500];
        }
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