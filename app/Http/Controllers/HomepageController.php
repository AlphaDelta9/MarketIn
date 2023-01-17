<?php

namespace App\Http\Controllers;

use App\Journal;
use App\Models\ProjectHeader;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class HomepageController extends Controller
{
    public function index(){
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->role) {
                return view('front.homepage', ['active'=>$user->project_headers->random($user->project_headers->count()>3 ? 3 : 0),'projects'=>ProjectHeader::inRandomOrder('id')->simplePaginate(3)]);
            }else {
                return view('front.homepage', ['active'=>$user->project_headers->random($user->project_headers->count()>3 ? 3 : 0),'projects'=>ProjectHeader::inRandomOrder('id')->simplePaginate(3)]);
            }
        }else {
            return view('front.homepage', ['projects'=>ProjectHeader::inRandomOrder('id')->simplePaginate(6)]);
        }
    }


}
