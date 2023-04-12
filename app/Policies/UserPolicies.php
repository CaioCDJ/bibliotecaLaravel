<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;

class UserPolicies
{
  /**
   * Create a new policy instance.
   */
  public function __construct()
  {
    //
  }

  public function isAdmin(User $user){
    return $user->role
      ? Response::allow()
      : Response::denyWithStatus(403);
  }

}
