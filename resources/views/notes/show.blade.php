@extends('components.dashboard')

@section('title', $title = 'Notes')

@section('header', $header = 'Note')

@section('slot', $slot = 'Your notes')

@section('content')

    <div class="mt-8 pl-10">
        <h2><a name="title" id="{{ $note->note_id }}" class="text-2xl font-bold ml-10 mb-10">{{ $note->title }}</a></h2>
        <li class="text-xl ml-15" name="content">{{ $note->content }}</li>
    </div>

    <div class="flex space-x-4 mt-5">
        <a href="/notes" class="ml-5 text-3xl hover:text-blue-500 duration-500">go back...</a>
        <div>
            <form action="{{ route('notes.delete', $note) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="pointer-cursor text-3xl hover:text-blue-500 duration-500 cursor-pointer">Delete</button>
        </form>
        </div>

        <div>
            <a href="{{ route('notes.update', ['note' => $note]) }}" class="text-3xl hover:text-blue-500 duration-500">Edit note</a>
        </div>
    </div>

@endsection
