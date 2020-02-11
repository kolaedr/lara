@extends('layouts.full-width')
@section('title', $title)

@section('content')
    <h1>{{$title}}</h1>
         @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="/news/{{$news->id}}" method="POST" enctype="multipart/form-data" class="">
            @method('PUT')
            @include('news._form')

        </form>

@endsection
