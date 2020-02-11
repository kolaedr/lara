@extends('layouts.full-width')
@section('title', $title)



@section('content')
<h1>{{$title}}</h1>

    @if (session('success'))
        <div class="alert alert-success">{{session('success')}}</div>
    @endif
    <form action="/news" method="POST" enctype="multipart/form-data" class="">
        @include('news._form')
        @csrf

    </form>


@endsection




@section('css')

@endsection
