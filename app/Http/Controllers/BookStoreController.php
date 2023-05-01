<?php

namespace App\Http\Controllers;

use App\Models\BookStore;
use Illuminate\Http\Request;

class BookStoreController extends Controller
{
    public function index()
    {
        $books =  BookStore::all();
        return response()->json($books, 200);
    }

    public function show($id)
    {
        $book = BookStore::find($id);

        if($book === null) {
            return response()->json(['error' => 'book not found'], 404);
        }
        return response()->json($book, 200);
    }

    public function store(Request $request)
    {
        $request->validate(BookStore::rules(), BookStore::feedBack());

        $book = BookStore::create($request->all());
        return response()->json($book, 201);
    }

    public function update(Request $request, $id)
    {
        $book = BookStore::find($id);
        if($book === null) {
            return response()->json(['error' => 'book not found'], 404);
        }
        $book->update($request->all());

        return response()->json($book, 200);
    }

    public function destroy($id)
    {
        $book = BookStore::find($id);
        if($book === null) {
            return response()->json(['error' => 'book not found'], 404);
        }
        $book->delete();
        return response()->json(['success' => true], 200);
    }
}
