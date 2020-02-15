@extends('layouts.main')
@section('title', $title)

@section('content')
    <h1>{{$title}}</h1>

    <div class="row ">
        @foreach ($news as $item)
            <div class="col-sm-12 m-1 row no-gutters" data-category="{{$item->category_id}}">

                <div class="card col-md-10">
                    <div class="card-body">
                    <h5 class="card-title">{{$item->title}} <small class="text-muted">({{$item->created_at}})</small></h5>
                    <p class="card-text">{!! Str::words(strip_tags($item->content), 2, '<a href="/news/'.$item->id.'"> <strong>read more</strong></a>') !!}</p>
                    <p class="card-text">
                        <small class="text-muted">{{$item->cat}}</small>
                        {{$item->category ? $item->category->name : 'uncategorise'}}
                    </p>

                    <div class="row justify-content-start ">
                        <form action="/news/{{$item->id}}/edit" method="GET">
                            @csrf
                            <button class="btn btn-success mr-2 ml-2">Edit</button>
                        </form>
                        <form action="/news/{{$item->id}}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger">Delte</button>
                        </form>
                    </div>
                    </div>
                </div>
                <div class="card-img-right col-md-2">
                     <img src="{{$item->img}}" class="  col-md-12" alt="...">
                </div>


            </div>
        @endforeach
      </div>

@endsection

@section('sidebar')
    <h3 class="m-2">@parent</h3>

    @if (session('success'))
        <div class="alert alert-success">{{session('success')}}</div>
    @endif
    <div class="list-group col-8 mt-3 mb-3 categories">
        <a href="#" class="list-group-item list-group-item-action text-primary" data-cat__id="all">All categories <span class="badge badge-primary">{{$newsCountAll}}</span></a>
    @foreach ($categories as $item)
      <a href="category/{{$item->id}}" class="list-group-item list-group-item-action" data-cat__id="{{$item->id}}">
        {{ucfirst(trans($item->name))}}
        @foreach ($newsCount as $count)
            <span class="badge badge-primary">{{$count->id==$item->id?$count->count:''}}</span>
        @endforeach

    </a>
    @endforeach
    </div>

@endsection


@section('css')

@endsection
