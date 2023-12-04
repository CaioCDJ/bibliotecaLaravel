<?php

namespace App\Actions\User;

use App\Http\Requests\ChangePasswordRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ChangePassword
{

  public function handle(ChangePasswordRequest $changePasswordRequest, User $user): void
  {

    if($changePasswordRequest->password != $changePasswordRequest->newPassword){
      throw new \Exception(message:"As senhas diferem");
    }

    if (!Hash::check($changePasswordRequest->password, $user->password)) {
      throw new \Exception(message:"Senha digitada não compativel com a atual");
    }

    User::where("id",$user->id)->update(["password"=> bcrypt($changePasswordRequest->newPassword)]);

  }
}
