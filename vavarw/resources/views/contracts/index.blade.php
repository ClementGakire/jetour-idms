@include('inc.navbar')
@extends('layouts.app')

@section('content')
<section style="padding-left: 60px; padding-top: 100px; padding-bottom: 100px;">
  <div class="container-fluid">
    <div class="row mb-12">
      <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
        <div class="row align-items-center">
          <div class="col-xl-11 col-12 mb-4 mb-xl-0">
            <h3 class="text-muted text-left mb-3">Contracts</h3>
            <a href="/contracts/create" class="btn btn-primary mb-3">New Contract</a>

            <table id="contracts-table" class="display table table-striped" style="width:100%">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Client</th>
                  <th>Car</th>
                  <th>Start Date</th>
                  <th>End Date</th>
                  <th>File</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach($contracts as $c)
                <tr>
                  <td>{{ $c->id }}</td>
                  <td>{{ $c->client_name ?? 'N/A' }}</td>
                  <td>{{ $c->plate_number ?? $c->model ?? 'N/A' }}</td>
                  <td>{{ $c->start_date }}</td>
                  <td>{{ $c->end_date }}</td>
                  <td>@if($c->file)<a href="/images/{{ $c->file }}" target="_blank">Download</a>@endif</td>
                  <td>
                    <a href="/contracts/{{ $c->id }}" class="btn btn-sm btn-info">View</a>
                    <a href="/contracts/{{ $c->id }}/edit" class="btn btn-sm btn-primary">Edit</a>
                    <form action="/contracts/{{ $c->id }}" method="POST" style="display:inline-block;">
                      {{ csrf_field() }}
                      {{ method_field('DELETE') }}
                      <button class="btn btn-sm btn-danger" type="submit">Delete</button>
                    </form>
                  </td>
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
    <!-- DataTables scripts (copied from other index pages) -->
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>

    <script>
      $(document).ready(function(){
        var table = $('#contracts-table').DataTable({
          dom: "<'row'<'col-sm-3'l><'col-sm-6 text-center'B><'col-sm-3'f>>" +
               "<'row'<'col-sm-12'tr>>" +
               "<'row'<'col-sm-5'i><'col-sm-7'p>>",
          buttons: [
            { extend: 'excelHtml5', title: 'Contracts', footer: true, header: true },
            { extend: 'pdfHtml5', title: 'Contracts', footer: true, header: true },
            { extend: 'csvHtml5', title: 'Contracts', footer: true, header: true },
            { extend: 'print', footer: true, header: true }
          ],
          lengthMenu: [[10,25,50,100,-1],[10,25,50,100,'All']]
        });

        // Add per-column search inputs
        $('#contracts-table thead tr').clone(true).appendTo('#contracts-table thead');
        $('#contracts-table thead tr:eq(1) th').each(function (i) {
          var title = $(this).text();
          $(this).html('<input type="text" style="width:120px;" placeholder="'+title+'" />');
          $('input', this).on('keyup change', function () {
            if (table.column(i).search() !== this.value) {
              table.column(i).search(this.value).draw();
            }
          });
        });
      });
    </script>

@endsection
