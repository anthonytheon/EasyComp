@extends('layouts.app')

@section('page-content')
    <section class="py-20 min-h-screen flex items-center">
        <div class="max-w-screen-lg mx-auto">
            <h2 class="text-6xl text-center mb-6">Poster</h2>
            <h3 class="text-4xl text-center text-gray-200 mb-6">{{ $competition->name }}</h3>
            <h4 class="text-lg text-center text-gray-200 mb-6">{{ $competition->date }}</h3>
            <p class="mb-3">
                {{ $competition->description }}
            </p>
            <div class="text-center">
                <a href="{{ route('competitions.index') }}" class="inline-block bg-pink-500 text-center py-2 px-4 rounded hover:bg-purple-500 transition">Go Back </a>
            </div>
        </div>
    </section>
@endsection