<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Books;

class BooksController extends Controller
{
    public function index()
    {

        $books = auth()->user()->books();
        return view('dashboard', compact('books'));
    }

    public function add()
    {

        return view('add');
    }

    public function create(Request $request)
    {

        $this->validate($request, ['book_name' => 'required', 'writer' => 'required']);
        $books = new Books();
        $books->book_name = $request->book_name;
        $books->writer = $request->writer;
        $books->user_id = auth()->user()->id;
        $books->save();
        return redirect('/dashboard');
    }

    public function edit(Books $book)
    {

        if (auth()->user()->id == $book->user_id) {

            return view('edit', compact('book'));
        } else {
            return   redirect('/dashboard');
        }
    }

    public function update(Request $request, Books $book)
    {
        if (isset($_POST['delete'])){

            $book->delete();
            return redirect('/dashboard');
        }
        else{       
        $this->validate($request, ['book_name' => 'required', 'writer' => 'required']);
        $book->book_name = $request->book_name;
        $book->writer = $request->writer;
        $book->save();
        return redirect('/dashboard');
        }
    }
}
