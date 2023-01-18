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
        return view('index', ['list'=>ProjectHeader::paginate(6)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('front.create', ['cities'=>City::all()]);
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
            'description' => ['required'],
            'city' => ['required', 'exists:cities,name'],
        ]);
        ProjectHeader::create([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => $request->user()->id,
            'city_name' => $request->city
        ]);
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProjectHeader  $projectHeader
     * @return \Illuminate\Http\Response
     */
    public function show(ProjectHeader $projectHeader)
    {
        return view('front.detail', ['project'=>$projectHeader,'cities'=>City::all()]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProjectHeader  $projectHeader
     * @return \Illuminate\Http\Response
     */
    public function edit(ProjectHeader $projectHeader)
    {
        return view('front.update', ['project'=>$projectHeader,'cities'=>City::all()]);
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
            'description' => ['required'],
            'city' => ['required', 'exists:cities,name'],
        ]);
        $projectHeader->title=$request->title;
        $projectHeader->description=$request->description;
        $projectHeader->city_name=$request->city;
        $projectHeader->save();
        return redirect("edit/$projectHeader->id");
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
