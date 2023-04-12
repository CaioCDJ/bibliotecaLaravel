<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{

  public function dashboard()
  {

    $dashboardInfo = array();

    $dashboardInfo[0] = Book::all()->count();
    $dashboardInfo[1] = User::where('isAdmin', false)->get()->count();

    return view("pages/admin/dashboard", compact('dashboardInfo'));
  }

  public function books()
  {

    $books = Book::all();

    return view('pages/admin/books', compact('books'));
  }

  public function users()
  {
    $users = User::where("isAdmin", true)->get();

    return view('pages/admin/users', compact('users'));
  }

  public function admins()
  {

    $admins = User::where('isAdmin', true)->get();

    return view('pages/admin/admins', compact('admins'));
  }

  // -- livros --
  public function addBook()
  {
    return view('pages/admin/addBook');
  }

  public function removeBook($id)
  {

    try {
      $book = Book::find($id);

      if ($book != null) {
        Book::destroy($id);
        return response("livro deletado", 200);
      } else
        return response("Livro nao encontrado", 404);
    } catch (\Throwable $th) {
      return response($th->getMessage(), 500);
    }
  }
}
