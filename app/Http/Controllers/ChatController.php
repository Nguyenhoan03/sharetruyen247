<?php

// app/Http/Controllers/ChatController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Pusher\Pusher;
use Illuminate\Support\Facades\DB as DB;;

class ChatController extends Controller
{
    public function index()
    {
        $dmcategory = DB::table('category')->get();
        $message = DB::table('messages')->get();
        
        return view('roomchat',['dmcategory'=>$dmcategory,'message'=>$message]);
    }

    public function send(Request $request)
    {
        $username = $request->username;
        $message = $request->input('message');
        $data = [
            'message'=>$message,
            'username' => $username
        ];

        DB::table('messages')->insert($data);
        $options = [
            'cluster' => env('PUSHER_APP_CLUSTER'),
            'encrypted' => true
        ];

        $pusher = new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'),
            $options
        );
       
      
        $pusher->trigger('my-channel', 'my-event', $data);

        return response()->json(['status' => 'Message sent']);
    }
}
