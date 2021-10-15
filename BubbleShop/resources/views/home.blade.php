@extends('layout')

@section('content')
    {{--  <h1>Home</h1>  --}}
    @if(Session::has('message'))
        <div class="alert alert-success" role="alert">
            {{ request()->session()->pull('message') }}
        </div>
    @endif

    @if(Session::has('error'))
        <div class="alert alert-danger" role="alert">
            {{ request()->session()->pull('error') }}
        </div>
    @endif
@endsection
