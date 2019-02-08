@extends('layouts.app')

@section('content')
    <div class="flex w-full max-w-lg mx-auto bg-white p-16 mt-16" style="box-shadow: 0 0 30px 0 rgba(0, 0, 0, 0.04)">
        <div class="mt-8">
            @include('partials.make-it-rain')
        </div>
        <div class="flex-1 ml-16">
            <h1 class="font-bold italic text-grey-darker mb-6" style="font-family: 'Bungee'">
                LARABANK
            </h1>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-4">
                    <label for="email" class="text-grey-darker block" style="font-family: Bitter">
                        {{ __('E-Mail') }}
                    </label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                        class="w-full border-b-2 border-grey-lighter bg-grey-lightest px-2 py-3 mt-1 rounded-sm">
                </div>
                <div class="mb-6">
                    <label for="password" class="text-grey-darker block" style="font-family: Bitter">
                        {{ __('Password') }}
                    </label>
                    <input id="password" type="password" name="password" required
                        class="w-full border-b-2 border-grey-lighter bg-grey-lightest px-2 py-3 mt-1 rounded-sm">
                </div>
                <button type="submit" class="bg-green border-b-4 border-green-dark text-white font-bold uppercase p-3 rounded-sm">
                    {{ __('Log in') }}
                </button>
            </form>
        </div>
    </div>
@endsection
