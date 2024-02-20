<?php

namespace App\Http\Controllers;

use App\Http\Requests\MembershipRequest;
use App\Models\Membership;
use App\Services\MembershipService;

class MembershipTypeController extends Controller
{


    protected $membershipService;

    public function __construct(MembershipService $membershipService)
    {
        $this->membershipService = $membershipService;
    }

    public function index()
    {
        $membershipService = $this->membershipService->index();
        return view('admin.genres.index', compact('genres'));
    }

    public function create()
    {
        return view('admin.genres.create');
    }

    public function store(MembershipRequest $request)
    {
        $data = $request->validated();
        $this->membershipService->store($data);
        return redirect()->route('genres.index')->with('message', 'User created successfully.');
    }

    public function show($id)
    {
        return $this->membershipService->show($id);
    }

    public function edit($id)
    {
        $membershipType = $this->membershipService->edit($id);
        return view('admin.genres.edit', compact('genre'));
    }

    public function update(MembershipRequest $request, $id)
    {
        $data = $request->validated();
        $this->membershipService->update($id, $data);
        return redirect()->route('genres.index')->with('message', 'publisher updated successfully.');
    }

    public function destroy($id)
{
    // Delete the user
    $this->membershipService->destroy($id);

    return redirect()->route('genres.index')->with('message', 'publisher deleted successfully.');
}


}
