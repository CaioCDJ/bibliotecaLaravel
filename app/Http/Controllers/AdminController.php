<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
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
  
  public function users(){
    $users = User::where("role","usuario");

    return view('pages/admin/users', compact('users'));
  }

  public function addBook(){
    return view('pages/admin/addBook');
  }
}
