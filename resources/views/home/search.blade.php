@extends('layouts.full-width')
{{-- @section('title', $title) --}}

@section('content')
<h2>You serched: <strong>{{$s}}</strong></h2>
    @foreach ($news as $item)
    <article class="mt-2 mb-2 p-2 col-10 border border-white">
        <h4><a href="/news/{{$item->id}}">{{$item->title}}</a> </h4>
        <p>{!! Str::words(strip_tags($item->content), 2, '<a href="/news/'.$item->id.'"> <strong>read more</strong></a>') !!}</p>
        <div class="d-flex justify-content-between">
            <small class="text-muted">Category: {{$item->category ? $item->category->name : 'uncategorise'}}</small>
            <small class="text-muted">Comments: {{$item->comment->count()}}</small>
            <small class="text-muted">Publish date: {{$item->created_at}}</small>
        </div>

    </article>
    @endforeach
    {{$news->appends(['s'=>$s])->links()}}
@endsection
