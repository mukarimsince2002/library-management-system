<?php

namespace App\Http\Controllers;

use App\Http\Requests\MembershipTypeRequest;
use App\Models\MembershipType;
use App\Services\MembershipTypeService;

class MembershipTypeController extends Controller
{


    protected $membership_typeService;

    public function __construct(MembershipTypeService $membership_typeService)
    {
        $this->membership_typeService = $membership_typeService;
    }

    public function index()
    {
        $membershipTypes = $this->membership_typeService->index();
        return view('admin.membership_type.index', compact('membershipTypes'));
    }

    public function create()
    {
        return view('admin.membership_type.create');
    }

    public function store(MembershipTypeRequest $request)
    {
        $data = $request->validated();
        $this->membership_typeService->store($data);
        return redirect()->route('membership_type.index')->with('message', 'User created successfully.');
    }

    public function show($id)
    {
        return $this->membership_typeService->show($id);
    }

    public function edit($id)
    {
        $membershipType = $this->membership_typeService->edit($id);
        return view('admin.membership_type.edit', compact('membershipType'));
    }

    public function update(MembershipTypeRequest $request, $id)
    {
        $data = $request->validated();
        $this->membership_typeService->update($id, $data);
        return redirect()->route('membership_type.index')->with('message', 'publisher updated successfully.');
    }

    public function destroy($id)
{
    // Delete the user
    $this->membership_typeService->destroy($id);

    return redirect()->route('membership_type.index')->with('message', 'publisher deleted successfully.');
}


}
