@include('inc.navbar')
@extends('layouts.app')

@section('content')
@if(Auth::user()->id == 1 || strpos(Auth::user()->role_id, 'Payments') !== false)
	
	

	<section style="padding-left: 60px; padding-top: 100px; padding-bottom: 100px;">
      <div class="container-fluid">
        <div class="row mb-12">
          <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
            <div class="row align-items-center">
              <div class="col-xl-11 col-12 mb-4 mb-xl-0">
                <h3 class="text-muted text-left mb-3">CREATE Booking</h3>
                
               <form action="{{ action('PaymentController@store') }}" method="POST" enctype="multipart/form-data">
                      {{ csrf_field() }}

                      <!--<div class="form-group">-->
                      <!--  <label for="institution">Voucher No</label>-->
                      <!--  <input type="text" class="form-control" id="customer" placeholder="Enter Voucher No" value="" name="voucherNo">-->
                        
                      <!--</div>-->
                      <div class="form-group">
                            <label for="inputCar">Car</label>
                            <input list="carList" id="inputCar" class="form-control" name="car_id" required placeholder="Choose...">
                            <datalist id="carList">
                                @foreach($cars as $car)
                                    <option value="{{$car->id}}" data-id="{{$car->id}}">{{$car->plate_number}}</option>
                                @endforeach
                            </datalist>
                        </div>


                  

                      
                      <!--<div class="form-group">-->
                      <!--  <label for="inputState">Invoice</label>-->
                      <!--    <select id="client" class="form-control dynamic" name="invoiceNumber">-->
                      <!--        <option selected disabled="">Choose...</option>-->
                              
                      <!--    </select>-->
                      <!--</div>-->
                     
                      

                      <div class="form-group">
                        <label for="start_date">Booking Date</label>
                        <input type="date" name="booking_date" id="start_date" class="form-control" required>
                      </div>
                      
                      <div class="form-group">
                        <label for="start_date">Return Date</label>
                        <input type="date" name="return_date" id="start_date" class="form-control" required>
                      </div>
                    <div class="form-group">
                        <label for="institution">Unit Price</label>
                        <input type="number" class="form-control" id="customer" placeholder="Enter Unit Price" value="" name="unit_price" required>
                        
                      </div>
                     
                      <div class="form-group">
                        <label for="institution">Client</label>
                        <input type="text" class="form-control" id="customer" placeholder="Enter Client" value="" name="client" required>
                        
                      </div>
                     
                     <div class="form-group">
                        <label for="institution">Booked By</label>
                        <input type="text" class="form-control" id="customer" placeholder="Booked By" value="" name="booked_by">
                        
                      </div>
                      <div class="form-group">
                        <label for="institution">Phone Number</label>
                        <input type="text" class="form-control" id="customer" placeholder="Phone Number" value="" name="phone_number">
                        
                      </div>
                      <div class="form-group">
                        <label for="institution">Identification Number</label>
                        <input type="text" class="form-control" id="customer" placeholder="Identification Number" value="" name="id_number">
                        
                      </div>
                      <div class="form-group">
                        <label for="institution">Caution Amount</label>
                        <input type="text" class="form-control" id="customer" placeholder="Caution Amount" value="" name="caution">
                        
                      </div>
                     
                      <!--<div class="form-group">-->
                      <!--  <label for="title">Status</label>-->
                      <!--  <select id="client" class="form-control dynamic" name="plate_number">-->
                      <!--        <option selected disabled="">Choose...</option>-->
                              
                      <!--        <option value="Deployed">Deployed</option>-->
                             
                      <!--    </select>-->
                      <!--</div>-->
                      
                      <!--<div class="form-group">-->
                      <!--  <label for="title">Files(invoices, receipts, etc)</label>  -->
                      <!--  <input type="file" class="form-control" name="files[]" placeholder="address" multiple>-->
                      <!--</div>-->
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
                          <script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
                          <script type="text/javascript">
    jQuery(document).ready(function ()
    {
            jQuery('select[name="institution"]').on('change',function(){
               var customerID = jQuery(this).val();
               if(customerID)
               {
                  jQuery.ajax({
                    url : 'getStates/' +customerID,
                     type : "GET",
                     dataType : "json",
                     success:function(data)
                     {
                        console.log(data);
                        jQuery('select[name="invoiceNumber"]').empty();
                        jQuery.each(data, function(key,value){
                           $('select[name="invoiceNumber"]').append('<option value="'+ key +'">'+ key + '</option>');
                        });
                     }
                  });
               }
               else
               {
                  $('select[name="invoiceNumber"]').empty();
               }
            });
    });
    </script>









@endif



@endsection