<?php

namespace App\Http\Controllers;

use App\Http\Requests\Book as RequestsBook;
use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;

class Library extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::paginate(10);
        $books->load(['authors']);

        return view('library.list',[
            'books'=>$books
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('library.create',[
            'authors'=>Author::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RequestsBook $request)
    {
        $request->validated();

        $book = Book::create($request->all());
        $book->authors()->attach($request->authors);

        return redirect('/');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        return view('library.update',[
            'authors'=>Author::all(),
            'book'=>$book
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RequestsBook $request, Book $book)
    {
        $request->validated();

        $book->update($request->all());
        $book->authors()->sync($request->authors);
        return redirect('/');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        //$book = Book::find($id);
        $book->authors()->detach();
        $book->delete();
        return redirect('/');
    }
}
