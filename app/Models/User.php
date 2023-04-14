<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticable;

class User extends  Authenticable
{
  // extends default Model
  use HasFactory, HasUuids;

  protected $fillable = [
    'name', 'email', 'password', 'phone', 'address','role'
  ];

  public function borrows(){
    return $this->hasMany(Borrow::class);
  }
}
