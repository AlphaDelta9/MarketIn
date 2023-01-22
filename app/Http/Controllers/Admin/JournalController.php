<?php

namespace App\Http\Controllers\Admin;

use App\Journal;
use SoulDoit\DataTable\SSP;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JournalController extends Controller
{
    public function index(){
        return view('admin.journal.index');
    }

    public function indexSSP(Request $request){
        $dt = [
            ['db'=>'name', 'dt'=>0],
            ['db'=>'created_at', 'dt'=>1],
            ['db'=>'slug','dt'=>2,'formatter'=>function($value,$model){
                return '<div class="d-inline-flex">
                            <a class="pr-1 dropdown-toggle hide-arrow text-primary" data-toggle="dropdown">
                                <i class="font-medium-4" data-feather="more-vertical"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="'.route('admin.journal.edit',$value).'" class="dropdown-item">
                                    <i class="font-small-4 mr-50" data-feather="edit"></i>
                                    Edit
                                </a>
                                <a href="javascript:void(0)" data-url="'.route('admin.journal.destroy',$value).'" class="dropdown-item deleteAjax" data-msg="Deleted data cannot be restore">
                                    <i class="font-small-4 mr-50" data-feather="trash-2"></i>
                                    Delete
                                </a>
                            </div>
                        </div>';
            }],
            ['db'=>'id','dt'=>9],
        ];

        $dt_obj = new SSP('journal', $dt);
        $result = $dt_obj;
        $dt_arr = $result->getDtArr();
        return response()->json($dt_arr)->header('Content-Type','application/json'); 
    }
    
    public function create(){
        return view('admin.journal.create');
    }

    public function store(Request $request){
        $journal = new Journal;
        $journal->name = $request->name;
        $journal->content = $request->content;
        $journal->summary = $request->summary;

        $journal->image = '/storage/journal/'.time().'.'.$request->image->getClientOriginalExtension();
        \Storage::put('public/journal/'.time().'.'.$request->image->getClientOriginalExtension(), file_get_contents($request->image));
        $journal->save();
        
        return redirect()->route('admin.journal');
    }

    public function edit($slug){
        $journal = Journal::whereSlug($slug)->first();
        return view('admin.journal.edit',compact('journal'));
    }

    public function update($slug, Request $request){
        $journal = Journal::whereSlug($slug)->first();
        $journal->name = $request->name;
        $journal->slug = $request->slug;
        $journal->content = $request->content;
        $journal->summary = $request->summary;

        if($request->image){
            $journal->image = '/storage/journal/'.time().'.'.$request->image->getClientOriginalExtension();
            \Storage::put('public/journal/'.time().'.'.$request->image->getClientOriginalExtension(), file_get_contents($request->image));
        }
        $journal->save();
        
        return redirect()->route('admin.journal');
    }
    
    public function image(Request $request){
        $path = '/storage/journal/be-img-'.time().'.'.$request->file->getClientOriginalExtension();
        \Storage::put('public/journal/be-img-'.time().'.'.$request->file->getClientOriginalExtension(), file_get_contents($request->file));
        
        return response()->json([
            'status' => 'success',
            'url_path' => $path
        ],200);
    }

    public function destroy($slug){
        $journal = Journal::whereSlug($slug)->first();
        \Storage::delete(str_replace('storage','public',$journal->image));
        $journal->delete();

        return response()->json([
            'status' => 'success',
            'message' => $journal->name.' successfully deleted'
        ],200);
    }
}
