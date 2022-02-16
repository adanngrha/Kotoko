<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\RequestStack;

class AccountController extends Controller
{
    public function index()
    {
        $users = User::with('profile')->get();
        $user = $users->find(auth()->id());

        return view('account.index', [
            'title' => 'Akun Saya',
            'user' => $user,
        ]);
    }

    // Edit Account
    public function showEdit()
    {
        $users = User::with('profile')->get();
        $user = $users->find(auth()->id());

        return view('account.edit', [
            'title' => 'Edit Akun',
            'user' => $user,
        ]);
    }

    public function editAccount(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required',
            'phone_number' => 'required',
            'gender' => 'required',
            'birth_date' => 'required',
        ]);

        Profile::where('user_id', auth()->id())
                    ->update($validated);

        return redirect('/account')->with('success', 'Profil berhasil diedit!');
    }
    // Edit Account

    // Change Email
    public function indexEmail()
    {
        return view('account.change-email', [
            'title' => 'Ubah Email'
        ]);
    }

    public function changeEmail(Request $request)
    {
        $validated = $request->validate([
            'old_email' => 'required|',
            'new_email' => 'required|',
        ]);
        $user = User::find(auth()->id());

        if ($user->email == $validated['old_email']) {
            $user->update([
                'email' => $validated['new_email'],
            ]);
            return redirect('account')->with('success', 'Email diupdate!');;
        }
        return redirect('changeEmail')->with('failed', 'Email lama salah!');
    }
    // Change Email

    // Change Password
    public function indexPass()
    {
        return view('account.change-password', [
            'title' => 'Ubah Password'
        ]);
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
                'password' => Hash::make($validated['new_password']),
            ]);

            return redirect('account')->with('success', 'Password diupdate!');
        }
        return redirect('changePass')->with('failed', 'Password salah!');
    }
    // Change Password
}
