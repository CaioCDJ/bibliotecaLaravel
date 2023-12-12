<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrow;
use App\Models\User;
use DateTime;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class AdminController extends Controller
{
    public function index()
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
		        (SELECT COUNT(id) FROM borrows WHERE returned = 0 AND returnDT < " ' . date('Y-m-d', strtotime(Date::now())) . '"  ) AS qtNotReturned
      	        FROM books LIMIT 1;
      ');

        // $dashboardInfo = $dashboardInfoRaw[0];

        return Inertia::render("adm/Index", [
            "dashboardData" => $dashboardInfoRaw[0]
        ]);
    }

    public function books(Request $request)
    {
        $search = $request->search;
        $books = (!isset($search) && empty($search)) ?
            Book::select(
                "title",
                "category",
                "available",
                "qt",
                "qtPages",
                "publisher",
                "author",
                "id",
                "desc",
                "imgUrl",
                "releaseDt"
            )->paginate(10)
            : DB::table("books")->where([
                ["title", "LIKE", "%$search%"],
            ])
            ->orWhere(
                "category",
                "LIKE",
                "%$search%"
            )->orWhere(
                "author",
                "LIKE",
                "%$search%"
            )->orWhere(
                "publisher",
                "LIKE",
                "%$search%"
            )->paginate(10);
        return Inertia::render("adm/Books", [
            "books" => $books
        ])->with("msg", "oliver");
    }

    public function newBook()
    {
        return Inertia::render('adm/NewBook');
    }

    public function borrows(Request $request)
    {
        $search = $request->search;
        $paginate = (!isset($search) && empty($search))
            ? DB::table("borrows")
            ->join('books', 'books.id', '=', 'borrows.bookId')
            ->join("users", "users.id", "=", "borrows.userId")
            ->select("borrows.id", "users.name", "books.title", "borrows.created_at", "borrows.returnDt", 'borrows.returned')
            ->orderBy("borrows.returned")
            ->orderBy("borrows.returnDt")
            ->paginate(10)
            : DB::table("borrows")
            ->join('books', 'books.id', '=', 'borrows.bookId')
            ->join("users", "users.id", "=", "borrows.userId")
            ->where("users.name", "Like", "%$search%")
            ->orWhere("books.title", "Like", "%$search%")
            ->orWhere("books.author", "Like", "%$search%")
            ->select("borrows.id", "users.name", "books.title", "borrows.created_at", "borrows.returnDt", 'borrows.returned')
            ->orderBy("borrows.returned")
            ->orderBy("borrows.returnDt")
            ->paginate(10);

        $today = new DateTime('now');

        $borrows = json_decode(json_encode($paginate->items()), true);
        for ($i = 0; $i < count($borrows); $i++) {
            $cd = new DateTime($borrows[$i]['created_at']);
            $borrows[$i]['created_at'] = $cd->format("d/m/Y");

            $rd = new DateTime($borrows[$i]['returnDt']);
            $borrows[$i]['returnDt'] = $rd->format("d/m/Y");

            $today = new DateTime("now");

            if ($today == $rd) $borrows[$i]['devolution'] = "today";
            elseif ($today > $rd) $borrows[$i]['devolution'] = "late";
            else $borrows[$i]['devolution'] = "ok";

            $borrows[$i]["returned"]  = ($borrows[$i]['returned'] == 1) ? true : false;
        }
        return Inertia::render('adm/Borrows', ['paginate' => $paginate, "borrows" => $borrows]);
    }

    public function devolution($id)
    {
        try {
            $borrow = Borrow::find($id);
            if (null == $borrow || !isset($borrow))
                throw new Exception(code: 404, message: "Emprestimo não encontrado");

            $book = Book::find($borrow->bookId);
            if (null == $borrow || !isset($borrow))
                throw new Exception(code: 404, message: "Livro não encontrado");

            $book->available++;
            Borrow::where('id', $id)->update(['returned' => true]);
            Book::where('id', $borrow->bookId)->update(['available' => $book->available]);
            return redirect()->back()->with(['msg' => "{$book->title} foi devolvido"]);
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors(['msg' => $th->getMessage()]);
        }
    }

    public function users(Request $request)
    {
        $search = $request->search;
        $users = (!isset($search) && empty($search))
            ? DB::table("users")->select("name", "email", "address", "phone", "created_at", "id")
            ->where('isAdmin', "=", false)
            ->orderBy("name", "asc")
            ->paginate(10)
            : DB::table("users")->select("name", "email", "address", "phone", "created_at", "id")
            ->whereRaw("isAdmin = 0 AND ( name LIKE '%$search%' or email LIKE '%$search%')")
            ->orderBy("name", "asc")
            ->paginate(10);

        for ($i = 0; $i < count($users->items()); $i++) {
            $dt = new DateTime($users->items()[$i]->created_at);
            $users->items()[$i]->created_at = (string)$dt->format("d/m/Y");
        }

        return Inertia::render("adm/Users", [
            "users" => $users
        ]);
    }

    public function givePrivilege($id)
    {
        try {
            if (!isset($id) && empty($id)) throw new Exception();

            User::where('id', $id)->update([
                "isAdmin" => true
            ]);

            return redirect()->back();
        } catch (\Throwable $th) {
            return redirect()->back();
        }
    }

    public function admins(Request $request)
    {
        $users = (!isset($request->search) && empty($search))
            ? DB::table("users")->select("name", "email", "address", "phone", "created_at", "id")
            ->where('isAdmin', "=", true)
            ->orderBy("name", "asc")
            ->paginate(10)
            : DB::table("users")->select("name", "email", "address", "phone", "created_at", "id")
            ->where('isAdmin', "=", true)
            ->orderBy("name", 'asc')
            ->paginate(10);

        for ($i = 0; $i < count($users->items()); $i++) {
            $dt = new DateTime($users->items()[$i]->created_at);
            $users->items()[$i]->created_at = (string)$dt->format("d/m/Y");
        }

        return Inertia::render("adm/Admins", [
            "admins" => $users
        ]);
    }

    public function withdrawPrivileges($id)
    {
        try {
            if (!isset($id) && empty($id)) throw new Exception();

            User::where('id', $id)->update([
                "isAdmin" => false
            ]);

            return ($id == auth()->user()->id)
                ? redirect()->route("user.account")
                : redirect()->back();
        } catch (\Throwable $th) {
            return redirect()->back();
        }
    }
}
