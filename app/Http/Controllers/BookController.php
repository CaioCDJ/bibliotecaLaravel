<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Book;
use App\Services\BookServices;
use DateTime;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;
use Nette\Utils\ArrayList;

class BookController extends Controller
{
    public function __construct(
        private BookServices $bookServices
    ) {
    }

    public function index(Request $request)
    {

        $books = new ArrayList();
        $category = $request->query('category');
        $author = $request->query('author');
        $publisher = $request->query('publisher');

        $search = $request->query("search");

        // no parameter
        if (empty($category) && empty($author) && empty($search)) {
            $books = Book::paginate(10);
            return Inertia::render("Books", [
                "books" => $books
            ]);
        }

        // busca direta

        else if (!empty($search)) {
            $books = DB::table('books')
                ->whereRaw('title LIKE "%' . $search . '%" OR author LIKE "%' . $search . '%"  OR publisher LIKE "%' . $search . '%" AND active = 1')->paginate(10);
            return Inertia::render("Books", [
                "books" => $books
            ]);
        } else {

            if (!empty($category) && !empty($author) && !empty($publisher)) {
                $books = Book::where([
                    "category" => $category,
                    "author" => $author,
                    "publisher" => $publisher,
                    "active" => true
                ])->paginate(10);
            }
            // 2 parametros
            else if (!empty($category) && !empty($publisher)) {
                $books = Book::where([
                    "category" => $category,
                    "active" => true,
                    "publisher" => $publisher
                ])->paginate(10);
            } else if (!empty($category) && !empty($author)) {
                $books = Book::where([
                    "category" => $category,
                    "active" => true,
                    "author" => $author
                ])->paginate(10);
            } else if (!empty($author) && !empty($publisher)) {
                $books = Book::where([
                    "author" => $author,
                    "active" => true,
                    "publisher" => $publisher
                ])->paginate(10);
            }
            // 1 parametro
            else if (!empty($category) || !empty($author) || !empty($publisher)) {

                $books = !empty($category)
                    ? Book::where([
                        'category' => $category,
                        "active" => true,
                    ])->paginate(10)
                    : null;

                $books = !empty($author)
                    ? Book::where([
                        'author' => $author,
                        "active" => true,
                    ])->paginate(10)
                    : $books;

                $books = !empty($publisher)
                    ? Book::where([
                        'publisher' => $publisher,
                        "active" => true,
                    ])->paginate(10)
                    : $books;
            } else if (empty($category) && !empty($author)) {
                $books = Book::where([
                    'author' => $author,
                    "active" => true,
                ])->paginate(10);
            }

            return Inertia::render("Books", [
                "books" => $books
            ]);

            // return view("pages/books", compact('books'));
        }
    }
    public function book($id)
    {
        try {
            $book = $this->bookServices->byId($id);
            return Inertia::render("Book", [
                "book" => $book
            ]);
        } catch (\Throwable $th) {
            request()->flash("error", $th->getMessage());
        }
    }

    public function store(CreateBookRequest $createBookRequest)
    {
        $createBookRequest->validated();

        try {
            $this->bookServices->store($createBookRequest);
            return redirect()->route("admin.books");
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors(['msg' => $th->getMessage()]);
        }
    }

    public function update(UpdateBookRequest $request, $id)
    {

        try {
            $book = $this->bookServices->update($request, $id);
            return redirect()->back()->with(["msg" => "$book->title foi atualizado com sucesso!"]);
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors(['msg' => $th->getMessage()]);
        }
    }

    public function delete(string $bookId)
    {
        try {
            $this->bookServices->deleteById($bookId);
            return redirect()->back()->with(["msg", "Livro Deletado com sucesso!"]);
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors(['msg' => $th->getMessage()]);
        }
    }
}
