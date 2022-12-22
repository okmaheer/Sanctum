<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use App\Traits\HttpResponses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    use HttpResponses;

     public function  login(){
        return 0;
     }

     public function register(StoreUserRequest $request){
      $request->validate($request->all());
       
      $user = User::create([
         'name' => $request->name,
         'email' => $request->email,
         'password' => Hash::make($request->password),
     ]);

     return $this->success([
         'user' => $user,
         'token' => $user->createToken('API Token')->plainTextToken
     ]);  
     }

}