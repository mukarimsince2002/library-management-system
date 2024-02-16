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
        return $this->userService->getAllUsers();
    }

    public function create()
    {
        // Logic for showing the create form
    }

    public function store(UserRequest $request)
    {
        return $this->userService->createUser($request->validated());
    }

    public function show($id)
    {
        return $this->userService->getUserById($id);
    }

    public function edit($id)
    {
        return $this->userService->editUser($id);
    }

    public function update(UserRequest $request, $id)
    {
        return $this->userService->updateUser($id, $request->validated());
    }

    public function destroy($id)
    {
        return $this->userService->deleteUser($id);
    }
}
