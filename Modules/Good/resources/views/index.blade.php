@extends('good::layouts.master')

@section('content')
    <h1>Hello World</h1>

    <p>Module: {!! config('good.name') !!}</p>
@endsection
