@include('inc.navbar')
@extends('layouts.app')

@section('content')
	


	<section style="padding-left: 60px; padding-top: 100px; padding-bottom: 100px;">
      <div class="container-fluid">
        <div class="row mb-12">
          <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
            <div class="row align-items-center">
              <div class="col-xl-11 col-12 mb-4 mb-xl-0">
                <h3 class="text-muted text-left mb-3">EDIT USER</h3>
                
               <form action="{{ action('UsersController@update', [$user->id]) }}" method="POST">
                      {{ csrf_field() }}
                      <input type="hidden" name="_method" value="put">
                      

                      <div class="form-group">
                        <label for="institution">Names</label>
                        <input type="text" class="form-control" id="customer" placeholder="User Names" value="{{$user->name}}" name="name" autocomplete="off">
                        
                      </div>
                      <div class="form-group">
                        <label for="title">Role</label>
                        <input type="" name="role_id" list="roles" class="form-control" placeholder="Search Role" required="" id="txts" value="{{ $user->role_id }}" autocomplete="off">
                        <datalist id="roles">  
                        
                          @foreach($roles as $role)
                          <option value="{{$role->id}}">{{$role->role}}</option>
                          @endforeach
                        </datalist>

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
                          <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

@endsection