@extends('components.dashboard')

@section('title', $title = 'Notes')

@section('heading', $heading = 'Notes')

@section('slot', $slot = 'Your notes')

@section('content')

@foreach($notes as $note)
    <div class="mt-8 pl-10">
        <h2><a name="title" id="{{ $note->note_id }}" class="text-2xl font-bold ml-10 mb-10">{{ $note->title }} {{ $note->note_id }}</a></h2>
        <li class="text-xl ml-15" name="content">{{ $note->content }}</li>
        <a href="{{ route('notes.show', ['note' => $note->id]) }}" class="ml-25 mt-2 p-2 rounded bg-gray-400 hover:bg-gray-600 duration-700">View this note</a>
    </div>
@endforeach

<div class="mt-7 ml-10 mb-4">
    <a href="{{ route('notes.index') }}" class="border rounded p-4 ">Create note</a>
</div>



@endsection
