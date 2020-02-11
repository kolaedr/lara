@extends('layouts.main')
@section('title', $title)

@section('css')
    <style>
    h1{
        text-align: center;
    }
    </style>
@endsection


@section('sidebar')
    <h3>@parent</h3>
  ADV
@endsection

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
