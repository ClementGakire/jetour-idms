
<nav class="navbar navbar-expand-md navbar-light">
      <button class="navbar-toggler ml-auto mb-2 bg-light" type="button" data-toggle="collapse" data-target="#myNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="myNavbar">
        <div class="container-fluid">
          <div class="row">
            <!-- sidebar -->
            <div class="col-xl-2 col-lg-3 col-md-4 sidebar fixed-top" style="overflow-y: scroll; padding-right: 15px;">
              <a href="https://vavatransport.rw/" class="navbar-brand text-white d-block mx-auto text-center py-3 mb-4 bottom-border" target="_blank" style="background: #ea252d;">
                  <!--<img src="{{ asset('images/Logo-Vector.png') }}" alt="Brand Image" width="150" />-->
                  Jet Tours
              </a>
              <div class="bottom-border pb-3">

                <img src=" {{asset('images/download.png')}}" width="50" class="rounded-circle mr-3">
                <a href="#" class="text-white">{{ Auth::user()->name }}</a>
              </div>
              <ul class="navbar-nav flex-column mt-4">
                @if(Auth::user()->role_id == 3)
                <li class="nav-item {{ Request::segment(1) === 'fuel' ? 'current' : null }}"><a href="/fuel" class="nav-link text-white p-3 mb-1 sidebar-link"><i class="fas fa-gas-pump text-light fa-lg mr-3"></i>Advance</a></li>
                @endif
                @if(Auth::user()->role_id != 3)
                <li class="nav-item {{ Request::segment(1) === '' ? 'current' : null }}"><a href="/" class="nav-link text-white p-3 mb-1 "><i class="fas fa-home text-light fa-lg mr-3"></i>Dashboard</a></li>
                <!--<li class="nav-item {{ Request::segment(1) === 'fuel' ? 'current' : null }}"><a href="/fuel" class="nav-link text-white p-3 mb-1 sidebar-link"><i class="fas fa-file text-light fa-lg mr-3"></i>Reports</a></li>-->
                <li class="nav-item {{ Request::segment(1) === 'invoices' ? 'current' : null }}"><a href="/invoices" class="nav-link text-white p-3 mb-1 sidebar-link"><i class="fas fa-file text-light fa-lg mr-3"></i>Customer Invoices</a></li>
                <li class="nav-item {{ Request::segment(1) === 'payments' ? 'current' : null }}"><a href="/payments" class="nav-link text-white p-3 mb-1 sidebar-link"><i class="fas fa-car text-light fa-lg mr-3"></i>Car Bookings</a></li>
                <li class="nav-item {{ Request::segment(1) === 'booking-history' ? 'current' : null }}"><a href="/booking-history" class="nav-link text-white p-3 mb-1 sidebar-link"><i class="fas fa-history text-light fa-lg mr-3"></i>Booking History</a></li>
                <li class="nav-item {{ Request::segment(1) === 'institutions' ? 'current' : null }}"><a href="/institutions" class="nav-link text-white p-3 mb-1 sidebar-link"><i class="fas fa-building text-light fa-lg mr-3"></i>Clients</a></li>
                <!-- <li class="nav-item {{ Request::segment(1) === 'contractors' ? 'current' : null }}"><a href="/contractors" class="nav-link text-white p-3 mb-1 sidebar-link"><i class="fas fa-users text-light fa-lg mr-3"></i>Contractors</a></li> -->
                <li class="nav-item {{ Request::segment(1) === 'cars' ? 'current' : null }}"><a href="/cars" class="nav-link text-white p-3 mb-1 sidebar-link"><i class="fas fa-car text-light fa-lg mr-3"></i>Cars</a></li>
                <!--<li class="nav-item {{ Request::segment(1) === 'prices' ? 'current' : null }}"><a href="/prices" class="nav-link text-white p-3 mb-1 sidebar-link"><i class="fas fa-car text-light fa-lg mr-3"></i>Pricing</a></li>-->
                <li class="nav-item {{ Request::segment(1) === 'drivers' ? 'current' : null }}"><a href="/drivers" class="nav-link text-white p-3 mb-1 sidebar-link"><i class="fas fa-users text-light fa-lg mr-3"></i>Drivers</a></li>
                <li class="nav-item {{ Request::segment(1) === 'expenses' ? 'current' : null }}"><a href="/expenses" class="nav-link text-white p-3 mb-1 sidebar-link"><i class="fas fa-money-bill text-light fa-lg mr-3"></i>Expenses Types</a></li>
                <li class="nav-item {{ Request::segment(1) === 'charges' ? 'current' : null }}"><a href="/charges" class="nav-link text-white p-3 mb-1 sidebar-link"><i class="fas fa-money-bill text-light fa-lg mr-3"></i>Expenses</a></li>
                <li class="nav-item {{ Request::segment(1) === 'suppliers' ? 'current' : null }}"><a href="/suppliers" class="nav-link text-white p-3 mb-1 sidebar-link"><i class="fas fa-users text-light fa-lg mr-3"></i>Suppliers</a></li>
                <li class="nav-item {{ Request::segment(1) === 'bills' ? 'current' : null }}"><a href="/bills" class="nav-link text-white p-3 mb-1 sidebar-link"><i class="fas fa-money-bill text-light fa-lg mr-3"></i>Suppliers Payment</a></li>
                <!--<li class="nav-item {{ Request::segment(1) === 'po' ? 'current' : null }}"><a href="/po" class="nav-link text-white p-3 mb-1 sidebar-link"><i class="fas fa-file text-light fa-lg mr-3"></i>Ongoing Operations</a></li>-->
                <!--<li class="nav-item {{ Request::segment(1) === 'roadmap' ? 'current' : null }}"><a href="/roadmap" class="nav-link text-white p-3 mb-1 sidebar-link"><i class="fas fa-money-bill text-light fa-lg mr-3"></i>Closed Operations</a></li>-->
                @endif
                <!-- <li class="nav-item {{ Request::segment(1) === '/po/export' ? 'current' : null }}"><a href="/po/export" class="nav-link text-white p-3 mb-1 sidebar-link"><i class="fas fa-money-bill text-light fa-lg mr-3"></i>Gen Roadmap</a></li> -->
                @if(Auth::user()->role_id == 1)
                <li class="nav-item {{ Request::segment(1) === 'users' ? 'current' : null }}"><a href="/users" class="nav-link text-white p-3 mb-1 sidebar-link"><i class="fas fa-users text-light fa-lg mr-3"></i>Users</a></li>@endif
                <!--<li class="nav-item"><a href="#" class="nav-link text-white p-3 mb-1 sidebar-link"><i class="fas fa-chart-bar text-light fa-lg mr-3"></i>Charts</a></li>-->
              </ul>
            </div>
            <!-- end of sidebar -->

            <!-- top-nav -->

            <div class="col-xl-10 col-lg-9 col-md-8 ml-auto bg-dark fixed-top py-2 top-navbar">
              <div class="row align-items-center">
                <div class="col-md-6">
                  <h4 class="text-light text-uppercase mb-0">Integrated Fleet Management System</h4>
                </div>
                <div class="col-md-3">
                  
                </div>
                <div class="col-md-3">
                  @php
                    use Carbon\Carbon;
                    $tomorrow = Carbon::tomorrow()->toDateString();
                    $endingBookings = \DB::table('payments')
                        ->leftJoin('cars','payments.car_id','cars.id')
                        ->leftJoin('users','payments.user_id','users.id')
                        ->select('payments.id','payments.return_date','cars.plate_number','cars.model','users.name as username')
                        ->whereDate('payments.return_date', $tomorrow)
                        ->get();
                    $endingCount = $endingBookings->count();
                  @endphp

                  <ul class="navbar-nav">
                    <li class="nav-item icon-parent"><a href="#" class="nav-link icon-bullet"><i class="fas fa-comments text-muted fa-lg"></i></a></li>
                    <li class="nav-item icon-parent">
                      <a href="#" class="nav-link icon-bullet" data-toggle="modal" data-target="#endingModal" title="Bookings ending tomorrow">
                        <i class="fas fa-bell text-muted fa-lg"></i>
                        @if($endingCount > 0)
                          <span class="badge badge-danger" style="position:relative; top:-10px; left:-6px;">{{ $endingCount }}</span>
                        @endif
                      </a>
                    </li>
                    <li class="nav-item ml-md-auto"><a href="{{ url('/logout') }}" onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();" class="nav-link"><i class="fas fa-sign-out-alt text-danger fa-lg"></i></a><form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form></li>
                  </ul>
                </div>
              </div>
            </div>
            <!-- end of top-nav -->
          </div>
        </div>
      </div>

    </nav>

    <!-- Modal: Bookings ending tomorrow -->
    <div class="modal fade" id="endingModal" tabindex="-1" role="dialog" aria-labelledby="endingModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="endingModalLabel">Bookings ending tomorrow</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            @if($endingCount > 0)
              <p>There are {{ $endingCount }} booking(s) ending tomorrow ({{ \Carbon\Carbon::tomorrow()->toDateString() }}):</p>
              <div class="list-group">
                @foreach($endingBookings as $b)
                  <a href="/payments/{{ $b->id }}" class="list-group-item list-group-item-action">
                    <strong>{{ $b->plate_number ?? 'N/A' }} - {{ $b->model ?? '' }}</strong>
                    <div class="small text-muted">Booking ID: {{ $b->id }} — Return date: {{ $b->return_date }} — Booked by: {{ $b->username ?? 'Unknown' }}</div>
                  </a>
                @endforeach
              </div>
            @else
              <p>No bookings ending tomorrow.</p>
            @endif
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <a href="/payments" class="btn btn-primary">View all bookings</a>
          </div>
        </div>
      </div>
    </div>

    @if($endingCount > 0)
    <script>
      document.addEventListener('DOMContentLoaded', function(){
        // show modal automatically when there are alerts
        try { $('#endingModal').modal('show'); } catch(e) { /* jQuery not available */ }
      });
    </script>
    @endif