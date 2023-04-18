<?php

namespace App\Http\DTos;

use App\Models\Book;

class HomeDto{

  public Book $books = array();
  
  public Book $available; // livre com maior qt

}
