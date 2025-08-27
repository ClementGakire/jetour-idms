@include('inc.navbar')
@extends('layouts.app')

@section('content')
	
@if(Auth::user()->id == 1 || strpos(Auth::user()->role_id, 'Roadmap Return') !== false)
	

	<section style="padding-left: 60px; padding-top: 100px; padding-bottom: 100px;">
      <div class="container-fluid">
        <div class="row mb-12">
          <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
            <div class="row align-items-center">
              <div class="col-xl-11 col-12 mb-4 mb-xl-0">
                <h3 class="text-muted text-left mb-3">CREATE Operation</h3>
                
               <form action="{{ action('PoController@store') }}" method="POST" enctype="multipart/form-data">
                      {{ csrf_field() }}

                      <div class="form-group">
                        <label for="institution">RM No</label>
                        <input type="text" class="form-control" id="customer" placeholder="Enter Roadmap No" value="" name="voucherNo">
                        
                      </div>
                      <div class="form-group">
                        <label for="inputState">Institution</label>
                          <select id="client" class="form-control dynamic" name="institution">
                              <option selected disabled="">Choose...</option>
                              @foreach($institutions as $institution)
                              <option value="{{$institution->name}}">{{$institution->name}}</option>
                              <!--<input type="text" class="form-control" id="member" placeholder="Enter Customer" value="" name="adescription">-->
                              @endforeach
                          </select>
                      </div>

                  

                      
                      <div class="form-group">
                        <label for="inputState">Purchase Order</label>
                          <select id="client" class="form-control dynamic" name="purchase_order">
                              <option selected disabled="">Choose...</option>
                              
                          </select>
                      </div>
                     <div class="form-group">
                        <label for="start_date">Paid On</label>
                        <input type="date" name="payment_date" id="start_date" class="form-control">
                      </div>
                      <div class="form-group">
                        <label for="title">Amount</label>
                        <input type="text" class="form-control" id="title" placeholder="Amount" name="amount">
                      </div>
                      <div class="form-group">
                        <label for="title">Files(invoices, etc)</label>  
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
                          <script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
<script type="text/javascript">
    jQuery(document).ready(function ()
    {
            jQuery('select[name="institution"]').on('change',function(){
               var customerID = jQuery(this).val();
               console.log(customerID);
               if(customerID)
               {
                  jQuery.ajax({
                    url : 'getStates/' +customerID,
                     type : "GET",
                     dataType : "json",
                     success:function(data)
                     {
                        console.log(data);
                        jQuery('select[name="purchase_order"]').empty();
                        jQuery.each(data, function(key,value){
                           $('select[name="purchase_order"]').append('<option value="'+ key +'">'+ key + '</option>');
                        });
                     }
                  });
               }
               else
               {
                  $('select[name="purchase_order"]').empty();
               }
            });
    });
    </script>
    @endif
@endsection