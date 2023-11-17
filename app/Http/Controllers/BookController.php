<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;
use Nette\Utils\ArrayList;

class BookController extends Controller
{
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
                ->whereRaw('title LIKE "%' . $search . '%" OR author LIKE "%' . $search . '%"  OR publisher LIKE "%' . $search . '%"')->paginate(10);
            return Inertia::render("Books", [
                "books" => $books
            ]);
        } else {

            if (!empty($category) && !empty($author) && !empty($publisher)) {
                $books = Book::where([
                    "category" => $category,
                    "author" => $author,
                    "publisher" => $publisher
                ])->paginate(10);
            }
            // 2 parametros
            else if (!empty($category) && !empty($publisher)) {
                $books = Book::where([
                    "category" => $category,
                    "publisher" => $publisher
                ])->paginate(10);
            } else if (!empty($category) && !empty($author)) {
                $books = Book::where([
                    "category" => $category,
                    "author" => $author
                ])->paginate(10);
            } else if (!empty($author) && !empty($publisher)) {
                $books = Book::where([
                    "author" => $author,
                    "publisher" => $publisher
                ])->paginate(10);
            }
            // 1 parametro
            else if (!empty($category) || !empty($author) || !empty($publisher)) {

                $books = !empty($category)
                    ? Book::where('category', $category)->paginate(10)
                    : null;

                $books = !empty($author)
                    ? Book::where('author', $author)->paginate(10)
                    : $books;

                $books = !empty($publisher)
                    ? Book::where('publisher', $publisher)->paginate(10)
                    : $books;
            } else if (empty($category) && !empty($author)) {
                $books = Book::where('author', $author)->paginate(10);
            }

            return Inertia::render("Books", [
                "books" => $books
            ]);

            // return view("pages/books", compact('books'));
        }
    }
    public function book($id)
    {
        $book = Book::where('id', $id)->first();
            return Inertia::render("Book", [
                "book" => $book
            ]);
    }

    public function store()
    {
    }
    public function update()
    {
    }
    public function delete()
    {
    }
}
