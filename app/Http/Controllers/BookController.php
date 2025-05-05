<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Book::with('category')->get();
        return view('books.baseBook', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('books.create', compact('categories'));
    }

    public function bookUser() {
        $book = Book::with('category')->get();
        return view('books.baseBookUser', compact('book'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'category' => 'required',
            'description' => 'required',
            'cover' => 'required',
        ]);

        if($request->hasFile('cover')){
            $imageName = time().'.'.$request->file('cover')->getClientOriginalExtension();
              
             $request->cover->move(public_path('images'), $imageName);
            Book::create([
                'title' => $request->title,
                'author' => $request->author,
                'categories_id' => $request->category,
                'description' => $request->description,
                'cover' => $imageName,
            ]);

            return redirect()->route('book.index')->with('msg','Succes Add Book');
        }

        return back()->with('msg','Error While Add Book');
    
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        $book = Book::find($book->id);
        $categories = Category::all();
        return view('books.edit', compact('book', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        //
        $book = Book::find($book->id);
        $book->title = $request->input('title');
        $book->author = $request->input('author');
        $book->categories_id = $request->input('category');

        $book->save();

        return redirect('/book')->with('success', 'Update Succesfully');    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        //
        if ($book) {
            $book->delete();
            return redirect('/book')->with('success', 'Delete Succesfully');
        }
    }
}
