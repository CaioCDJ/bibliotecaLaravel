<?php

namespace App\Http\Controllers;

use App\Http\DTos\HomeDto;
use App\Models\Book;
use Illuminate\Http\Request;

class SiteController extends Controller
{
  public function index()
  {

    $mostAvailable = Book::orderBy('available','desc')->first();

    $langs = Book::where('category','linguagens')->skip(0)->limit(4)->get();
      
    return view('welcome', compact("langs","mostAvailable"));
  }

  public function about()
  {
    return view("pages/about");
  }

  public function login()
  {

    if (auth()->check()) {
      return view('welcome');
    } else {
      return view('pages/login');
    }
  }

  public function signIn()
  {
    if (auth()->check()) {
      return view('welcome');
    } else {
      return view('pages/signIn');
    }
  }
}
