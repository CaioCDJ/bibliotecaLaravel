<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Nette\Utils\ArrayList;

class BookController extends Controller
{

  // Busca de livros via
  // query de url
  public function books(Request $request)
  {
    $books = new ArrayList();
    $category = $request->query('category');
    $author = $request->query('author');
    $publisher = $request->query('publisher');
    $page = $request->query('page');

    $search = $request->query("search");

    // no parameter
    if (empty($category) && empty($author) && empty($search)) {
      $books = Book::all();
      return view("pages/books", compact('books'));
    } 

    // busca direta

    else if(!empty($search)){
      $books = DB::table('books')
        ->whereRaw('title LIKE "%'.$search.'%" OR author LIKE "%'.$search.'%"  OR publisher LIKE "%'.$search.'%"')->get();
      return view("pages/books", compact('books'));
    }

    else {

      if (!empty($category) && !empty($author) && !empty($publisher)) {
        $books = Book::where([
          "category" => $category,
          "author" => $author,
          "publisher" => $publisher
        ])->get();
      }
      // 2 parametros
      else if (!empty($category) && !empty($publisher)) {
        $books = Book::where([
          "category" => $category,
          "publisher" => $publisher
        ])->get();
      } else if (!empty($category) && !empty($author)) {
        $books = Book::where([
          "category" => $category,
          "author" => $author
        ])->get();
      } else if (!empty($author) && !empty($publisher)) {
        $books = Book::where([
          "author" => $author,
          "publisher" => $publisher
        ])->get();
      }
      // 1 parametro
      else if (!empty($category) || !empty($author) || !empty($publisher)) {

        $books = !empty($category)
          ? Book::where('category', $category)->get()
          : null;

        $books = !empty($author)
          ? Book::where('author', $author)->get()
          : $books;

        $books = !empty($publisher)
          ? Book::where('publisher', $publisher)->get()
          : $books;
      } else if (empty($category) && !empty($author)) {
        $books = Book::where('author', $author)->get();
      }

      return view("pages/books", compact('books'));
    }
  }

  public function getById($id)
  {

    $book = Book::where('id', $id)->first();

    return view('pages/book', compact('book'));
  }

  public function addBook(Request $request)
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

    return redirect()->route('admin.books');
  }
}
