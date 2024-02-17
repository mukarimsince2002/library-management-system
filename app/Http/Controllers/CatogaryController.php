<?php

namespace App\Http\Controllers;

use App\Http\Requests\CatogaryRequest;
use App\Services\CatogaryService;
use Illuminate\Http\Request;

class CatogaryController extends Controller
{
    protected $catogaryService;

    public function __construct(CatogaryService $catogaryService)
    {
        $this->catogaryService= $catogaryService;
    }

    public function index()
    {
        $genres = $this->catogaryService->index();
        return view('admin.genres.index', compact('genres'));
    }

    public function create()
    {
        return view('admin.genres.create');
    }

    public function store(CatogaryRequest $request)
    {
        $this->catogaryService->store($request->validated());
        return redirect()->route('admin.genres.index')->with('success', 'Category created successfully.');
    }

    public function edit($id)
    {
        $genre = $this->catogaryService->edit($id);
        return view('admin.genres.edit', compact('genre'));
    }

    public function update(CatogaryRequest $request, $id)
    {
        $this->catogaryService->update($id, $request->validated());
        return redirect()->route('genres.index')->with('success', 'Category updated successfully.');
    }

    public function destroy($id)
    {
        $this->catogaryService->destroy($id);
        return redirect()->route('genres.index')->with('success', 'Category deleted successfully.');
    }
}
