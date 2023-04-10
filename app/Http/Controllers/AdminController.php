<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class AdminController extends Controller
{

  public function dashboard(){
    return view("pages/admin/dashboard");
  }

  public function books(){

    $books = Book::all();

    return view('pages/admin/books', compact('books'));
  }

  public function addBook(){
    return view('pages/admin/addBook');
  }
}
