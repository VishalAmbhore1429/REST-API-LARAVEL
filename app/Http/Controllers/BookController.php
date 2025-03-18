<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $showAllBooks = Book::all();
        if($showAllBooks){
            return  response()->json($showAllBooks,200);
        }else{
            return  response()->json(['message'=>'Data not Found'],404);
        }
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'bookname'=>'required',
            'authorname'=>'required',
            'language'=>'required',
        ]);

        $bookData = Book::create([
            'bookname'=>$validateData['bookname'],
            'authorname'=>$validateData['authorname'],
            'language'=>$validateData['language'],
        ]);

        return response()->json(['message'=>'Book Added Successfully'],201);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,int $id)
    {
        // dd($request->all(), $id);

        $validateData = $request->validate([
            'bookname'=>'required',
            'authorname'=>'required',
            'language'=>'required',
        ]);

        $updateBook = Book::find($id);
        
        if($updateBook){
            $updateBook->update([
                'bookname'=>$validateData['bookname'],
                'authorname'=>$validateData['authorname'],
                'language'=>$validateData['language'],
            ]); 
            return response()->json(['message'=>'Book Updated Successfully',$updateBook->toArray()],200);
        }else{
            return response()->json(['message'=>'Book not Found!'],404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book,$id)
    {
        $delteBook = Book::find($id);
        if($delteBook){
            $deleted = $delteBook->delete();
            return response()->json(['message'=>'Book Deleted!',$deleted],200);
        }else{
            return response()->json(['message'=>'Book not found!'],404);
        }
    }

    public function show(Book $book,$id)
    {
        $showBook = Book::find($id);
        if($showBook){
            return response()->json($showBook->toArray(),200);
        }else{
            return response()->json(['message'=>'Book not found!'],404);
        }
    }
}
