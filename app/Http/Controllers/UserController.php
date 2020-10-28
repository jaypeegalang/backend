<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // 
    public function register(Request $request){

        $this->validate($request, [
            'name' => 'required|string|max:255|min:3',
            'email' => 'required|email|unique:users',
            'mobile_number' => 'required|integer|max:10|min:10',
            'password' => 'required|min:8|confirmed',
            
        ]);

        $user = User::firstOrNew(['id' => $request->input("id")]);
        $request = $request->all();
        $user = extract_field_to_save($user,$request);

        $user->save();

        return $user;
    }


  
    
}
