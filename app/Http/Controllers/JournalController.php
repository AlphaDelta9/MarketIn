<?php

namespace App\Http\Controllers;

use App\Journal;
use Illuminate\Http\Request;

class JournalController extends Controller
{
    public function index(){
        $headline = Journal::orderBy('id','desc')->first();
        $journal = Journal::where('id','!=',$headline->id)->orderBy('id','desc')->get();
        return view('front.journal.index', compact('journal','headline'));
    }
    
    public function show($slug){
        $journal = Journal::whereSlug($slug)->first();
        return view('front.journal.show',compact('journal'));
    }
    
}