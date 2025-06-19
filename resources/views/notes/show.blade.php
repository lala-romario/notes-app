@extends('components.dashboard')

@section('title', $title = 'Notes')

@section('header', $header = 'Note')

@section('slot', $slot = 'Your notes')

@section('content')

    <div class="mt-8 pl-10">
        <h2><a name="title" id="{{ $note->note_id }}" class="text-2xl font-bold ml-10 mb-10">{{ $note->title }}</a></h2>
        <li class="text-xl ml-15" name="content">{{ $note->content }}</li>
    </div>

    <div class="mt-5">
        <a href="/notes" class="ml-5 text-3xl hover:text-blue-500 duration-500">go back...</a>
        <form action="{{ route('notes.delete', $note) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="pointer-cursor ml-5 text-3xl hover:text-blue-500 duration-500">Delete</button>
        </form>

        <div>
            <a href="{{ route('notes.update', ['note' => $note]) }}">update</a>
        </div>
    </div>

@endsection
