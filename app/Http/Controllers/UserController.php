<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'email' => ['required','email','unique:users'],
            'password' => ['required','confirmed'],
            'profile' => ['required']
        ]);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'profile' => $request->profile,
            'picture' => base64_encode(file_get_contents($request->file('picture'))),
            'mime' => $request->file('picture')->getMimeType(),
            'role' => $request->role_id
        ]);
        return redirect('login');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        if (Auth::user()->role) {
            return view('front.history', ['projects'=>Auth::user()->project_headers()->withTrashed()->paginate(6)]);
        } else {
            return view('front.history', ['projects'=>Auth::user()->project_details()->withTrashed()->paginate(6)]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('front.profile', ['user'=>Auth::user()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => ['required'],
            'email' => ['required','email',Rule::unique('users')->ignore($user->id)],
            'password' => ['nullable','confirmed'],
            'profile' => ['required'],
            'picture' => ['nullable','mimetypes:image/*']
        ]);
        $user->name=$request->name;
        $user->email=$request->email;
        if (filled($request->password)) {
            $user->password=Hash::make($request->password);
        }
        if (filled($request->picture)) {
            $user->picture=base64_encode(file_get_contents($request->file('picture')));
            $user->mime = $request->file('picture')->getMimeType();
        }
        $user->profile=$request->profile;
        $user->save();
        return redirect("profile");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    public function login(Request $request)
    {
        if (Auth::attempt(
            $request->validate([
            'email' => ['required'],
            'password' => ['required']
        ]), $request->remember
        )) {
            $request->session()->regenerate();

            return redirect('/');
        }
        return back()->withErrors([

        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

}
