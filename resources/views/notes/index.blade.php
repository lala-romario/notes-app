@extends('components.dashboard')

@section('title', $title = 'Dashboard')

@section('header', $header = 'Dashboard')

@section('content')
<div class="ml-5 py-10">
@foreach($notes as $note)
    <h1>
        <li>{{ $note->title }}</li>
    </h1>
    <p class="ml-10">{{ $note->content }}</p>
    <div class="mt-5">
        <a href="{{ route('notes.show', ['note' => $note]) }}" class="ml-5 hover:bg-gray-500 hover:text-white duration-500 rounded p-2">view this note</a>
    </div>
    @endforeach

    <div class="mt-7 ml-10 mb-4">
        <a href="{{ route('notes.create') }}" class="border rounded p-4 hover:bg-gray-50 hover:text-white duration-500 ">Create note</a>
    </div>
</div>
@endsection
