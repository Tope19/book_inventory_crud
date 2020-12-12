<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::paginate(5);
        return view('admin.books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.books.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validateData($request);
        Book::create($data);
        toastr()->success('Book added successfully!');
        return redirect()->route('book.books.index');
    }

    private function validateData(Request $request , $mode = 'required'){
        $data = $request->validate([
            'title' => 'required|string',
            'isbn' => 'required|string',
            'author' => 'required|string',
            'quantity_available' => 'required|integer',
            'status' => 'required|string',
        ]);

        return $data;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        return view('admin.books.edit',compact('book' ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $book = Book::findorfail($id);
        if(empty($book)){
            toastr()->error('Item not found!');
            return redirect()->back();
        }
        $data = $this->validateData($request , 'nullable');

        $book->update($data);
        toastr()->success('Book updated successfully!');
        return redirect()->route('book.books.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::findorfail($id);
        $book->delete();
        toastr()->success('Book Archived successfully!');
        return redirect()->back();
    }

    public function delete($id){
        $book = Book::findorfail($id);
        $book->forceDelete();
        toastr()->success('Book Deleted successfully!');
        return redirect()->back();
    }
}
