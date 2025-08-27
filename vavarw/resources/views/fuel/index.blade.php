@include('inc.navbar')
@extends('layouts.app')
@section('content')
@if(Auth::user()->role_id == 1 || 3)
	<section style="padding-left: 60px; padding-top: 100px;">
      <div class="container-fluid">
        <div class="row mb-12">
          <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
            <div class="row align-items-center">
              <div class="col-xl-11 col-12 mb-4 mb-xl-0">
                <h3 class="text-muted text-center mb-3">Daily Report</h3>
                <div style="padding-bottom: 20px;">
                 <div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">

</div>


                 </div>
                <table id="example" class="display" style="width:100%" style="padding-left: 60px">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th style="white-space: nowrap;">Plate Number</th>
                            <th style="white-space: nowrap;">Status</th>
                            <th style="white-space: nowrap;">Dates</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        @foreach($roadmaps as $index => $roadmap)
                            @php
                                $today = \Carbon\Carbon::now()->startOfDay();
                                $createdOn = $roadmap->created_on ? \Carbon\Carbon::parse($roadmap->created_on)->startOfDay() : null;
                                $receivedOn = $roadmap->received_on ? \Carbon\Carbon::parse($roadmap->received_on)->startOfDay() : null;
                    
                                if ($createdOn && $receivedOn && $today->between($createdOn, $receivedOn)) {
                                    $status = 'DEPLOYED';
                                    $statusClass = 'text-success';
                                    $showInstitution = true;
                                    $showDates = true;
                                } else {
                                    $status = 'PARKING';
                                    $statusClass = 'text-warning';
                                    $showInstitution = false;
                                    $showDates = false;
                                }
                            @endphp
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $roadmap->plate_number }}</td>
                                <td><span class="{{ $statusClass }}">{{ $status }}</span>
                                    @if($showInstitution && $roadmap->institution)
                                        {{ $roadmap->institution }}
                                    @endif
                                </td>
                                <td>
                                    @if($showDates)
                                        {{ $roadmap->created_on }} - {{ $roadmap->received_on }}
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Plate Number</th>
                            <th>Status</th>
                            <th>Dates</th>
                        </tr>
                    </tfoot>
                </table>

    <br>
    <br>
              </div>  
            </div>    
          </div>      
        </div>        
      </div>
    </section>
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
@endif
@endsection