<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use Carbon\Carbon;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('users.index',  compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store()
    {
        request()->validate([
            'name' => ['required', 'min:3', 'max:100'],
            'telephone' => ['required', 'min:8', 'max:20'],
            'date_of_birth' => ['required', 'before:today'],
            'username' => ['required', 'min:3', 'max:20', 'unique:users,username'],
            'email' => ['required', 'unique:users,email'],
            'password' => ['required', 'min:8', 'confirmed'],
            'password_confirmation' => ['required', 'same:password']
        ]);

        User::create([
            'name' => request('name'),
            'telephone' => request('telephone'),
            'date_of_birth' => request('date_of_birth'),
            'username' => request('username'),
            'email' => request('email'),
            'password' => Hash::make(request('password'))
        ]);

        return redirect('/users');
    }

    public function formatDate($date) 
    {
        return Carbon::parse($date)->format('Y-m-d');
    }

    public function edit(User $user)
    {
        $user->date_of_birth = $this->formatDate($user->date_of_birth);
        return view('users.edit', compact('user'));
    }

    public function update(User $user)
    {
        request()->validate([
            'name' => 'required|min:3|max:100',
            'telephone' => 'required|min:8|max:20',
            'date_of_birth' => 'required|before:today',
            'username' => 'required|min:3|max:20',
            'email' => 'required'
        ]);

        User::update([
            'name' => request('name'),
            'telephone' => request('telephone'),
            'date_of_birth' => request('date_of_birth'),
            'username' => request('username'),
            'email' => request('email')
        ]);

        return redirect('/users');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect('/users');
    }

    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }
}
