<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterUserRequest;
use App\Models\Book;
use App\Models\Borrow;
use App\Models\User;
use DateTime;
use DateTimeZone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

  public function login(LoginRequest $request)
  {
    $user = User::where([
      "email" => $request->email,
      "active" => true
    ])->first();

    // works
    $credentials = array('email' => $request->email, 'password' => $request->password);

    if ($user == null) {
      return redirect()->route('login.index')->withErrors(["notFound" => "Usuario não encontrado"]);
    } else if (Auth::attempt($credentials)) {

      $request->session()->regenerate();

      if ($user->isAdmin) {
        return redirect()->intended("/admin");
      } else {
        return view('pages/account', compact('user'));
      }
    } else {
      return redirect()->route('login.index')->withErrors(["notFound" => "Usuario não encontrado"]);
    }
  }

  public function createClient(RegisterUserRequest $request)
  {

    $client = new User();
    $client->name = $request->name;
    $client->email = $request->email;
    $client->phone = $request->phone;
    $client->address = $request->address;
    $client->isAdmin = false;
    $client->active = true;

    if ($request->password != $request->confirmPassword) {
      return redirect()->route('login.index')->withErrors(["error" => "senhas diferentes"]);
    } else {
      $client->password = bcrypt($request->password);

      $client->save();


      $emailData = [
        'title' => 'Ola ',
        'body' => "Seja bem vindo a biblioteca."
      ];

      return view('pages/login');
    }
  }

  public function logout(Request $request)
  {
    auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect()->route('index');
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
  public function index($id)
  {
    $user = User::find($id);

    return view('pages/account', compact('user'));
  }


  public function update(Request $request)
  {
    User::where(['id' => auth()->user()->id])->update([
      'name' => $request->name,
      "address" => $request->address,
      "phone" => $request->phone
    ]);

    return redirect()->route('user.account', ['id' => auth()->user()->id]);
  }

  public function changePassword(ChangePasswordRequest $request)
  {
    // validações
    $user = User::where(
      [
        'id' => auth()->user()->id
      ]
    )->first();

    if (!Hash::check($request->password, $user->password)) {
      return redirect()->route('user.account', ['id' => auth()->user()->id])->withErrors(["password" => "Senha atual não compativel"]);
    }

    if ($request->newPassword == $request->confirmPassword) {

      User::where('id', auth()->user()->id)->update(['password' => bcrypt($request->newPassword)]);
      return redirect()
        ->route('user.account', ['id' => $user->id])
        ->with(["success" => "Nova Senha foi salva com sucesso"]);
    } else {
      dd("error");
    }
  }

  public function delete(string $id)
  {

    if ($id === auth()->user()->id) {
      User::where('id', $id)->update(['active' => false]);
      return redirect()->route('logout');
    }
  }

  public function borrow($book_id)
  {
    // verificar se  o livro ja não foi pego

    $book = Book::find($book_id);

    if ($book->available <= 0) {
      return redirect()->route('book', ['id' => $book_id])->withErrors(["error" => 'Livro nao disponivel']);
    }

    $qtBorrow = Borrow::where([
      "userId" => auth()->user()->id,
      "returned" => false
    ])->count();

    if ($qtBorrow >= 2) {
      return redirect()->route('book', ['id' => $book_id])->withErrors(["error" => 'Devolva os livros antes de alugar um novo']);
    }

    $dt = new DateTime('now', new DateTimeZone('America/Sao_Paulo'));

    $borrow = new Borrow();

    $borrow->bookId = $book_id;
    $borrow->userId = auth()->user()->id;
    $borrow->returnDt = $dt->modify("+7 day");
    $borrow->returned = false;
    $borrow->save();

    $book->available--;
    Book::find($book_id)->update(['available' => $book->available]);

    return redirect()->route('book', ['id' => $book_id])->with("message", "A locação do " . $book->title . "foi efetuada com sucesso.");
  }
}
