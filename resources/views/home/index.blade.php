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
    <h3 class="m-2">@parent</h3>

    @if (session('success'))
        <div class="alert alert-success">{{session('success')}}</div>
    @endif
    <div class="list-group col-8 mt-3 mb-3 categories">
        <a href="#" class="list-group-item list-group-item-action text-primary" data-cat__id="all">All categories <span class="badge badge-primary">{{$newsCountAll}}</span></a>
    @foreach ($categories as $item)
      <a href="#" class="list-group-item list-group-item-action" data-cat__id="{{$item->id}}">
        {{ucfirst(trans($item->name))}}
        @foreach ($newsCount as $count)
            <span class="badge badge-primary">{{$count->id==$item->id?$count->count:''}}</span>
        @endforeach

    </a>
    @endforeach
    </div>

@endsection

@section('content')
    <h1>{{$title}}</h1>

<div class="row ">
    @foreach ($news as $item)
        <div class="col-sm-12 m-1 row no-gutters" data-category="{{$item->category_id}}">

            <div class="card col-md-10">
                <div class="card-body">
                <h5 class="card-title">{{$item->title}}</h5>
                <p class="card-text">{{$item->content}}</p>
                <p class="card-text"><small class="text-muted">{{$item->category->name}}</small></p>

                </div>
            </div>
            <div class="card-img-right col-md-2">
                @if ($item->img)
                <img src="{{$item->img}}" class="  col-md-12" alt="...">
                @endif
            </div>


        </div>
    @endforeach
  </div>

@endsection






{{-- @foreach ($user as $item)
   {{$loop->iteration}} {{$item }}<br>
@endforeach --}}
