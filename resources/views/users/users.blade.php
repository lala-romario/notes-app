@extends('components.layout')

@section('title', $title = 'Signup')

@section('header', $header = 'Sign up')

@section('content')
    @csrf
    @foreach($users as $user)
    <h2>{{ $user->name }}</h2>
    <p>{{ $user->email }}</p>
    <p>{{ $user->password }}</p>
    @endforeach
@endsection
