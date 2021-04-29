<?php

namespace App\Http\Controllers;
use App\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function all() {
        $booksArr = Book::all();
        return $booksArr;
    }

    public function add(Request $request) {
        $book = new Book;
        $book->title = $request->title;
        $book->author = $request->author;
        $book->availability = 1;
        $book->save();
    }

    public function delete($id) {
        $book = Book::where('id', $id)->first();
        $book->destroy($id);
        $book->save();
    }

    public function changeAvailabilty($id) {
        $book = Book::where('id', $id)->first();
        if ($book->availability == FALSE) {
            $book->availability = TRUE;
        } else {
            $book->availability = FALSE;
        }
        $book->save();
    }
}
