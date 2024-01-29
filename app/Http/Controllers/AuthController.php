<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(){
        validator(request()->all(),[
            'username' => ['required'],
            'password' => ['required']
        ])->validate();

        $user = User::where('name',request('username'))->orWhere('')->first();
        // return $user;

        if(Hash::check(request('password'), $user->getAuthPassword())){
            return response()->json([
                'status' => 'sucess',
                'token' => $user->createToken(time())->plainTextToken
            ],200);
        }
    }
}
