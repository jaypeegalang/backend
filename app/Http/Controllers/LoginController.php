<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class LoginController extends Controller
{
    public function login(Request $request){

        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
            
        ]);

        if($validator->fails()){
            return response()->json(['message' => 'Not Valid']);
        }
        
        if(!auth()->attempt($validator)){
            return response()->json(['message' => 'Invalid Credentials']);
        }

        $users = auth()->user();
        
        return response()->json($users);

       
    }
}
