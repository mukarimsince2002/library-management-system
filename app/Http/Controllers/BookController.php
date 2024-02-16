<?php
// app/Http/Controllers/BookController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\BookService;
use App\Http\Requests\BookRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class BookController extends Controller
{
    protected $bookService;

    public function __construct(BookService $bookService)
    {
        $this->bookService = $bookService;
    }

    public function index()
    {
        try {
            $books = $this->bookService->getAllBooks();
            return response()->json(['message' => 'Books retrieved successfully', 'books' => $books]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function show($id)
    {
        try {
            $book = $this->bookService->getBookById($id);
            return response()->json(['message' => 'Book retrieved successfully', 'book' => $book]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 404);
        }
    }

    public function edit($id)
    {
        try {
            $book = $this->bookService->getBookById($id);
            return response()->json(['message' => 'Book retrieved successfully', 'book' => $book]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 404);
        }
    }

    public function store(BookRequest $request)
    {
        $data = $request->validated();

        try {
            $book = $this->bookService->createBook($data);
            return response()->json(['message' => 'Book created successfully', 'book' => $book]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function update(BookRequest $request, $id)
    {
        $data = $request->validated();

        try {
            $book = $this->bookService->updateBook($id, $data);
            return response()->json(['message' => 'Book updated successfully', 'book' => $book]);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Book not found'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $book = $this->bookService->deleteBook($id);
            return response()->json(['message' => 'Book deleted successfully']);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Book not found'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
