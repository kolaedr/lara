@extends('layouts.main')
@section('title', $title)

@section('css')
    <style>
    h1{
        text-align: center;
    }
    </style>
@endsection


<<<<<<< HEAD
=======
@section('sidebar')
    <h3>@parent</h3>
  ADV  
@endsection

>>>>>>> b09704632d4d2e5e8240c5870f8e88b3ad9897fe
@section('content')
    <h1>{{$title}}</h1>
    {!!$subTitle!!}<br>

{{-- @section('title')
    Lara
@endsection
or --}}
@endsection







{{-- @foreach ($user as $item)
   {{$loop->iteration}} {{$item }}<br>
@endforeach --}}
