<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// -- Rotas das paginas do front-end --

Route::controller(SiteController::class)->group(function () {

  Route::get('/', 'index')->name('index');

  Route::get('/index', function () {
    return redirect()->route('/');
  });

  Route::get('/sign-in', 'signIn')->name('signin.index');

  // redirecionamento
  Route::get('/cadastro', function () {
    return redirect()->route("/sign-in");
  });

  Route::get("/login", 'login')->name("login.index");

  Route::get("/books", function () {
    return view("pages/books");
  })->name("books");

  Route::get("/about", function () {
    return view('pages/about');
  })->name("about");
  Route::get("/sobre", function () {
    return redirect()->route("about");
  });
  
  Route::controller(BookController::class)->group(function () {
    Route::get('/books', 'books')->name('books');
    Route::get('/book/{id}', 'getById')->name('book');
    Route::post("/book", 'addBook')->name('book.add');
  });
});

Route::group(["middleware", 'auth'], function () {

  Route::controller(UserController::class)->group(function(){
    Route::get('/client/{id}', 'index')->name('user.account');
    Route::get('/borrow/{book_id}','borrow')->name('borrow.new');
    Route::get("/client/{id}/del",'delete')->name('user.del');
    Route::post("/client/{id}/changePassword",'changePassword')->name('user.password');
    Route::post("/client/{id}","update")->name('user.update'); 
  });

  Route::get('/logout', [UserController::class, 'logout'])->name('logout');

  Route::group(['middleware' => 'isAdmin'], function () {
    Route::controller(AdminController::class)->group(function () {
      Route::get('/admin/dashboard', 'dashboard')->name('admin.dashboard');
      Route::get('/admin', 'dashboard');
      Route::get('/admin/books', 'books')->name("admin.books");
      Route::get("/admin/addBook", 'addBook')->name('admin.book.add');
      Route::post("/admin/book/{id}", 'removeBook')->name('admin.book.remove');
      Route::get('/admin/users', 'users')->name('admin.users');
      Route::get('/admin/admins', 'admins')->name("admin.admins");
      Route::get('/admin/borrows',"borrows")->name('admin.borrows.index');
      Route::get('/admin/borrow/{id}','returnBook')->name("admin.borrows.returned");
    });
  });
});

Route::controller(UserController::class)->group(function () {
  Route::post('/sign-in', 'createClient')->name("signin.req");
  Route::post("/login", 'login')->name("login.req");
});
