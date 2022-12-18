<?php

namespace App\Http\Controllers;

use App\Models\ProjectHeader;
use Illuminate\Http\Request;

class ProjectHeaderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('index', ['list'=>ProjectHeader::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required'],
        ]);
        ProjectHeader::create([
            'title' => $request->title,
            'user_id' => $request->user()->id
        ]);
        return redirect('index', 302, [], true);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProjectHeader  $projectHeader
     * @return \Illuminate\Http\Response
     */
    public function show(ProjectHeader $projectHeader)
    {
        return view('show', ['project'=>$projectHeader]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProjectHeader  $projectHeader
     * @return \Illuminate\Http\Response
     */
    public function edit(ProjectHeader $projectHeader)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @param  \App\Models\ProjectHeader  $projectHeader
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProjectHeader $projectHeader)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProjectHeader  $projectHeader
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProjectHeader $projectHeader)
    {
        //
    }
}
