<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthorRequest;
use App\Services\AuthorService;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    protected $authorService;

    public function __construct(AuthorService $authorService)
    {
        $this->authorService= $authorService;
    }

    public function index()
    {
        $authors = $this->authorService->index();
        return view('admin.authors.index', compact('authors'));
    }

    public function create()
    {
        return view('admin.authors.create');

    }

    public function store(AuthorRequest $request)
    {
        $this->authorService->store($request->validated());
        return redirect()->route('authors.index')->with('message', 'Category created successfully.');
    }

    public function edit($id)
    {
        $author = $this->authorService->edit($id);
        return view('admin.authors.edit', compact('author'));
    }

    public function update(AuthorRequest $request, $id)
    {
        $this->authorService->update($id, $request->validated());
        return redirect()->route('authors.index')->with('message', 'Category updated successfully.');
    }

    public function destroy($id)
    {
        $this->authorService->destroy($id);
        return redirect()->route('authors.index')->with('message', 'Category deleted successfully.');
    }
}
