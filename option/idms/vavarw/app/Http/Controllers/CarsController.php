<?php

namespace App\Http\Controllers;

use App\Car;
use Illuminate\Http\Request;
use DB;

class CarsController extends Controller
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
       // $cars = Car::all();
        $cars = DB::select("SELECT c.id, c.plate_number, c.model, c.manufacturing_year, c.model, c.owner, (SELECT SUM(t.amount) FROM charges t WHERE t.car_id = c.id ) as 'total_charges', (SELECT SUM(r.odometer_count) from roadmaps r WHERE r.plate = c.id) as 'total_odometer' FROM cars c");
     
        return view('cars.index')->with('cars', $cars);
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
        return view('cars.create');
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
        ]);
        $car = new Car;
        $car->plate_number = $request->input('plate_number');
        //$invoice->files = implode("|", $images);
        $car->manufacturing_year = $request->input('manufacturing_year');
        $car->model = $request->input('model');
        $car->owner = $request->input('owner');        
        $car->save();
        return redirect('/cars')->with('success','Car saved');
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
        $car = Car::find($id);
        $charges =  DB::table('charges')
        ->leftJoin('expenses', 'charges.expense_id', 'expenses.id')
        ->select('charges.*', 'expenses.name')
        ->where('car_id', $id)
        ->get();
        return view('cars.show')->with('car', $car)->with('charges', $charges);
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
        $car = Car::find($id);
        return view('cars.edit')->with('car', $car);
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
        $car =  Car::find($id);
        $car->plate_number = $request->input('plate_number');
        $car->manufacturing_year = $request->input('manufacturing_year');
        $car->model = $request->input('model');
        $car->owner = $request->input('owner');        
        $car->save();
        return redirect('/cars')->with('success','Car edited');
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
        $car = Car::find($id);
        $car->delete();
        return redirect('/cars')->with('success','Car deleted');
    }
}
