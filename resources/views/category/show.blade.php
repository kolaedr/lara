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
        <article class="mt-2 mb-2 p-2 col-10 border border-white">
            <h4><a href="/news/{{$item->id}}">{{$item->title}}</a> </h4>
            <p>{!! Str::words(strip_tags($item->content), 2, '<a href="/news/'.$item->id.'"> <strong>read more</strong></a>') !!}</p>
            <div class="d-flex justify-content-between">
                <small class="text-muted">Comments: {{$item->comment->count()}}</small>
                <small class="text-muted">Publish date: {{$item->created_at}}</small>
            </div>

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
