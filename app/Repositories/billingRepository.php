<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;

class billingRepository
{
   public function getBankInformation($userId)
   {
      return DB::table('informbank_user')->where('users_id', $userId)->get();
   }
   public function deleteBankInformation($userId)
   {
      return  DB::table('informbank_user')->find($userId);
   }
   public function createBankInformation($request, $userId)
   {
      return DB::table('informbank_user')->insert([
         'users_id' => $userId,
         'information_bank' => $request['bank'],
         'account_name_bank' => $request['account_owner'],
      ]);
   }
   public function processChapterPayment($request)
   {
      $nguoidoc = auth()->user();
      $title = $request->input('title');
      $chapter = $request->input('chapter');
      $phidoc = $request->input('phidoc');

      if ($nguoidoc->linh_thach < $phidoc) {
         return redirect()->back()->withErrors(['error' => 'Số linh thạch của bạn không đủ để mua chương này.Xin hãy nạp thêm linh thạch']);
      } else {
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

         $linh_thach_tacgiaafter = $tacgia->linh_thach + ($phidoc * 0.7);

         DB::table('users')
            ->where('id', $nguoidoc->id)
            ->update([
               'linh_thach' => $linh_thach_nguoidoc,
            ]);

         DB::table('users')
            ->where('id', $tacgia->users_id)
            ->update([
               'linh_thach' => $linh_thach_tacgiaafter,
            ]);

         $dataphidoctruyen = [
            'phidoc' => $phidoc,
            'nguoimua' => $nguoidoc->name,
         ];

         $linhthachadminafterbefore = DB::table('users')->where('id', 6)->first();

         $linhthachadminafter = $linhthachadminafterbefore->linh_thach + $phidoc * 0.3;

         DB::table('users')
            ->where('id', 6)
            ->update([
               'linh_thach' => $linhthachadminafter,
            ]);

         Mail::send('mailphidoctruyen', compact('dataphidoctruyen'), function ($email) use ($tacgia) {
            $email->to($tacgia->email, 'ban quản trị');
         });
         $existingRecord = DB::table('purchased_products')
            ->where('title', $title)
            ->where('chapter', $chapter)
            ->where('users_id', $nguoidoc->id)
            ->first();

         if (!$existingRecord) {
            DB::table('purchased_products')->insert([
               'title' => $title,
               'chapter' => $chapter,
               'users_id' => $nguoidoc->id,
            ]);
         }
      }
   }
}
