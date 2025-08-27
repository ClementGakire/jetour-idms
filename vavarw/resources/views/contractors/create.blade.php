@include('inc.navbar')
@extends('layouts.app')

@section('content')
@if(Auth::user()->role_id == 1)
	
	

	<section style="padding-left: 60px; padding-top: 100px; padding-bottom: 100px;">
      <div class="container-fluid">
        <div class="row mb-12">
          <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
            <div class="row align-items-center">
              <div class="col-xl-11 col-12 mb-4 mb-xl-0">
                <h3 class="text-muted text-left mb-3">INSERT CONTRACTOR</h3>
                
               <form action="{{ action('ContractorController@store') }}" method="POST" enctype="multipart/form-data">
                      {{ csrf_field() }}
                      <div class="form-group">
                        <label for="title">Name</label>
                        <input type="text" class="form-control" id="title" placeholder="Name" name="name">
                      </div>

                      <div class="form-group">
                        <label for="title">Tin</label>
                        <input type="text" class="form-control" id="title" placeholder="Tin" name="tin">
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