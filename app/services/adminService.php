<?php

namespace App\services;

use Illuminate\Support\Facades\DB;
use App\Jobs\SendMailJob;
class adminService
{
    public function getLinhThachHistory()
    {
        return DB::table('admin_nap_linh_thach')->get();
    }

    public function addLinhThach($request)
    {
        DB::table('admin_nap_linh_thach')->insert([
            'name' => $request['name'],
            'email' => $request['email'],
            'solinhthach_nap' => $request['linh_thach'],
            'thoigian' => now()->timezone('Asia/Ho_Chi_Minh'),
        ]);

        $user = DB::table('users')->where('email', $request['email'])->first();

        if ($user) {
            $newLinhThach = $user->linh_thach + $request['linh_thach'];

            DB::table('users')->where('email', $request['email'])->update([
                'linh_thach' => $newLinhThach,
            ]);

            $this->sendLinhThachEmail($request, now()->timezone('Asia/Ho_Chi_Minh'));

            return true;
        }

        return false;
    }

    private function sendLinhThachEmail($data, $thoigian)
    {
        SendMailJob::dispatch(
            'mailadminnaplinhthach', 
            [
                'request' => $data,
                'thoigian' => $thoigian,
                'solinhthachnap' => $data['linh_thach'],
            ], 
            $data['email']
        );
    }
    
    public function getAdminRevenue(){
        $data = DB::table('users')
        ->where('id',6)->first();
        return $data;
    }

    
}