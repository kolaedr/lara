@extends('layouts.full-width')
@section('title', $title)

@section('content')
    <h1>{{$title}}</h1>
    {{-- //для ошибок  --}}
        {{-- @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif --}}
    <form class="col-md-4 bg-secondary text-white-50 p-3" action="/category" method="POST">
        {{-- <div class="form-group">
          <label for="exampleInputEmail1">Email address</label>
          <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div> --}}
        <div class="form-group">
          <label for="title">Title</label>
          <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" placeholder="Categories name">
            @error('title')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        
        @csrf

        <button type="submit" class="btn btn-success">Submit</button>
      </form>
@endsection