@extends('layouts.main')
@section('title', $title)

@section('content')
    <h1>{{$title}}</h1>
    
    
@endsection

@section('sidebar')
    <h3>@parent</h3>
    
    @if (session('success'))
        <div class="alert alert-success">{{session('success')}}</div>
    @endif
    <ul>
    @foreach ($categories as $item)
      <li>{{$item->name}}</li>  
    @endforeach
    </ul>
    
@endsection




@section('css')
    
@endsection