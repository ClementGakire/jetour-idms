<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Invoice;
use App\Institution;
use App\Roadmap;
use App\Contractor;
use App\Car;
use App\Driver;
use DB;
use App\User;

class RoadmapController extends Controller
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
        // $roadmaps = Roadmap::all();
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



return view('po.index')->with('roadmaps', $roadmaps);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $cars = DB::table('cars')
            ->leftJoin('suppliers', 'cars.supplier_id', 'suppliers.id')
            ->select('cars.*', 'suppliers.name as supplier')
            ->get();
        $drivers = Driver::all();
        $institutions = Institution::orderBy('name', 'asc')->get();
        $contractors = Contractor::orderBy('name', 'asc')->get();
        return view('po.create')->with('institutions', $institutions)->with('contractors', $contractors)->with('cars', $cars)->with('drivers', $drivers);
    }
    public function export()
    {
        return view('po.export');
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
            'purchase_order' => 'required',        
            'files' => 'nullable|max:1999',
        ]);

        $roadmap = new roadmap;
        $roadmap->user_id = Auth()->user()->id;
        $roadmap->files = implode("|", $images);
        $roadmap->institution = $request->input('institution');
        $roadmap->contractor_id = $request->input('contractor_id');
        $roadmap->purchase_order = $request->input('purchase_order');
        $roadmap->created_on = $request->input('created_on');
        $roadmap->received_on = $request->input('received_on');
        $roadmap->amount = $request->input('amount');
        $roadmap->selling_price = $request->input('selling_price');
        $roadmap->operator = $request->input('operator');
        $roadmap->odometer_start = $request->input('odometer_start');
        $roadmap->odometer_end = $request->input('odometer_end');
        $roadmap->odometer_count = $request->input('odometer_end')-$request->input('odometer_start');
        $roadmap->ebm_number = $request->input('ebm_number');
        $roadmap->total_amount = ($request->input('ebm_number') * $request->input('amount'));
        $roadmap->driver_id = $request->input('driver_id');
        $roadmap->plate = $request->input('car_id');
        $roadmap->advance_fuel = $request->input('advance_fuel');
        $roadmap->advance_cash = $request->input('advance_cash');
        $roadmap->destination = $request->input('destination');
        $roadmap->save();
        return redirect('/po')->with('success','operation saved');
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
        $roadmap = Roadmap::find($id);
        return view('po.show')->with('roadmap', $roadmap);
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
        $drivers = Driver::all();
        $cars = Car::all();
        $institutions = Institution::orderBy('name', 'asc')->get();
        $contractors = Contractor::orderBy('name', 'asc')->get();
        // $roadmap = Roadmap::find($id);
        $roadmap = Roadmap::where('roadmaps.id', $id)
            ->join('cars', 'roadmaps.plate', '=', 'cars.id')
            ->join('drivers', 'roadmaps.driver_id', '=', 'drivers.id')
            ->select('roadmaps.*', 'cars.plate_number', 'drivers.name')
            ->first();
        return view('po.edit')->with('roadmap', $roadmap)->with('institutions', $institutions)->with('contractors', $contractors)->with('drivers', $drivers)->with('cars', $cars);
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
            'files' => 'nullable|max:1999',
            'created_on' => 'required',
            'amount' => 'required'
        ]);

        $roadmap = Roadmap::find($id);
        $roadmap->user_id = Auth()->user()->id;
        $roadmap->files = implode("|", $images);
        $roadmap->institution = $request->input('institution');
        $roadmap->contractor_id = $request->input('contractor_id');
        $roadmap->purchase_order = $request->input('purchase_order');
        $roadmap->created_on = $request->input('created_on');
        $roadmap->received_on = $request->input('received_on');
        $roadmap->amount = $request->input('amount');
        $roadmap->selling_price = $request->input('selling_price');
        $roadmap->operator = $request->input('operator');
        $roadmap->odometer_start = $request->input('odometer_start');
        $roadmap->odometer_end = $request->input('odometer_end');
        $roadmap->odometer_count = $request->input('odometer_end')-$request->input('odometer_start');
        $roadmap->ebm_number = $request->input('ebm_number');
        $roadmap->total_amount = ($request->input('ebm_number') * $request->input('amount'));
        $roadmap->driver_id = $request->input('driver_id');
        $roadmap->plate = $request->input('car_id');
        $roadmap->advance_fuel = $request->input('advance_fuel');
        $roadmap->advance_cash = $request->input('advance_cash');
        $roadmap->destination = $request->input('destination');
        $roadmap->status = $request->input('status');
        $roadmap->save();
        
       
        return redirect('/po')->with('success','operation edited');
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
        $roadmap = Roadmap::find($id);
        $roadmap->delete();
        return redirect('/po')->with('success','operation deleted');
    }
    
}
