<?php

namespace App\Http\Controllers;

use App\Models\City;
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
    //untuk login page
    public function index()
    {
        return view('auth.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //untuk register page
    public function create(Request $request)
    {
        return view('auth.register', ['role'=>$request->role,'cities'=>City::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //kirim data ke database
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'email' => ['required','email','unique:users'],
            'password' => ['required','confirmed'],
            'city' => ['required', 'exists:cities,name'],
            'profile' => ['required'],
            'picture' => ['required','max:512','mimetypes:image/*']
        ]);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'city_name' => $request->city,
            'profile' => $request->profile,
            'picture' => base64_encode(file_get_contents($request->file('picture'))),
            'mime' => $request->file('picture')->getMimeType(),
            'role' => $request->role == 'pengguna'
        ]);
        return redirect('login');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    //untuk history page
    public function show(User $user)
    {
        request()->flash(); //agar input value tetap ada
        if (Auth::user()->role) {
            switch (request()->filter) {
                case 'Done':
                    return view('front.history', ['projects'=>Auth::user()->project_headers()->whereNotNull('finished_at')->paginate(6)->withQueryString()]);
                    break;
                case 'Active':
                    return view('front.history', ['projects'=>Auth::user()->project_headers()->whereNull('finished_at')->paginate(6)->withQueryString()]);
                    break;

                default:
                    return view('front.history', ['projects'=>Auth::user()->project_headers()->withTrashed()->paginate(6)]);
                    break;
            }
        } else {
            switch (request()->filter) {
                case 'Accepted':
                    return view('front.history', ['projects'=>Auth::user()->project_details()->whereNotNull('accepted_at')->paginate(6)->withQueryString()]);
                    break;
                case 'Pending':
                    return view('front.history', ['projects'=>Auth::user()->project_details()->whereNull('accepted_at')->paginate(6)->withQueryString()]);
                    break;

                default:
                    return view('front.history', ['projects'=>Auth::user()->project_details()->withTrashed()->paginate(6)]);
                    break;
            }
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
        return view('front.profile', ['user'=>Auth::user(),'cities'=>City::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    //update user di database
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => ['required'],
            'email' => ['required','email',Rule::unique('users')->ignore($user->id)],
            'password' => ['nullable','confirmed'],
            'profile' => ['required'],
            'city' => ['required', 'exists:cities,name'],
            'picture' => ['nullable','mimetypes:image/*','max:512']
        ]);
        $user->name=$request->name;
        $user->email=$request->email;
        $user->city_name = $request->city;
        if (filled($request->password)) {
            $user->password=Hash::make($request->password);
        }
        if (filled($request->picture)) {
            $user->picture=base64_encode(file_get_contents($request->file('picture')));
            $user->mime = $request->file('picture')->getMimeType();
        }
        $user->profile=$request->profile;
        $user->save();
        return redirect('profile')->with('message', 'Profile updated!');
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

    //proses login
    public function login(Request $request)
    {
        if (Auth::attempt(
            $request->validate([
            'email' => ['required','email'],
            'password' => ['required']
        ]), $request->remember
        )) {
            $request->session()->regenerate();

            return redirect('/home');
        }
        return back()->withErrors([
            'password' => 'The credentials do not match.',
        ]);
    }

    //proses logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

}
