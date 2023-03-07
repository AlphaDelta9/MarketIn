<?php

namespace App\Http\Controllers;

use App\Models\ProjectDetail;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('front.pay', ['project'=>ProjectDetail::find(request()->detail_id),'transaction'=>Str::orderedUuid()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'price' => ['required'],
            'receipt' => ['required','max:512'],
        ]);
        Transaction::create([
            'project_detail_id' => $request->detail_id,
            'title' => $request->title,
            'price' => $request->price,
            'receipt' => base64_encode(file_get_contents($request->file('receipt'))),
            'type' => $request->file('receipt')->getMimeType(),
            'status' => 'Pending'
        ]);
        return redirect('project/'.ProjectDetail::find($request->detail_id)->project_header_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update(Request $request, $id)
    {
        $transaction = Transaction::find($id);
        if ($request->isMethod('put')){
            $transaction->status = 'Approve';
            $transaction->transaction_detail->is_verified = 'Yes';
        }elseif (request()->isMethod('patch')){
            $transaction->status = 'Reject';
            $transaction->transaction_detail->is_verified = 'No';
        }
        $transaction->save();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
