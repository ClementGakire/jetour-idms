@include('inc.navbar')
@extends('layouts.app')

@section('content')
@if(Auth::user()->role_id == 1)
	<section style="padding-left: 60px; padding-top: 100px;">
      <div class="container-fluid">
        <div class="row mb-12">
          <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
            <div class="row align-items-center">
              <div class="col-xl-11 col-12 mb-4 mb-xl-0">
                <h3 class="text-muted text-center mb-3">users</h3>
                <div style="padding-bottom: 20px;">
                 <div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">

</div>

<!--<div class="text-center">
  <a href="/users/create" class="btn btn-info btn-rounded mb-4">Create New user</a>
</div>-->
                 </div>
                <table id="" class="display" style="width:100%" style="padding-left: 60px">
        <thead style="font-size: 14px;">
            <tr>
                <th>Username</th>
                <th>Email</th>
                <th>Role</th>
                              
                <th>action</th>
                
            </tr>
        </thead>
        
        <tbody style="font-size: 12px;">

        	@foreach($users as $user)
        	<tr>
        		
        		<td>{{ $user->name }}</td>
        		<td>{{ $user->email }}</td>
        		<td>{{ $user->role }}</td>
                
        		
        		<td class="text-left pl-4"><a href="/users/{{$user->id}}"><i class="fas fa-eye" style="padding-right: 4px;"></i></a><a href="/users/{{$user->id}}/edit"><i class="fas fa-edit text-success" style="padding-left: 4px;"></i></a></td>
        	</tr>
        	@endforeach
        </tbody>
        	
        <tfoot>
            <tr>
                <th>Username</th>
                <th>Email</th>
                <th>Role</th>
             
                
                <th>Action</th>
                
            </tr>
        </tfoot>
    </table>
    
              </div>  
            </div>    
          </div>      
        </div>        
      </div>
    </section>@endif
       <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.8/js/mdb.min.js"></script>
    <script src="script.js"></script>

    <script>
      $(document).ready(function() {
    $('table.display').DataTable();
} );
    </script>
@endsection