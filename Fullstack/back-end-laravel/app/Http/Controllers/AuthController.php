<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Exceptions\Exception;
use Illuminate\Support\facades\Auth;

class AuthController extends Controller
{
    public function auth(Request $request)
    {
        try {
            if (Auth::attempt(['email' => $request['email'], 'password' => $request['password']])) {
                $user = User::where("email", $request["email"])->firstOrFail();
                $user = User::with('roles.permissions')->find($user->id); 
                $token = $user->createToken("auth_token")->plainTextToken;
                return response()->json(["message" => "YES",'user' => $user, "token" => $token, "tokenType" => "Bearer",]);       
            }
            else{
                return response()->json([ 'error' => '0', 'message' => "Username or password is incorrect please try again"]);
            }
        } catch (Exception $e) {
            return response()->json(["message" => $e]);
        }
    }
}