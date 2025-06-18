@extends('components.dashboard')

@section('title', $title = 'Dashboard')

@section('header', $header = 'Dashboard')

@section('content')
<div class="ml-5 py-10">
@foreach($notes as $note)
    <h1>Title : {{ $note->title }}</h1>
    <p>{{ $note->content }}</p>
    <a href="{{ route('notes.show', ['note' => $note]) }}" class="ml-5 mt-5 bg-gray-500 rounded p-2">view this note</a>
    @endforeach

    <div class="mt-7 ml-10 mb-4">
        <a href="{{ route('notes.create') }}" class="border rounded p-4 ">Create note</a>
    </div>
</div>
@endsection
