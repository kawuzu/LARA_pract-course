<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function edit()
    {
        return view('profile.edit');
    }

    public function update(Request $request)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email',
        ]);

        $user = auth()->user();
        $user->update($request->only('name','email'));

        return back()->with('success', 'Данные обновлены');
    }

    public function password(Request $request)
    {
        $request->validate([
            'password' => 'required|string|min=6'
        ]);

        $user = auth()->user();
        $user->update([
            'password' => bcrypt($request->password)
        ]);

        return back()->with('success', 'Пароль изменён');
    }
}
