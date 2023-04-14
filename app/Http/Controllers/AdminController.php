<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrow;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{

  public function dashboard()
  {

    $dashboardInfo = array();

    $dashboardInfo[0] = Book::all()->count();
    $dashboardInfo[1] = User::where('isAdmin', false)->get()->count();
    $dashboardInfo[2] = Borrow::all()->count();
    $dashboardInfo[3] = Borrow::where("returned",false)->get()->count();
  
    return view("pages/admin/dashboard", compact('dashboardInfo'));
  }

  public function books()
  {
    $books = Book::all();

    return view('pages/admin/books', compact('books'));
  }
  
  public function borrows(Request $request)
  {
    $borrows = DB::table("borrows")
      ->join('books', 'books.id', '=', 'borrows.bookId')
      ->join("users", "users.id", "=", "borrows.userId")
      ->select("borrows.id", "users.name", "books.title", "borrows.created_at", "borrows.returnDt")
      ->where("borrows.returned", "=", "false")
      ->get();

    return view('pages/admin/borrows', compact('borrows'));
  }

  public function returnBook($id){

    $borrow = Borrow::find($id);
    $book = Book::find($borrow->bookId);

    $book->available++;

    Borrow::where('id',$id)->update(['returned'=>true]);

    Book::where('id',$borrow->bookId)->update(['available'=>$book->available]);

  
    //dd($book, $borrow);

    return redirect()->route('admin.borrows.index');
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
