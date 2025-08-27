@include('inc.navbar')
@extends('layouts.app')

@section('content')
	


	<section style="padding-left: 60px; padding-top: 100px; padding-bottom: 100px;">
      <div class="container-fluid">
        <div class="row mb-12">
          <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
            <div class="row align-items-center">
              <div class="col-xl-11 col-12 mb-4 mb-xl-0">
                <h3 class="text-muted text-left mb-3">EDIT USER</h3>
                
               <form action="{{ action('UsersController@update', [$user->id]) }}" method="POST">
                      {{ csrf_field() }}
                      <input type="hidden" name="_method" value="put">
                      

                      <div class="form-group">
                        <label for="institution">Names</label>
                        <input type="text" class="form-control" id="customer" placeholder="User Names" value="{{$user->name}}" name="name" autocomplete="off">
                        
                      </div>
                      <div class="form-group">
                        <label for="member">Roles</label><br>
                        <label><input type="checkbox" value="Invoices" name="role_id[]" @if(in_array("Invoices", $roles)) checked @endif> Invoices</label><br>
                        <label><input type="checkbox" value="Payments" name="role_id[]" @if(in_array("Payments", $roles)) checked @endif> Payments</label><br>
                        <label><input type="checkbox" value="Ongoing Operations" name="role_id[]" @if(in_array("Ongoing Operations", $roles)) checked @endif> Ongoing Operations</label><br>
                        <label><input type="checkbox" value="Closed Operations" name="role_id[]" @if(in_array("Closed Operations", $roles)) checked @endif> Closed Operations</label><br>
                        <label><input type="checkbox" value="Reports" name="role_id[]" @if(in_array("Reports", $roles)) checked @endif> Reports</label><br>
                        <label><input type="checkbox" value="Suppliers" name="role_id[]" @if(in_array("Suppliers", $roles)) checked @endif> Suppliers</label><br>
                        <label><input type="checkbox" value="Cars" name="role_id[]" @if(in_array("Cars", $roles)) checked @endif> Cars</label><br>
                        <label><input type="checkbox" value="Car Bookings" name="role_id[]" @if(in_array("Car Bookings", $roles)) checked @endif> Car Bookings</label><br>
                        <label><input type="checkbox" value="Clients" name="role_id[]" @if(in_array("Clients", $roles)) checked @endif> Clients</label><br>
                        <label><input type="checkbox" value="Contractors" name="role_id[]" @if(in_array("Contractors", $roles)) checked @endif> Contractors</label><br>
                        <label><input type="checkbox" value="Drivers" name="role_id[]" @if(in_array("Drivers", $roles)) checked @endif> Drivers</label><br>
                        <label><input type="checkbox" value="Expense Types" name="role_id[]" @if(in_array("Expense Types", $roles)) checked @endif> Expense Types</label><br>
                        <label><input type="checkbox" value="Expenses" name="role_id[]" @if(in_array("Expenses", $roles)) checked @endif> Expenses</label><br>
                        <label><input type="checkbox" value="Suppliers" name="role_id[]" @if(in_array("Suppliers", $roles)) checked @endif> Suppliers</label><br>
                        <label><input type="checkbox" value="Suppliers Payment" name="role_id[]" @if(in_array("Suppliers Payment", $roles)) checked @endif> Suppliers Payment</label><br>
                      </div>
                     
                      <button type="submit" class="btn btn-primary">Submit</button>
                 
               </form>
    
              </div>  
            </div>    
          </div>      
        </div>        
      </div>
    </section>

                          <script src="assets/js/jquery.min.js"></script>
                          <script src="assets/bootstrap/js/bootstrap.min.js"></script>
                          <script src="{{asset('jquery.min.js')}}"></script>
                          <script src="{{asset('bootstrap.min.js')}}"></script>
                          <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

@endsection