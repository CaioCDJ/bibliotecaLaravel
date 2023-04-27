<?php

namespace App\Services;

use App\Models\User;

class UserServices{

  public function getById($id): User{
    return User::findOrFail($id);
  }
  
  public function remove(){


  }

}
