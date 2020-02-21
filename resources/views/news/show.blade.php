@extends('layouts.main')
@section('title', $news->title)

{{-- @if (session('success'))
        <div class="alert alert-success">{{session('success')}}</div>
    @endif --}}

@section('content')
    <h1 class="mt-2">{{ucfirst(trans($news->title))}}</h1>
    <small class="text-muted">Publish date: {{$news->created_at}}</small>
    <p class="">{!! $news->content !!}</p>

    <div class="col-8 offset-1 p-2 mt-3 mb-2">
        <h5>Comments {{$comments->count()}}</h5>
        <form action="/comment" method="post" class="mt-3">
            @include('comments._form')
            <input type="hidden" name="news" value="{{$news->id}}">

        </form>

    @if ($comments)
        @foreach ($comments as $item)
        <blockquote class="blockquote mt-3">
            <p class="mb-0 h6">"{!! $item->comment !!}"</p>
            <footer class="blockquote-footer text-right">
                {{ucfirst(trans($item->name))}}
                <cite title="Source Title">(Publish date: {{$item->created_at}})</cite>
                <form action="/comment/{{$item->id}}" method="POST">
                    @method('DELETE')
                    @csrf

                    <button class="btn btn-danger">Delete</button>

                </form>
            </footer>
          </blockquote>
        @endforeach

    </div>
    @endif

    <div id="example"></div>
@endsection

@section('sidebar')
    <h3 class="m-2">@parent</h3>

    @if (session('success'))
        <div class="alert alert-success">{{session('success')}}</div>
    @endif
    <div class="list-group col-8 mt-3 mb-3 categories">
    @foreach ($categoriesSidebar as $item)
      <a href="/category/{{$item->id}}" class="list-group-item list-group-item-action {{(Request::is('category/'.$item->id)?'active':'')}}">
        {{ucfirst(trans($item->name))}}

        <span class="badge badge-warning">{{$item->news->count()}}</span>

    </a>
    @endforeach
    </div>

@endsection




@section('css')

@endsection
