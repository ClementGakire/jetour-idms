@include('inc.navbar')
@extends('layouts.app')

@section('content')
	
	
	

	<section style="padding-left: 60px; padding-top: 100px; padding-bottom: 100px;">
      <div class="container-fluid">
        <div class="row mb-12">
          <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
            <div class="row align-items-center">
              <div class="col-xl-11 col-12 mb-4 mb-xl-0">
                <h3 class="text-muted text-left mb-3">EDIT FUEL</h3>
                
               <form action="{{ action('fuelController@update', [$fuel->id]) }}" method="POST" enctype="multipart/form-data">
                      {{ csrf_field() }}
                      <div class="form-group">
                        <label for="inputState">Contractor</label>
                          <select id="client" class="form-control dynamic" name="contractor_id">
                              <option selected="" value="{{ $fuel->contractor_id }}">{{ $fuel->contractor_id }}</option>

                              @foreach($contractors as $contractor)
                              <option value="{{$contractor->id}}">{{$contractor->name}}</option>
                              <!--<input type="text" class="form-control" id="member" placeholder="Enter Customer" value="" name="adescription">-->
                              @endforeach
                          </select>
                      </div>
                      <input type="hidden" name="_method" value="put">
                      <div class="form-group">
                        <label for="title">Institution</label>
                        <select class="form-control" name="institution">
                          <option selected="" value="{{$fuel->institution}}">{{$fuel->institution}}</option>
                          @foreach($institutions as $institution)
                          <option value="{{$institution->name}}">{{$institution->name}}</option>
                          @endforeach
                        </select>
                      </div>
                     
                      

                      
                      <div class="form-group">
                        <label for="title">Vehicle Plate Number</label>
                        <input type="text" class="form-control" id="title" placeholder="Plate Number" name="vehicleNo" value="{{$fuel->vehicleNo}}">
                      </div>
                      <div class="form-group">
                        <label for="title">Vehicle Owner</label>
                        <input type="text" class="form-control" id="title" placeholder="Vehicle Owner" name="vehicleOwner" value="{{$fuel->vehicleOwner}}">
                      </div>
                      <div class="form-group">
                        <label for="title">Roadmap Number</label>
                        <input type="text" class="form-control" id="title" placeholder="Roadmap Number" name="rm_no" value="{{$fuel->rm_no}}">
                      </div>
                      <div class="form-group">
                        <label for="title">Destination</label>
                        <input type="text" class="form-control" id="title" placeholder="Destination" name="place" value="{{$fuel->place}}">
                      </div>
                      <div class="form-group">
                        <label for="title">Fuel</label>
                        <input type="text" class="form-control" id="title" placeholder="Fuel" name="fuel" value="{{$fuel->fuel}}">
                      </div>
                      <div class="form-group">
                        <label>Date</label>
                        <input type="date" class="form-control" name="date" value="{{$fuel->date}}">
                      </div>
                      <div class="form-group">
                        <label for="title">Days</label>
                        <input type="text" class="form-control" id="title" placeholder="Days" name="days" value="{{$fuel->days}}">
                      </div>
                      <div class="form-group">
                        <label for="title">Unit Price</label>
                        <input type="text" class="form-control" id="title" placeholder="Unit Price" name="unitprice" value="{{$fuel->unitprice}}">
                      </div>
                      <div class="form-group">
                        <label for="title">Files(invoices, receipts, etc)</label>  
                        <input type="file" class="form-control" name="files[]" placeholder="address" multiple>
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
                          












@endsection