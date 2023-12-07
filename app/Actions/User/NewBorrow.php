<?php

namespace App\Actions\User;

use App\Models\Book;
use App\Models\Borrow;
use DateTime;
use DateTimeZone;

class NewBorrow
{

  /**
   * Logica de alocacao de livros
   *
   * @param string $book_id
   * @param string $userId
   * @throws conditon
   **/
  public function handle($book_id, $userId): string
  {
    if (!uuid_is_valid($book_id)) {
      return new \Exception(message: "??? porque nao???.");
    }

    $book = Book::findOrFail($book_id);

    if ($book->available <= 0) {
      return new \Exception(message: "Livro não disponivel.");
    }

    $qtBorrow = Borrow::where([
      "userId" => $userId,
      "returned" => false
    ])->count();

    if ($qtBorrow >= 2) {
      return new \Exception(message:'Devolva os livros antes de alugar um novo');
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

    return $book->title;
  }
}
