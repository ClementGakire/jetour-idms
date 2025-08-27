@include('inc.navbar')
@extends('layouts.app')
@section('content')

<style type="text/css">
  th { white-space: nowrap; }
</style>
<section>
      <div class="container-fluid">
        <div class="row">
          <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
            <div class="row pt-md-5 mt-md-3">
              <div class="col-xl-3 col-sm-6 p-2">
                <div class="card card-common">
                  <div class="card-body">
                    <div class="d-flex justify-content-between">
                      <i class="fas fa-money-bill-alt fa-3x text-warning"></i>
                      <div class="text-right text-secondary">
                        <h5>Total<br>Balance</h5>
                        
                        <h3>{{ number_format($balance) }}</h3>
                        
                      </div>
                    </div>
                  </div>
                  <div class="card-footer text-secondary">
                    <i class="fas fa-sync mr-3"></i>
                    <span>Updated Now</span>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-sm-6 p-2">
                <div class="card card-common">
                  <div class="card-body">
                    <div class="d-flex justify-content-between">
                      <i class="fas fa-money-bill-alt fa-3x text-danger"></i>
                      <div class="text-right text-secondary">
                        <h5>Total<br>Invoice</h5>
                        
                        <h3>{{ number_format($total) }}</h3>                        
                      </div>
                    </div>
                  </div>
                  <div class="card-footer text-secondary">
                    <i class="fas fa-sync mr-3"></i>
                    <span>Updated Now</span>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-sm-6 p-2">
                <div class="card card-common">
                  <div class="card-body">
                    <div class="d-flex justify-content-between">
                      <i class="fas fa-chart-line fa-3x text-info"></i>
                      <div class="text-right text-secondary">
                        <h5>Total<br>Paid</h5>
                        <h3>{{ number_format($paid) }}</h3>
                      </div>
                    </div>
                  </div>
                  <div class="card-footer text-secondary">
                    <i class="fas fa-sync mr-3"></i>
                    <span>Updated Now</span>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-sm-6 p-2">
                <div class="card card-common">
                  <div class="card-body">
                    <div class="d-flex justify-content-between">
                      <i class="fas fa-users fa-3x text-danger"></i>
                      <div class="text-right text-secondary">
                        <h5>Registered<br>Users</h5>
                        
                        <h3>{{ $users }}</h3>
                        
                      </div>
                    </div>
                  </div>
                  <div class="card-footer text-secondary">
                    <i class="fas fa-sync mr-3"></i>
                    <span>Updated Now</span>
                  </div>
                </div>
              </div>
              
            </div>
            <div class="row  mb-5">
              <div class="col-xl-3 col-sm-6 p-2">
                <div class="card card-common">
                  <div class="card-body">
                    <div class="d-flex justify-content-between">
                      <i class="fas fa-car fa-3x text-info"></i>
                      <div class="text-right text-secondary">
                        <h5>Total Number <br>of vehicles</h5>
                        
                        <h3>{{ number_format($total_number_of_vehicles) }}</h3>
                        
                      </div>
                    </div>
                  </div>
                  <div class="card-footer text-secondary">
                    <i class="fas fa-sync mr-3"></i>
                    <span>Updated Now</span>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-sm-6 p-2">
                <div class="card card-common">
                  <div class="card-body">
                    <div class="d-flex justify-content-between">
                      <i class="fas fa-users fa-3x text-info"></i>
                      <div class="text-right text-secondary">
                        <h5>Total Sales</h5>
                        
                        <h3>{{ number_format($total_sales) }}</h3>
                        
                      </div>
                    </div>
                  </div>
                  <div class="card-footer text-secondary">
                    <i class="fas fa-sync mr-3"></i>
                    <span>Updated Now</span>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-sm-6 p-2">
                <div class="card card-common">
                  <div class="card-body">
                    <div class="d-flex justify-content-between">
                      <i class="fas fa-users fa-3x text-info"></i>
                      <div class="text-right text-secondary">
                        <h5>Total Number <br>of Suppliers</h5>
                        
                        <h3>{{ $total_suppliers }}</h3>
                        
                      </div>
                    </div>
                  </div>
                  <div class="card-footer text-secondary">
                    <i class="fas fa-sync mr-3"></i>
                    <span>Updated Now</span>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-sm-6 p-2">
                <div class="card card-common">
                  <div class="card-body">
                    <div class="d-flex justify-content-between">
                      <i class="fas fa-money-bill fa-3x text-info"></i>
                      <div class="text-right text-secondary">
                        <h5>Balance to <br>Suppliers</h5>
                        
                        <h3>{{ number_format($balance_to_supplier) }}</h3>
                        
                      </div>
                    </div>
                  </div>
                  <div class="card-footer text-secondary">
                    <i class="fas fa-sync mr-3"></i>
                    <span>Updated Now</span>
                  </div>
                </div>
              </div>
              @foreach($expenses as $expense)
              <div class="col-xl-3 col-sm-6 p-2">
                <div class="card card-common">
                  <div class="card-body">
                    <div class="d-flex justify-content-between">
                      <i class="fas fa-credit-card fa-3x text-warning"></i>
                      <div class="text-right text-secondary">
                        <h6>Total<br>{{$expense->name}}</h6>
                        
                        <h3>{{ number_format($expense->total_expense) }}</h3>
                        
                      </div>
                    </div>
                  </div>
                  <div class="card-footer text-secondary">
                    <i class="fas fa-sync mr-3"></i>
                    <span>Updated Now</span>
                  </div>
                </div>
              </div>
              @endforeach
             
              <div class="col-xl-3 col-sm-6 p-2">
                <div class="card card-common">
                  <div class="card-body">
                    <div class="d-flex justify-content-between">
                      <i class="fas fa-credit-card fa-3x text-danger"></i>
                      <div class="text-right text-secondary">
                        <h5>Total <br>expenses</h5>
                        
                        <h3>{{ number_format($total_expenses) }}</h3>
                        
                      </div>
                    </div>
                  </div>
                  <div class="card-footer text-secondary">
                    <i class="fas fa-sync mr-3"></i>
                    <span>Updated Now</span>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-sm-6 p-2">
                <div class="card card-common">
                  <div class="card-body">
                    <div class="d-flex justify-content-between">
                      <i class="fas fa-balance-scale fa-3x text-danger"></i>
                      <div class="text-right text-secondary">
                        <h5>Margin after <br>all expenses</h5>
                        
                        <h3>{{ number_format($margin_after_all_expenses) }}</h3>
                        
                      </div>
                    </div>
                  </div>
                  <div class="card-footer text-secondary">
                    <i class="fas fa-sync mr-3"></i>
                    <span>Updated Now</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section style="padding-left: 60px;">
      <div class="container-fluid">
        <div class="row mb-12">
          <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
            <div class="row align-items-center">
              <div class="col-xl-11 col-12 mb-4 mb-xl-0">
                <h3 class="text-muted text-center mb-3">General Report</h3>
    <table id="example" class="" style="width:100%" style="padding-left: 60px">
        <thead>
            <tr>
                <th>Institution</th>
                <th>Total Invoice</th>
                <th>Total Paid</th>
                <th>Balance</th>
                <th>Action</th>
                
                <!--<th>action</th>-->
                
            </tr>
        </thead>
        
        <tbody>
          @foreach($reports as $report)
           <tr>
             <td>{{$report->name}}</td>
             <td>{{number_format($report->total_invoice)}}</td>
             <td>{{number_format($report->total_payment)}}</td>
             <td>{{number_format($report->total_invoice-$report->total_payment)}}</td>
             <td></td>
           </tr>
           @endforeach
        </tbody>
            
         <tfoot>
            
        </tfoot>
    </table>
    @if(Auth::user()->id == 1)

                <h3 class="text-muted text-center mb-3 pt-3">User Performance</h3>

    <table id="example" class="display" style="width:100%" style="padding-left: 60px">
        <thead>
            <tr>
                <th>Name</th>
                <th>Total Invoices</th>
                <th>Total Payments</th>
                <th>Total Entries</th>
               
                
            
                
            </tr>
        </thead>
        
        <tbody>
          @foreach($user as $user)
           <tr>
             <td>{{$user->name}}</td>
             <td>{{$user->total_invoices}}</td>
             <td>{{$user->total_payments}}</td>
             <td>{{$user->total_invoices+$user->total_payments}}</td>
           </tr>
           @endforeach
        </tbody>
            
         <tfoot>
            
        </tfoot>
    </table>
@endif
              </div>  
            </div>    
          </div>      
        </div>        
      </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.0/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.print.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.8/js/mdb.min.js"></script>
    <script src="script.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.0/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.print.min.js"></script>
    
    <script>
          $(document).ready(function() {
        $('table.display').DataTable();
    } );
    </script>
    <script>
      $(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [     
            {
                extend: 'pdfHtml5',
                title: 'General Report'
            },
            {
                extend: 'csvHtml5',
                title: 'General Report'
            },
            'print'
        ]
    } );
} );

    </script>
    @endsection