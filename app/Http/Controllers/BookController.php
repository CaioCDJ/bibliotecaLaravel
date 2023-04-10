<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
  
  public function books(){

    $books = Book::all();

    return view("pages/books", compact('books'));  
  }

  public function getById($id){

    $book = Book::where('id',$id)->first();

    return view('pages/book', compact('book'));
  }

  public function addBook(Request $request){
    
    $book = new Book();

    $book->title = $request->title; 
    $book->author = $request->author; 
    $book->publisher = $request->publisher; 
    $book->qtPages = $request->qtPages; 
    $book->releaseDt = $request->releaseDt; 
    $book->category= $request->category; 
    $book->imgUrl = $request->imgUrl; 
    $book->qt = $request->qt;
    $book->available = $request->qt;
    $book->desc = $request->desc;

    $book->save(); 

    return redirect()->route('admin.books');
  }

}
