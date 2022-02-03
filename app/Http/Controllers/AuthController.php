<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller{
    //
    function login(LoginRequest $request){
        try{
            $user = User::where('email', $request->email)->firstOrFail();
            if(!Hash::check($request->password, $user->password)){
                throw new Exception('Password invalid');
            }
            $token = $user->createToken('auth_token')->plainTextToken;
            return response()->json([
                'success' => true,
                'user' => $user,
                'role' => $user->getRoleNames()[0],
                'token' => $token
            ], 200);
        }catch(Exception $e){
            return response()->json([
                'success' => false,
                'error' => $e->getMessage()
            ], 200);
        }
    }

    function logout(Request $request){
        $request->user()->currentAccessToken()->delete();
    }
}
