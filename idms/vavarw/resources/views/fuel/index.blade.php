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
                <h3 class="text-muted text-center mb-3">Advance</h3>
                <div style="padding-bottom: 20px;">
                 <div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">

</div>

<div class="text-center">
  <a href="/fuel/create" class="btn btn-info btn-rounded mb-4">Create New</a>
</div>
<table border="0" cellspacing="5" cellpadding="5" style="padding-top: 45px">
                  <tbody><tr>
                        <td>Filter Data by Task Date</td>
                          <td>From:</td>
                          <td><input type="text" id="min" name="min" class="min"></td>
                      
                          <td>To:</td>
                          <td><input type="text" id="max" name="max"></td>
                      </tr>
                  </tbody>
                </table>
                 </div>
                <table id="example" class="display" style="width:100%" style="padding-left: 60px">
        <thead>
            <tr>
                @if(Auth::user()->id == 3)
                <th style="white-space: nowrap;">Institution</th>
                <th style="white-space: nowrap;">Plate Number</th>
                <th style="white-space: nowrap;">Days</th>
                <th style="white-space: nowrap;">Destination</th>
                @endif
                @if(Auth::user()->id !=3)
                <th style="white-space: nowrap;">Date</th>
                <th style="white-space: nowrap;">Plate Number</th>
                <th style="white-space: nowrap;">Vehicle Owner</th>
                <th style="white-space: nowrap;">Roadmap Number</th>
                <th style="white-space: nowrap;">Contractor</th>
                <th style="white-space: nowrap;">Institution</th>
                <th style="white-space: nowrap;">Advance Fuel</th>
                <th style="white-space: nowrap;">Advance Cash</th>
                <th style="white-space: nowrap;">Days</th>
                <th style="white-space: nowrap;">Total Price</th>
                <th style="white-space: nowrap;">Destination</th>
                @if(Auth::user()->id == 1)
                <th style="white-space: nowrap;">action</th>
                @endif
               @endif
            </tr>
        </thead>
        
        <tbody>
          @foreach($fuels as $fuel)
          <tr>
               @if(Auth::user()->id == 3)
               <td>{{$fuel->institution}}</td>
               <td>{{$fuel->vehicleNo}}</td>
               <td style="text-align: right;">{{$fuel->days}}</td>
                <td>{{$fuel->place}}</td>
               @endif
               @if(Auth::user()->id !=3)
            <td>{{$fuel->date}}</td>
            <td>{{$fuel->vehicleNo}}</td>
            <td>{{$fuel->vehicleOwner}}</td>
            <td>{{$fuel->rm_no}}</td>
            <td>{{$fuel->contractor}}</td>
            <td>{{$fuel->institution}}</td>
            <td style="text-align: right;">{{number_format($fuel->fuel)}}</td>
            <td style="text-align: right;">{{number_format($fuel->cash)}}</td>
            <td style="text-align: right;">{{$fuel->days}}</td>
            <td style="text-align: right;">{{number_format($fuel->totalprice)}}</td>
            <td>{{$fuel->place}}</td>
            @if(Auth::user()->id == 1)
            <td class="text-left pl-4"><a href="/fuel/{{$fuel->id}}"><i class="fas fa-eye" style="padding-right: 4px;"></i></a><a href="/fuel/{{$fuel->id}}/edit"><i class="fas fa-edit text-success" style="padding-left: 4px;"></i></a></td>
            @endif
            @endif
          </tr>
        	@endforeach
        </tbody>
        	
        <tfoot>
            <tr>
                <!-- <th colspan="5" style="text-align: right;">Total:</th> -->
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
                 @if(Auth::user()->id == 1 || 2)
                <th></th>
                @endif
            </tr>
        </tfoot>
    </table>

    

                <h3 class="text-muted text-center mb-3 pt-3">Fuel Report</h3>

    <table id="" class="displays" style="width:100%" style="padding-left: 60px">
        <thead>
            <tr>
                <th>Institution</th>
                <th>Total Amount</th>
                <th>Total Fuel</th>
               
               
                
            
                
            </tr>
        </thead>
        
        <tbody>
          @foreach($reports as $report)
          <tr>
            <td>{{$report->name}}</td>
            <td>{{number_format($report->total_amount)}}</td>
            <td>{{number_format($report->total_fuel,2)}}</td>
          </tr>
          @endforeach
        </tbody>
         <tfoot>
           <th></th>
           <th></th>
           <th></th>
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
    <script>
        $(document).ready(function(){
          $.fn.dataTable.ext.search.push(
          function (settings, data, dataIndex) {
              var min = $('.min').datepicker("getDate");
              var max = $('#max').datepicker("getDate");
              var startDate = new Date(data[0]);
              if (min == null && max == null) { return true; }
              if (min == null && startDate <= max) { return true;}
              if(max == null && startDate >= min) {return true;}
              if (startDate <= max && startDate >= min) { return true; }
              return false;
          }
          );

         
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
              var table = $('#example').DataTable();

              // Event listener to the two range filtering inputs to redraw on input
              $('#min, #max').change(function () {
                  table.draw();
              });
              
          });
    </script>
    <script type="text/javascript">
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
 
    var table = $('#example').DataTable( {
        
        orderCellsTop: true,
        fixedHeader: true,
        dom: "<'row'<'col-sm-3'l><'col-sm-6 text-center'B><'col-sm-3'f>>" +
  "<'row'<'col-sm-12'tr>>" +
  "<'row'<'col-sm-5'i><'col-sm-7'p>>",
       buttons: [     
            {
                extend: 'excelHtml5',
                title: 'IDMS',
                messageTop: 'IDMS',
                footer: true,
                header: true

            },
            {
                extend: 'pdfHtml5',
                title: 'IDMS',
                messageTop: 'IDMS',
                footer: true,
                header: true

            },
            {
                extend: 'csvHtml5',
                title: 'IDMS',
                messageTop: 'IDMS',
                footer: true,
                header: true

            },
            {
                extend: 'print',
                footer: true,
                header: true
            }
        ],
       
        footerCallback: function ( row, data, start, end, display ) {
            var api = this.api(), data;
 
            // Remove the formatting to get integer data for summation
            var intVal = function ( i ) {
                return typeof i === 'string' ?
                    i.replace(/[\$,]/g, '')*1 :
                    typeof i === 'number' ?
                        i : 0;
            };
 
            // Total over all pages
            total = api
                .column( 9 )
                .data()
                .reduce( function (a, b) {
                    return (intVal(a) + intVal(b)).toFixed(2);
                }, 0 );
 
            // Total over this page
            pageTotal = api
                .column( 9, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return (intVal(a) + intVal(b)).toFixed(2);
                }, 0 );
 
            // Update footer
            $( api.column( 9 ).footer() ).html(
                pageTotal
            );
        }
    } );

</script>
    
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>


</body>
</html>
@endif
@endsection