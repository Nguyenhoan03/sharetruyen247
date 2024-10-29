<?php

namespace App\services;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserService
{
    public function getUserId()
    {
        return Auth::id();
    }

    public function getAllUsers($perPage = 20)
    {
        return DB::table('users')->orderBy('id', 'DESC')->paginate($perPage);
    }

    public function getUserById($id)
    {
        return DB::table('users')->where('id', $id)->first();
    }

    public function registerUser($request)
    {
        if ($request->password !== $request->confirmpassword) {
            return ['success' => false, 'message' => 'Đăng kí thất bại! Mật khẩu và xác nhận mật khẩu không khớp.'];
        }

        $existingUser = DB::table('users')->where('email', $request->email)->first();

        if ($existingUser) {
            return ['success' => false, 'message' => 'Đăng kí thất bại! Email đã tồn tại.'];
        }

        $hashedPassword = Hash::make($request->password);

        $userId = DB::table('users')->insertGetId([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => $hashedPassword,
        ]);

        DB::table('model_has_roles')->insert([
            'role_id' => 1,
            'model_type' => 'App\Models\User',
            'model_id' => $userId,
        ]);

        return ['success' => true];
    }

    public function loginUser($request)
    {
        $credentials = $request->only('email', 'password');
    
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            
            $isAdmin = DB::table('model_has_roles')
                ->where('model_id', $user->id)
                ->where('role_id', 2)
                ->exists();
                
            if ($isAdmin) {
                return ['success' => true, 'redirect' => '/pageadmin'];
            } else {
                return ['success' => true, 'redirect' => '/'];
            }
        }
    
        return ['success' => false];
    }
}