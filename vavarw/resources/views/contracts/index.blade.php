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

            <table class="table table-striped">
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
                  <td>@if($c->file)<a href="/uploads/contracts/{{ $c->file }}" target="_blank">Download</a>@endif</td>
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
@endsection
