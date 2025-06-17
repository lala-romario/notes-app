@extends('components.layout')

@section('header', $header = 'Home')

@section('slot', $slot = 'Welcome to notes application')

@section('content')

@csrf

@endsection
