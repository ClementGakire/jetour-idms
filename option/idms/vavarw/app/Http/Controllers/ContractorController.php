<?php

namespace App\Http\Controllers;

use App\Contractor;
use Illuminate\Http\Request;

class ContractorController extends Controller
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
        $contractors = Contractor::all();
        return view('contractors.index')->with('contractors', $contractors);
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
        return view('contractors.create');
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
        $contractor = new contractor;
        $contractor->name = $request->input('name');
        $contractor->tin = $request->input('tin');
        $contractor->save();
        return redirect('/contractors')->with('success','contractor saved');
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
        $contractor = Contractor::find($id);
        return view('contractors.show')->with('contractor', $contractor)->with('payments', $contractor->payments);
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
        $contractor = Contractor::find($id);
        return view('contractors.edit')->with('contractor', $contractor);
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
        $contractor =  Contractor::find($id);
        $contractor->name = $request->input('name');
        $contractor->tin = $request->input('tin');
        $contractor->save();
        return redirect('/contractors')->with('success','contractor edited');
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
        $contractor = Contractor::find($id);
        $contractor->delete();
        return redirect('/contractors')->with('success','contractor deleted');
    }
}
