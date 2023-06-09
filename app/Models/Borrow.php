<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Borrow extends Model
{
  use HasFactory, HasUuids;


  protected $fillable = [
    "bookId", "userID"
  ];

  public function book()
  {
    return $this->belongsTo(Book::class, "bookId");
  }
}
