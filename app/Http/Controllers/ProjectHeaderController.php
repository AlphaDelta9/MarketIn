<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\ProjectHeader;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class ProjectHeaderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //untuk page daftar proyek
    public function index()
    {
        request()->flash();
        if (auth()->check() && auth()->user()->role){
            return view('front.material', ['cities'=>City::all(),'types'=>Type::all(),
            'projects'=>ProjectHeader::where('title', 'like', '%'.request()->search.'%')
            ->where('city_name', 'like', '%'.request()->city.'%')
            ->where('type_name', 'like', '%'.request()->type.'%')
            ->where('user_id', auth()->id())->paginate(6)->withQueryString()]);
        }
        elseif (url()->current() == url('search/')){
            return view('front.material', ['cities'=>City::all(),'types'=>Type::where('name', '!=', 'Iklan')->get(),
            'projects'=>ProjectHeader::where('title', 'like', '%'.request()->search.'%')
            ->where('city_name', 'like', '%'.request()->city.'%')->where('type_name', '!=', 'Iklan')
            ->where('type_name', 'like', '%'.request()->type.'%')->paginate(6)->withQueryString()]);
        }else {
            return view('front.iklanin', ['projects'=>auth()->user()->city->project_headers()
            ->where('title', 'like', '%'.request()->search.'%')
            ->where('type_name', 'Iklan')->paginate(6)->withQueryString()]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //untuk create project page
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
    //untuk kirim project ke database
    public function store(Request $request)
    {
        $request->city = Str::title($request->city);
        $request->validate([
            'title' => ['required'],
            'description' => ['required'],
            'city' => ['required', 'exists:cities,name'],
            'picture' => ['nullable','mimetypes:image/*','max:512'],
            'work' => ['required','date'],
            'budget' => ['required','numeric'],
        ]);
        return redirect('project/'.
        ProjectHeader::create([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => $request->user()->id,
            'type_name' => $request->type,
            'city_name' => $request->city,
            'picture' => base64_encode(file_get_contents($request->file('picture'))),
            'mime' => $request->file('picture')->getMimeType(),
            'asset' => $request->type=='Iklan' ? base64_encode(file_get_contents($request->file('asset'))) : '',
            'type' => $request->type=='Iklan' ? $request->file('asset')->getMimeType() : '',
            'work' => $request->work,
            'budget' => $request->budget,
        ])->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProjectHeader  $projectHeader
     * @return \Illuminate\Http\Response
     */
    //untuk project detail page
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
    //untuk update project page
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
    //untuk update project di database
    public function update(Request $request, ProjectHeader $projectHeader)
    {
        $request->city = Str::title($request->city);
        $request->validate([
            'title' => ['required'],
            'description' => ['required'],
            'city' => ['required', 'exists:cities,name'],
            'picture' => ['nullable','mimetypes:image/*','max:512'],
            'work' => ['required','date'],
            'budget' => ['required','numeric'],
        ]);
        $projectHeader->title=$request->title;
        $projectHeader->description=$request->description;
        $projectHeader->city_name=$request->city;
        if ($request->picture) {
            $projectHeader->picture=base64_encode(file_get_contents($request->file('picture')));
            $projectHeader->mime = $request->file('picture')->getMimeType();
        }
        if ($request->asset) {
            $projectHeader->asset = base64_encode(file_get_contents($request->file('asset')));
            $projectHeader->type = $request->file('asset')->getMimeType();
        }
        $projectHeader->work=$request->work;
        $projectHeader->budget=$request->budget;
        if($request->at>0) $projectHeader->updated_at = Carbon::now();
        elseif($request->at<0) $projectHeader->deleted_at = Carbon::now();
        if (!$request->at) {
            $detailController = new ProjectDetailController();
            foreach ($projectHeader->project_details as $detail) {
                $detailController->destroy($detail);
            }
        }
        $projectHeader->save();
        return redirect("project/$projectHeader->id");
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

    //akses aset iklanin
    public function file(ProjectHeader $projectHeader)
    {
        return response(base64_decode($projectHeader->asset), 200, ['Content-Type' => $projectHeader->type,]);
    }
}
