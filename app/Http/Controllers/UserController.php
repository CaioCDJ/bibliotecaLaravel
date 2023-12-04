<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangePasswordRequest;
use App\Models\User;
use DateTime;
use Exception;
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

        $paginate = DB::table("borrows as b")
            ->join('books as book', 'book.id', "b.bookId")
            ->where("b.userId", auth()->user()->id)
            ->select(
                "b.returned",
                "b.returnDt",
                "b.created_at",
                "book.title",
            )->orderBy("b.returnDt", "DESC")
            ->paginate(5);

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

        return Inertia::render("Account", [
            "user" => $user,
            "paginate" => $paginate,
            "borrows" => $borrows
        ]);
    }

    public function changePassword(ChangePasswordRequest $changePasswordRequest)
    {
        try {
            $data = $changePasswordRequest->validated();
            if ($data['password'] == $data['confirmPassword'] || $data['confirmPassword'] != $data['newPassword']) throw new Exception("sem ideias");

            $userPassword = DB::table("users")->select("password")->where("ID", "=", auth()->id())->first();

            if ($userPassword == bcrypt($data['password']) || $userPassword == bcrypt($data['confirmPassword'])) throw new Exception("deu ruim 2");

            $user = User::where("id", auth()->user()->id)->first();

            User::where("id", $user->id)->update(["password" => bcrypt($data['newPassword'])]);

            return back()->with(['error'=>"nao teve erro"]);
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }
}
