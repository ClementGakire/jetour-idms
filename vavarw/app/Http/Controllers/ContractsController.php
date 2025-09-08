<?php

namespace App\Http\Controllers;

use App\Contract;
use App\Institution;
use App\Car;
use Illuminate\Http\Request;
use DB;

class ContractsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $contracts = DB::table('contracts')
            ->leftJoin('institutions', 'contracts.client_id', 'institutions.id')
            ->leftJoin('cars', 'contracts.car_id', 'cars.id')
            ->select('contracts.*', 'institutions.name as client_name', 'cars.plate_number', 'cars.model')
            ->get();

        return view('contracts.index')->with('contracts', $contracts);
    }

    public function create()
    {
        $clients = Institution::all();
        $cars = Car::all();
        return view('contracts.create')->with('clients', $clients)->with('cars', $cars);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'file' => 'nullable|file|max:2048',
            'client_id' => 'nullable|exists:institutions,id',
            'car_id' => 'nullable|exists:cars,id',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
        ]);

        $fileName = null;
        if ($file = $request->file('file')) {
            $fileName = time()."_".$file->getClientOriginalName();
            $file->move(public_path('uploads/contracts'), $fileName);
        }

        $contract = new Contract;
        $contract->file = $fileName;
        $contract->client_id = $request->input('client_id');
        $contract->car_id = $request->input('car_id');
        $contract->start_date = $request->input('start_date');
        $contract->end_date = $request->input('end_date');
        $contract->save();

        return redirect('/contracts')->with('success', 'Contract saved');
    }

    public function show($id)
    {
        $contract = Contract::find($id);
        return view('contracts.show')->with('contract', $contract);
    }

    public function edit($id)
    {
        $contract = Contract::find($id);
        $clients = Institution::all();
        $cars = Car::all();
        return view('contracts.edit')->with('contract', $contract)->with('clients', $clients)->with('cars', $cars);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'file' => 'nullable|file|max:2048',
            'client_id' => 'nullable|exists:institutions,id',
            'car_id' => 'nullable|exists:cars,id',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
        ]);

        $contract = Contract::find($id);

        if ($file = $request->file('file')) {
            $fileName = time()."_".$file->getClientOriginalName();
            $file->move(public_path('uploads/contracts'), $fileName);
            $contract->file = $fileName;
        }

        $contract->client_id = $request->input('client_id');
        $contract->car_id = $request->input('car_id');
        $contract->start_date = $request->input('start_date');
        $contract->end_date = $request->input('end_date');
        $contract->save();

        return redirect('/contracts')->with('success', 'Contract updated');
    }

    public function destroy($id)
    {
        $contract = Contract::find($id);
        if ($contract) {
            $contract->delete();
        }
        return redirect('/contracts')->with('success', 'Contract deleted');
    }
}
