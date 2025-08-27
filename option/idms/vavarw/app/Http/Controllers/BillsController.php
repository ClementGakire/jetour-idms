<?php

namespace App\Http\Controllers;

use App\Bill;
use App\Roadmap;
use App\Supplier;
use Illuminate\Http\Request;
use DB;

class BillsController extends Controller
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
        $bills = Bill::all();
        $bills = DB::table('bills')
            ->leftJoin('suppliers', 'bills.supplier_id', 'suppliers.id')
            ->leftJoin('roadmaps', 'bills.roadmap_id', 'roadmaps.id')
            ->select('bills.*', 'suppliers.name as name', 'roadmaps.purchase_order')
            ->get();
        return view('bills.index')->with('bills', $bills);
        //return view('projects.index')->with('projects', $projects);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $roadmaps = Roadmap::all();
        $suppliers = Supplier::all();
        return view('bills.create')->with('roadmaps', $roadmaps)->with('suppliers', $suppliers);
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
        $bill = new bill;
        $bill->supplier_id = $request->input('supplier_id');
        $bill->roadmap_id = $request->input('roadmap_id');  
        $bill->amount = $request->input('amount');
        $bill->quoted_amount = $request->input('quoted_amount');
        $bill->payment_date = $request->input('payment_date');        
        $bill->save();
        return redirect('/bills')->with('success','bill saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Institution  $institution
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $bills = Bill::find($id);
        return view('bills.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Institution  $institution
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $bill = Bill::find($id);
        $roadmaps = Roadmap::all();
        $suppliers = Supplier::all();
        return view('bills.edit')->with('bill', $bill)->with('roadmaps', $roadmaps)->with('suppliers', $suppliers);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Institution  $institution
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $bill =  Bill::find($id);
        $bill->supplier_id = $request->input('supplier_id');
        $bill->roadmap_id = $request->input('roadmap_id');  
        $bill->amount = $request->input('amount');
        $bill->quoted_amount = $request->input('quoted_amount');
        $bill->payment_date = $request->input('payment_date');  
        $bill->save();
        return redirect('/bills')->with('success','bill edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Institution  $institution
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $bill = Bill::find($id);
        $bill->delete();
        return redirect('/bills')->with('success','supplier deleted');
    }
}
