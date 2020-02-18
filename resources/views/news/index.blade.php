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
    @foreach ($categoriesSidebar as $item)
      <a href="category/{{$item->id}}" class="list-group-item list-group-item-action {{(Request::is('category/'.$item->id)?'active':'')}}">
        {{ucfirst(trans($item->name))}}

        <span class="badge badge-warning">{{$item->news->count()}}</span>

    </a>
    @endforeach
    </div>

@endsection


@section('css')

@endsection
