@include('inc.navbar')
@extends('layouts.app')

@section('content')
	
	
	

	<section style="padding-left: 60px; padding-top: 100px; padding-bottom: 100px;">
      <div class="container-fluid">
        <div class="row mb-12">
          <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
            <div class="row align-items-center">
              <div class="col-xl-11 col-12 mb-4 mb-xl-0">
                <h3 class="text-muted text-left mb-3">EDIT BILL</h3>
                
               <form action="{{ action('BillsController@update', [$bill->id]) }}" method="POST" enctype="multipart/form-data">
                      {{ csrf_field() }}
                      <input type="hidden" name="_method" value="put">
                      <div class="form-group">
                        <label for="title">Supplier</label>
                        <input type="" name="supplier_id" list="institutions" class="form-control" placeholder="Search Supplier" required="" id="txts" value="{{$bill->supplier_id}}">
                        <datalist id="institutions">  
                        
                          @foreach($suppliers as $supplier)
                          <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                          @endforeach
                        </datalist>

                      </div>
                      <div class="form-group">
                        <label for="title">Purchase Order</label>
                        <input type="" name="roadmap_id" list="roadmaps" class="form-control" placeholder="Search Purchase Order" required="" id="txts" value="{{$bill->roadmap_id}}">
                        <datalist id="roadmaps">  
                        
                          @foreach($roadmaps as $roadmap)
                          <option value="{{$roadmap->id}}">{{$roadmap->purchase_order}}</option>
                          @endforeach
                        </datalist>

                      </div>
                      <div class="form-group">
                        <label for="title">Quoted Amount</label>
                        <input type="text" class="form-control" id="title" placeholder="Quoted Amount" name="quoted_amount" value="{{ $bill->quoted_amount }}">
                      </div>
                      <div class="form-group">
                        <label for="title">Paid Amount</label>
                        <input type="text" class="form-control" id="title" placeholder="Amount" name="amount" required value="{{ $bill->amount }}">
                      </div>
                      <div class="form-group">
                        <label for="title">Payment Date</label>
                        <input type="date" class="form-control" id="title" placeholder="Amount" name="payment_date" required value="{{ $bill->payment_date }}">
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













@endsection