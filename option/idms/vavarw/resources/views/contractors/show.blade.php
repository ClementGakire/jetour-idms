@include('inc.navbar')
@extends('layouts.app')

@section('content')

<p class="text-center text-primary "><a href="/contractors" class="">(Go Back)</a></p>
<form action="{{ action('ContractorController@destroy', [$contractor->id]) }}" method="POST" class="text-center">
                      {{ csrf_field() }}
                      <input type="hidden" name="_method" value="delete">
                      <input type="submit" name="" class="btn btn-danger pull right" value="delete">
                </form> 
@endsection