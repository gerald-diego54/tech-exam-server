<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function __invoke(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            /** @var \App\Models\MyUserModel $user **/
            $token = $user->createToken('token-name')->plainTextToken;
            return (new UserResource($user))->additional(compact('token'));
        }

        return response()->json([
            'message' => 'Email/Username or Password mismatch',
        ], Response::HTTP_UNAUTHORIZED);
    }
}
