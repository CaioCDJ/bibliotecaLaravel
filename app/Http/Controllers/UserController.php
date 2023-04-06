<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

  public function login(Request $request)
  {
    $credentials = $request->validate([
      'email' => ['required'],
      'password' => ['required']
    ]);

    if(Auth::attempt($credentials)){
   
      return redirect()->route("login.index");    
    }
  }

  /**
   * busca um usuario pelo id
   *
   * Undocumented function long description
   *
   * @id uuid $var Description
   * @return client
   * @throws conditon
   **/
  public function getById($id)
  {


    return view('pages/account', compact('id'));
  }

  public function createClient(Request $request)
  {
    /* -- erros de validacao --
    $request->validate([
        'name' => "required|min:2",
        'email' => "required|email",
        'phone' => "numeric",
        'password' => "required|min:7",
    ],[
      "name.required" => "O nome é necessario para a realização do cadastro",
      "email.required" =>"O email é necessario para a criação da senha.",
      "email.email" =>"Email invalido",
      "phone.numeric" =>"Numero de telefone possui caracteres nao numericos.",
      "password.required" =>"A senha é obrigatoria",
      "password.min" => "A senha deve ter no minimo 5 carecteres"
      ]);

    */

    $client = new User();
    $client->name = $request->name;
    $client->email = $request->email;
    $client->phone = $request->phone;
    $client->address = $request->address;
    $client->role = "client";

    if ($request->password != $request->confirmPassword) {
      return redirect()->route('login.index')->withErrors(["error" => "senhas diferentes"]);
    } else {
      $client->password = bcrypt($request->password);

      $client->save();

      $id = $client->id;
      return view('pages/account', compact("id"));
    }
  }

  public function updateUser()
  {
  }

  public function updatePassword()
  {
  }

  public function delete()
  {
  }
}
