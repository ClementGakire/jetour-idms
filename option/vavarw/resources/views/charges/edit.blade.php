@include('inc.navbar')
@extends('layouts.app')

@section('content')
@if(Auth::user()->role_id == 1 || 4)	
	
	

	<section style="padding-left: 60px; padding-top: 100px; padding-bottom: 100px;">
      <div class="container-fluid">
        <div class="row mb-12">
          <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
            <div class="row align-items-center">
              <div class="col-xl-11 col-12 mb-4 mb-xl-0">
                <h3 class="text-muted text-left mb-3">EDIT EXPENSE</h3>
                
               <form action="{{ action('ChargesController@update', [$charge->id]) }}" method="POST" enctype="multipart/form-data">
                      {{ csrf_field() }}
                      <input type="hidden" name="_method" value="put">
                      <div class="form-group">
                        <label for="title">Car</label>
                        <input type="" name="car_id" list="institutions" class="form-control" placeholder="Search Car" required="" id="txts" value="{{ $charge->car_id }}">
                        <datalist id="institutions">  
                        
                          @foreach($cars as $car)
                          <option value="{{$car->id}}">{{$car->plate_number}}</option>
                          @endforeach
                        </datalist>

                      </div>
                      <div class="form-group">
                        <label for="title">Purchase Order Number</label>
                        <input type="" name="roadmap" list="roadmaps" class="form-control" placeholder="Search Purchase Order Number" id="txts" value="{{$charge->roadmap}}">
                        <datalist id="roadmaps">  
                        
                          @foreach($roadmaps as $roadmap)
                          <option value="{{$roadmap->id}}">{{$roadmap->purchase_order}}</option>
                          @endforeach
                        </datalist>

                      </div>
                      <div class="form-group">
                        <label for="title">Date</label>
                        <input type="date" class="form-control" id="title" placeholder="Date" name="date" value="{{$charge->date}}">
                      </div>
                      <div class="form-group">
                        <label for="title">Expense Type</label>
                        <input type="" name="expense_id" list="expenses" class="form-control" placeholder="Search Expense Type" required="" id="txts" value="{{ $charge->expense_id }}">
                        <datalist id="expenses">  
                        
                          @foreach($expenses as $expense)
                          <option value="{{$expense->id}}">{{$expense->name}}</option>
                          @endforeach
                        </datalist>

                      </div>
                      <div class="form-group">
                        <label for="title">Driver</label>
                        <input type="" name="driver_id" list="drivers" class="form-control" placeholder="Search Driver" id="txts" value="{{ $charge->driver_id }}">
                        <datalist id="drivers">  
                        
                          @foreach($drivers as $driver)
                          <option value="{{$driver->id}}">{{$driver->name}}</option>
                          @endforeach
                        </datalist>

                      </div>
                      <div class="form-group">
                        <label for="title">Amount</label>
                        <input type="text" class="form-control" id="title" placeholder="Amount" name="amount" value="{{ $charge->amount }}">
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
                          <script type="text/javascript">
                          
                          </script>

@endif
@endsection