<?php

namespace App\Http\Controllers;

use App\Http\Requests\Membership_typeRequest;
use App\Models\MembershipType;
use App\Services\Membership_typeService;

class MembershipTypeController extends Controller
{


    protected $membership_typeService;

    public function __construct(Membership_typeService $membership_typeService)
    {
        $this->membership_typeService = $membership_typeService;
    }

    public function index()
    {
        $membershipTypes = $this->membership_typeService->index();
        return view('admin.genres.index', compact('membershipTypes'));
    }

    public function create()
    {
        return view('admin.genres.create');
    }

    public function store(Membership_typeRequest $request)
    {
        $data = $request->validated();
        $this->membership_typeService->store($data);
        return redirect()->route('genres.index')->with('message', 'User created successfully.');
    }

    public function show($id)
    {
        return $this->membership_typeService->show($id);
    }

    public function edit($id)
    {
        $membershipType = $this->membership_typeService->edit($id);
        return view('admin.genres.edit', compact('membershipType'));
    }

    public function update(Membership_typeRequest $request, $id)
    {
        $data = $request->validated();
        $this->membership_typeService->update($id, $data);
        return redirect()->route('genres.index')->with('message', 'publisher updated successfully.');
    }

    public function destroy($id)
{
    // Delete the user
    $this->membership_typeService->destroy($id);

    return redirect()->route('genres.index')->with('message', 'publisher deleted successfully.');
}


}
