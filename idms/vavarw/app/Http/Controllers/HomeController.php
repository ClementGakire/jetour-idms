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
        $total_sales = DB::table('roadmaps')->sum('total_amount');
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
        
         if(Auth()->user()->role_id == 3){
             $fuels = DB::table('fuels')
            ->leftJoin('contractors', 'fuels.contractor_id', 'contractors.id')
            ->select('fuels.*', 'contractors.name as contractor')
            ->get();
            $reports = DB::select("SELECT i.name, (SELECT SUM(f.totalprice) FROM fuels f WHERE f.institution = i.name ) as 'total_amount', (SELECT SUM(f.fuel) FROM fuels f WHERE f.institution = i.name ) as 'total_fuel'  FROM institutions i");
             return view('fuel.index')->with('fuels', $fuels)->with('reports', $reports);
         }
         return view('home')->with('balance_to_supplier', $balance_to_supplier)->with('total_sales', $total_sales)->with('total_suppliers', $total_suppliers)->with('total', $total)->with('paid', $paid)->with('balance',$balance)->with(compact('reports', $reports))->with('users', $users)->with('user', $user)->with('total_driver_allowance', $total_driver_allowance)->with('total_tire_expenses', $total_tire_expenses)->with('total_lubricant_expenses', $total_lubricant_expenses)->with('total_traffic_fines_expenses', $total_traffic_fines_expenses)->with('total_expenses', $total_expenses)->with('margin_after_all_expenses', $margin_after_all_expenses)->with('total_number_of_vehicles', $total_number_of_vehicles)->with('total_amount_on_spare_parts', $total_amount_on_spare_parts)->with('total_amount_on_vehicle_inspection', $total_amount_on_vehicle_inspection)->with('expenses', $expenses);
                                                                                                                                                                                        
        }   

    }
}
