<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use JWTAuth;
use Auth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Validator, DB, Hash, Mail;
use Illuminate\Support\Facades\Password;
use Illuminate\Mail\Message;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $credentials = $request->only('name', 'email', 'password');
        
        $rules = [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required',
        ];
        $validator = Validator::make($credentials, $rules);
        if($validator->fails()) {
            return response()->json(['success'=> false, 'error'=> $validator->messages()]);
        }
        $name = $request->name;
        $email = $request->email;
        $password = $request->password;
        
        //return response()->json(Hash::make($password));
        $user = User::create(['name' => $name, 'email' => $email, 'password' => Hash::make($password)]);
        return User::all();
        die();

        //return response()->json(['success'=> true, 'message'=> 'Thanks for signing up.']);
    }

    public function login(Request $request)
    {   

        $credentials = $request->only('email', 'password');
        //$credentials['password'] = Hash::make($credentials['password']);
        $rules = [
            'email' => 'required|email',
            'password' => 'required',
        ];
        $validator = Validator::make($credentials, $rules);
        if($validator->fails()) {
            return response()->json(['success'=> false, 'error'=> $validator->messages()]);
        }
        
        try {
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['success' => false, 'error' => 'We cant find an account with this credentials. Please make sure you entered the right information and you have verified your email address.'], 401);
            }
        } catch (JWTException $e) {
            return response()->json(['success' => false, 'error' => 'Failed to login, please try again.'], 500);
        }

        $user = Auth::user();
        // $user = JWTAuth::parseToken()->authenticate();

        return response()->json(['success' => true, 'data'=> [ 'token' => $token, 'user' => $user ]]);
    }

    public function logout(Request $request) {
        
        try {
            JWTAuth::invalidate();
            return response()->json(['success' => true, 'message'=> "You have successfully logged out."]);
        } catch (JWTException $e) {
            return response()->json(['success' => false, 'error' => 'Failed to logout, please try again.'], 500);
        }
    }
}
