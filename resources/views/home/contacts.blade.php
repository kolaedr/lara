@extends('layouts.full-width')
@section('title', $title)

@section('content')
    <h1>{{$title}}</h1>
    <form class="col-md-4 bg-secondary text-white-50 p-3" action="/contacts" method="POST">

        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" class="form-control" name="name" id="name" placeholder="Name">
        </div>
        <div class="form-group ">
            <label class="form-check-label" for="exampleCheck1">Input text</label>
            <textarea name="message" id="exampleCheck1" cols="30" rows="3"  class="form-control"></textarea>
        </div>

        @csrf

        <button type="submit" class="btn btn-success">Submit</button>
      </form>
@endsection
