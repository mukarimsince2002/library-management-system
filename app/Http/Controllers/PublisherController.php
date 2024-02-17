<?php
namespace App\Http\Controllers;

use App\Http\Requests\PublisherRequest;
use App\Services\PublisherService;

class PublisherController extends Controller
{
    protected $publisherService;

    public function __construct(PublisherService $publisherService)
    {
        $this->publisherService = $publisherService;
    }

    public function index()
    {
        return $this->publisherService->index();
    }

    public function create()
    {
        // Logic for showing the create form
    }

    public function store(PublisherRequest $request)
    {
        return $this->publisherService->store($request->validated());
    }

    public function show($id)
    {
        return $this->publisherService->show($id);
    }

    public function edit($id)
    {
        return $this->publisherService->edit($id);
    }

    public function update(PublisherRequest $request, $id)
    {
        return $this->publisherService->update($id, $request->validated());
    }

    public function destroy($id)
    {
        return $this->publisherService->destroy($id);
    }
}
