@include('inc.navbar')
@extends('layouts.app')
@if(Auth::user()->id == 1 || strpos(Auth::user()->role_id, 'Models') !== false)
@section('content')
	
	
	

	<section style="padding-left: 60px; padding-top: 100px; padding-bottom: 100px;">
      <div class="container-fluid">
        <div class="row mb-12">
          <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
            <div class="row align-items-center">
              <div class="col-xl-11 col-12 mb-4 mb-xl-0">
                <h3 class="text-muted text-left mb-3">CREATE Model</h3>
                
               <form action="{{ action('ModelController@store') }}" method="POST" enctype="multipart/form-data">
                      {{ csrf_field() }}
                      <div class="form-group">
                        <label for="title">Name</label>
                        <input type="text" class="form-control" id="title" placeholder="Name" name="name" required>
                      </div>
                      <div class="form-group">
                        <label for="inputState">Supplier</label>
                          <input type="" name="project_number" list="projects" class="form-control" placeholder="Search Supplier" required="" id="txt" required autocomplete="off">
                          <datalist id="projects">
                              <option selected="" disabled="">Choose...</option>
                              @foreach($suppliers as $supplier)
                              <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                              @endforeach
                          </datalist>
                      </div>
                      <div class="form-group">
                        <label for="title">Purchase Price</label>
                        <input type="number" class="form-control" id="title" placeholder="Price" name="supplier_price">
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
@endif