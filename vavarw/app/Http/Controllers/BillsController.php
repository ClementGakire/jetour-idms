<?php

namespace App\Http\Controllers;

use App\Bill;
use App\Roadmap;
use App\Supplier;
use App\Contractor;
use App\Car;
use App\Driver;
use App\User;
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
        $roadmaps = DB::table('roadmaps')
    ->join('users', 'roadmaps.user_id', '=', 'users.id')
    ->leftJoin('pos', 'roadmaps.purchase_order', 'pos.purchase_order')
    ->leftJoin('cars', 'roadmaps.plate', 'cars.id')
    ->leftJoin('contractors', 'roadmaps.contractor_id', 'contractors.id')
    ->leftJoin('drivers', 'roadmaps.driver_id', '=', 'drivers.id')
    ->leftJoin('charges', function($join) {
        $join->on('roadmaps.plate', '=', 'charges.car_id')
             ->on('roadmaps.id', '=', 'charges.roadmap'); // Check both plate and purchase order
    })
    ->leftJoin('suppliers', 'cars.supplier_id', '=', 'suppliers.id') // Join suppliers to cars
    ->select(
        'users.name',
        'cars.plate_number',
        'roadmaps.purchase_order',
        'drivers.name as driver',
        'roadmaps.institution',
        'roadmaps.created_on',
        'roadmaps.received_on',
        'roadmaps.amount',
        'roadmaps.id',
        'roadmaps.ebm_number',
        'roadmaps.odometer_count',
        'roadmaps.operator',
        'roadmaps.selling_price',
        'roadmaps.advance_cash',
        'roadmaps.advance_fuel',
        'roadmaps.status',
        'roadmaps.destination',
        'pos.amounts',
        'contractors.name as contractor',
        DB::raw('SUM(charges.amount) as total_charges'), // Sum of charges
        'suppliers.name as supplier' // Select supplier's name
    )
    ->groupBy(
        'users.name',
        'cars.plate_number',
        'roadmaps.purchase_order',
        'drivers.name',
        'roadmaps.institution',
        'roadmaps.created_on',
        'roadmaps.received_on',
        'roadmaps.amount',
        'roadmaps.id',
        'roadmaps.ebm_number',
        'roadmaps.odometer_count',
        'roadmaps.operator',
        'roadmaps.selling_price',
        'roadmaps.advance_cash',
        'roadmaps.advance_fuel',
        'roadmaps.status',
        'roadmaps.destination',
        'pos.amounts',
        'contractors.name',
        'suppliers.name' // Include supplier's name in groupBy
    )
    ->get();
        return view('bills.index')->with('bills', $bills)->with('roadmaps', $roadmaps);
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
