<?php

namespace App\Http\Controllers;

use App\Models\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class UserController extends Controller
{
    public function account()
    {
        $user = DB::table("users")
            ->select("name", "email", "phone", "address", "created_at")
            ->where("id", auth()->user()->id)->first();

        $dt = new DateTime($user->created_at);
        $user->created_at = $dt->format("d/m/Y");

        $borrows = DB::table("borrows as b")
            ->join('books as book', 'book.id', "b.bookId")
            ->where("b.userId", auth()->user()->id)
            ->select(
                "b.returned",
                "b.returnDt",
                "b.created_at",
                "book.title",
            )->orderBy("b.returnDt", "DESC")
            ->paginate(5);

        for ($i = 0; $i < count($borrows->items()); $i++) {
            $dt = new DateTime($borrows->items()[$i]->created_at);
            $borrows->items()[$i]->created_at = $dt->format("d/m/Y");

            $dt = new DateTime($borrows->items()[$i]->returnDt);
            $borrows->items()[$i]->returnDt= $dt->format("d/m/Y");
        }

        return Inertia::render("Account", [
            "user" => $user,
            "borrows" => $borrows
        ]);
    }
}
