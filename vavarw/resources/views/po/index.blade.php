@include('inc.navbar')
@extends('layouts.app')
@section('content')
@if(Auth::user()->id == 1 || strpos(Auth::user()->role_id, 'Roadmap Deployment') !== false)
	<section style="padding-left: 60px; padding-top: 100px;">
      <div class="container-fluid">
        <div class="row mb-12">
          <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
            <div class="row align-items-center">
              <div class="col-xl-11 col-12 mb-4 mb-xl-0">
                <h3 class="text-muted text-center mb-3">Ongoing Operations</h3>
                <div style="padding-bottom: 20px;">
                 <div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">

</div>

<div class="text-center">
  <a href="/po/create" class="btn btn-info btn-rounded mb-4">Create New Operation</a>
  
</div>
<table border="0" cellspacing="5" cellpadding="5" style="padding-top: 45px">
                  <tbody><tr>
                        <td>Filter Data by Starting Date</td>
                          <td>From:</td>
                          <td><input type="text" id="min" name="min" class="min"></td>
                      
                          <td>To:</td>
                          <td><input type="text" id="max" name="max"></td>
                      </tr>
                  </tbody>
                </table>
                 </div>
                <table id="example" class="display" style="width:100%" style="padding-left: 50px">
        <thead style="font-size: 14px;">
            <tr>
                <th>P.O Number</th>
               <th class="text-center">Contractor</th>
                <th>Institution</th>
                <th>Number of Days</th>
                <th>Starting Date</th>
                <th>Ending Date</th>
                <th>Advance Cash</th>
                <th>Advance Fuel</th>
                <th>Total Purchase Price</th>
                <th>Purchase Price</th>
                <th>Selling Price</th>
                <th>Total Selling Price</th>
                <th>Supplier</th>
                <th>Driver</th>
                <th>Car</th>
                <th>Operator</th>
                <th>Destination</th>
                <th>Distance(KM)</th>
                <th>Status</th>
                <th>Other Expenses</th>
                <th>Balance to the supplier</th>
                <th>Margin</th>
                @if(Auth::user()->id == 1)
                <th>Inserted By</th>
                <th>action</th>
                @endif
            </tr>
        </thead>
        
        <tbody style="font-size: 12px;">

        	@foreach($roadmaps as $roadmap)
        	<tr>
               <th>{{$roadmap->purchase_order}}</th>
        		<td class="text-center">{{ $roadmap->contractor }}</td>
        		<td>{{ $roadmap->institution }}</td>
                <td>{{ $roadmap->ebm_number }}</td>
        		<td>{{ $roadmap->created_on }}</td>
                
        		<td>{{ $roadmap->received_on }}</td>
        		<td>{{ number_format($roadmap->advance_cash) }}</td>
                <td>{{ number_format($roadmap->advance_fuel) }}</td>
                <td>{{ number_format($roadmap->ebm_number * $roadmap->amount) }}</td>
                
        		<td>{{ number_format($roadmap->amount) }}</td>
        		<td>{{ number_format($roadmap->selling_price) }}</td>
        		<td>{{ number_format($roadmap->ebm_number * $roadmap->selling_price) }}</td>
        		<td>{{$roadmap->supplier}}</td>
        		<td>{{$roadmap->driver}}</td>
        		<td>{{$roadmap->plate_number}}</td>
                <td>{{$roadmap->operator}}</td>
                <td>{{$roadmap->destination}}</td>
                <td>{{$roadmap->odometer_count}}</td>
                
                <td class="text-warning">{{$roadmap->status}}</td>
                <td>{{$roadmap->total_charges}}</td>
                <td>{{number_format(($roadmap->ebm_number * $roadmap->amount) - ($roadmap->advance_cash + $roadmap->advance_fuel + $roadmap->total_charges))}}</td>
                <td>{{number_format(($roadmap->ebm_number * $roadmap->selling_price) - ($roadmap->ebm_number * $roadmap->amount)) }} </td>
                @if(Auth::user()->id == 1)
                <td>{{$roadmap->name}}</td>
        		<td class="text-left pl-4"><a href="/po/{{$roadmap->id}}"><i class="fas fa-eye" style="padding-right: 4px;"></i></a><a href="/po/{{$roadmap->id}}/edit"><i class="fas fa-edit text-success" style="padding-left: 4px;"></i></a></td>
                @endif
        	</tr>
        	@endforeach
        </tbody>
        	
        <tfoot>
            <tr>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                @if(Auth::user()->role_id == 1)
                <th></th>
                <th></th>
                @endif
            </tr>
        </tfoot>
    </table>
    
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
    <script src="{{asset('script.js')}}"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.js"></script> -->
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script> 
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
    <script type="text/javascript">
  $(document).ready(function(){
      $.fn.dataTable.ext.search.push(
      function (settings, data, dataIndex) {
          var min = $('.min').datepicker("getDate");
          var max = $('#max').datepicker("getDate");
          var startDate = new Date(data[4]);
          if (min == null && max == null) { return true; }
          if (min == null && startDate <= max) { return true;}
          if(max == null && startDate >= min) {return true;}
          if (startDate <= max && startDate >= min) { return true; }
          return false;
      });

      $("#min").datepicker({ 
        onSelect: function () { table.draw(); 
        }, 
        changeMonth: true, 
        changeYear: true,
        dateFormat: 'dd-mm-yy' 
      });
      $("#max").datepicker({ 
        onSelect: function () { table.draw(); 
        }, 
        changeMonth: true, 
        changeYear: true,
        dateFormat: 'dd-mm-yy'
      });
          $('#example thead tr').clone(true).appendTo( '#example thead' );
    $('#example thead tr:eq(0) th').each( function (i) {

        var title = $(this).text();
        $(this).html( '<input type="text" style="width:150px;" name="entries" placeholder=" '+title+'" />' );
 
        $( 'input', this ).on( 'keyup change', function () {
            if ( table.column(i).search() !== this.value ) {
                table
                    .column(i)
                    .search( this.value )
                    .draw();
            }
        } );
    } );
      var table = $('#example').DataTable({
        orderCellsTop: true,
        fixedHeader: true,
        dom: "<'row'<'col-sm-3'l><'col-sm-6 text-center'B><'col-sm-3'f>>" +
             "<'row'<'col-sm-12'tr>>" +
             "<'row'<'col-sm-5'i><'col-sm-7'p>>",
        buttons: [     
            {
                extend: 'excelHtml5',
                title: 'Ongoing Operations',
                messageTop: 'Ongoing Operations',
                footer: true,
                header: true,
            },
            {
                extend: 'pdfHtml5',
                orientation: 'landscape',
                pageSize: 'LEGAL',
                title: 'Ongoing Operations',
                messageTop: 'Ongoing Operations',
                footer: true,
                header: true,
            },
            {
                extend: 'csvHtml5',
                title: 'IDMS',
                messageTop: 'IDMS',
                footer: true,
                header: true,
            },
            {
                extend: 'print',
                footer: true,
                header: true,
            }
        ],
        columnDefs: [
            {
                targets: '_all',
                defaultContent: '',
                className: 'dt-body-center'
            }
        ],
        lengthMenu: [[10, 25, 50, 100, 150, 200, -1], [10, 25, 50, 100, 150, 200, "All"]],
        footerCallback: function (row, data, start, end, display) {
            var api = this.api();

            var intVal = function (i) {
                return typeof i === 'string' ?
                    i.replace(/[\$,]/g, '') * 1 :
                    typeof i === 'number' ? i : 0;
            };

            var formatNumber = function (num) {
                return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            };

            // List of column indexes for which to calculate totals
            var columns = [6, 7, 8, 9, 10, 11, 19, 20, 21]; // Adjust this array for other numeric columns

            columns.forEach(function (column) {
                var total = api
                    .column(column)
                    .data()
                    .reduce(function (a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                var pageTotal = api
                    .column(column, { page: 'current' })
                    .data()
                    .reduce(function (a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                $(api.column(column).footer()).html(formatNumber(pageTotal));
            });
        }
      });

      $('#min, #max').change(function () {
          table.draw();
      });
  });
</script>

    
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>

    @endif
@endsection