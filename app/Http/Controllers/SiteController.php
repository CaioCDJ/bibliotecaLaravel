<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
  public function home()
  {
    return view('welcome');
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
