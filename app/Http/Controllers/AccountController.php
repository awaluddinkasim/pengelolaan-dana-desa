<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function index(): View
    {
        return view('pages.account', [
            'user' => auth()->user()
        ]);
    }

    public function updateProfile(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
        ]);

        $user = User::find(auth()->user()->id);
        $user->update($data);

        return back()->with('success', 'Profil berhasil diperbarui');
    }

    public function updatePassword(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'password' => 'required|confirmed',
        ]);

        $data['password'] = bcrypt($data['password']);

        $user = User::find(auth()->user()->id);
        $user->update($data);

        return back()->with('success', 'Password berhasil diperbarui');
    }
}
