<?php

namespace App\Http\Controllers;

use App\Mail\MailNotify;
use App\Models\Book;
use App\Models\Borrow;
use App\Models\User;
use DateTime;
use DateTimeZone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{

  public function login(Request $request)
  {

    $request->validate([
      'email' => ['required', 'email'],
      'password' => ['required']
    ], [
      'email.required' => "O email é obrigatorio.",
      'email.email' => "Não é um email.",
      'password.required' => "A senha é obrigatoria."
    ]);

    // works
    $credentials = array('email' => $request->email, 'password' => $request->password);

    if (Auth::attempt($credentials)) {

      $request->session()->regenerate();

      $user = User::where("email", $request->email)->first();

      if ($user->role == "admin") {
        return redirect()->intended("/admin");
      } else {
        return redirect()->intended("/");
      }
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

  public function borrow($book_id)
  {

    // verificar se  o livro ja não foi pego

    $book = Book::find($book_id);

    if ($book->available < 0) {
    }

    $qtBorrow = Borrow::where([
      "userId" => auth()->user()->id,
      "returned"=>false
    ])->count();


    if($qtBorrow>=2){
      return "devolve meus livros, animal ";
    }

    $dt = new DateTime('now', new DateTimeZone('America/Sao_Paulo'));

    $borrow = new Borrow();

    $borrow->bookId = $book_id;
    $borrow->userId = auth()->user()->id;
    $borrow->returnDt = $dt->modify("-7 day");
    $borrow->returned = false;
    $borrow->save();

    $book->available--;
    Book::find($book_id)->update(['available' => $book->available]);

    return view('pages/books/' . $book_id);
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
    $client->isAdmin = false;

    if ($request->password != $request->confirmPassword) {
      return redirect()->route('login.index')->withErrors(["error" => "senhas diferentes"]);
    } else {
      $client->password = bcrypt($request->password);

      $client->save();

      $id = $client->id;

      $emailData = [
        'title' => 'Ola ',
        'body' => "Seja bem vindo a biblioteca."
      ];

      return view('pages/account', compact("id"));
    }
  }

  public function logout(Request $request)
  {
    auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect()->route('index');
  }
}
