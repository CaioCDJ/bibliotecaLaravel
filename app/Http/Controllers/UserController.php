<?php

namespace App\Http\Controllers;

use App\Actions\User\ChangePassword;
use App\Actions\User\LoginUser;
use App\Actions\User\RegisterUser;
use App\Actions\User\UpdateUser;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterUserRequest;
use App\Models\Book;
use App\Models\Borrow;
use App\Models\User;
use App\Services\UserServices;
use DateTime;
use DateTimeZone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
  public function __construct(
    private UserServices $userService // Injecao de dependencia 
  ) {
  }

  public function login(LoginRequest $loginRequest, LoginUser $loginUser)
  {
    try {
      $user = $loginUser->handle($loginRequest);

      $loginRequest->session()->regenerate();

      return ($user->isAdmin)
        ? redirect()->intended("/admin")
        : view('pages/account', compact('user'));
    } catch (\Throwable $th) {
      return redirect()->route('login.index')->withErrors(["notFound" => $th->getMessage()]);
    }
  }

  public function register(RegisterUserRequest $request, RegisterUser $registerUser)
  {
    try {
      $username = $registerUser->handle($request);
      return redirect()->route('login.index')->with("success", $username . " sua conta foi criada com sucesso");
    } catch (\Throwable $th) {
      return redirect()->route('signin.index')->withErrors(["error" => $th->getMessage()]);
    }
  }

  public function logout(Request $request)
  {
    auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect()->route('index');
  }

  public function index($id)
  {

    try {
      $user = User::findOrfail($id);
      return view('pages/account', compact('user'));
    } catch (\Throwable $th) {
      return view('index');
    }
  }


  public function update(Request $request, $id, UpdateUser $updateUser)
  {
    try {
      $updateUser->handle($request, $id);
      return redirect()->route('user.account', ['id' => auth()->user()->id]);
    } catch (\Throwable $th) {
      return redirect()->route('user.account', ['id' => auth()->user()->id])->withErrors(["update" => $th->getMessage()]);
    }
  }

  public function changePassword(ChangePasswordRequest $request, $id, ChangePassword $changePassword)
  {
    try {
      $changePassword->handle($request, $this->userService->getById($id));
      return redirect()
        ->route('user.account', ['id' => $id])
        ->with(["success" => "Nova Senha foi salva com sucesso"]);
    } catch (\Throwable $th) {
      return redirect()->route('user.account', ['id' => auth()->user()->id])->withErrors(["password" => $th->getMessage()]);
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
