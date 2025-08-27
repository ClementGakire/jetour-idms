<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Invoice;
use App\Institution;
use App\Payment;
use App\User;
use App\Fuel;
use App\Charge;
use App\Expense;
use App\Supplier;
use App\Bill;
use DB;
use Carbon\Carbon;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth()->user()->role_id == 'Unspecified'){
          return view('un');
        
        }else{
        $total = DB::table('invoices')->sum('amount');
        $paid = DB::table('payments')->sum('amounts');
        $users = DB::table('users')->count();
        $total_suppliers = DB::table('suppliers')->count();
        $balance = $total - $paid;
        $total_driver_allowance = DB::table('charges')->where('expense_id', 2)->sum('amount');
        $total_tire_expenses = DB::table('charges')->where('expense_id', 4)->sum('amount');
        $total_lubricant_expenses = DB::table('charges')->where('expense_id', 5)->sum('amount');
        $total_traffic_fines_expenses = DB::table('charges')->where('expense_id', 1)->sum('amount');
        $total_expenses = DB::table('charges')->sum('amount');
        $margin_after_all_expenses = $total - $total_expenses;
        $total_number_of_vehicles = DB::table('cars')->count();
        $total_amount_on_spare_parts = DB::table('charges')->where('expense_id', 6)->sum('amount');
        $total_amount_on_vehicle_inspection = DB::table('charges')->where('expense_id', 7)->sum('amount');
    $total_sales = DB::table('payments')->sum('total_price');
    // date helpers
    $today = Carbon::today()->toDateString();
    $currentMonth = Carbon::now()->month;
    $currentYear = Carbon::now()->year;

    // Daily and monthly sales (using roadmaps which has created_on / total_amount)
    $daily_sales = DB::table('payments')->whereDate('created_at', $today)->sum('total_price');
    $monthly_sales = DB::table('payments')->whereMonth('created_at', $currentMonth)->whereYear('created_at', $currentYear)->sum('total_price');

  // Sales series for last 7 days
  $sales7_labels = [];
  $sales7_data = [];
  for ($i = 6; $i >= 0; $i--) {
    $d = Carbon::today()->subDays($i);
    $label = $d->format('M j');
    $sales7_labels[] = $label;
    $sales7_data[] = (float) DB::table('payments')->whereDate('created_at', $d->toDateString())->sum('total_price');
  }

  // Monthly sales for last 6 months
  $monthly_labels = [];
  $monthly_data = [];
  for ($i = 5; $i >= 0; $i--) {
    $m = Carbon::now()->subMonths($i);
    $label = $m->format('M Y');
    $monthly_labels[] = $label;
    $monthly_data[] = (float) DB::table('payments')->whereMonth('created_at', $m->month)->whereYear('created_at', $m->year)->sum('total_price');
  }

    // Daily and monthly expenses (charges.date exists)
    $daily_expenses = DB::table('charges')->whereDate('date', $today)->sum('amount');
    $monthly_expenses = DB::table('charges')->whereMonth('date', $currentMonth)->whereYear('date', $currentYear)->sum('amount');

    $daily_profit = $daily_sales - $daily_expenses;
    $monthly_profit = $monthly_sales - $monthly_expenses;

    // Assigned clients and plates for today (roadmaps created on today)
    $assigned_today = DB::table('payments')
      ->leftJoin('cars', 'payments.car_id', 'cars.id')
      ->whereDate('payments.created_at', $today)
      ->select('cars.plate_number', 'payments.car_id', 'payments.created_at', 'payments.return_date')
      ->get();
    $plaques_today = $assigned_today->pluck('plate_number')->unique()->filter()->values()->all();

    // Fleet availability: consider "active" cars as those with a payment whose return_date is null or >= today
    $active_car_ids = DB::table('payments')
      ->where(function($q) use ($today) {
        $q->whereNull('return_date')->orWhere('return_date', '>=', $today);
      })
      ->pluck('car_id')
      ->unique()
      ->toArray();

    if(count($active_car_ids) > 0){
      // In garage: charges for spare parts or inspection (expense_id 6 or 7) for today
      $in_garage_ids = DB::table('charges')
        ->whereIn('car_id', $active_car_ids)
        ->whereIn('expense_id', [6,7])
        ->whereDate('date', $today)
        ->pluck('car_id')
        ->unique()
        ->toArray();

      // In rental: active payments covering today
      $in_rental_ids = DB::table('payments')
        ->whereIn('car_id', $active_car_ids)
        ->whereDate('created_at', '<=', $today)
        ->where(function($q) use ($today){
          $q->whereNull('return_date')->orWhere('return_date', '>=', $today);
        })
        ->pluck('car_id')
        ->unique()
        ->toArray();

      // In parking: active cars not in rental or garage
      $in_parking_ids = array_values(array_diff($active_car_ids, array_unique(array_merge($in_rental_ids, $in_garage_ids))));

      $in_garage_cars = DB::table('cars')->whereIn('id', $in_garage_ids)->get();
      $in_rental_cars = DB::table('cars')->whereIn('id', $in_rental_ids)->get();
      $in_parking_cars = DB::table('cars')->whereIn('id', $in_parking_ids)->get();
    } else {
      $in_garage_cars = collect();
      $in_rental_cars = collect();
      $in_parking_cars = collect();
    }
        $total_quoted_amount = DB::table('bills')->sum('quoted_amount');
        $total_amount = DB::table('bills')->sum('amount');
        $balance_to_supplier = $total_quoted_amount - $total_amount;
       // $reports = DB::table('invoices')
         //   ->select('payments', 'invoices.institution', '=', 'payments.institution')
           // 
         //   ->selectRaw('invoices.institution, sum(payments.amount) as sum, sum(invoices.amount) as total')
           // ->groupBy('invoices.institution')
          //  ->get();

        $reports = DB::select("SELECT i.name, (SELECT SUM(t.amount) FROM invoices t WHERE t.institution = i.name ) as 'total_invoice', (SELECT SUM(p.amounts) FROM payments p WHERE p.institution = i.name ) as 'total_payment' FROM institutions i");
        
        $user = DB::select("SELECT u.id, u.name, (SELECT COUNT(t.amount) FROM invoices t WHERE t.user_id = u.id ) AS 'total_invoices', (SELECT COUNT(p.amounts) FROM payments p WHERE p.user_id = u.id ) AS 'total_payments' FROM users u");
        $expenses = DB::select("SELECT e.id, e.name, (SELECT SUM(c.amount) FROM charges c where c.expense_id = e.id) AS 'total_expense' FROM expenses e");
    // Prepare expense chart data
    $expenses_labels = [];
    $expenses_data = [];
    foreach ($expenses as $ex) {
      $expenses_labels[] = $ex->name;
      $expenses_data[] = (float) $ex->total_expense;
    }
        
         if(Auth()->user()->role_id == 3){
             $fuels = DB::table('fuels')
            ->leftJoin('contractors', 'fuels.contractor_id', 'contractors.id')
            ->select('fuels.*', 'contractors.name as contractor')
            ->get();
            $reports = DB::select("SELECT i.name, (SELECT SUM(f.totalprice) FROM fuels f WHERE f.institution = i.name ) as 'total_amount', (SELECT SUM(f.fuel) FROM fuels f WHERE f.institution = i.name ) as 'total_fuel'  FROM institutions i");
             return view('fuel.index')->with('fuels', $fuels)->with('reports', $reports);
         }
      return view('home')
        ->with('balance_to_supplier', $balance_to_supplier)
        ->with('total_sales', $total_sales)
        ->with('total_suppliers', $total_suppliers)
        ->with('total', $total)
        ->with('paid', $paid)
        ->with('balance',$balance)
        ->with(compact('reports', $reports))
        ->with('users', $users)
        ->with('user', $user)
        ->with('total_driver_allowance', $total_driver_allowance)
        ->with('total_tire_expenses', $total_tire_expenses)
        ->with('total_lubricant_expenses', $total_lubricant_expenses)
        ->with('total_traffic_fines_expenses', $total_traffic_fines_expenses)
        ->with('total_expenses', $total_expenses)
        ->with('margin_after_all_expenses', $margin_after_all_expenses)
        ->with('total_number_of_vehicles', $total_number_of_vehicles)
        ->with('total_amount_on_spare_parts', $total_amount_on_spare_parts)
        ->with('total_amount_on_vehicle_inspection', $total_amount_on_vehicle_inspection)
        ->with('expenses', $expenses)
        // new dashboard metrics
        ->with('daily_sales', $daily_sales)
        ->with('daily_expenses', $daily_expenses)
        ->with('daily_profit', $daily_profit)
        ->with('monthly_sales', $monthly_sales)
        ->with('monthly_expenses', $monthly_expenses)
        ->with('monthly_profit', $monthly_profit)
  // chart data
  ->with('sales7_labels', $sales7_labels)
  ->with('sales7_data', $sales7_data)
  ->with('monthly_labels', $monthly_labels)
  ->with('monthly_data', $monthly_data)
  ->with('expenses_labels', $expenses_labels)
  ->with('expenses_data', $expenses_data)
        ->with('assigned_today', $assigned_today)
        ->with('plaques_today', $plaques_today)
        ->with('in_garage_cars', $in_garage_cars)
        ->with('in_rental_cars', $in_rental_cars)
        ->with('in_parking_cars', $in_parking_cars);
                                                                                                                                                                                        
        }   

    }
}
