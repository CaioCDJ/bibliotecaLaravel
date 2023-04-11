<?php

namespace App\Http\Controllers;

use App\Mail\MailNotify;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{

  public function login(Request $request)
  {

    $request->validate([
      'email' => ['required','email'],
      'password' => ['required']
    ], [
      'email.required' => "O email é obrigatorio.",
      'email.email' => "Não é um email.",
      'password.required' => "A senha é obrigatoria."
    ]);

    // works
    $credentials = array('email' => $request->email, 'password' => bcrypt($request->password));

    if (Auth::attempt($credentials)) {
      return redirect()->route("login.index");
    } else {
      return redirect()->route('login.index')->withErrors(["notFound" => "Usuario não encontrado"]);
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
    $client->role = "user";

    if ($request->password != $request->confirmPassword) {
      return redirect()->route('login.index')->withErrors(["error" => "senhas diferentes"]);
    } else {
      $client->password = bcrypt($request->password);

      $client->save();

      $id = $client->id;

      $emailData = [
        'title'=>'Ola ',
        'body'=> "Seja bem vindo a biblioteca."
      ];

      Mail::to("caiodjesus1@hotmail.com")->send(new MailNotify($emailData));

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
