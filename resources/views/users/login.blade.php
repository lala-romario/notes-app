@extends('components.layout')

@section('title', $title = 'Log in')

@section('header', $header = 'Log in')

@section('content')

<form action="{{ route('loggedin') }}" method="post" class="">
    @csrf
    <div class="flex min-h-full flex-col justify-center p-30">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <h2 class="mt-10 text-center text-3xl font-bold tracking-tight text-gray-900">Log in to your account</h2>
        </div>

        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">

            
            <div>
                <label for="email" class="block text-xl font-medium text-gray-900">Email address</label>
                @error('email')
                <p class="text-red-400">{{ $message }}</p>
                @enderror
                <div class="mt-2">
                    <input type="email"
                        name="email" id="email"
                        autocomplete="email" value="{{ old('email') }}"
                        class="block w-full @if($errors->has('email')) outline-red-400 focus:outline-red-400 outline-1 focus:outline-2 @else focus:outline-2 focus:outline-indigo-600 outline-1 outline-gray-300 @endif rounded-md bg-white px-3 py-3.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400">
                </div>
            </div>

            <div>
                <div class="flex items-center justify-between">
                    <label for="password" class="block text-xl font-medium text-gray-900">Password</label>
                    <div class="text-sm">
                        <a href="" class="font-semibold text-indigo-600 hover:text-indigo-500">Forgot password?</a>
                    </div>
                </div>
                @error('password')
                <p class="text-red-400">{{ $message }}</p>
                @enderror
                <div class="mt-2">
                    <input type="password"
                        name="password" id="password" autocomplete="current-password"
                        class="block w-full rounded-md @if($errors->has('password')) outline-red-400 focus:outline-red-400 outline-1 focus:outline-2 @else focus:outline-2 focus:outline-indigo-600 outline-1 outline-gray-300 @endif bg-white px-3 py-3.5 text-base text-gray-900  placeholder:text-gray-400">
                </div>
            </div>

            <div class="mt-4">
                <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-3 text-xl font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"> Log in</button>
            </div>


            <p class="mt-10 text-center text-sm/6 text-gray-500">
                Not a member?
                <a href="#" class="font-semibold text-indigo-600 hover:text-indigo-500">Start a 14 day free trial</a>
            </p>
        </div>
    </div>

</form>
@endsection
