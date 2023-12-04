<?php

namespace App\Services;

use App\Http\Requests\CreateBookRequest;
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
            ->select("releaseDt", "title", "author", "desc", "qtPages", "available", "qt", "publisher", "category", "imgUrl","id")
            ->where("id", $id)
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

    }

    public function update()
    {
    }

    public function deleteById()
    {
    }
}
