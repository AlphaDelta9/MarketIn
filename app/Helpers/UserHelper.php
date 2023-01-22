<?php

function getUser()
{
//    session()->flush('token');
    if (session('token')) {
        $token = App\Models\LoginToken::where('token', session('token'))->first();
        return App\Models\User::find($token->user_id);
    } else {
        return null;
    }
}
