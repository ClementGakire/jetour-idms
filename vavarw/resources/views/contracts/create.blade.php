@include('inc.navbar')
@extends('layouts.app')

@section('content')
<section style="padding-left: 60px; padding-top: 100px; padding-bottom: 100px;">
  <div class="container-fluid">
    <div class="row mb-12">
      <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
        <div class="row align-items-center">
          <div class="col-xl-11 col-12 mb-4 mb-xl-0">
            <h3 class="text-muted text-left mb-3">Create Contract</h3>

            <form action="{{ action('ContractsController@store') }}" method="POST" enctype="multipart/form-data">
              {{ csrf_field() }}

              <div class="form-group">
                <label for="client">Client</label>
                <select name="client_id" class="form-control">
                  <option value="">-- Choose client --</option>
                  @foreach($clients as $c)
                    <option value="{{ $c->id }}">{{ $c->name }}</option>
                  @endforeach
                </select>
              </div>

              <div class="form-group">
                <label for="car">Car</label>
                <select name="car_id" class="form-control">
                  <option value="">-- Choose car --</option>
                  @foreach($cars as $car)
                    <option value="{{ $car->id }}">{{ $car->plate_number }} - {{ $car->model }}</option>
                  @endforeach
                </select>
              </div>

              <div class="form-group">
                <label for="start_date">Start Date</label>
                <input type="date" name="start_date" class="form-control">
              </div>

              <div class="form-group">
                <label for="end_date">End Date</label>
                <input type="date" name="end_date" class="form-control">
              </div>

              <div class="form-group">
                <label for="file">File (PDF or image)</label>
                <input type="file" name="file" class="form-control">
              </div>

              <button class="btn btn-primary" type="submit">Create</button>
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
