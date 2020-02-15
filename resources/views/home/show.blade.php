@extends('layouts.main')
{{-- @section('title', $title) --}}

@if (session('success'))
        <div class="alert alert-success">{{session('success')}}</div>
    @endif

@section('content')
    <h1 class="mt-2">{{ucfirst(trans($category->name))}}</h1>
    {{-- {{dd($category->news)}} --}}

    {{-- @foreach ($category->news as $item)
        <article>
            <h3><a href="">{{$item->title}}</a></h3>
            <p>{{$item->content}}</p>
        </article>
    @endforeach --}}

    {{-- Get news use models --}}

    @foreach ($news as $item)
        <article>
            <h3><a href="">{{$item->title}}</a></h3>
            <p>{!! $item->content !!}</p>
        </article>
    @endforeach
    {{$news->links()}}
    
@endsection

@section('sidebar')
    <h3 class="m-2">@parent</h3>

    @if (session('success'))
        <div class="alert alert-success">{{session('success')}}</div>
    @endif
    <div class="list-group col-8 mt-3 mb-3 categories">
    @foreach ($categoriesSidebar as $item)
      <a href="{{$item->id}}" class="list-group-item list-group-item-action {{(Request::is('category/'.$item->id)?'active':'')}}">
        {{ucfirst(trans($item->name))}}
        
        <span class="badge badge-warning">{{$item->news->count()}}</span>

    </a>
    @endforeach
    </div>

@endsection




@section('css')

@endsection
