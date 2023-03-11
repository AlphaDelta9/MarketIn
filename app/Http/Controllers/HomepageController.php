<?php

namespace App\Http\Controllers;

use App\Journal;
use App\Models\ProjectHeader;
use App\Models\Type;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class HomepageController extends Controller
{
    //untuk home page
    public function index(){
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->role) {
                return view('front.homepage', ['active'=>Type::all(),
                    'projects'=>$user->project_headers()->whereNull(['deleted_at','finished_at'])->paginate(6)]);
            }elseif (filled($user->role)) {
                return view('front.homepage', ['active'=>$user->project_details()->whereNull('rejected_at')->whereRelation('project_header','finished_at',null)->get()->take(3),
                'projects'=>$user->city->project_headers()->inRandomOrder(ProjectHeader::count())->simplePaginate(6)]);
            }else {
                return redirect('verify');
            }
        }else {
            return view('front.homepage', ['projects'=>ProjectHeader::inRandomOrder(ProjectHeader::count())
            ->simplePaginate(6)]);
        }
    }

    //untuk guest page
    public function landing()
    {
        return(view('landing'));
    }
}
