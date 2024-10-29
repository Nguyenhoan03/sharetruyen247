<?php

namespace App\services;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
// use Illuminate\Support\Facades\Redis;
class adminService
{
    public function getLinhThachHistory()
    {
        return DB::table('admin_nap_linh_thach')->get();
    }

    public function addLinhThach($request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|exists:users,email',
            'linh_thach' => 'required|numeric|min:1',
        ]);

        DB::table('admin_nap_linh_thach')->insert([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'solinhthach_nap' => $validatedData['linh_thach'],
            'thoigian' => now()->timezone('Asia/Ho_Chi_Minh'),
        ]);

        $user = DB::table('users')->where('email', $validatedData['email'])->first();

        if ($user) {
            $newLinhThach = $user->linh_thach + $validatedData['linh_thach'];

            DB::table('users')->where('email', $validatedData['email'])->update([
                'linh_thach' => $newLinhThach,
            ]);

            $this->sendLinhThachEmail($validatedData, now()->timezone('Asia/Ho_Chi_Minh'));

            return true;
        }

        return false;
    }

    private function sendLinhThachEmail($data, $thoigian)
    {
        Mail::send('mailadminnaplinhthach', [
            'request' => $data,
            'thoigian' => $thoigian,
            'solinhthachnap' => $data['linh_thach'],
        ], function ($email) use ($data) {
            $email->to($data['email'], 'ban quản trị');
        });
    }
    public function getAdminRevenue(){
        $data = DB::table('users')
        ->where('id',6)->first();
        return $data;
    }

    
}