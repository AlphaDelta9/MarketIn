<?php

namespace App\Http\Controllers;

use App\Models\ProjectDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

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
        return redirect('project/'.$request->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProjectDetail  $projectDetail
     * @return \Illuminate\Http\Response
     */
    public function show(ProjectDetail $projectDetail)
    {
        return view('front.assign', ['user'=>$projectDetail->user]);
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
        if ($request->isMethod('put')){
            $projectDetail->accepted_at = Carbon::now();
            $projectDetail->save();
            return redirect('project/'.$projectDetail->project_header_id);
        }elseif ($request->isMethod('patch')){
            $projectDetail->rejected_at = Carbon::now();
            $projectDetail->save();
            return $this->destroy($projectDetail);
        }else {
            $request->validate([
                'file' => ['required','max:512'],
            ]);
            $projectDetail->mime = $request->file('file')->getMimeType();
            $projectDetail->upload = base64_encode(file_get_contents($request->file('file')));
            $projectDetail->save();
            return redirect('history');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProjectDetail  $projectDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProjectDetail $projectDetail)
    {
        $projectDetail->delete();
        return redirect('project/'.$projectDetail->project_header_id);
    }

    public function file(ProjectDetail $projectDetail)
    {
        return response(base64_decode($projectDetail->upload), 200, ['Content-Type' => $projectDetail->mime,]);
    }
}
