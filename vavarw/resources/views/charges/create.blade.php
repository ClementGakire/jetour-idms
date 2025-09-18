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
                <h3 class="text-muted text-left mb-3">INSERT EXPENSE</h3>
                
                <!-- Expense Type Selector -->
                <div class="alert alert-info mb-4">
                    <h5><i class="fas fa-info-circle"></i> Expense Type</h5>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="expense_type" id="vehicle_expense" value="vehicle" checked>
                        <label class="form-check-label" for="vehicle_expense">
                            <i class="fas fa-car"></i> Vehicle Expense
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="expense_type" id="office_expense" value="office">
                        <label class="form-check-label" for="office_expense">
                            <i class="fas fa-building"></i> Office Expense
                        </label>
                    </div>
                </div>
                
               <form action="{{ action('ChargesController@store') }}" method="POST" enctype="multipart/form-data">
                      {{ csrf_field() }}
                      
                      <!-- Vehicle-related fields -->
                      <div id="vehicle-fields">
                          <div class="form-group">
                            <label for="title">Car <span class="text-danger">*</span></label>
                            <input type="" name="car_id" list="institutions" class="form-control" placeholder="Search Car" id="car_input">
                            <datalist id="institutions">  
                            
                              @foreach($cars as $car)
                              <option value="{{$car->id}}">{{$car->plate_number}}</option>
                              @endforeach
                            </datalist>
                          </div>
                          
                          <div class="form-group">
                            <label for="title">Driver</label>
                            <input type="" name="driver_id" list="drivers" class="form-control" placeholder="Search Driver" id="driver_input">
                            <datalist id="drivers">  
                            
                              @foreach($drivers as $driver)
                              <option value="{{$driver->id}}">{{$driver->name}}</option>
                              @endforeach
                            </datalist>
                          </div>
                      </div>
                      
                      <!-- Office expense notice -->
                      <div id="office-notice" class="alert alert-success" style="display: none;">
                          <i class="fas fa-building"></i> <strong>Office Expense:</strong> Car and Driver fields are not required for office expenses.
                      </div>
                      <!-- <div class="form-group">
                        <label for="title">Purchase Order Number</label>
                        <input type="" name="roadmap" list="roadmaps" class="form-control" placeholder="Search Purchase Order Number" id="txts">
                        <datalist id="roadmaps">  
                        
                          @foreach($roadmaps as $roadmap)
                          <option value="{{$roadmap->id}}">{{$roadmap->purchase_order}}</option>
                          @endforeach
                        </datalist>

                      </div> -->
                      <div class="form-group">
                        <label for="title">Date</label>
                        <input type="date" class="form-control" id="title" placeholder="Date" name="date">
                      </div>
                      <div class="form-group">
                        <label for="title">Expense Type <span class="text-danger">*</span></label>
                        <input type="" name="expense_id" list="expenses" class="form-control" placeholder="Search Expense Type" required="" id="txts">
                        <datalist id="expenses">  
                        
                          @foreach($expenses as $expense)
                          <option value="{{$expense->id}}">{{$expense->name}}</option>
                          @endforeach
                        </datalist>

                      </div>
                      <div class="form-group">
                        <label for="title">Driver <small class="text-muted">(Optional for Office Expenses)</small></label>
                        <input type="" name="driver_id" list="drivers" class="form-control" placeholder="Search Driver (Optional)" id="txts">
                        <datalist id="drivers">  
                        
                          @foreach($drivers as $driver)
                          <option value="{{$driver->id}}">{{$driver->name}}</option>
                          @endforeach
                        </datalist>

                      </div>
                      <!-- supplier is derived from the selected car (cars.supplier_id) so no supplier input here -->
                      <div class="form-group">
                        <label for="title">Amount</label>
                        <input type="text" class="form-control" id="title" placeholder="Amount" name="amount" required>
                      </div>
                      <div class="form-group">
                        <label for="">Payment Mode</label>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" name="payment_mode[]" value="MoMo" id="pm-momo">
                          <label class="form-check-label" for="pm-momo">MoMo</label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" name="payment_mode[]" value="Bank Transfer" id="pm-bank">
                          <label class="form-check-label" for="pm-bank">Bank Transfer</label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" name="payment_mode[]" value="Cash" id="pm-cash">
                          <label class="form-check-label" for="pm-cash">Cash</label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" name="payment_mode[]" value="Check" id="pm-check">
                          <label class="form-check-label" for="pm-check">Check</label>
                        </div>

                        <label for="">Files</label>
                        <input type="file" name="files[]" id="" class="form-control" multiple>
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
                          // Handle expense type radio button changes
                          document.addEventListener('DOMContentLoaded', function() {
                              const vehicleRadio = document.getElementById('vehicle_expense');
                              const officeRadio = document.getElementById('office_expense');
                              const vehicleFields = document.getElementById('vehicle-fields');
                              const officeNotice = document.getElementById('office-notice');
                              const carInput = document.getElementById('car_input');
                              const driverInput = document.getElementById('driver_input');
                              
                              function toggleFields() {
                                  if (officeRadio.checked) {
                                      vehicleFields.style.display = 'none';
                                      officeNotice.style.display = 'block';
                                      carInput.removeAttribute('required');
                                      carInput.value = '';
                                      driverInput.value = '';
                                  } else {
                                      vehicleFields.style.display = 'block';
                                      officeNotice.style.display = 'none';
                                      carInput.setAttribute('required', 'required');
                                  }
                              }
                              
                              vehicleRadio.addEventListener('change', toggleFields);
                              officeRadio.addEventListener('change', toggleFields);
                              
                              // Initialize
                              toggleFields();
                          });
                          </script>
                          <script type="text/javascript">
    jQuery(document).ready(function ()
    {
            jQuery('select[name="customer"]').on('change',function(){
               var customerID = jQuery(this).val();
               if(customerID)
               {
                  jQuery.ajax({
                     url : 'getstates/' +customerID,
                     type : "GET",
                     dataType : "json",
                     success:function(data)
                     {
                        console.log(data);
                        jQuery('select[name="company_id"]').empty();
                        jQuery.each(data, function(key,value){
                           $('select[name="company_id"]').append('<option value="'+ key +'">'+ key +'-'+ '</option>');
                        });
                     }
                  });
               }
               else
               {
                  $('select[name="company_id"]').empty();
               }
            });
    });
    </script>

@endif
@endsection