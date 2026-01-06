@include('inc.navbar')
@extends('layouts.app')

@section('content')
<section style="padding-left: 60px; padding-top: 100px;">
    <div class="container-fluid">
        <div class="row mb-12">
            <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
                <div class="row align-items-center">
                    <div class="col-xl-11 col-12 mb-4 mb-xl-0">
                        <h3 class="text-muted text-center mb-3">Contractors</h3>
                        <div style="padding-bottom: 20px;">
                            <div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div>

                            <div class="text-center">
                                <a href="/contractors/create" class="btn btn-info btn-rounded mb-4">Create New Contractors</a>
                            </div>
                        </div>
                        <table id="contractorsTable" class="display" style="width:100%; padding-left: 60px;">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Tin</th>
                                    @if(Auth::user()->id == 1)
                                    <th>Action</th>
                                    @endif
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($contractors as $contractor)
                                <tr>
                                    <td>{{ $contractor->name }}</td>
                                    <td>{{ $contractor->tin }}</td>
                                    @if(Auth::user()->id == 1 || Auth::user()->id == 20)
                                    <td class="text-left pl-4">
                                        <a href="/contractors/{{$contractor->id}}"><i class="fas fa-eye" style="padding-right: 4px;"></i></a>
                                        <a href="/contractors/{{$contractor->id}}/edit"><i class="fas fa-edit text-success" style="padding-left: 4px;"></i></a>
                                    </td>
                                    @endif
                                </tr>
                                @endforeach
                            </tbody>

                            <tfoot>
                                <tr>
                                    <th>Name</th>
                                    <th>Tin</th>
                                    @if(Auth::user()->id == 1)
                                    <th>Action</th>
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

<!-- DataTables CSS and JS -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>

<script>
$(document).ready(function() {
    $('#contractorsTable').DataTable({
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'excelHtml5',
                title: 'Contractors List'
            },
            {
                extend: 'pdfHtml5',
                title: 'Contractors List',
                customize: function (doc) {
                    doc.content.splice(0, 0, {
                         
                    });
                }
            },
            {
                extend: 'print',
                title: 'Contractors List'
            }
        ]
    });
});
</script>

@endsection
