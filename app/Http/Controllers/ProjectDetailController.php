<?php

namespace App\Http\Controllers;

use App\Models\ProjectDetail;
use Illuminate\Http\Request;

class ProjectDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        ProjectDetail::create([
            'project_header_id' => $request->id,
            'user_id' => $request->user()->id
        ]);
        return redirect('show/'.$request->id, 302, [], true);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProjectDetail  $projectDetail
     * @return \Illuminate\Http\Response
     */
    public function show(ProjectDetail $projectDetail)
    {
        return view('detail', ['user'=>$projectDetail->user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProjectDetail  $projectDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(ProjectDetail $projectDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProjectDetail  $projectDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProjectDetail $projectDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProjectDetail  $projectDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProjectDetail $projectDetail)
    {
        //
    }
}
