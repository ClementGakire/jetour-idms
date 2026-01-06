@include('inc.navbar')
@extends('layouts.app')

@section('content')

@if(Auth::user()->id == 1 || Auth::user()->id == 20 || strpos(Auth::user()->role_id, 'Payments') !== false)

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
                                <label for="inputDriver">Driver</label>
                                <select id="driver_select" class="form-control" name="driver_id">
                                    <option value="">-- None --</option>
                                    @foreach($drivers as $driver)
                                        <option value="{{ $driver->id }}" {{ ($payment->driver_id == $driver->id) ? 'selected' : '' }}>{{ $driver->name }} - {{ $driver->phone_number }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="driver_phone">Driver Phone</label>
                                <input type="text" class="form-control" id="driver_phone" name="driver_phone" value="{{ $payment->driver_phone ?? '' }}" readonly>
                            </div>

                            <div class="form-group">
                                <label for="advance">Advance</label>
                                <input type="number" class="form-control" id="advance" placeholder="Advance amount" name="advance" value="{{ $payment->advance ?? 0 }}" step="0.01">
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
                                <input type="number" class="form-control" id="customer" placeholder="Enter Unit Price" name="unit_price" value="{{ $payment->unit_price }}" required>
                                
                              </div>
                            <div class="form-group">
                                <label for="inputClient">Client</label>
                                <input list="institutionList" id="inputClient" class="form-control" name="client" value="{{ $payment->client }}" placeholder="Choose client...">
                                <datalist id="institutionList">
                                    @foreach($institutions as $institution)
                                        <option value="{{ $institution->name }}" data-id="{{ $institution->id }}">{{ $institution->name }}</option>
                                    @endforeach
                                </datalist>
                                <input type="hidden" name="institution_id" id="institution_id" value="{{ $payment->institution_id ?? '' }}">
                            </div>

                            <div class="form-group">
                                <label for="institution">Booked By</label>
                                <input type="text" class="form-control" id="customer" placeholder="Booked By" name="booked_by" value="{{ $payment->booked_by }}">
                            </div>

                            <div class="form-group">
                                <label for="institution">Phone Number</label>
                                <input type="text" class="form-control" id="customer" placeholder="Phone Number" name="phone_number" value="{{ $payment->phone_number ?? '' }}">
                            </div>

                            <div class="form-group">
                                <label for="institution">Identification Number</label>
                                <input type="text" class="form-control" id="customer" placeholder="Identification Number" name="id_number" value="{{ $payment->id_number ?? '' }}">
                            </div>

                            <div class="form-group">
                                <label for="institution">Caution Amount</label>
                                <input type="text" class="form-control" id="customer" placeholder="Caution Amount" name="caution" value="{{ $payment->caution ?? '' }}">
                            </div>

                                                        <div class="form-group">
                                                                <label for="comments">Comments</label>
                                                                <textarea class="form-control" name="comments" id="comments" rows="3">{{ $payment->comments ?? '' }}</textarea>
                                                        </div>

                                                        <div class="form-group">
                                                                <label>Checked Status</label>
                                                                <div>
                                                                    <label class="mr-3"><input type="radio" name="checked_status" value="yes" {{ (isset($payment->checked_status) && $payment->checked_status === 'yes') ? 'checked' : '' }}> Yes</label>
                                                                    <label><input type="radio" name="checked_status" value="no" {{ (!isset($payment->checked_status) || $payment->checked_status === 'no') ? 'checked' : '' }}> No</label>
                                                                </div>
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

<script type="text/javascript">
    var driverSelect = document.getElementById('driver_select');
    if(driverSelect){
        driverSelect.addEventListener('change', function(){
            var opt = this.options[this.selectedIndex];
            // option text contains phone, but better to fetch via dataset if available
            var phone = '';
            if(opt && opt.text){
                var parts = opt.text.split(' - ');
                phone = parts.length > 1 ? parts[1] : '';
            }
            var phoneField = document.getElementById('driver_phone');
            if(phoneField) phoneField.value = phone;
        });
    }
</script>

<script type="text/javascript">
    // populate hidden institution_id when client name picked from datalist (edit form)
    (function(){
        var clientInput = document.getElementById('inputClient');
        var dataList = document.getElementById('institutionList');
        var hidden = document.getElementById('institution_id');
        if(!clientInput || !dataList || !hidden) return;

        function setHiddenFromValue(val){
            hidden.value = '';
            var opts = dataList.options;
            for(var i=0;i<opts.length;i++){
                if(opts[i].value === val){
                    hidden.value = opts[i].getAttribute('data-id') || '';
                    break;
                }
            }
        }

        clientInput.addEventListener('change', function(){
            setHiddenFromValue(this.value);
        });

        // initialize on load if the input has a value
        if(clientInput.value){
            setHiddenFromValue(clientInput.value);
        }
    })();
</script>

@endsection
