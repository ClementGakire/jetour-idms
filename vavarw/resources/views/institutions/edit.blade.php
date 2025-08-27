@include('inc.navbar')
@extends('layouts.app')

@section('content')
	
	@if(Auth::user()->id == 1)
	

	<section style="padding-left: 60px; padding-top: 100px; padding-bottom: 100px;">
      <div class="container-fluid">
        <div class="row mb-12">
          <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
            <div class="row align-items-center">
              <div class="col-xl-11 col-12 mb-4 mb-xl-0">
                <h3 class="text-muted text-left mb-3">CREATE INSTITUTION</h3>
                
               <form action="{{ action('InstitutionController@update', [$institution->id]) }}" method="POST">
                      {{ csrf_field() }}
                      <input type="hidden" name="_method" value="put">
                      <!--<div class="form-group">
                        <label for="member">Team Member</label>
                        <input type="text" class="form-control" id="member" placeholder="Enter T.Member" value="" name="member">
                        
                      </div>-->

                      <!--<div class="form-group">
                        <label for="customer">Customer</label>
                        <input type="text" class="form-control" id="customer" placeholder="Enter Customer" value="" name="customer">
                        
                      </div>-->
                      

                  

                      
                      <div class="form-group">
                        <label for="title">Name</label>
                        <input type="text" class="form-control" id="title" placeholder="Name" name="name" value="{{ $institution->name }}">
                      </div>
                     
                      

                      
                      <div class="form-group">
                        <label for="title">Tin</label>
                        <input type="text" class="form-control" id="title" placeholder="Tin" name="tin"value="{{ $institution->tin }}">
                      </div>
                      <button type="submit" class="btn btn-primary">Submit</button>
                 
               </form>
    
              </div>  
            </div>    
          </div>      
        </div>        
      </div>
    </section>@endif
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