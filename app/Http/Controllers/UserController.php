<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy("created_at","desc")->paginate(10);

        return view('superAdmin.user.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::all();

        return view('superAdmin.user.create', compact('roles'));
    }

    public function store(StoreUserRequest $request)
    {
        $validatedData = $request->validated();

        User::create($validatedData);

        return redirect()->route('superAdmin.users.index')->with('success', 'Product added successfully.');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('superAdmin.users.index')->with('success', 'User Deleted!.');
    }
}
