<?php

namespace App\Http\Controllers;

use App\Charge;
use App\Car;
use App\Expense;
use App\Roadmap;
use App\Driver;
use App\Supplier;
use Illuminate\Http\Request;
use DB;

class ChargesController extends Controller
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
        $charges = DB::table('charges')
            ->leftJoin('drivers', 'charges.driver_id', 'drivers.id')
            ->leftJoin('roadmaps', 'charges.roadmap', 'roadmaps.id')
            ->leftJoin('cars', 'charges.car_id', 'cars.id')
            ->leftJoin('suppliers', 'cars.supplier_id', 'suppliers.id')
            ->leftJoin('expenses', 'charges.expense_id', 'expenses.id')
            ->select('charges.*', 'cars.plate_number', 'expenses.name', 'roadmaps.purchase_order', 'drivers.name as driver', 'suppliers.name as supplier_name')
            ->get();
        //$charges = Charge::all();
       
        return view('charges.index')->with('charges', $charges);
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
        $drivers =  Driver::all();
        $roadmaps = Roadmap::all();
        $cars = Car::all();
        $expenses = Expense::all();
    $suppliers = Supplier::all();
    return view('charges.create')->with('cars', $cars)->with('expenses', $expenses)->with('roadmaps', $roadmaps)->with('drivers', $drivers)->with('suppliers', $suppliers);
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
             'files' => 'nullable|max:1999',
             'payment_mode' => 'nullable|array',
             'payment_mode.*' => 'in:MoMo,Bank Transfer,Cash,Check',
         ]);
        $charge = new charge;
        $charge->car_id = $request->input('car_id') ?: null;
        $charge->files = implode("|", $images);
        $charge->expense_id = $request->input('expense_id');
        $charge->driver_id = $request->input('driver_id');
        $charge->roadmap = $request->input('roadmap');
        $charge->amount = $request->input('amount');
        $charge->date = $request->input('date');
    // Derive supplier from the selected car's supplier_id (cars table) - null for office expenses
    $car = $request->input('car_id') ? Car::find($request->input('car_id')) : null;
    $charge->supplier = $car ? $car->supplier_id : null;
    $charge->payment_mode = $request->has('payment_mode') ? implode(",", $request->input('payment_mode')) : null;
        $charge->save();
        return redirect('/charges')->with('success','charge saved');
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
        $charge = Charge::find($id);
        return view('charges.show');
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
        $charge = Charge::find($id);
        $drivers =  Driver::all();
        $roadmaps = Roadmap::all();
        $cars = Car::all();
        $expenses = Expense::all();
        return view('charges.edit')->with('charge', $charge)->with('cars', $cars)->with('expenses', $expenses)->with('roadmaps', $roadmaps)->with('drivers', $drivers);
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
        $this->validate($request, [
            'payment_mode' => 'nullable|array',
            'payment_mode.*' => 'in:MoMo,Bank Transfer,Cash,Check',
        ]);

        $charge =  Charge::find($id);
        $charge->car_id = $request->input('car_id') ?: null;
        $charge->expense_id = $request->input('expense_id');
        $charge->driver_id = $request->input('driver_id');
        $charge->roadmap = $request->input('roadmap');
        $charge->amount = $request->input('amount'); 
        $charge->date = $request->input('date');
    // Derive supplier from the selected car's supplier_id on update as well - null for office expenses
    $car = $request->input('car_id') ? Car::find($request->input('car_id')) : null;
    $charge->supplier = $car ? $car->supplier_id : null;
        $charge->payment_mode = $request->has('payment_mode') ? implode(",", $request->input('payment_mode')) : null;
        $charge->save();
        return redirect('/charges')->with('success','charge edited');
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
        $charge = Charge::find($id);
        $charge->delete();
        return redirect('/charges')->with('success','Expense deleted');
    }
}
