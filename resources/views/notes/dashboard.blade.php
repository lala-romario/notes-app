@extends('components.dashboard')

@section('title', $title = 'Dashboard')

@section('header', $header = 'Dashboard')

@section('content')
<p class="ml-2">Welcome to notes application</p>

<div class="ml-5">
    @foreach($notes as $note)
        <li class="mt-2">{{ $note->content }}</li>
        <p class="ml-8">Creadet by {{ $note->user->name }}</p>
    @endforeach
</div>
@endsection
