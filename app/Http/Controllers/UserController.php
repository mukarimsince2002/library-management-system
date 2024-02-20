<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserRequest;
use App\Services\UserService;
use App\Traits\ImageUploadTrait; // Import the ImageUploadTrait
use App\Models\User;

class UserController extends Controller
{
     Use  ImageUploadTrait;

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
        $data = $request->validated();
        if ($request->hasFile('profile_photo_path')) {
            $data['profile_photo_path'] = $this->uploadPhoto($request->file('profile_photo_path'), 'user_photos');

        }


       $data['password'] = Hash::make($request->input('password'));

        $this->userService->store($data);
        return redirect()->route('users.index')->with('message', 'User created successfully.');
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
        $data = $request->validated();
        if ($request->hasFile('profile_photo_path')) {
            $user = $this->userService->edit($id);
            $oldImage = $user->photo;
            $data['profile_photo_path'] = $this->updatePhoto($request->file('profile_photo_path'), 'user_photos', $oldImage);
        }
        $data['password'] = Hash::make($request->input('password'));
        $this->userService->update($id, $data);
        return redirect()->route('users.index')->with('message', 'User updated successfully.');
    }

    public function destroy($id)
{
    // Get the user by ID
    $user = User::findOrFail($id);

    // Delete the user's image
    $this->deleteImage($user->profile_photo_path);

    // Delete the user
    $this->userService->destroy($id);

    return redirect()->route('users.index')->with('message', 'User deleted successfully.');
}


}
