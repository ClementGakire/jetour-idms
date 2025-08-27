@include('inc.navbar')
@extends('layouts.app')

@section('content')
@if(Auth::user()->id == 1 || Auth::user()->role_id == 'Fuel')
<p class="text-center text-primary "><a href="/fuel" class="">(Go Back)</a></p>
<form action="{{ action('fuelController@destroy', [$fuel->id]) }}" method="POST" class="text-center">
                      {{ csrf_field() }}
                      <input type="hidden" name="_method" value="delete">
                      <input type="submit" name="" class="btn btn-danger pull right" value="delete">
                </form> 
                @endif
@endsection