<?php

namespace App\Actions\User;

use App\Models\User;
use Illuminate\Http\Request;

class UpdateUser
{

  public function handle(Request $request, $id): void
  {
    $user = User::findOrFail($id);

    $name = (isset($request->name ) && !empty($request->name) && $request->name != $user->name)
      ? $request->name
      : $user->name;

    $address = (isset($request->address ) && !empty($request->address) && $request->address != $user->address)
      ? $request->address
      : $user->address;

    $phone = (isset($request->phone ) && !empty($request->phone) && $request->phone != $user->phone)
      ? $request->phone
      : $user->phone;

    User::where(['id' => auth()->user()->id])->update([
      'name' => $name,
      "address" => $address,
      "phone" => $phone
    ]);

  }
}
