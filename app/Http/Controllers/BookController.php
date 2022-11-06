<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    //Create Index
    public function index() {
        $data['books'] = Book::orderBy('id')->paginate(5);
        return view('books.index', $data);
    }

    //Get data from Book id
    //Return View and show data
    public function show($id){
        $book = Book::find($id);
        return view('books.show',['book' => $book->toarray()]);
    }

    // Create Resource
    public function create(){
        return view('books.create');
    }

    // Store Resource
     // Validate ตรวจสอบ ยืนยัน Input
    public function store(Request $request) {
        $request->validate([
            'bid' => 'required',
            'bname' => 'required',
            'type' => 'required',
            'price' => 'required'
        ]);

        $book = new Book;
        $book->bid = $request->bid;
        $book->bname = $request->bname;
        $book->type = $request->type;
        $book->price = $request->price;
        if($request->hasfile('image')){
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/books/',$filename);
            $book->image = $filename;
        }
        $book->save();
        return redirect()->route('books.index')->with('success','book has been create success');
    }

    // Edit Book
    public function edit(Book $book){
        return view('books.edit',compact('book'));
    }

    // Update Data from Edit Book
    // Validate ตรวจสอบ ยืนยัน Input
    public function update(Request $request, $id){
        $request->validate([
            'bid' => 'required',
            'bname' => 'required',
            'type' => 'required',
            'price' => 'required'
        ]);
        $book = Book::find($id);
        $book->bid = $request->bid;
        $book->bname = $request->bname;
        $book->type = $request->type;
        $book->price = $request->price;
        if($request->hasfile('image')){
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/books/',$filename);
            $book->image = $filename;
        }
        $book->save();
        return redirect()->route('books.index')->with('success', 'Book has been updated');
    }

    // Delete or Destroy Book
    public function destroy(Book $book) {
        $book->delete();
        return redirect()->route('books.index')->with('success','Book has been deleted');

    }
}
