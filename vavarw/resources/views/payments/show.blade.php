@include('inc.navbar')
@extends('layouts.app')

@section('content')
@if(Auth::user()->id == 1 || strpos(Auth::user()->role_id, 'Payments') !== false)
<p class="text-center text-primary "><a href="/payments" class="">(Go Back)</a></p>
<form action="{{ action('PaymentController@destroy', [$payment->id]) }}" method="POST" class="text-center">
                      {{ csrf_field() }}
                      <input type="hidden" name="_method" value="delete">
                      <input type="submit" name="" class="btn btn-danger pull right" value="delete">
                </form> 
<div class="container" style="padding-top:20px;">
      <h4>Booking Details</h4>
      <p><strong>Car:</strong> {{ $payment->plate_number ?? '' }} ({{ $payment->model ?? '' }})</p>
      <p><strong>Booking Date:</strong> {{ $payment->booking_date ?? '' }}</p>
      <p><strong>Return Date:</strong> {{ $payment->return_date ?? '' }}</p>
      <p><strong>Client:</strong> {{ $payment->client ?? '' }}</p>
      <p><strong>Booked By:</strong> {{ $payment->booked_by ?? '' }}</p>
      <p><strong>Unit Price:</strong> {{ $payment->unit_price ?? '' }}</p>
      <p><strong>Total Price:</strong> {{ $payment->total_price ?? '' }}</p>
      <p><strong>Driver:</strong> {{ $payment->driver_name ?? '' }}</p>
      <p><strong>Driver Phone:</strong> {{ $payment->driver_phone ?? '' }}</p>
      <p><strong>Advance:</strong> {{ $payment->advance ?? '' }}</p>
</div>
@endif
@endsection