<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class EmailPasswordController extends Controller
{
    public function indexEmail()
    {
        return view('account.change-email', [
            'title' => 'Ubah Email'
        ]);
    }

    public function indexPass()
    {
        return view('account.change-password', [
            'title' => 'Ubah Password'
        ]);
    }

    public function changeEmail(Request $request)
    {
        $validated = $request->validate([
            'old_email' => 'required|',
            'new_email' => 'required|',
        ]);
        $user = User::find(auth()->id());

        if ($user->email == $validated['old_email'])
        {
            $user->update([
                'email' => $validated['new_email'],
            ]);
            return redirect('/account')->with('success', 'Email diupdate!');;
        }
        return redirect('/change-email')->with('failed', 'Email lama salah!');
    }

    public function changePass(Request $request)
    {
        $validated = $request->validate([
            'old_password' => 'required|',
            'new_password' => 'required|',
            'new_password2' => 'required|same:new_password',
        ]);

        $user = User::find(auth()->id());

        if (Hash::check($validated['old_password'], $user->password)) {
            $user->update([
                'password' => bcrypt($validated['new_password']),
            ]);

            return redirect('/account')->with('success', 'Password diupdate!');
        }
        return redirect('/change-password')->with('failed', 'Password salah!');
    }
}
