@include('inc.navbar')
@extends('layouts.app')

@section('content')
@if(Auth::user()->role_id == 1)

<p class="text-center text-primary "><a href="/cars" class="">(Go Back)</a></p>
<form action="{{ action('CarsController@destroy', [$car->id]) }}" method="POST" class="text-center">
                      {{ csrf_field() }}
                      <input type="hidden" name="_method" value="delete">
                      <input type="submit" name="" class="btn btn-danger pull right" value="delete">
                </form> 
@endif
@endsection