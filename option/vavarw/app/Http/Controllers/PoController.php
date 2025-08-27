<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Po;
use App\Institution;
use App\Invoice;
use DB;

class PoController extends Controller
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
        // $pos = Po::all();    
        // $pos = DB::table('users')
        // ->join('pos', 'users.id', '=', 'pos.user_id')
        // ->select('users.name', 'pos.*')
        // ->get();   
        $pos = DB::table('pos')
        ->join('users', 'pos.user_id', '=', 'users.id')
        ->leftJoin('roadmaps', 'pos.purchase_order', 'roadmaps.purchase_order')
        ->leftJoin('contractors', 'roadmaps.contractor_id', 'contractors.id')
        ->select('users.name', 'roadmaps.purchase_order', 'roadmaps.institution','pos.*', 'contractors.name as contractor')
        ->get();
        return view('roadmap.index')->with('pos', $pos);
    }
    public function getStates($institution) 
    {
        $ids = DB::table("roadmaps")->where("institution",$institution)->pluck("purchase_order","purchase_order");
        return json_encode($ids);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $institutions = Institution::orderBy('name', 'asc')->get();
        $roadmaps = DB::table('roadmaps')->distinct()->get();
        return view('roadmap.create')->with('institutions', $institutions)->with('roadmaps', $roadmaps);
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
            'files' => 'nullable|max:1999',
        ]);
        $po = new po;
        $po->user_id = Auth()->user()->id;
        $po->files = implode("|", $images);
        $po->rmNo = $request->input('voucherNo');
        $po->institution = $request->input('institution');
        $po->purchase_order = $request->input('purchase_order');
        $po->payment_date = $request->input('payment_date');
        $po->amounts = $request->input('amount');
        $po->save();
        return redirect('/roadmap')->with('success','operation saved');
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
        $roadmap = Po::find($id);
        return view('roadmap.show')->with('roadmap', $roadmap);
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
        $institutions = Institution::orderBy('name', 'asc')->get();
        $po = Po::find($id);
        return view('roadmap.edit')->with('po', $po)->with('institutions', $institutions);
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
        ]);
        $po = Po::find($id);
        $po->user_id = Auth()->user()->id;
        $po->files = implode("|", $images);
        $po->rmNo = $request->input('voucherNo');
        $po->institution = $request->input('institution');
        $po->purchase_order = $request->input('purchase_order');
        $po->payment_date = $request->input('payment_date');
        $po->amounts = $request->input('amount');
        $po->save();
        return redirect('/roadmap')->with('success','operation saved');
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
        $roadmap = Po::find($id);
        $roadmap->delete();
        return redirect('/roadmap')->with('success','operation deleted');
    }
}
