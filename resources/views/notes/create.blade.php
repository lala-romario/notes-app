@extends('components.dashboard')

@section('title', $title = 'Create note')

@section('header', $header = 'Create new note')

@section('content')
<form action="{{ route('notes.store') }}" method="post" class="ml-10">
    @csrf

    <div class="flex flex-col">
        <input type="text" name="title" placeholder="Title" class="h-10 w-100 font-bold text-xl border rounded @error('title') border-red-500 text-red-500 @else border-gray-500 @enderror pl-4 ">
    </div>

    @error('title')
    <p class="text-red-500 mt-2">{{ $message }}</p>
    @enderror

    <div>
        <textarea name="content" placeholder="TEXT HERE ..." class="h-80 w-100 border @error('content') border border-red-500 text-red-500 @else border-gray-500 @enderror rounded-lg pl-4 pt-4 mt-5"></textarea>
    </div>

    @error('content')
    <p class="text-red-500 mt-2">{{ $message }}</p>
    @enderror
    <button type="submit" class="mt-10 w-25 h-12 bg-gray-500 text-white text-2xl rounded-sm hover:bg-gray-700 cursor-pointer">create</button>
</form>
@endsection
