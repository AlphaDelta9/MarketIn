<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\ProjectHeader;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
        return view('create', ['city'=>City::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->city = Str::title($request->city);
        $request->validate([
            'title' => ['required'],
            'city' => ['required', 'exists:cities,name'],
        ]);
        ProjectHeader::create([
            'title' => $request->title,
            'user_id' => $request->user()->id,
            'city_name' => $request->city
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
        return view('show', ['project'=>$projectHeader,'detail'=>auth()->user()
        ->projectDetails->find($projectHeader->id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProjectHeader  $projectHeader
     * @return \Illuminate\Http\Response
     */
    public function edit(ProjectHeader $projectHeader)
    {
        return view('update', ['project'=>$projectHeader,'city'=>City::all()]);
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
        $request->city = Str::title($request->city);
        $request->validate([
            'title' => ['required'],
            'city' => ['required', 'exists:cities,name'],
        ]);
        $projectHeader->title=$request->title;
        $projectHeader->city_name=$request->city;
        $projectHeader->save();
        return redirect("edit/$projectHeader->id", 302, [], true);
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
