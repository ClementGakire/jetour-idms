<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Institution;
use App\Fuel;
use App\Contractor;

class fuelController extends Controller
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
        // $fuels = Fuel::all();
        $fuels = DB::table('fuels')
            ->leftJoin('contractors', 'fuels.contractor_id', 'contractors.id')
            ->select('fuels.*', 'contractors.name as contractor')
            ->get();
         $reports = DB::select("SELECT i.name, (SELECT SUM(f.totalprice) FROM fuels f WHERE f.institution = i.name ) as 'total_amount', (SELECT SUM(f.fuel) FROM fuels f WHERE f.institution = i.name ) as 'total_fuel'  FROM institutions i");
        return view('fuel.index')->with('fuels', $fuels)->with('reports', $reports);
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
        $contractors = DB::table('contractors')->distinct()->get();
        return view('fuel.create')->with('institutions', $institutions)->with('contractors', $contractors);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $images=array();
        if($files=$request->file('files')){
            foreach($files as $file){
                $name=$file->getClientOriginalName();
                $file->move('images',$name);
                $images[]=$name;
            }
        }
        
         $this->validate($request, [
             'rm_no' => 'unique:fuels|max:255',
             'files' => 'nullable|max:1999',
         ]);
      
        $fuel = new fuel;
        $fuel->user_id = Auth()->user()->id;
        $fuel->files = implode("|", $images);
        $fuel->vehicleNo = $request->input('vehicleNo');
        $fuel->vehicleOwner = $request->input('vehicleOwner');
        $fuel->date = $request->input('date');
        $fuel->rm_no = $request->input('rm_no');
        $fuel->place = $request->input('place');
        $fuel->institution = $request->input('institution');
        $fuel->contractor_id = $request->input('contractor_id');
        $fuel->fuel = $request->input('fuel');
        $fuel->cash = $request->input('cash');
        $fuel->days = $request->input('days');
        $fuel->unitprice = $request->input('unitprice');
        $fuel->totalprice = $request->input('unitprice')*$request->input('days');
        $fuel->p_o_number = $request->input('p_o_number');
        $fuel->save();
        // return view('fuel.index')->with('success', 'Service Saved Successfully');
        return redirect('/fuel')->with('success','fuel entry saved');

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
        $fuel = Fuel::find($id);
        return view('fuel.show')->with('fuel', $fuel);
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
        $fuel = Fuel::find($id);
        $institutions = Institution::all();
        $contractors = Contractor::all();
        return view('fuel.edit')->with('fuel', $fuel)->with('institutions', $institutions)->with('contractors', $contractors);
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
        $fuel =  Fuel::find($id);
        $fuel->user_id = Auth()->user()->id;
        $fuel->vehicleNo = $request->input('vehicleNo');
        $fuel->vehicleOwner = $request->input('vehicleOwner');
        $fuel->contractor_id = $request->input('contractor_id');
        $fuel->date = $request->input('date');
        $fuel->rm_no = $request->input('rm_no');
        $fuel->place = $request->input('place');
        $fuel->institution = $request->input('institution');
        $fuel->fuel = $request->input('fuel');
        $fuel->days = $request->input('days');
        $fuel->unitprice = $request->input('unitprice');
        $fuel->totalprice = $request->input('unitprice')*$request->input('days');
        $fuel->p_o_number = $request->input('p_o_number');
        $fuel->save();
        // return view('fuel.index')->with('success', 'Service Saved Successfully');
        return redirect('/fuel')->with('success','fuel entry edited');

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
        $fuel = Fuel::find($id);
        $fuel->delete();
        return redirect('/fuel')->with('success','fuel deleted');
    }
}
