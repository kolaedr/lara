@extends('layouts.main')
@section('title', $title)

@section('content')
    <h1>{{$title}}</h1>


@endsection

@section('sidebar')
    <h3>@parent</h3>

    @if (session('success'))
        <div class="alert alert-success">{{session('success')}}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>NAME</th>
                <th>EDIT</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $item)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$item->name}}</td>
                <td style="display: flex;">
                    <form action="/category/{{$item->id}}/edit" method="GET">
                        @csrf
                        <button class="btn btn-success">Edit</button>
                    </form>
                    <form action="/category/{{$item->id}}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger">Delte</button>
                    </form>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
@endsection




@section('css')

@endsection
