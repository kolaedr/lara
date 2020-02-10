@extends('layouts.full-width')
@section('title', $title)

@section('content')
    <h2>Profile user</h2>
    {{Auth::user()->name}}
@endsection
