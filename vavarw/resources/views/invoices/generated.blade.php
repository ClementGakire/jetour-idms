@include('inc.navbar')
@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-12 text-center">
            <h4>RWANDA TOURISM AND TRAVEL AGENCY Ltd</h4>
            <p>Internal Control</p>
            <h5>Reception / Approved Report</h5>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-8">
            <table class="table table-bordered">
                <tr>
                    <th>Supplier</th>
                    <th>Operation</th>
                </tr>
                <tr>
                    <td>
                        <strong>Supplier:</strong> {{ $invoice->institution ?? '' }}<br>
                        <strong>EBM:</strong> {{ $invoice->ebm_number ?? '' }}
                    </td>
                    <td>
                        <strong>P.O Number:</strong> {{ $invoice->purchase_order ?? '' }}<br>
                        <strong>Contractor:</strong> {{ $invoice->contractor->name ?? '' }}<br>
                        <strong>Operator:</strong> {{ $payment->booked_by ?? '' }}<br>
                        <strong>Destination:</strong> {{ $payment->client ?? '' }}<br>
                        <strong>Plate:</strong> {{ $payment->plate_number ?? '' }}<br>
                        <strong>Driver:</strong> {{ $payment->driver_name ?? '' }} ({{ $payment->driver_phone ?? '' }})<br>
                        <strong>Messenger:</strong> {{ $payment->booked_by ?? '' }}<br>
                        <strong>Starting Date:</strong> {{ $payment->booking_date }} Ending Date: {{ $payment->return_date }}
                    </td>
                </tr>
            </table>

            <div class="row mt-3">
                <div class="col-md-4">
                    <div class="card p-3">
                        <div class="text-muted">Total Purchase Price</div>
                        <div class="h5">{{ number_format($invoice->amount ?? 0) }}</div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card p-3">
                        <div class="text-muted">Total Selling Price</div>
                        <div class="h5">{{ number_format($payment->total_price ?? 0) }}</div>
                    </div>
                </div>
            </div>

            <div class="mt-4">
                <span class="badge badge-success">APPROVED</span>
            </div>
        </div>

        <div class="col-md-4 text-right">
            <div class="small">Approved By: {{ Auth::user()->name }}</div>
            <div class="small">Approved At: {{ now()->format('d-m-Y H:i') }}</div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-12 text-center">
            <button class="btn btn-primary" onclick="window.print()">Print Invoice</button>
            <a href="/payments" class="btn btn-secondary">Back to Bookings</a>
        </div>
    </div>
</div>
@endsection
