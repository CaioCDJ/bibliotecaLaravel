<?php

namespace App\Http\Controllers;

use App\Actions\User\LoginUser;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\Book;
use Illuminate\Http\Request;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function index()
    {
        try {
            // $mostAvailable = Book::orderBy('available', 'desc')->first();

            $books = Book::orderBy('created_at', 'asc')->skip(0)->limit(4)->get();

            return Inertia::render('Welcome', [
                'books' => $books,
                // 'mostAvailable'=>$mostAvailable
            ]);
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
        // return view('welcome', compact("books", "mostAvailable"));
    }

    public function about()
    {
        return Inertia::render("About");
    }


    public function books()
    {
    }

    public function book()
    {
    }

    public function login()
    {
        return auth()->check()
            ?redirect()->to("account")
            : Inertia::render("Login", ['isLogin' => true]);
    }

    public function loginPost(LoginRequest $loginRequest, LoginUser $loginUser)
    {
        try {
            $user = $loginUser->handle($loginRequest);

            $loginRequest->session()->regenerate();

            return ($user->isAdmin)
                ? redirect()->intended("/admin")
                : redirect()->route('home');
        } catch (\Throwable $th) {
            session()->flash("error",$th->getMessage());
        }
    }

    public function register()
    {
        return auth()->check()
            ?redirect()->to("account")
            : Inertia::render("Login", ['isLogin' => false]);
    }

    public function registerPost(/* RegisterRequest $registerRequest */)
    {
        dd("Senhor oliver");
        // dd($registerRequest->json());
    }

    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Inertia::render("Login", ['isLogin' => true]);
    }
}
