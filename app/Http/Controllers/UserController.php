<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(2);
        return view('users.index', compact('users'));
    }
    public function create()
    {
        return view('users.create');
    }
    public function save(Request $request)
    {
        $data = $request->validate(['name' => 'required',
            'email' => 'required|email|unique:users,email',]);
        User::create($data);
        return redirect() -> route('users.index')->with('success', 'User created!');
    }
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }
    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email,'.$id,]);
        $user = User::findorFail($id);
        $user -> update($validateData);
        return redirect() -> route('users.index') -> with('success', 'User updated!');
    }
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user -> delete();
        return redirect() -> route('users.index') -> with('success', 'User deleted!');
    }
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('users.show', compact('user'));
    }
}
