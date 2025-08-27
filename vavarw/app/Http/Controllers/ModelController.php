<?php

namespace App\Http\Controllers;

use App\CarModel;
use App\Supplier;
use Illuminate\Http\Request;
use DB;

class ModelController extends Controller
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
        $models = DB::table('models')
            ->leftJoin('suppliers', 'models.supplier_id', '=', 'suppliers.id')
            ->select('models.*', 'suppliers.name as supplier')
            ->get();
        return view('models.index')->with('models', $models);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $suppliers = Supplier::all();
        return view('models.create')->with('suppliers', $suppliers);
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
        $model = new CarModel;
        $model->name = $request->input('name');
        $model->user_id = Auth()->user()->id;
        //$invoice->files = implode("|", $images);
        $model->price = $request->input('price');
        $model->supplier_id = $request->input('supplier_id');
        $model->supplier_price = $request->input('supplier_price');
        $model->save();
        return redirect('/models')->with('success','Model saved');
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
        $suppliers = Supplier::all();
        $model = CarModel::find($id);
        return view('models.edit')->with('model', $model)->with('suppliers', $suppliers);
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
        $model =  CarModel::find($id);
        $model->name = $request->input('name');
        $model->user_id = Auth()->user()->id;
        $model->price = $request->input('price');
        $model->supplier_id = $request->input('supplier_id');
        $model->supplier_price = $request->input('supplier_price');
        $model->save();
        return redirect('/models')->with('success','Model edited');
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
        $model = DB::table('models')->find($id);
        DB::table('models')->where('id', $id)->delete();
        return redirect('/models')->with('success','Model deleted');
    }
}
