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
    <form class="col-md-4 bg-secondary text-white-50 p-3" action="/category/{{$categories->id}}" method="POST">
        @method('PUT')
        <div class="form-group">
          <label for="title">Caterory name</label>
        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" placeholder="Categories name" value="{{$categories->name}}">
            @error('title')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        @csrf

        <button type="submit" class="btn btn-success">Submit</button>
        <a href="/category" class="text-dark">back</a>
    </form>
@endsection
