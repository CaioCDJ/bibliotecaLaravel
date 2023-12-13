<?php

namespace App\Services;

use App\Http\Requests\CreateBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Book;
use DateTime;
use Exception;
use Illuminate\Support\Facades\DB;
use stdClass;

class BookServices
{

    /**
     * Get a book by id
     *
     *
     * @param string $id
     * @return array|Book
     * @throws Exception
     **/
    public function byId(string $id): Book|array|stdClass
    {
        $book = DB::table('books')
            ->select("releaseDt", "title", "author", "desc", "qtPages", "available", "qt", "publisher", "category", "imgUrl", "id")
            ->where([
                ["id", "=", $id],
                ["active", "=", true]
            ])
            ->first();
        // Book::where('id', $id)->first();

        if (empty($book) && !isset($book)) throw new Exception(code: 404, message: "Livro não foi encontrado");

        $dt = new DateTime($book->releaseDt);
        $book->releaseDt = $dt->format("d/m/Y");
        return $book;
    }

    /**
     * Create a new book registration.
     *
     *
     * @param array $arr
     * @return array|Book
     * @throws Exception
     **/
    public function store(CreateBookRequest $request)
    {
        $book = Book::where("title", $request->title)->first();

        if (isset($book) || !empty($book)) throw new Exception(code: 400, message: "Livro $request->title jé registrado");

        $book = new Book();

        $book->title = $request->title;
        $book->author = $request->author;
        $book->publisher = $request->publisher;
        $book->qtPages = $request->qtPages;
        $book->releaseDt = $request->releaseDt;
        $book->category = $request->category;
        $book->imgUrl = $request->imgUrl;
        $book->qt = $request->qt;
        $book->available = $request->qt;
        $book->desc = $request->desc;

        $book->save();

        return $book;
    }

    public function update(UpdateBookRequest $request, string $id)
    {
        $book = Book::where("id", $id)->first();

        if (!isset($book) || empty($book)) throw new Exception(code: 404, message: "Livro não encontrado");

        $book->title = $request->title ?? $book->title;
        $book->author = $request->author ?? $book->author;
        $book->publisher = $request->publisher ?? $book->publisher;
        $book->qtPages = $request->qtPages ?? $book->qtPages;
        $book->releaseDt = $request->releaseDt ?? $book->releaseDt;
        $book->category = $request->category ?? $book->category;
        $book->imgUrl  = $request->imgUrl ?? $book->imgUrl;
        $book->qt = $request->qt ?? $book->qt;
        $book->desc = $request->desc ?? $book->desc;

        $book->save();

        return $book;
    }

    public function deleteById(string $id)
    {
        $book = Book::where("id", $id)->first();

        if (!isset($book) && empty($book)) throw new Exception(code: 404, message: "Livro não encontrado");

        DB::table("books")->where("id", $book->id)->update([
            "active" => false
        ]);
    }
}
