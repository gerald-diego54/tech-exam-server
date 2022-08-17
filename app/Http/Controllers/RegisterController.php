<?php

namespace App\Http\Controllers;

use App\Http\Requests\Register\RegisterRequest;
use App\Models\User;
use App\Http\Resources\UserResource;

class RegisterController extends Controller
{

    public function __invoke(RegisterRequest $request)
    {
        $data = $request->only('name', 'email', 'password');
        $user = User::create($data);
        return response()->json(['message' => 'Registration success', 'status_code' => 200]);
    }
}
