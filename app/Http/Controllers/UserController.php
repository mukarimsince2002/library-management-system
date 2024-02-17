<?php
namespace App\Http\Controllers;
use App\Http\Requests\UserRequest;
use App\Services\UserService;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        $users = $this->userService->index();
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(UserRequest $request)
    {
        $this->userService->store($request->validated());
        return redirect()->route('users.index')->with('message', 'Category created successfully.');
    }

    public function show($id)
    {
        return $this->userService->show($id);
    }

    public function edit($id)
    {
        $user = $this->userService->edit($id);
        return view('admin.users.edit', compact('user'));
    }

    public function update(UserRequest $request, $id)
    {
        $this->userService->update($id, $request->validated());
        return redirect()->route('users.index')->with('message', 'Category updated successfully.');
    }

    public function destroy($id)
    {
        $this->userService->destroy($id);
        return redirect()->route('users.index')->with('message', 'Category deleted successfully.');
    }
}
