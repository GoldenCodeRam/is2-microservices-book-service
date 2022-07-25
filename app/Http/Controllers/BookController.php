<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AuthorController extends Controller
{
    use ApiResponser;

    public function index()
    {
        return $this->successResponse(Book::all());
    }

    public function store(Request $request)
    {
        $rules = [
            'title' => 'required|max:255',
            'description' => 'required|max:255',
            'price' => 'required|min:1',
            'book_id' => 'require|min:1',
        ];

        $this->validate($request, $rules);

        $book = Book::create($request->all());
        return $this->successResponse($book, Response::HTTP_CREATED);
    }

    public function show($id)
    {
        return $this->successResponse(Book::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'title' => 'max:255',
            'description' => 'max:255',
            'price' => 'min:1',
            'book_id' => 'min:1',
        ];

        $this->validate($request, $rules);
        $book = Book::findOrFail($id);
        $book->fill($request->all());

        if ($book->isClean()) {
            return $this->errorResponse("At least one value must change.", Response::HTTP_UNPROCESSABLE_ENTITY);
        } else {
            $book->save();
            return $this->successResponse($book);
        }
    }

    public function delete($id)
    {
        $book = Book::findOrFail($id)->delete();
        return $this->successResponse($book);
    }
}
