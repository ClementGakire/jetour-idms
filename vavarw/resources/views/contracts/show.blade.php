@include('inc.navbar')
@extends('layouts.app')

@section('content')
<section style="padding-left: 60px; padding-top: 100px; padding-bottom: 100px;">
  <div class="container-fluid">
    <div class="row mb-12">
      <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
        <div class="row align-items-center">
          <div class="col-xl-11 col-12 mb-4 mb-xl-0">
            <h3 class="text-muted text-left mb-3">Contract #{{ $contract->id }}</h3>

            <ul class="list-group">
              <li class="list-group-item"><strong>Client ID:</strong> {{ $contract->client_id }}</li>
              <li class="list-group-item"><strong>Car ID:</strong> {{ $contract->car_id }}</li>
              <li class="list-group-item"><strong>Start Date:</strong> {{ $contract->start_date }}</li>
              <li class="list-group-item"><strong>End Date:</strong> {{ $contract->end_date }}</li>
              <li class="list-group-item">
                @if($contract->file)
                  @php $files = explode('|', $contract->file); @endphp
                  <ul>
                    @foreach($files as $f)
                      <li><a href="/images/{{ $f }}" target="_blank">{{ $f }}</a></li>
                    @endforeach
                  </ul>
                @endif
              </li>
            </ul>

            <a href="/contracts" class="btn btn-secondary mt-3">Back</a>
            <form action="/contracts/{{ $contract->id }}" method="POST" style="display:inline-block;" id="delete-contract-form">
              {{ csrf_field() }}
              {{ method_field('DELETE') }}
              <button class="btn btn-danger mt-3" type="submit">Delete</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<script>
  (function(){
    var f = document.getElementById('delete-contract-form');
    if (f) {
      f.addEventListener('submit', function(e){
        if(!confirm('Are you sure you want to delete this contract and its files? This action cannot be undone.')){
          e.preventDefault();
        }
      });
    }
  })();
</script>

@endsection
