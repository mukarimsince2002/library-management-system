<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Services\BookService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $bookService;

    public function __construct(BookService $bookService)
    {
        $this->bookService= $bookService;
    }

    public function index()
    {
        $bookS = $this->bookService->index();
        return view('catogaries.index', compact('book'));
    }

    public function create()
    {
        return view('catogaries.create');
    }

    public function store(BookRequest $request)
    {
        $this->bookService->store($request->validated());
        return redirect()->route('catogaries.index')->with('success', 'Category created successfully.');
    }

    public function edit($id)
    {
        $book = $this->bookService->edit($id);
        return view('catogaries.edit', compact('book'));
    }

    public function update(BookRequest $request, $id)
    {
        $this->bookService->update($id, $request->validated());
        return redirect()->route('catogaries.index')->with('success', 'Category updated successfully.');
    }

    public function destroy($id)
    {
        $this->bookService->destroy($id);
        return redirect()->route('catogaries.index')->with('success', 'Category deleted successfully.');
    }
}
