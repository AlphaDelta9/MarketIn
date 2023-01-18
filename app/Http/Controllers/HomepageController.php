<?php

namespace App\Http\Controllers;

use App\Journal;
use App\Models\ProjectHeader;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class HomepageController extends Controller
{
    public function index(){
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->role) {
                $header = $user->project_headers->whereNull('deleted_at')->whereNull('finished_at');
                return view('front.homepage', ['active'=>$header->random($header->count()>3 ? 3 : $header->count()),
                'projects'=>ProjectHeader::inRandomOrder('id')->simplePaginate(3)]);
            }else {
                $detail = $user->project_details->whereNull('rejected_at')->whereNull('project_header.finished_at');
                return view('front.homepage', ['active'=>$detail->random($detail->count()>3 ? 3 : $detail->count()),
                'projects'=>ProjectHeader::inRandomOrder('id')->simplePaginate(3)]);
            }
        }else {
            return view('front.homepage', ['projects'=>ProjectHeader::inRandomOrder('id')->simplePaginate(6)]);
        }
    }


}
