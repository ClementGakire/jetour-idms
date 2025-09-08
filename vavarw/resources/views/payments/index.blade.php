@include('inc.navbar')
@extends('layouts.app')

@section('content')
@if(Auth::user()->id == 1 || strpos(Auth::user()->role_id, 'Payments') !== false)
<style>
  /* Subtle pulsing for active statuses */
  @keyframes pulse {
    0% { box-shadow: 0 0 0 0 rgba(222,98,35,0.35); }
    70% { box-shadow: 0 0 12px 6px rgba(222,98,35,0.12); }
    100% { box-shadow: 0 0 0 0 rgba(222,98,35,0); }
  }

  .flash { animation: pulse 1.8s infinite; }

  /* Table visuals */
  table.table { border-collapse: separate; border-spacing: 0; }
  table.table thead th { background:#f7f9fb; color:#222; font-weight:700; border-bottom:2px solid #e9eef3; padding:10px 12px; }
  table.table tbody td { padding:10px 12px; vertical-align:middle; }
  table.table.table-striped tbody tr:nth-of-type(odd) { background: #ffffff; }
  table.table.table-striped tbody tr:nth-of-type(even) { background: #fbfdff; }

  /* Badges for status */
  .badge { display:inline-block; padding:6px 10px; border-radius:6px; font-size:12px; font-weight:600; }
  .badge-deployed { background:#DE6223; color:#fff; }
  .badge-booked { background:#17a2b8; color:#fff; }
  .badge-completed { background:#6c757d; color:#fff; }
  .badge-parking { background:#343a40; color:#fff; }

  /* Checked status badges */
  .badge-checked-yes { background:#28a745; color:#fff; }
  .badge-checked-no { background:#6c757d; color:#fff; }

  /* Action buttons */
  .action-buttons { display:flex; gap:6px; justify-content:center; }
  .action-btn { width:36px; height:36px; display:inline-flex; align-items:center; justify-content:center; padding:0; border-radius:6px; }

  /* Unpaid summary */
  .unpaid-summary { background: #f8f9fb; border-top:1px solid #e9eef3; margin-top:6px; padding:10px 16px; border-radius:4px; }

  /* Small screens: reduce padding */
  @media (max-width: 768px) {
    table.table thead th, table.table tbody td { padding:8px 6px; font-size:12px; }
    .unpaid-summary { font-size:13px; padding:8px; }
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
        <table class="table display table-striped table-bordered table-hover" style="width:100%; font-size:13px;">
    <thead>
        <tr>
            <th class="text-center">S/No</th>
            <th class="text-center">Model</th>
            <th class="text-center">Plate Number</th>
            <th class="text-center">Booking Date</th>
            <th class="text-center">Return Date</th>
            <th class="text-center">Unit Price</th>
            <th class="text-center">Total Price</th>
              <th class="text-center">Unpaid Amount</th>
            <th class="text-center">Client</th>
              <th class="text-center">Driver</th>
              <th class="text-center">Driver Phone</th>
                <th class="text-center">Advance</th>
                <th class="text-center">Caution</th>
                
            <th class="text-center">Status</th>
            <th class="text-center">Checked</th>
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

  // Check booking dates and supplier conditions
  if ($bookingDate === null || $returnDate === null || $returnDate->lt($today)) {
    // If no booking/return date, show "Parking" if supplier_id is 11
    if ($payment->supplier_id == 11) {
      $status = 'Parking';
    }
  } elseif ($today->lt($bookingDate)) {
    // If booking date is in the future, status is 'Booked'
    $status = 'Booked';
  } elseif (($today->gte($bookingDate)) && ($today->lte($returnDate))) {
    // Check if today is between booking and return date, inclusive
    $status = 'Deployed';
  }

  // Determine badge class for visual styling (applies subtle flash for Deployed/Booked)
  $badgeClass = '';
  if ($status === 'Deployed') {
    $badgeClass = 'badge-deployed flash text-white';
  } elseif ($status === 'Booked') {
    $badgeClass = 'badge-booked flash text-white';
  } elseif ($status === 'Completed') {
    $badgeClass = 'badge-completed';
  } elseif ($status === 'Parking') {
    $badgeClass = 'badge-parking';
  } else {
    $badgeClass = 'badge-secondary';
  }
@endphp


            @if($status)
                <tr id="payment-row-{{ $payment->id }}">
                    <td class="text-center cell-sno">{{ $loop->iteration }}</td>
                    <td class="text-center cell-model">{{ $payment->model }}</td>
                    <td class="text-center cell-plate">{{ $payment->plate_number }}</td>
                    <td class="text-center cell-booking_date">
                        {{ $status !== 'Parking' ? ($payment->booking_date ?? '') : '' }}
                    </td>
                    <td class="text-center cell-return_date">
                        {{ $status !== 'Parking' ? ($payment->return_date ?? '') : '' }}
                    </td>
                    <td class="text-center cell-unit_price">
                        {{ $status !== 'Parking' && $payment->unit_price ? number_format($payment->unit_price) : '' }}
                    </td>
          <td class="text-center cell-total_price">
            {{ $status !== 'Parking' && $totalPrice ? number_format($totalPrice) : '' }}
          </td>
          <td class="text-center cell-unpaid">
            @php
              $advance = $payment->advance ?? 0;
              $unpaid = ($totalPrice && $status !== 'Parking') ? max(0, $totalPrice - $advance) : null;
            @endphp
            {{ $unpaid !== null ? number_format($unpaid) : '' }}
          </td>
                    <td class="text-center cell-client">
            @if($status !== 'Parking')
              <div class="client-name">{{ $payment->client ?? '' }}</div>
              <div class="client-phone" style="font-size:11px;color:#555;">{{ $payment->phone_number ?? '' }}</div>
            @endif
                    </td>
                    <td class="text-center cell-driver">{{ $status !== 'Parking' ? ($payment->driver_name ?? '') : '' }}</td>
                    <td class="text-center cell-driver_phone">{{ $status !== 'Parking' ? ($payment->driver_phone ?? '') : '' }}</td>
                    <td class="text-center cell-advance">{{ $status !== 'Parking' ? ($payment->advance ?? '') : '' }}</td>
                    @php $caution = $payment->caution ?? $payment->caution_amount ?? null; @endphp
                    <td class="text-center cell-caution">{{ $status !== 'Parking' && $caution ? number_format($caution) : '' }}</td>
                    <td class="text-center cell-status">
            <span class="badge {{ $badgeClass }}">{{ $status }}</span>
          </td>
                    <td class="text-center cell-checked">
                      @php $checked = $payment->checked_status ?? 'no'; @endphp
                      @if(strtolower($checked) === 'yes')
                        <span class="badge badge-checked-yes">Yes</span>
                      @else
                        <span class="badge badge-checked-no">No</span>
                      @endif
                    </td>
                    <td class="text-center cell-booked_by">
                        {{ $status !== 'Parking' ? ($payment->username ?? '') : '' }}
                    </td>
                    @if(Auth::user()->id == 1)
                        <td class="text-center">
                          <div class="action-buttons">
                            <form action="{{ action('PaymentController@destroy', [$payment->id]) }}" method="POST" id="deleteForm-{{ $payment->id }}" style="margin:0;">
                              {{ csrf_field() }}
                              <input type="hidden" name="_method" value="delete">
                              <button type="button" class="btn btn-danger action-btn delete-button" data-id="{{ $payment->id }}" title="Delete">
                                <i class="fas fa-trash"></i>
                              </button>
                            </form>
                            <a href="/payments/{{ $payment->id }}" class="btn btn-info action-btn" title="View"><i class="fas fa-eye"></i></a>
                            <a href="/payments/{{ $payment->id }}/edit" class="btn btn-light action-btn" title="Edit"><i class="fas fa-edit text-success"></i></a>
                            <!-- Print action: opens printable template in popup and triggers print -->
                            <button type="button" class="btn btn-primary action-btn" title="Print" onclick="printApproved({{ $payment->id }})">
                              <i class="fas fa-print"></i>
                            </button>
                          </div>
                        </td>
          @endif
                </tr>
            @endif
            <!-- Hidden printable template for this payment -->
            <tr style="display:none;">
              <td colspan="100">
                <div id="printable-{{ $payment->id }}" style="display:none;">
                  <div class="print-header">
                    <div class="logo">JET TOURS COMPANY LIMITED</div>
                    <div class="company-info">96 KK 15 Rd, Kigali<br>Tel: (+250) 788 483 025</div>
                  </div>
                  <h3 style="text-align:center;">Invoice</h3>
                  <table class="section-table" style="width:100%;">
                    <tr class="section-title"><th>Supplier</th><th>Operation</th></tr>
                    <tr>
                      <td>
                        <div class="row"><span class="label">Supplier:</span> {{ $payment->institution ?? '' }}</div>
                        
                      </td>
                      <td>
                        <div class="row"><span class="label">P.O Number:</span> {{ $payment->voucherNo ?? '' }}</div>
                        <div class="row"><span class="label">Contractor:</span> {{ $payment->contractor_name ?? '' }}</div>
                        <div class="row"><span class="label">Operator:</span> {{ $payment->booked_by ?? '' }}</div>
                        <div class="row"><span class="label">Destination:</span> {{ $payment->client ?? '' }}</div>
                        <div class="row"><span class="label">Plate:</span> {{ $payment->plate_number ?? '' }}</div>
                        <div class="row"><span class="label">Driver:</span> {{ $payment->driver_name ?? '' }} ({{ $payment->driver_phone ?? '' }})</div>
                        <div class="row"><span class="label">Starting Date:</span> {{ $payment->booking_date ?? '' }} <span style="margin-left:12px;"><strong>Ending Date:</strong> {{ $payment->return_date ?? '' }}</span></div>
                      </td>
                    </tr>
                  </table>
                  <div class="totals">
                    <div class="box"><div class="label">Total Purchase Price</div><div class="amount">{{ number_format($payment->amounts ?? 0) }}</div></div>
                    <div class="box"><div class="label">Total Selling Price</div><div class="amount">{{ number_format($payment->total_price ?? 0) }}</div></div>
                  </div>
                  <div class="status-badge">APPROVED</div>
                </div>
              </td>
            </tr>

        @endforeach
    </tbody>
</table>
<div class="unpaid-summary text-right" style="padding:8px 12px; font-weight:600;">Total unpaid: <span class="unpaid-total">0</span></div>
            @endforeach
            <div class="text-center" style="margin-top:18px;">
              <a href="{{ url('/booking-history') }}" class="btn btn-secondary btn-rounded mb-4">Booking History</a>
            </div>


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
    $('table.display').each(function() { $(this).DataTable().draw(); });
    }
  });
  
  $("#max").datepicker({
    changeMonth: true,
    changeYear: true,
    dateFormat: 'dd-mm-yy',
    onSelect: function() {
  console.log("Max date selected");
  $('table.display').each(function() { $(this).DataTable().draw(); });
    }
  });
    
  // Initialize each DataTable with Buttons and compute Unpaid totals per table
  $('table.display').each(function() {
    var $tbl = $(this);
    $tbl.DataTable({
      dom: "<'row'<'col-sm-3'l><'col-sm-6 text-center'B><'col-sm-3'f>>" +
           "<'row'<'col-sm-12'tr>>" +
           "<'row'<'col-sm-5'i><'col-sm-7'p>>",
      buttons: [ 'copy','csv','excel','pdf','print' ],
      lengthChange: true,
      pageLength: 10,
      lengthMenu: [[10,25,50,100,150,200,-1],[10,25,50,100,150,200,'All']],
      drawCallback: function(settings) {
        var api = this.api();
        var unpaidIndex = $tbl.find('thead th').filter(function() {
          return $(this).text().trim() === 'Unpaid Amount';
        }).index();
        if (unpaidIndex === -1) return;
        var total = 0;
        api.column(unpaidIndex, {search: 'applied'}).nodes().to$().each(function() {
          var txt = $(this).text().replace(/,/g,'').trim();
          if (txt !== '') {
            var v = parseFloat(txt);
            if (!isNaN(v)) total += v;
          }
        });
        var $summary = $tbl.nextAll('.unpaid-summary').first().find('.unpaid-total');
        if ($summary.length) $summary.text(total.toLocaleString());
      }
    });
  });

  // Ensure the history table has a dedicated DataTable configuration (if present)
  if ($('#history-table').length) {
    $('#history-table').DataTable().draw();
  }

  // Custom filtering function for date range (robust parsing for dd-mm-yy, dd/mm/yyyy, etc.)
  $.fn.dataTable.ext.search.push(
    function(settings, data, dataIndex) {
      var min = $('.min').datepicker("getDate");
      var max = $('#max').datepicker("getDate");
      var bookingDateStr = data[4] || '';

      function parseDateStr(s) {
        s = (s || '').toString().trim();
        if (!s) return null;
        // Try splitting common separators
        var parts = s.split(/[-\/\.]/);
        if (parts.length === 3) {
          // Detect ISO / Y-M-D (e.g., 2025-08-26) where first part is 4 digits
          if (parts[0].length === 4) {
            var y = parseInt(parts[0], 10);
            var m = parseInt(parts[1], 10) - 1;
            var d = parseInt(parts[2], 10);
            var dt = new Date(y, m, d);
            dt.setHours(0,0,0,0);
            return dt;
          }
          // Otherwise assume D-M-Y or D-M-YY
          var d = parseInt(parts[0], 10);
          var m = parseInt(parts[1], 10) - 1;
          var y = parseInt(parts[2], 10);
          if (y < 100) y += 2000;
          var dt2 = new Date(y, m, d);
          dt2.setHours(0,0,0,0);
          return dt2;
        }
        // Fallback: try native parse (ISO timestamps), then normalize
        var t = Date.parse(s);
        if (isNaN(t)) return null;
        var dtf = new Date(t);
        dtf.setHours(0,0,0,0);
        return dtf;
      }

      var bookingDate = parseDateStr(bookingDateStr);

      // If no filters are set allow the row
      if (min == null && max == null) {
        return true;
      }

      // If bookingDate is not parseable, exclude when any filter is set
      if (bookingDate == null) {
        return false;
      }

      if (min == null && bookingDate <= max) return true;
      if (max == null && bookingDate >= min) return true;
      if (bookingDate >= min && bookingDate <= max) return true;
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

// Attach delete handler to buttons using data-id to avoid inline Blade-in-JS syntax
$(document).on('click', '.delete-button', function(e) {
  var id = $(this).data('id');
  confirmDelete(id);
});

function confirmDelete(id) {
  if (confirm("Are you sure you want to delete this record?")) {
    document.getElementById('deleteForm-' + id).submit();
  }
}
</script>

@endif
@endsection

<script>
  // Print helper: opens a popup with the printable template and triggers print
  function printApproved(id) {
    var row = document.getElementById('payment-row-' + id);
    if (!row) {
      alert('Row not found for id ' + id);
      return;
    }
    // read values from the row cells
    function text(sel) { var el = row.querySelector(sel); return el ? el.textContent.trim() : ''; }
    var model = text('.cell-model');
    var plate = text('.cell-plate');
    var bookingDate = text('.cell-booking_date');
    var returnDate = text('.cell-return_date');
    var unitPrice = text('.cell-unit_price');
    var totalPrice = text('.cell-total_price');
    var unpaid = text('.cell-unpaid');
    var client = text('.client-name');
    var phone = text('.client-phone');
    var driver = text('.cell-driver');
    var driverPhone = text('.cell-driver_phone');
    var advance = text('.cell-advance');
    var caution = text('.cell-caution');
    var status = text('.cell-status');
    var bookedBy = text('.cell-booked_by');

    var w = window.open('', '_blank', 'width=900,height=700');
    var html = '<!doctype html><html><head><meta charset="utf-8"><title>Reception Print</title>' +
      '<style>@page{size:A4;margin:18mm}body{font-family:Helvetica,Arial,sans-serif;padding:18px;color:#222}.print-header{display:flex;justify-content:space-between;align-items:center;margin-bottom:18px}.logo{font-weight:700;font-size:18px}.company-info{text-align:right;font-size:12px;color:#333}.label{font-weight:700;display:inline-block;min-width:160px}.row{margin-bottom:8px;font-size:13px}.section-table{width:100%;border-collapse:collapse;margin-top:12px;font-size:13px}.section-table th,.section-table td{padding:10px;border:1px solid #ddd;vertical-align:top}.section-title{background:#f5f5f5;font-weight:700}.totals{margin-top:20px;font-size:14px;display:flex;gap:20px}.totals .box{padding:12px 16px;border:1px solid #e0e0e0;background:#fafafa;border-radius:6px}.totals .amount{font-weight:700;font-size:1.1em;color:#111}.status-badge{display:inline-block;padding:8px 12px;background:#2e7d32;color:#fff;border-radius:4px;font-weight:700;margin-top:12px}.watermark{position:fixed;top:45%;left:50%;transform:translate(-50%,-50%) rotate(-28deg);font-size:8rem;color:rgba(0,0,0,0.04);pointer-events:none;z-index:9999}</style>' +
      '</head><body><div class="watermark">APPROVED</div>' +
      '<div class="print-header"><div class="logo">JET TOURS COMPANY LIMITED</div><div class="company-info">96 KK 15 Rd, Kigali<br>Tel: (+250) 788 483 025</div></div>' +
      '<h3 style="text-align:center">Reception / Approved Report</h3>' +
      '<table class="section-table"><tr class="section-title"><th>Supplier</th><th>Operation</th></tr>' +
      '<tr><td><div class="row"><span class="label">Supplier:</span> ' + (client || '') + '</div><div class="row"><span class="label">Phone:</span> ' + (phone || '') + '</div></td>' +
      '<td><div class="row"><span class="label">Model:</span> ' + (model || '') + '</div>' +
      '<div class="row"><span class="label">Plate:</span> ' + (plate || '') + '</div>' +
      '<div class="row"><span class="label">Driver:</span> ' + (driver || '') + ' (' + (driverPhone || '') + ')</div>' +
      '<div class="row"><span class="label">Starting Date:</span> ' + (bookingDate || '') + ' <strong style="margin-left:12px">Ending Date:</strong> ' + (returnDate || '') + '</div>' +
      '<div class="row"><span class="label">Booked By:</span> ' + (bookedBy || '') + '</div></td></tr></table>' +
      '<div class="totals"><div class="box"><div class="label">Total Purchase Price</div><div class="amount">' + (totalPrice || '0') + '</div></div>' +
      '<div class="box"><div class="label">Total Selling Price</div><div class="amount">' + (totalPrice || '0') + '</div></div></div>' +
      '<div class="status-badge">' + (status || 'APPROVED') + '</div>' +
      '</body></html>';

    w.document.open();
    w.document.write(html);
    w.document.close();
    setTimeout(function(){ w.focus(); w.print(); }, 300);
  }
</script>
