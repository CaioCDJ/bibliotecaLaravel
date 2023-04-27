<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrow;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{

  public function dashboard()
  {
    $dashboardInfoRaw = DB::select('
      SELECT 
	      (SELECT COUNT(category) FROM books WHERE category ="linguagens") AS linguagens ,
	      (SELECT COUNT(category) FROM books WHERE category ="arquitetura") AS arquitetura, 
	      (SELECT COUNT(category) FROM books WHERE category ="banco de dados") AS banco ,
	      (SELECT COUNT(category) FROM books WHERE category ="seguranca") AS seguranca ,
	      (SELECT COUNT(category) FROM books WHERE category ="redes") AS redes 		,
        (SELECT COUNT(category) FROM books WHERE category ="derivados") AS derivados,
        (SELECT COUNT(id) FROM books) AS qtBooks, 
        (SELECT COUNT(id) FROM users WHERE isAdmin = 0) AS qtUsers,
		    (SELECT COUNT(id) FROM borrows) AS qtBorrows,
		    (SELECT COUNT(id) FROM borrows WHERE returned = 0 AND returnDT < " '.date('Y-m-d', strtotime(Date::now())).'"  ) AS qtNotReturned  
      	  FROM books LIMIT 1;
      ');

    $dashboardInfo = $dashboardInfoRaw[0];
    return view("pages/admin/dashboard", compact("dashboardInfo"));
  }

  public function books()
  {
    $books = Book::paginate(10);

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

  public function returnBook($id)
  {

    $borrow = Borrow::find($id);
    $book = Book::find($borrow->bookId);

    $book->available++;

    Borrow::where('id', $id)->update(['returned' => true]);

    Book::where('id', $borrow->bookId)->update(['available' => $book->available]);

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
