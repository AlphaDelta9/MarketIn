<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;

class ChangePasswordController extends Controller
{
    public function update(Request $request){
        $rules = [
            'old_password' => 'required',
            'password' => 'required|confirmed|min:8',
        ];
        $message = [
            'password.confirmed' => 'Password baru anda tidak sama',
            'password.min' => 'Password baru anda minimal 8 karakter'
        ];
        $validator = Validator::make(Input::all(), $rules, $message);
        if ($validator -> fails()) {
            toastr()->error($validator->errors()->all()[0]);
            return redirect()->back()->withInput();
        }else{
            if(\Hash::check($request->old_password,\Auth::user()->password)){
                $user = User::find(\Auth::user()->id);
                $user->password = \Hash::make($request->password);
                $user->save();
                toastr()->success('Password Anda berhasil diubah');
                return redirect()->back();
            }else{
                toastr()->error('Password lama anda tidak sesuai, silahkan cek kembali');
                return redirect()->back();
            }
        }
    }
}
