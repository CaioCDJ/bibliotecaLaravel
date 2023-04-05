<?php

use App\Http\Controllers\ClientController;
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
});

Route::get('/sign-in',function () {
  return view("pages/signin");
});

// redirecionamento
Route::get('/cadastro', function(){
  return redirect()->route("sign-in");
});

Route::get("/login", function(){
  return view('pages/login');
});

Route::get("/book/{id}", function($id){
  return "Id do produto é: ".$id;
})->whereUuid("id");

/* -- agrupamento de rotas --
Route::name("admin.")->group(function(){
  Route::get('admin/dashboard',function(){});
  Route::get('admin/dashboard/books',function(){});
  Route::get('admin/dashboard/clients',function(){});
  Route::get('admin/dashboard/admins',function(){});
});
*/

// -- Rotas api --

// executando a funcao do controller 
//                      classe                  metodo
Route::get('/client',[ClientController::class, 'index'] );

Route::get('/client/{id}',[ClientController::class, 'getById'] );

