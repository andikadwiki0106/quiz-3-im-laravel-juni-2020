@extends('layouts.master')

@section('title', 'Home Page')

@section('content')
    <div class="container">
        <h1 class="text-dark">Home Page</h1>
        <hr>
        <h4>Model Entity Relationship Diagram</h4>
        <img src="{{asset('img/SchemaDB.png')}}" alt="">
    </div>
@endsection