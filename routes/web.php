<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::controller(HomeController::class)->group(function () {
    Route::get("/", 'index')->name("home");
    Route::get("/about", 'about')->name('about');
    Route::get("/login", 'login')->name('login');
    Route::post('/login', 'loginPost')->name('login.post');
    Route::post('/logout', 'logout')->name('logout');
    Route::get("/register", 'register')->name('register');
    Route::post('/register', 'registerPost')->name('register.post');

    // -- Redirecionamentos --
    Route::get('/home', function () {
        return redirect()->route('home');
    });
    Route::get('/sobre', function () {
        return redirect()->route('about');
    });
    Route::get('/acessar', function () {
        return redirect()->route('login');
    });
    Route::get('/signin', function () {
        return redirect()->route('login');
    });
    Route::get('/cadastro', function () {
        return redirect()->route('register');
    });
    Route::get('/signup', function () {
        return redirect()->route('register');
    });
    // Route::get('/home', function() {return redirect()->route('home');});
    // Route::get("/sobre",redirect)
});

Route::controller(BookController::class)->group(function () {
    Route::get("/books", 'index')->name("books");
    Route::get("/Book/{id}", 'book')->name("book");
});

Route::group(["middleware" => 'auth'], function () {
    Route::controller(UserController::class)->group(function () {
        Route::get("/account", 'account')->name("user.account");
        Route::put("/user", 'update')->name('user.update');
        Route::post("/user/password", 'changePassword')->name('user.changePassword');
        Route::delete("/user", 'delete')->name("user.delete");

        Route::get('/perfil', function () {
            return redirect()->route("user.account");
        });
    });

    Route::prefix('admin')->middleware(['isAdmin'])->group(function () {
        Route::controller(AdminController::class)->group(function () {
            // -- pages
            Route::get("/", 'index')->name("admin.index");
            Route::get("/books",'books')->name('admin.books');
            Route::get("/storeBook",'newBook')->name('admin.addBook');
            Route::get('/borrows','borrows')->name("admin.borrows");
            Route::get('/admins',"admins")->name("admin.lst");
            Route::get('/users','users')->name("admin.users");
        });

        Route::controller(BookController::class)->group(function(){
            Route::post("/storeBook",'store')->name('admin.storeBook');
            Route::post("/book/{id}","delete")->name("admin.book.delete");
        });
    });
});
require __DIR__ . '/auth.php';
