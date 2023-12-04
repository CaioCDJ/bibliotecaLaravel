<?php

namespace App\Actions\User;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginUser
{

    public function handle(LoginRequest $loginRequest): User
    {
        $user = User::where([
            "email" => $loginRequest->email,
            "active" => true
        ])->first();

        // works
        $credentials = array('email' => $loginRequest->email, 'password' => $loginRequest->password);

        if ($user->name == null) {
            throw new \Exception(message: "Usuario não encontrado");
        }

        return Auth::attempt($credentials)
            ? $user
            : throw new \Exception(message: "Email ou senha invalidos");
    }
}
