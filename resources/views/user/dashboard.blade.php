@extends('layouts.app')

@section('page-content')
    <section class="py-20 min-h-screen flex items-center">
        <div class="max-w-screen-lg mx-auto">
            <h2 class="text-6xl text-center mb-6">User Dashboard</h2>
            <h3 class="text-4xl text-center text-gray-200 mb-6">Join a Competition !</h3>
            
            <!-- component -->
            <div class="container mx-auto p-8">
                <div class="flex flex-row flex-wrap -mx-2">
                    
                    {{-- START --}}
                    @if ($competitions->count())
                        @foreach($competitions as $competition)
                        <div class="w-full sm:w-1/2 md:w-1/3 mb-4 px-2">
                            <div class="relative bg-white rounded border">

                                <picture class="block bg-gray-200 border-b">
                                    {{-- <img class="block" src="https://via.placeholder.com/800x600/EDF2F7/E2E8F0/&amp;text=Card" alt="Card 1"> --}}
                                    <img src="{{ asset('images/' . $competition->poster) }}" class="block" alt="">
                                </picture>

                                <div class="p-4">
                                    <h3 class="text-lg text-gray-900 font-bold">
                                        <a href="{{ route('users.show', $competition->id) }}">
                                            {{ $competition->name }}
                                        </a>
                                    </h3>

                                    <time class="block mb-2 text-sm text-gray-600" datetime="2019-01-01">{{ $competition->date }}</time>
                                    <p class="text-gray-900">
                                        {{ $competition->description }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        {{-- {{ $competitions->links() }} --}}
                    @else
                        <h4 class="text-lg text-center text-gray-200 mb-6 mt-14">There are no competitions</h3>
                    @endif

                </div>
            </div>


            <div class="text-center">
                <a href="{{ route('home') }}" class="inline-block bg-pink-500 text-center py-2 px-4 rounded hover:bg-purple-500 transition">Go Home </a>
            </div>
        </div>
    </section>
@endsection