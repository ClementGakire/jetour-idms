<?php

namespace App\Http\Controllers;

use App\Payment;
use App\Institution;
use App\Invoice;
use Illuminate\Http\Request;
use App\User;
use DB;

class PaymentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // //
        // $payments = DB::table('users')
        //     ->join('payments', 'users.id', '=', 'payments.user_id')
        //     ->select('users.name', 'payments.*')
        //     ->get();
       $payments = DB::table('payments')
            ->join('users', 'payments.user_id', '=', 'users.id')
            ->leftJoin('invoices', 'payments.invoiceNumber', 'invoices.invoiceNumber')
            ->leftJoin('contractors', 'invoices.contractor_id', 'contractors.id')
            ->select('users.name as username','payments.*', 'contractors.name')
            ->get();
        // $payments = Payment::all();
        return view('payments.index')->with('payments', $payments);
    }
    public function getStates($institution) 
    {
        $ids = DB::table("invoices")->where("institution",$institution)->pluck("invoiceNumber","invoiceNumber");
        return json_encode($ids);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $institutions = Institution::all();
        $invoices = DB::table('invoice')->distinct()->get();
        return view('payments.create')->with('institutions', $institutions)->with('invoices', $invoices);
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
        $images=array();
        if($files=$request->file('files')){
            foreach($files as $file){
                $name=$file->getClientOriginalName();
                $file->move('images',$name);
                $images[]=$name;
            }
        }
        $this->validate($request, [
            'voucherNo' => 'required',
            'institution' => 'required',
            'files' => 'nullable|max:1999',
        ]);
        $payment = new payment;
        $payment->user_id = Auth()->user()->id;
        $payment->files = implode("|", $images);
        $payment->voucherNo = $request->input('voucherNo');
        $payment->institution = $request->input('institution');
        $payment->invoiceNumber = $request->input('invoiceNumber');
        $payment->payment_date = $request->input('paymentDate');
        $payment->amounts = $request->input('amount');
        $payment->save();
        return redirect('/payments')->with('success','payment saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $payment = Payment::find($id);
        return view('payments.show')->with('payment', $payment);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $institutions = Institution::all();
        $payment = Payment::find($id);
        return view('payments.edit')->with('payment', $payment)->with('institutions', $institutions);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $payment =  Payment::find($id);
        $payment->voucherNo = $request->input('voucherNo');
        $payment->institution = $request->input('institution');
        $payment->invoiceNumber = $request->input('invoiceNumber');
        $payment->payment_date = $request->input('paymentDate');
        $payment->amounts = $request->input('amount');
        $payment->save();
        return redirect('/payments')->with('success','payment edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $payment = Payment::find($id);
        $payment->delete();
        return redirect('/payments')->with('success','payment deleted');
    }
}
