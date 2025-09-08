<?php

namespace App\Http\Controllers;

use App\Invoice;
use App\Institution;
use Illuminate\Http\Request;
use DB;
use App\User;
use App\Contractor;

class InvoiceController extends Controller
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
        //
        $invoices = DB::table('invoices')
            ->join('users', 'invoices.user_id', '=', 'users.id')
            ->leftJoin('payments', 'invoices.invoiceNumber', 'payments.invoiceNumber')
            ->leftJoin('contractors', 'invoices.contractor_id', 'contractors.id')
            ->select('users.name as username', 'invoices.invoiceNumber', 'invoices.institution','invoices.created_on', 'invoices.received_on', 'invoices.purchase_order', 'invoices.amount', 'invoices.id', 'invoices.ebm_number', 'payments.amounts', 'contractors.name')
            ->get();
       
        // $invoices = DB::table('invoices')->distinct()->get();
        return view('invoices.index')->with('invoices', $invoices);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $institutions = DB::table('institutions')->distinct()->get();
        $contractors = DB::table('contractors')->distinct()->get();
        return view('invoices.create')->with('institutions', $institutions)->with('contractors', $contractors);
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
            'institution' => 'required',
            'invoiceNumber' =>'required|unique:invoices|max:255',
            'created_on' => 'required',
            'amount' => 'required',
            'files' => 'nullable|max:1999',
        ]);
        $invoice = new invoice;
        $invoice->files = implode("|", $images);
        $invoice->user_id = Auth()->user()->id;
        $invoice->institution = $request->input('institution');
        $invoice->contractor_id = $request->input('contractor_id');
        $invoice->invoiceNumber = $request->input('invoiceNumber');
        $invoice->purchase_order = $request->input('purchase_order');
        $invoice->created_on = $request->input('created_on');
        $invoice->received_on = $request->input('received_on');
        $invoice->amount = $request->input('amount');
        $invoice->ebm_number = $request->input('ebm_number');
        $invoice->save();
        
       
        return redirect('/invoices')->with('success','invoice saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $invoice = Invoice::find($id);
        return view('invoices.show')->with('invoice', $invoice)->with('payments', $invoice->payments);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $institutions = Institution::all();
        $contractors = Contractor::all();
        $invoice = Invoice::find($id);
        return view('invoices.edit')->with('invoice', $invoice)->with('institutions', $institutions)->with('contractors', $contractors);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $invoice =  Invoice::find($id);
        $invoice->institution = $request->input('institution');
        $invoice->contractor_id = $request->input('contractor_id');
        $invoice->invoiceNumber = $request->input('invoiceNumber');
        $invoice->created_on = $request->input('created_on');
        $invoice->received_on = $request->input('received_on');
        $invoice->amount = $request->input('amount');
        $invoice->ebm_number = $request->input('ebm_number');
        $invoice->save();
        return redirect('/invoices')->with('success', 'invoice edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $invoice = Invoice::find($id);
        $invoice->delete();
        return redirect('/invoices')->with('success','invoice deleted');
    }
    public function users()
    {

        $users = User::all();
        return view('invoices.users')->with('users', $users);
    }
    public function userEdit($id)
    {
        $user = User::find($id);
        return view('invoices.userEdit')->with('user', $user);
    }
}
