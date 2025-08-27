<?php

namespace App\Http\Controllers;

use App\Institution;
use Illuminate\Http\Request;

class InstitutionController extends Controller
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
        $institutions = Institution::all();
        return view('institutions.index')->with('institutions', $institutions);
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
        return view('institutions.create');
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
        $institution = new institution;
        $institution->name = $request->input('name');
        $institution->tin = $request->input('tin');
        $institution->save();
        return redirect('/institutions')->with('success','institution saved');
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
        $institution = Institution::find($id);
        return view('institutions.show')->with('institution', $institution)->with('payments', $institution->payments);
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
        $institution = Institution::find($id);
        return view('institutions.edit')->with('institution', $institution);
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
        $institution =  Institution::find($id);
        $institution->name = $request->input('name');
        $institution->tin = $request->input('tin');
        $institution->save();
        return redirect('/institutions')->with('success','institution edited');
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
        $institution = Institution::find($id);
        $institution->delete();
        return redirect('/institutions')->with('success','institution deleted');
    }
}
