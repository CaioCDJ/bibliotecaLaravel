<?php

namespace App\Actions\Borrow;

class NewBorrow
{

  public function handle($book_id)
  {

    if (!uuid_is_valid($book_id)){
      throw "deu ruim";
    }

  }
}
