<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;

class LoginController extends Controller
{
    public function login() {
        return view('auth.login', [
            'title' => 'Welcome to Kotoko!',
        ]);
    }

    public function register() {
        return view('auth.register', [
            'title' => 'Welcome to Kotoko!'
        ]);
    }

    public function addRegister(Request $request) {
        $request->validate([
            'username'=>'required|alpha_dash|unique:users,username',
            'email'=>'required|email|unique:users',
            'password'=>'min:6|required_with:password2|same:password2',
            'password2'=>'min:6',
        ]);

        $user=User::create([
            'username'=>$request->username,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
        ]);
        $user->assignRole($request->role);

        Profile::create([
            'user_id' => $user['id'],
        ]);

        return redirect('/login');
    }

    public function addLogin(Request $request) {
        $request->validate([
            'username' => 'required|',
            'password' => 'min:6|',
        ]);

        $user=User::where('username', $request->username)->first();
        if($user) {
            if(Hash::check($request->password, $user->password)) {
                if($user->hasRole('buyer')) {
                    Auth::login($user);
                    return redirect('/');
                } elseif ($user->hasRole('seller')) {
                    Auth::login($user);
                    return redirect('/products');
                }
            }
            return redirect('login');
        }
        return redirect('login');
    }

    public function logout() {
        auth()->logout();
        Session::flush();
        return redirect('/');
    }
}
