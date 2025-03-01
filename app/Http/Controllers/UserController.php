<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index(): View
    {
        return view('pages.user.index', [
            'users' => User::orderBy('role')->get()
        ]);
    }

    public function create(): View
    {
        return view('pages.user.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'role' => 'required',
        ]);

        $data['password'] = bcrypt($data['password']);

        User::create($data);

        return to_route('pengguna.index')->with('success', 'Pengguna berhasil ditambahkan');
    }

    public function edit(User $user): View
    {
        return view('pages.user.edit', [
            'user' => $user
        ]);
    }

    public function update(Request $request, User $user): RedirectResponse
    {
        $data = $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'role' => 'required',
            'password' => 'nullable',
        ]);

        if (isset($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        } else {
            unset($data['password']);
        }

        $user->update($data);

        return to_route('pengguna.index')->with('success', 'Pengguna berhasil diperbarui');
    }

    public function destroy(User $user): RedirectResponse
    {
        $user->delete();

        return to_route('pengguna.index')->with('success', 'Pengguna berhasil dihapus');
    }
}
