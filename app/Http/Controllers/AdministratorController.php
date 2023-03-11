<?php

namespace App\Http\Controllers;

use App\Models\ProjectDetail;
use App\Models\Transaction;
use Illuminate\Http\Request;

class AdministratorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //untuk page admin
    public function index()
    {
        request()->flash();
        if (url()->current() == url('verify/')){
        switch (request()->filter) {
            case 'Verified':
                return view('front.verify-payment', ['projects'=>Transaction::whereRelation('transaction_detail','is_verified','Yes')->paginate(6)->withQueryString()]);
                break;
            case 'Pending':
                return view('front.verify-payment', ['projects'=>Transaction::where('status','Pending')->paginate(6)->withQueryString()]);
                break;
            default:
                return view('front.verify-payment', ['projects'=>Transaction::paginate(6)]);
                break;
            }
        }
        elseif (url()->current() == url('complete/')){
            switch (request()->filter) {
                case 'Verified':
                    return view('front.verify-advertising', ['projects'=>ProjectDetail::whereRelation('project_header','type_name','Iklan')->whereNull('completed_at')->paginate(6)->withQueryString()]);
                    break;
                case 'Pending':
                    return view('front.verify-advertising', ['projects'=>ProjectDetail::whereNull('completed_at')->paginate(6)->withQueryString()]);
                    break;
                default:
                    return view('front.verify-advertising', ['projects'=>ProjectDetail::whereRelation('project_header','type_name','Iklan')->whereNull('completed_at')->paginate(6)]);
                break;
            }
        }
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //untuk akses bukti bayar/iklan
    public function show($id)
    {
        if (url()->current() == url('verify/'.$id)){
            $projectDetail = ProjectDetail::find($id);
            return response(base64_decode($projectDetail->receipt), 200, ['Content-Type' => $projectDetail->type,]);
        }
        elseif (url()->current() == url('complete/'.$id)){
            $transaction = Transaction::find($id);
            return response(base64_decode($transaction->upload), 200, ['Content-Type' => $transaction->mime,]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //untuk verifikasi iklan/payment
    public function update(Request $request, $id)
    {
        if($request->isMethod('post')){
            $projectDetail = ProjectDetail::find($id);
            $projectDetail->is_verified = 'Yes';
            $projectDetail->save();
            return back();
        }
        elseif($request->isMethod('patch')){
            $transaction = Transaction::find($id);
            $transaction->is_verified = 'Yes';
            $transaction->save();
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //reject bukti iklan/pembayaran
    public function destroy($id)
    {
        if(request()->isMethod('post')){
            $projectDetail = ProjectDetail::find($id);
            $projectDetail->status = 'Reject';
            $projectDetail->save();
            return back();
        }
        elseif(request()->isMethod('patch')){
            $transaction = Transaction::find($id);
            $transaction->status = 'Reject';
            $transaction->save();
            return back();
        }
    }
}
