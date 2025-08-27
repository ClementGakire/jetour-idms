@include('inc.navbar')
@extends('layouts.app')

@section('content')

@if(Auth::user()->id == 1 || strpos(Auth::user()->role_id, 'Payments') !== false)

<section style="padding-left: 60px; padding-top: 100px; padding-bottom: 100px;">
    <div class="container-fluid">
        <div class="row mb-12">
            <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
                <div class="row align-items-center">
                    <div class="col-xl-11 col-12 mb-4 mb-xl-0">
                        <h3 class="text-muted text-left mb-3">EDIT Booking</h3>

                        <form action="{{ action('PaymentController@update', [$payment->id]) }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="put">

                            <div class="form-group">
                                <label for="inputState">Car</label>
                                <select id="client" class="form-control dynamic" name="car_id">
                                    <option selected value="{{$payment->car_id}}">{{$payment->plate_number}}</option>
                                    @foreach($cars as $car)
                                        <option value="{{$car->id}}">{{$car->plate_number}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="start_date">Booking Date</label>
                                <input type="date" name="booking_date" id="start_date" class="form-control" value="{{ $payment->booking_date }}">
                            </div>

                            <div class="form-group">
                                <label for="start_date">Return Date</label>
                                <input type="date" name="return_date" id="start_date" class="form-control" value="{{ $payment->return_date }}">
                            </div>
                            <div class="form-group">
                                <label for="institution">Unit Price</label>
                                <input type="number" class="form-control" id="customer" placeholder="Enter Unit Price" value="" name="unit_price" value="{{ $payment->unit_price }}" required>
                                
                              </div>
                            <div class="form-group">
                                <label for="institution">Client</label>
                                <input type="text" class="form-control" id="customer" placeholder="Enter Client" name="client" value="{{ $payment->client }}">
                            </div>

                            <div class="form-group">
                                <label for="institution">Booked By</label>
                                <input type="text" class="form-control" id="customer" placeholder="Booked By" name="booked_by" value="{{ $payment->booked_by }}">
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif

<script src="assets/js/jquery.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="{{ asset('jquery.min.js') }}"></script>
<script src="{{ asset('bootstrap.min.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script type="text/javascript">
    jQuery(document).ready(function() {
        jQuery('select[name="institution"]').on('change', function() {
            var customerID = jQuery(this).val();
            if (customerID) {
                jQuery.ajax({
                    url: 'getStates/' + customerID,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        console.log(data);
                        jQuery('select[name="invoiceNumber"]').empty();
                        jQuery.each(data, function(key, value) {
                            $('select[name="invoiceNumber"]').append('<option value="' + key + '">' + key + '</option>');
                        });
                    }
                });
            } else {
                $('select[name="invoiceNumber"]').empty();
            }
        });
    });
</script>

@endsection
