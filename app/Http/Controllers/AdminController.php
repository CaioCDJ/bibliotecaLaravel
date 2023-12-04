<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use DateTime;
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

    public function books()
    {
        return Inertia::render("adm/Books", [
            "books" => Book::select(
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
        ])->with("msg", "oliver");
    }

    public function newBook()
    {
        return Inertia::render('adm/NewBook');
    }

    public function borrows()
    {

        $paginate = DB::table("borrows")
            ->join('books', 'books.id', '=', 'borrows.bookId')
            ->join("users", "users.id", "=", "borrows.userId")
            ->select("borrows.id", "users.name", "books.title", "borrows.created_at", "borrows.returnDt", 'borrows.returned')
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
            else $borrows['devolution'] = "ok";
        }



        return Inertia::render('adm/Borrows', ['paginate' => $paginate,"borrows"=>$borrows]);
    }

    public function users()
    {
        $users = DB::table("users")->select("name", "email", "address", "phone", "created_at")
            ->where('isAdmin', "=", false)
            ->paginate(10);

        for ($i = 0; $i < count($users->items()); $i++) {
            $dt = new DateTime($users->items()[$i]->created_at);
            $users->items()[$i]->created_at = (string)$dt->format("d/m/Y");
        }

        return Inertia::render("adm/Users", [
            "users" => $users
        ]);
    }

    public function admins()
    {
        $users = DB::table("users")->select("name", "email", "address", "phone", "created_at")
            ->where('isAdmin', "=", true)
            ->paginate(10);

        for ($i = 0; $i < count($users->items()); $i++) {
            $dt = new DateTime($users->items()[$i]->created_at);
            $users->items()[$i]->created_at = (string)$dt->format("d/m/Y");
        }

        return Inertia::render("adm/Admins", [
            "admins" => $users
        ]);
    }
}
