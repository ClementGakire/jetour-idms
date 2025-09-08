<?php

namespace App\Http\Controllers;

use App\Payment;
use App\Institution;
use App\Invoice;
use App\Car;
use Illuminate\Http\Request;
use App\User;
use DB;
use App\Driver;

class PaymentController extends Controller
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
        // //
        // $payments = DB::table('users')
        //     ->join('payments', 'users.id', '=', 'payments.user_id')
        //     ->select('users.name', 'payments.*')
        //     ->get();
        $v8s = DB::table('payments')
            ->join('users', 'payments.user_id', '=', 'users.id')
                ->leftJoin('drivers', 'payments.driver_id', '=', 'drivers.id')
                ->leftJoin('invoices', 'payments.invoiceNumber', 'invoices.invoiceNumber')
            ->leftJoin('contractors', 'invoices.contractor_id', 'contractors.id')
            ->leftJoin('cars', 'payments.car_id', '=', 'cars.id')
                ->select('users.name as username','payments.*', 'contractors.name', 'cars.plate_number', 'cars.model', 'drivers.name as driver_name', 'drivers.phone_number as driver_phone')
            ->where('cars.model', '=', 'L/C V8') // Add condition here
            ->get();
        $minibus_hiaces = DB::table('payments')
            ->join('users', 'payments.user_id', '=', 'users.id')
                ->leftJoin('drivers', 'payments.driver_id', '=', 'drivers.id')
                ->leftJoin('invoices', 'payments.invoiceNumber', 'invoices.invoiceNumber')
            ->leftJoin('contractors', 'invoices.contractor_id', 'contractors.id')
            ->leftJoin('cars', 'payments.car_id', '=', 'cars.id')
                ->select('users.name as username','payments.*', 'contractors.name', 'cars.plate_number', 'cars.model', 'drivers.name as driver_name', 'drivers.phone_number as driver_phone')
            ->where('cars.model', '=', 'MINIBUS HIACE') // Add condition here
            ->get();
        $toyota_coasters = DB::table('payments')
            ->join('users', 'payments.user_id', '=', 'users.id')
                ->leftJoin('drivers', 'payments.driver_id', '=', 'drivers.id')
                ->leftJoin('invoices', 'payments.invoiceNumber', 'invoices.invoiceNumber')
            ->leftJoin('contractors', 'invoices.contractor_id', 'contractors.id')
            ->leftJoin('cars', 'payments.car_id', '=', 'cars.id')
                ->select('users.name as username','payments.*', 'contractors.name', 'cars.plate_number', 'cars.model', 'drivers.name as driver_name', 'drivers.phone_number as driver_phone')
            ->where('cars.model', '=', 'TOYOTA COASTER') // Add condition here
            ->get();

        $mercedes_benz_vianos = DB::table('payments')
            ->join('users', 'payments.user_id', '=', 'users.id')
                ->leftJoin('drivers', 'payments.driver_id', '=', 'drivers.id')
                ->leftJoin('invoices', 'payments.invoiceNumber', 'invoices.invoiceNumber')
            ->leftJoin('contractors', 'invoices.contractor_id', 'contractors.id')
            ->leftJoin('cars', 'payments.car_id', '=', 'cars.id')
                ->select('users.name as username','payments.*', 'contractors.name', 'cars.plate_number', 'cars.model', 'drivers.name as driver_name', 'drivers.phone_number as driver_phone')
            ->where('cars.model', '=', 'MERCEDES BENZ VIANO') // Add condition here
            ->get();
       $payments = DB::table('cars')
    ->leftJoin(
        DB::raw('(SELECT * FROM payments WHERE (car_id, updated_at) IN 
                  (SELECT car_id, MAX(updated_at) FROM payments GROUP BY car_id)
                  ) latest_payments'),
        'cars.id', '=', 'latest_payments.car_id'
    )
    ->leftJoin('users', 'latest_payments.user_id', '=', 'users.id')
    ->leftJoin('drivers', 'latest_payments.driver_id', '=', 'drivers.id')
    ->leftJoin('invoices', 'latest_payments.invoiceNumber', '=', 'invoices.invoiceNumber')
    ->leftJoin('contractors', 'invoices.contractor_id', '=', 'contractors.id')
    ->select(
        'cars.plate_number', 
        'cars.model',
        'cars.supplier_id',
        'latest_payments.*', 
        'users.name as username',
        'contractors.name as contractor_name',
        'drivers.name as driver_name',
        'drivers.phone_number as driver_phone'
    )
    ->get();
    
    $bookings = DB::table('cars')
    ->leftJoin(
        DB::raw('(SELECT * FROM payments) as all_payments'),
        'cars.id', '=', 'all_payments.car_id'
    )
    ->leftJoin('suppliers', 'cars.supplier_id', 'suppliers.id')
    ->leftJoin('users', 'all_payments.user_id', '=', 'users.id')
    ->leftJoin('drivers', 'all_payments.driver_id', '=', 'drivers.id')
    ->leftJoin('invoices', 'all_payments.invoiceNumber', '=', 'invoices.invoiceNumber')
    ->leftJoin('contractors', 'invoices.contractor_id', '=', 'contractors.id')
    ->select(
        'cars.plate_number', 
        'cars.model', 
        'cars.supplier_id', 
        'all_payments.*', 
        'suppliers.name as supplier',
        'users.name as username',
        'contractors.name as contractor_name',
        'drivers.name as driver_name',
        'drivers.phone_number as driver_phone'
    )
    ->get();


        $models = DB::table('payments')
            ->leftJoin('cars', 'payments.car_id', '=', 'cars.id')
            ->select('cars.model')
            ->distinct()
            ->get();
        // $payments = Payment::all();
        return view('payments.index')->with('payments', $payments)->with('models', $models)->with('v8s', $v8s)->with('minibus_hiaces', $minibus_hiaces)
        ->with('toyota_coasters', $toyota_coasters)->with('mercedes_benz_vianos', $mercedes_benz_vianos)->with('bookings', $bookings);
        
    }
    public function getStates($institution) 
    {
        $ids = DB::table("invoices")->where("institution",$institution)->pluck("invoiceNumber","invoiceNumber");
        return json_encode($ids);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
{
    // Get the current date
    $today = now();

    // Get all cars that are either currently booked or have future bookings
    $bookedCars = DB::table('payments')
        ->where(function ($query) use ($today) {
            // Cars with current or future bookings
            $query->Where(function ($query) use ($today) {
                      // Currently booked cars
                      $query->where('booking_date', '<=', $today)
                            ->where('return_date', '>=', $today);
                  });
        })
        ->pluck('car_id'); // Get the list of booked car ids

    // Fetch cars that are not in the list of booked cars
    $availableCars = Car::whereNotIn('id', $bookedCars)->get();

    // Retrieve institutions and invoices as usual
    $institutions = Institution::all();
    $invoices = DB::table('invoice')->distinct()->get();

    $drivers = Driver::all();
    // Return the view with available cars
    return view('payments.create')
        ->with('institutions', $institutions)
        ->with('invoices', $invoices)
        ->with('cars', $availableCars) // Pass available cars only
        ->with('drivers', $drivers);
}


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $images = [];
        if ($files = $request->file('files')) {
            foreach ($files as $file) {
                $name = $file->getClientOriginalName();
                $file->move('images', $name);
                $images[] = $name;
            }
        }
    
        $this->validate($request, [
            // add your validation rules here
        ]);
    
    $payment = new payment;
        $payment->user_id = Auth()->user()->id;
        $payment->files = implode("|", $images);
        $payment->voucherNo = $request->input('voucherNo');
        $payment->institution = $request->input('institution');
        $payment->invoiceNumber = $request->input('invoiceNumber');
        $payment->payment_date = $request->input('paymentDate');
        $payment->amounts = $request->input('amount');
        $payment->car_id = $request->input('car_id');
        $payment->booking_date = $request->input('booking_date');
        $payment->return_date = $request->input('return_date');
        $payment->client = $request->input('client');
        $payment->booked_by = $request->input('booked_by');
        $payment->unit_price = $request->input('unit_price');
        $payment->phone_number = $request->input('phone_number');
        $payment->id_number = $request->input('id_number');
        $payment->caution = $request->input('caution');
    $payment->comments = $request->input('comments');
    $payment->checked_status = $request->input('checked_status') ?? 'no';
    // new fields
    $payment->driver_id = $request->input('driver_id');
    $payment->advance = $request->input('advance');
    
        // Calculate total_price
        $bookingDate = \Carbon\Carbon::parse($payment->booking_date);
        $returnDate = \Carbon\Carbon::parse($payment->return_date);
    
        // +1 to include booking day
        $days = $bookingDate->diffInDays($returnDate) + 1;
    
        $payment->total_price = $days * $payment->unit_price;
    
        $payment->save();
    
        return redirect('/payments')->with('success', 'Booking saved');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $payment = DB::table('payments')
            ->leftJoin('cars', 'payments.car_id', '=', 'cars.id')
            ->leftJoin('drivers', 'payments.driver_id', '=', 'drivers.id')
            ->select('payments.*', 'cars.plate_number', 'cars.model', 'drivers.name as driver_name', 'drivers.phone_number as driver_phone')
            ->where('payments.id', $id)
            ->first();

        return view('payments.show')->with('payment', $payment);
    }

    /**
     * Display booking history page.
     *
     * @return \Illuminate\Http\Response
     */
    public function bookingHistory()
    {
        // Reuse the bookings query used in index to provide full history
        $bookings = DB::table('cars')
            ->leftJoin(
                DB::raw('(SELECT * FROM payments) as all_payments'),
                'cars.id', '=', 'all_payments.car_id'
            )
            ->leftJoin('suppliers', 'cars.supplier_id', 'suppliers.id')
            ->leftJoin('users', 'all_payments.user_id', '=', 'users.id')
            ->leftJoin('drivers', 'all_payments.driver_id', '=', 'drivers.id')
            ->leftJoin('invoices', 'all_payments.invoiceNumber', '=', 'invoices.invoiceNumber')
            ->leftJoin('contractors', 'invoices.contractor_id', 'contractors.id')
            ->select(
                'cars.plate_number', 
                'cars.model', 
                'cars.supplier_id', 
                'all_payments.*', 
                'suppliers.name as supplier',
                'users.name as username',
                'contractors.name as contractor_name',
                'drivers.name as driver_name',
                'drivers.phone_number as driver_phone'
            )
            ->orderBy('all_payments.booking_date', 'desc')
            ->get();

        return view('payments.history')->with('bookings', $bookings);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        
        $cars = Car::all();
        $institutions = Institution::all();
        $payment = Payment::where('payments.id', $id)
            ->leftJoin('cars', 'payments.car_id', '=', 'cars.id')
            ->leftJoin('drivers', 'payments.driver_id', '=', 'drivers.id')
            ->select('payments.*', 'cars.plate_number', 'drivers.name as driver_name', 'drivers.phone_number as driver_phone')
            ->first();
    $drivers = Driver::all();
    return view('payments.edit')->with('payment', $payment)->with('institutions', $institutions)->with('cars', $cars)->with('drivers', $drivers);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
{
    // Retrieve the payment record
    $payment = Payment::find($id);

    // Update payment-related fields
    $payment->voucherNo = $request->input('voucherNo');
    $payment->institution = $request->input('institution');
    $payment->invoiceNumber = $request->input('invoiceNumber');
    $payment->payment_date = $request->input('paymentDate');
    $payment->amounts = $request->input('amount');

    // Update booking-related fields
    $payment->car_id = $request->input('car_id');
    $payment->booking_date = $request->input('booking_date');
    $payment->return_date = $request->input('return_date');
    $payment->client = $request->input('client');
    $payment->booked_by = $request->input('booked_by');
    $payment->unit_price = $request->input('unit_price');
    // new fields
    $payment->driver_id = $request->input('driver_id');
    $payment->advance = $request->input('advance');
    // comments and checked status
    $payment->comments = $request->input('comments');
    $payment->checked_status = $request->input('checked_status') ?? 'no';

    // Save the updated record
    $payment->save();

    // Redirect back to payments with a success message
    return redirect('/payments')->with('success', 'Booking edited successfully');
}


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $payment = Payment::find($id);
        $payment->delete();
        return redirect('/payments')->with('success','Booking deleted');
    }
}
