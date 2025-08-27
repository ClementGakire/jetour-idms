@include('inc.navbar')
@extends('layouts.app')

@section('content')
@if(Auth::user()->role_id == 1 || 3)
	
	

	<section style="padding-left: 60px; padding-top: 100px; padding-bottom: 100px;">
      <div class="container-fluid">
        <div class="row mb-12">
          <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
            <div class="row align-items-center">
              <div class="col-xl-11 col-12 mb-4 mb-xl-0">
                <h3 class="text-muted text-left mb-3">INSERT FUEL</h3>
                
               <form action="{{ action('fuelController@store') }}" method="POST" enctype="multipart/form-data">
                      {{ csrf_field() }}
                      @if(Auth::user()->role_id == 3)
                      <div class="form-group">
                        <label for="title">Institution</label>
                        <input type="" name="institution" list="institutions" class="form-control" placeholder="Search Institution" required="" id="txts">
                        <datalist id="institutions">  
                        
                          @foreach($institutions as $institution)
                          <option value="{{$institution->name}}">{{$institution->name}}</option>
                          @endforeach
                        </datalist>

                      </div>
                      
                      <div class="form-group">
                        <label for="title">Car</label>
                        <input type="" name="car_id" list="institutions" class="form-control" placeholder="Search Car" required="" id="txts">
                        <datalist id="institutions">  
                        
                          @foreach($cars as $car)
                          <option value="{{$car->id}}">{{$car->plate_number}}</option>
                          @endforeach
                        </datalist>

                      </div>
                      <div class="form-group">
                        <label for="title">Destination</label>
                        <input type="text" class="form-control" id="title" placeholder="Destination" name="place">
                      </div>
                      <div class="form-group">
                        <label for="title">Days</label>
                        <input type="text" class="form-control" id="title" placeholder="Days" name="days">
                      </div>
                      @endif
                      @if(Auth::user()->role_id !=3)
                      <div class="form-group">
                        <label for="inputState">Contractor</label>
                          <input type="" name="contractor_id" list="contractors" class="form-control" placeholder="Search Contractor" id="txt">
                          <datalist id="contractors">    
                              <option selected disabled="">Choose...</option>
                              @foreach($contractors as $contractor)
                              <option value="{{$contractor->id}}" label="{{$contractor->name}}"></option>
                              
                              @endforeach
                          </datalist>
                      </div>
                      
                      
                      <div class="form-group">
                        <label for="title">Car</label>
                        <input type="" name="car_id" list="institutions" class="form-control" placeholder="Search Car" required="" id="car_id">
                        <datalist id="institutions">  
                        
                          @foreach($cars as $car)
                          <option value="{{$car->id}}" data-supplier="{{$car->supplier}}">{{$car->plate_number}} - {{$car->supplier}}</option>
                          @endforeach
                        </datalist>

                      </div>
                      <div class="form-group">
                        <label for="title">Vehicle Owner</label>
                        <input type="text" class="form-control" id="owner_id" placeholder="Vehicle Owner" name="vehicleOwner" readonly>
                      </div>
                      <div class="form-group">
                        <label for="title">Roadmap Number</label>
                        <input type="text" class="form-control" id="title" placeholder="Roadmap Number" name="rm_no">
                      </div>
                      <div class="form-group">
                        <label for="title">Destination</label>
                        <input type="text" class="form-control" id="title" placeholder="Destination" name="place">
                      </div>
                      <div class="form-group">
                        <label for="title">Advance Fuel</label>
                        <input type="text" class="form-control" id="title" placeholder="Fuel" name="fuel">
                      </div>
                      <div class="form-group">
                        <label for="title">Advance Cash</label>
                        <input type="text" class="form-control" id="title" placeholder="Cash" name="cash">
                      </div>
                      <div class="form-group">
                        <label>Date</label>
                        <input type="date" class="form-control" name="date">
                      </div>
                      <div class="form-group">
                        <label for="title">Days</label>
                        <input type="text" class="form-control" id="title" placeholder="Days" name="days">
                      </div>
                      <div class="form-group">
                        <label for="title">Unit Price</label>
                        <input type="text" class="form-control" id="unit_price" placeholder="Unit Price" name="unitprice" readonly>
                      </div>
                      <div class="form-group">
                        <label>Selling Price</label>
                        <input type="number" class="form-control" name="sellingprice" placeholder="Selling Price">
                      </div>
                      @endif
                      <div class="form-group">
                        <label for="title">Files(invoices, receipts, etc)</label>  
                        <input type="file" class="form-control" name="files[]" placeholder="address" multiple>
                      </div>
                      <button type="submit" class="btn btn-primary" id="btnSend">Submit</button>
                 
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
                          @if(Auth::user()->role_id !=3)
                          <script type="text/javascript">
                            let btn = document.getElementById("btnSend");
                            btn.onclick = function() {
                              var val = $("#txt").val();

                            var obj = $("#contractors").find("option[value='" + val + "']");

                            if(obj != null && obj.length > 0)
                                //alert("valid");  // allow form submission
                              return true;
                            else
                                alert("Invalid contractor, please choose a valid contractor!");
                                return false;
                            }
                            
                          </script>
                          <script>
                            $(document).ready(function(){
                              $('#car_id').change(function(){
                                var car_id = $('option[value="' + $(this).val() + '"]');
                                var supplier = car_id.data('supplier');
                                var unit_price = car_id.data('unit_price');
                                $('#owner_id').val(supplier);
                                $('#unit_price').val(unit_price);
                              });
                            });
                          </script>
                          <script type="text/javascript">
                            let btn = document.getElementById("btnSend");
                            btn.onclick = function() {
                              var val = $("#txts").val();

                            var obj = $("#institutions").find("option[value='" + val + "']");

                            if(obj != null && obj.length > 0)
                                //alert("valid");  // allow form submission
                              return true;
                            else
                                alert("Invalid institution, please choose a valid institution!");
                                return false;
                            }
                            
                          </script>
                          @endif
@endif
@endsection