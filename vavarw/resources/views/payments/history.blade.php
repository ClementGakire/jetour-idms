@include('inc.navbar')
@extends('layouts.app')

@section('content')
@if(Auth::user()->id == 1 || strpos(Auth::user()->role_id, 'Payments') !== false)

<style>
  .unpaid-summary { background: #f8f9fb; border-top:1px solid #e9eef3; margin-top:6px; padding:10px 16px; border-radius:4px; }
  @media (max-width: 768px) { .unpaid-summary { font-size:13px; padding:8px; } }
</style>

<section style="padding-left: 60px; padding-top: 100px;">
  <div class="container-fluid">
    <div class="row mb-12">
      <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
        <div class="row align-items-center">
          <div class="col-12">
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

            <table id="history-table" class="table display" style="width:100%">
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
                  <th class="text-center">Unpaid Amount</th>
                  <th class="text-center">Client</th>
                  <th class="text-center">Driver</th>
                  <th class="text-center">Driver Phone</th>
                  <th class="text-center">Advance</th>
                  <th class="text-center">Caution</th>
                  <th class="text-center">Checked</th>
                  <th class="text-center">Status</th>
                  <th class="text-center">Booked By</th>
                  @if(Auth::user()->id == 1)
                    <th class="text-center">Action</th>
                  @endif
                </tr>
              </thead>
              <tbody>
                @php $historyCounter = 1; $today = now()->startOfDay(); @endphp
                @foreach($bookings as $payment)
                  @php
                    $bookingDate = $payment->booking_date ? \Carbon\Carbon::parse($payment->booking_date) : null;
                    $returnDate = $payment->return_date ? \Carbon\Carbon::parse($payment->return_date) : null;
                    $numDays = $bookingDate && $returnDate ? $bookingDate->diffInDays($returnDate) + 1 : 0;
                    $totalPrice = $numDays * ($payment->unit_price ?? 0);
                    $status = '';

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
                    <td class="text-center">{{ $payment->unit_price ? number_format($payment->unit_price) : '' }}</td>
                    <td class="text-center">{{ $payment->total_price ? number_format($payment->total_price) : '' }}</td>
                    <td class="text-center">
                      @php $advance = $payment->advance ?? 0; $unpaid = ($payment->total_price && $status !== 'Parking') ? max(0, $payment->total_price - $advance) : null; @endphp
                      {{ $unpaid !== null ? number_format($unpaid) : '' }}
                    </td>
                    <td class="text-center">{{ $payment->client }}</td>
                    <td class="text-center">{{ $payment->driver_name ?? '' }}</td>
                    <td class="text-center">{{ $payment->driver_phone ?? '' }}</td>
                    <td class="text-center">{{ $payment->advance ?? '' }}</td>
                    <td class="text-center">{{ $payment->caution ?? $payment->caution_amount ?? '' }}</td>
                    <td class="text-center">
                      @php $checked = $payment->checked_status ?? 'no'; @endphp
                      @if(strtolower($checked) === 'yes')
                        <span class="badge badge-checked-yes">Yes</span>
                      @else
                        <span class="badge badge-checked-no">No</span>
                      @endif
                    </td>
                    <td class="text-center">{{ $status }}</td>
                    <td class="text-center">{{ $payment->username }}</td>
                    @if(Auth::user()->id == 1)
                      <td class="text-center">
                        @if($payment->booking_date)
                          <form action="{{ action('PaymentController@destroy', [$payment->id]) }}" method="POST" id="deleteForm-{{ $payment->id }}">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="delete">
                            <button type="button" class="btn btn-danger delete-button" data-id="{{ $payment->id }}">
                              <i class="fas fa-trash"></i>
                            </button>
                          </form>
                          <a href="/payments/{{ $payment->id }}/edit" class="btn btn-light action-btn"><i class="fas fa-edit text-success"></i></a>
                        @endif
                      </td>
                    @endif
                  </tr>
                @endforeach
              </tbody>
            </table>

            <div class="unpaid-summary text-right" style="padding:8px 12px; font-weight:600;">Total unpaid: <span class="unpaid-total">0</span></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- scripts -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
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
  $("#min, #max").datepicker({ changeMonth:true, changeYear:true, dateFormat:'dd-mm-yy', onSelect: function(){ $('#history-table').DataTable().draw(); } });

  var table = $('#history-table').DataTable({
    dom: "<'row'<'col-sm-3'l><'col-sm-6 text-center'B><'col-sm-3'f>>" +
         "<'row'<'col-sm-12'tr>>" +
         "<'row'<'col-sm-5'i><'col-sm-7'p>>",
    buttons: [ 'copy','csv','excel','pdf','print' ],
    lengthChange: true,
    pageLength: 10,
    lengthMenu: [[10,25,50,100,150,200,-1],[10,25,50,100,150,200,'All']],
    drawCallback: function(settings){
      var api = this.api();
      var unpaidIndex = $('#history-table thead th').filter(function(){ return $(this).text().trim() === 'Unpaid Amount'; }).index();
      if (unpaidIndex === -1) return;
      var total = 0;
      api.column(unpaidIndex, {search: 'applied'}).nodes().to$().each(function(){
        var txt = $(this).text().replace(/,/g,'').trim();
        if (txt !== '') { var v = parseFloat(txt); if (!isNaN(v)) total += v; }
      });
      $('.unpaid-total').text(total.toLocaleString());
    }
  });

  $.fn.dataTable.ext.search.push(function(settings, data){
    if (settings.nTable.id !== 'history-table') return true;
    var min = $('#min').datepicker('getDate');
    var max = $('#max').datepicker('getDate');
    var bookingDateStr = data[4] || '';
    function parseDateStr(s){
      s = (s||'').toString().trim(); if (!s) return null;
      var parts = s.split(/[-\/\.]/);
      if (parts.length === 3){
        if (parts[0].length === 4){ var y = parseInt(parts[0],10); var m = parseInt(parts[1],10)-1; var d = parseInt(parts[2],10); var dt = new Date(y,m,d); dt.setHours(0,0,0,0); return dt; }
        var d = parseInt(parts[0],10); var m = parseInt(parts[1],10)-1; var y = parseInt(parts[2],10); if (y < 100) y += 2000; var dt2 = new Date(y,m,d); dt2.setHours(0,0,0,0); return dt2;
      }
      var t = Date.parse(s); if (isNaN(t)) return null; var dtf = new Date(t); dtf.setHours(0,0,0,0); return dtf;
    }
    var bookingDate = parseDateStr(bookingDateStr);
    if (min == null && max == null) return true;
    if (bookingDate == null) return false;
    if (min == null && bookingDate <= max) return true;
    if (max == null && bookingDate >= min) return true;
    if (bookingDate >= min && bookingDate <= max) return true;
    return false;
  });

  $(document).on('click', '.delete-button', function(){ var id = $(this).data('id'); if (confirm('Are you sure you want to delete this record?')) document.getElementById('deleteForm-' + id).submit(); });
});
</script>

@endif
@endsection
