<?php

namespace App\Http\Controllers;

use App\Models\LoginToken;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $r)
    {
        $data = $r->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email', $data['email'])->first();

        if ($user) {
            if (Hash::check($data['password'], $user->password)) {
                $token = rand() . time() . rand();
                LoginToken::create(['user_id' => $user->id, 'token' => $token]);

                session(['token' => $token]);
//                session()->save();

                return redirect()->route('page.home');
            } else {
                return back()->with('message', 'The email or password is incorrect');
            }
        } else {
            return back()->with('message', 'The email or password is incorrect');
        }
    }

    public function register(Request $r)
    {
        $data = $r->validate([
            'name' => 'required',
            'date_of_birth' => 'required|date|before:today',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:5',
            'role_id' => 'required|exists:user_roles,id'
        ]);

        $data['password'] = bcrypt($data['password']);

        User::create($data);

        return redirect()->route('page.login');
    }

    public function logout()
    {
        LoginToken::where('token', session('token'))->delete();

        session()->flush('token');

        return redirect()->route('page.home');
    }
}
