<?php

namespace App\Actions\User;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Symfony\Component\Uid\Uuid;

class RegisterUser
{
    public function handle(RegisterRequest $registerUser): string
    {
        $user = new User();
        $user->fill($registerUser->validated());

        $account = User::where('email', $user->email)->first();

        // dd($account, ($account != null), (!isset($account)));

        if ($account  != null) {
            throw new \Exception(message: "Email ja cadastrado");
        }

        if ($user->password != $registerUser->confirmPassword) {
            throw new \Exception(message: "Senhas Incompativeis");
        }

        $user->password = bcrypt($user->password);
        $user->isAdmin = false;
        $user->active = true;

        $user->saveOrFail();

        return $user->name;
    }
}
