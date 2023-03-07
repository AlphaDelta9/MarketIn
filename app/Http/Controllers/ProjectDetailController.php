<?php

namespace App\Http\Controllers;

use App\Models\ProjectDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class ProjectDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        request()->flash();
        switch (request()->filter) {
            case 'Verified':
                return view('front.verify', ['projects'=>ProjectDetail::whereNotNull('verified_at')->paginate(6)->withQueryString()]);
                break;
            case 'Pending':
                return view('front.verify', ['projects'=>ProjectDetail::whereNotNull('price')->whereNull('verified_at')->paginate(6)->withQueryString()]);
                break;

            default:
                return view('front.verify', ['projects'=>ProjectDetail::whereNotNull('price')->paginate(6)]);
                break;
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('front.complete', ['projects'=>ProjectDetail::whereRelation('project_header','type_name','Iklan')->whereNull('completed_at')->paginate(6)]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $detail = ProjectDetail::create([
            'project_header_id' => $request->id,
            'user_id' => $request->user()->id
        ]);
        if($detail->project_header->type_name == 'Iklan'){
            $detail->accepted_at = Carbon::yesterday();
            $detail->save();
        }
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
        if(url()->current() == url('assign/'.$projectDetail->id))
        return view('front.assign', ['user'=>$projectDetail->user]);
        else
        return view('front.assign', ['user'=>$projectDetail->project_header->user]);
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
            $projectDetail->accepted_at = Carbon::today();
            $projectDetail->save();
            return back();
        }elseif ($request->isMethod('patch')){
            $request->validate([
                'price' => ['required'],
                'receipt' => ['required','max:512'],
            ]);
            $projectDetail->price = $request->price;
            $projectDetail->receipt = base64_encode(file_get_contents($request->file('receipt')));
            $projectDetail->type = $request->file('receipt')->getMimeType();
            $projectDetail->save();
            return redirect('project/'.$projectDetail->project_header_id);
        }else {
            $request->validate([
                'file' => ['nullable','max:512'],
                'status' => ['required'],
            ]);
            if($request->file('file')){
                $projectDetail->mime = $request->file('file')->getMimeType();
                $projectDetail->upload = base64_encode(file_get_contents($request->file('file')));
            }
            $projectDetail->overview = $request->status;
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
        if (request()->isMethod('patch')){
            $projectDetail->rejected_at = Carbon::now();
            $projectDetail->save();
        }
        $projectDetail->delete();//$projectDetail->delete()->project_header_id
        return back();
    }

    public function file(ProjectDetail $projectDetail)
    {
        return response(base64_decode($projectDetail->upload), 200, ['Content-Type' => $projectDetail->mime,]);
    }

    public function receipt(ProjectDetail $projectDetail)
    {
        return response(base64_decode($projectDetail->receipt), 200, ['Content-Type' => $projectDetail->type,]);
    }

    public function finalize(Request $request, ProjectDetail $projectDetail)
    {
        if($request->isMethod('post')){
            $projectDetail->completed_at = Carbon::now();
            $projectDetail->save();
            return back();
        }
        elseif($request->isMethod('delete')){
            $projectDetail->price = null;
            $projectDetail->save();
            return back()->withInput();
        }
        elseif($request->isMethod('patch')){
            $projectDetail->verified_at = Carbon::now();
            $projectDetail->save();
            return back()->withInput();
        }
        elseif($request->_token == csrf_token()){
            return view('front.pay', ['project'=>$projectDetail,'transaction'=>Str::orderedUuid()]);
        }
    }

}
