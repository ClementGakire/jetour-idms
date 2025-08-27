@include('inc.navbar')
@extends('layouts.app')

@section('content')
@if(Auth::user()->id == 1 || strpos(Auth::user()->role_id, 'Payments') !== false)
<style>
  @keyframes flash {
    0% { background-color: #DE6223; opacity: 1; }
    50% { background-color: rgba(222, 98, 35, 0.5); }
    100% { background-color: #DE6223; opacity: 1; }
  }
  
  .flash {
    animation: flash 1s infinite;
  }
</style>

<section style="padding-left: 60px; padding-top: 100px;">
  <div class="container-fluid">
    <div class="row mb-12">
      <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
        <div class="row align-items-center">
          <div class="col-xl-11 col-12 mb-4 mb-xl-0">
            <h3 class="text-muted text-center mb-3">ALL Bookings</h3>
            <div class="text-center">
              <a href="/payments/create" class="btn btn-info btn-rounded mb-4">Create a New Booking</a>
            </div>

            @php
              // Group the payments by the 'model' field dynamically
              $groupedPayments = $payments->groupBy('model');
            @endphp

            @foreach($groupedPayments as $modelName => $modelPayments)
              <h3 class="text-muted text-center mb-3">{{ $modelName }}</h3>
              <table class="table display" style="width:100%">
    <thead>
        <tr>
            <th class="text-center">S/No</th>
            <th class="text-center">Model</th>
            <th class="text-center">Plate Number</th>
            <th class="text-center">Booking Date</th>
            <th class="text-center">Return Date</th>
            <th class="text-center">Unit Price</th>
            <th class="text-center">Total Price</th>
            <th class="text-center">Client</th>
              <th class="text-center">Driver</th>
              <th class="text-center">Driver Phone</th>
              <th class="text-center">Advance</th>
            <th class="text-center">Status</th>
            <th class="text-center">Booked By</th>
            @if(Auth::user()->id == 1)
                <th class="text-center">Action</th>
            @endif
        </tr>
    </thead>
    <tbody>
        @foreach($modelPayments as $payment)
           @php
    $today = now()->startOfDay();  // Normalize to the start of the day to ignore time components
    $bookingDate = $payment->booking_date ? \Carbon\Carbon::parse($payment->booking_date)->startOfDay() : null;
    $returnDate = $payment->return_date ? \Carbon\Carbon::parse($payment->return_date)->startOfDay() : null;
    $numDays = $bookingDate && $returnDate ? $bookingDate->diffInDays($returnDate) + 1 : 0;
    $totalPrice = $numDays * ($payment->unit_price ?? 0);

    // Initialize status variables
    $status = ''; // Default status to avoid missing cars
    $statusClass = ''; // No flashing by default

    // Check booking dates and supplier conditions
    if ($bookingDate === null || $returnDate === null || $returnDate->lt($today)) {
        // If no booking/return date, show "Parking" if supplier_id is 11
        if ($payment->supplier_id == 11) {
            $status = 'Parking';
        }
    } elseif ($today->lt($bookingDate)) {
        // If booking date is in the future, status is 'Booked'
        $status = 'Booked';
        $statusClass = 'flash text-white'; // Flashing for booked status
    } elseif (($today->gte($bookingDate)) && ($today->lte($returnDate))) {
        // Check if today is between booking and return date, inclusive
        $status = 'Deployed';
        $statusClass = 'flash text-white'; // Flashing for deployed status
    }
@endphp


            @if($status)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td class="text-center">{{ $payment->model }}</td>
                    <td class="text-center">{{ $payment->plate_number }}</td>
                    <td class="text-center">
                        {{ $status !== 'Parking' ? ($payment->booking_date ?? '') : '' }}
                    </td>
                    <td class="text-center">
                        {{ $status !== 'Parking' ? ($payment->return_date ?? '') : '' }}
                    </td>
                    <td class="text-center">
                        {{ $status !== 'Parking' && $payment->unit_price ? number_format($payment->unit_price) : '' }}
                    </td>
                    <td class="text-center">
                        {{ $status !== 'Parking' && $totalPrice ? number_format($totalPrice) : '' }}
                    </td>
                    <td class="text-center">
                        {{ $status !== 'Parking' ? ($payment->client ?? '') : '' }}
                    </td>
                    <td class="text-center">{{ $status !== 'Parking' ? ($payment->driver_name ?? '') : '' }}</td>
                    <td class="text-center">{{ $status !== 'Parking' ? ($payment->driver_phone ?? '') : '' }}</td>
                    <td class="text-center">{{ $status !== 'Parking' ? ($payment->advance ?? '') : '' }}</td>
                    <td class="text-center {{ $statusClass }}">
                        {{ $status }}
                    </td>
                    <td class="text-center">
                        {{ $status !== 'Parking' ? ($payment->username ?? '') : '' }}
                    </td>
                    @if(Auth::user()->id == 1)
                        <td class="text-center">
                            @if($payment->booking_date)
                                <form action="{{ action('PaymentController@destroy', [$payment->id]) }}" method="POST" id="deleteForm-{{ $payment->id }}">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="delete">
                                    <button type="button" class="btn btn-danger" onclick="confirmDelete({{ $payment->id }})">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                                <a href="/payments/{{ $payment->id }}/edit">
                                    <i class="fas fa-edit text-success"></i>
                                </a>
                            @endif
                        </td>
                    @endif
                </tr>
            @endif

        @endforeach
    </tbody>
</table>
            @endforeach
            <h3 class="text-muted text-center mb-3">Booking History</h3>
            <table border="0" cellspacing="5" cellpadding="5" style="padding-top: 45px; padding-bottom: 45px;">
  <tbody>
    <tr>
      <td>Filter Data by Booking Date</td>
      <td>From:</td>
      <td><input type="text" id="min" name="min" class="min" placeholder="Start Date"></td>
      <td>To:</td>
      <td><input type="text" id="max" name="max" placeholder="End Date"></td>
    </tr>
  </tbody>
</table>

<table class="table display" style="width:100%">
  <thead>
    <tr>
      <th class="text-center">S/No</th>
      <th class="text-center">Model</th>
      <th class="text-center">Plate Number</th>
      <th class="text-center">Supplier</th>
      <th class="text-center">Booking Date</th>
      <th class="text-center">Return Date</th>
      <th class="text-center">Unit Price</th>
      <th class="text-center">Total Price</th>
      <th class="text-center">Client</th>
  <th class="text-center">Driver</th>
  <th class="text-center">Driver Phone</th>
  <th class="text-center">Advance</th>
      <th class="text-center">Status</th>
      <th class="text-center">Booked By</th>
      @if(Auth::user()->id == 1)
        <th class="text-center">Action</th>
      @endif
    </tr>
  </thead>
  <tbody>
    @php $historyCounter = 1; @endphp
    @foreach($bookings as $payment)
      @php
        $bookingDate = $payment->booking_date ? \Carbon\Carbon::parse($payment->booking_date) : null;
        $returnDate = $payment->return_date ? \Carbon\Carbon::parse($payment->return_date) : null;
        $numDays = $bookingDate && $returnDate ? $bookingDate->diffInDays($returnDate) + 1 : 0;
        $totalPrice = $numDays * ($payment->unit_price ?? 0);
        $status = '';

        // Determine booking status
        if ($returnDate && $returnDate->lt($today)) {
          $status = 'Completed';
        } elseif ($bookingDate && $today->lt($bookingDate)) {
          $status = 'Booked';
        } elseif ($bookingDate && $returnDate && $today->between($bookingDate, $returnDate)) {
          $status = 'Deployed';
        } elseif ($payment->supplier_id == 11) {
          $status = 'Parking';
        } else {
          $status = 'Unknown';
        }
      @endphp

      <tr>
        <td class="text-center">{{ $historyCounter++ }}</td>
        <td class="text-center">{{ $payment->model }}</td>
        <td class="text-center">{{ $payment->plate_number }}</td>
        <td class="text-center">{{ $payment->supplier }}</td>
        <td class="text-center">{{ $payment->booking_date }}</td>
        <td class="text-center">{{ $payment->return_date }}</td>
        <td class="text-center">{{ number_format($payment->unit_price) }}</td>
        <td class="text-center">{{ number_format($totalPrice) }}</td>
        <td class="text-center">{{ $payment->client }}</td>
    <td class="text-center">{{ $payment->driver_name ?? '' }}</td>
    <td class="text-center">{{ $payment->driver_phone ?? '' }}</td>
    <td class="text-center">{{ $payment->advance ?? '' }}</td>
        <td class="text-center">{{ $status }}</td>
        <td class="text-center">{{ $payment->username }}</td>
        @if(Auth::user()->id == 1)
          <td class="text-center">
              @if($payment->booking_date)
                  <form action="{{ action('PaymentController@destroy', [$payment->id]) }}" method="POST" id="deleteForm-{{ $payment->id }}">
                      {{ csrf_field() }}
                      <input type="hidden" name="_method" value="delete">
                      <button type="button" class="btn btn-danger" onclick="confirmDelete({{ $payment->id }})">
                          <i class="fas fa-trash"></i>
                      </button>
                  </form>
                  <a href="/payments/{{ $payment->id }}/edit">
                      <i class="fas fa-edit text-success"></i>
                  </a>
              @endif
          </td>
      @endif
      </tr>
    @endforeach
  </tbody>
</table>


          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- jQuery and jQuery UI -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>


<script>
$(document).ready(function() {
    
    $("#min").datepicker({
    changeMonth: true,
    changeYear: true,
    dateFormat: 'dd-mm-yy',
    onSelect: function() {
      console.log("Min date selected");
      table.draw();
    }
  });
  
  $("#max").datepicker({
    changeMonth: true,
    changeYear: true,
    dateFormat: 'dd-mm-yy',
    onSelect: function() {
      console.log("Max date selected");
      table.draw();
    }
  });
    
  // Initialize DataTables with Buttons
    var table = $('table.display').DataTable({
    dom: "<'row'<'col-sm-3'l><'col-sm-6 text-center'B><'col-sm-3'f>>" +
         "<'row'<'col-sm-12'tr>>" +
         "<'row'<'col-sm-5'i><'col-sm-7'p>>",
    buttons: [
      'copy',  // Copy to clipboard
      'csv',   // Export to CSV
      'excel', // Export to Excel
      'pdf',   // Export to PDF
      'print'  // Print view
    ],
    lengthChange: true,
    pageLength: 10,
    lengthMenu: [[10, 25, 50, 100, 150, 200, -1], [10, 25, 50, 100, 150, 200, "All"]]
  });

  // Custom filtering function for date range
  $.fn.dataTable.ext.search.push(
    function(settings, data, dataIndex) {
      var min = $('.min').datepicker("getDate");
      var max = $('#max').datepicker("getDate");
      var bookingDate = new Date(data[4]); // Column index for "Booking Date"

      if ((min == null && max == null) || 
          (min == null && bookingDate <= max) ||
          (max == null && bookingDate >= min) || 
          (bookingDate >= min && bookingDate <= max)) {
        return true;
      }
      return false;
    }
  );

  // Datepicker settings for the range inputs
  $("#min").datepicker({
    onSelect: function() { table.draw(); },
    changeMonth: true,
    changeYear: true,
    dateFormat: 'dd-mm-yy'
  });
  $("#max").datepicker({
    onSelect: function() { table.draw(); },
    changeMonth: true,
    changeYear: true,
    dateFormat: 'dd-mm-yy'
  });
});

function confirmDelete(id) {
  if (confirm("Are you sure you want to delete this record?")) {
    document.getElementById('deleteForm-' + id).submit();
  }
}
</script>

@endif
@endsection
