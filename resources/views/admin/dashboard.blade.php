@extends('layouts.admin')
@section('title', 'Dashboard')
@section('content')
    <h1 class="text-light text-center">
        Hello {{ Auth::user()->name }}
    </h1>
@endsection
