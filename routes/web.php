<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ClientController;
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

Route::get('/', function () {
    return view('welcome');
})->name('index');

Route::get('/index',function(){
  return redirect()->route('/');
});

Route::get('/sign-in',function () {
  return view("pages/signIn");
})->name('signin.index');

// redirecionamento
Route::get('/cadastro', function(){
  return redirect()->route("/sign-in");
});

Route::get("/login", function(){
  return view('pages/login');
})->name("login.index");

Route::get("/books", function(){
  return view("pages/books");
});

Route::get("/about",function(){
  return view('pages/about');
})->name("about");
Route::get("/sobre",function(){
  return redirect()->route("about");
});

Route::controller(BookController::class)->group(function(){
  Route::get('/books','books');
  Route::get('/book/{id}','getById');
  Route::post("/book",'addBook')->name('book.add');
  
});

Route::controller(AdminController::class)->group(function(){
  Route::get('/admin/dashboard','dashboard')->name('admin.dashboard');
  Route::get('/admin/books', 'books')->name("admin.books");
  Route::get("/admin/addBook",'addBook')->name('admin.book.add');
  Route::get('/admin/users','users')->name('admin.users');
});

/* -- agrupamento de rotas --
Route::name("admin.")->group(function(){
  Route::get('admin/dashboard',function(){});
  Route::get('admin/dashboard/books',function(){});
  Route::get('admin/dashboard/clients',function(){});
  Route::get('admin/dashboard/admins',function(){});
});
*/

// -- Rotas api --

Route::controller(UserController::class)->group(function(){
  // executando a funcao do controller 
  //                      classe                  metodo
  Route::get('/client','index' );
  Route::get('/client/{id}','getById');
  Route::post('/sign-in','createClient')->name("signin.req");
  Route::post("client/login",'login')->name("login.req");
});

