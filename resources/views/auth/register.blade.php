@extends('layouts.app')

@section('page-content')
    <main class="bg-white max-w-lg mx-auto p-8 md:p-12 mt-56 mb-36 rounded-lg shadow-2xl">
        <section>
            <h3 class="text-black font-bold text-2xl">Welcome to EasyComp</h3>
            <p class="text-gray-600 pt-2">Register Here.</p>
        </section>

        <section class="mt-10">
            <form class="flex flex-col" method="POST" action="{{ route('store') }}">
                @csrf
                <div class="mb-6 pt-3 rounded bg-gray-200">
                    <label class="block text-gray-700 text-sm font-bold mb-2 ml-3" for="name">Name</label>
                    <input type="text" id="name" value="{{ old('name') }}" name="name" placeholder="Your Name" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-purple-600 transition duration-500 px-3 pb-3
                    @error('name') is-invalid @enderror required">

                    <!-- INVALID INPUT MESSAGE -->

                    @error('name')
                    <div class="invalid-feedback text-red-600">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                
                <div class="mb-6 pt-3 rounded bg-gray-200">
                    <label class="block text-gray-700 text-sm font-bold mb-2 ml-3" for="email">Email</label>
                    <input type="email" value="{{ old('email') }}" id="email" name="email" placeholder="name@example.com" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-purple-600 transition duration-500 px-3 pb-3
                    @error('email') is-invalid @enderror required">
                    
                    <!-- INVALID INPUT MESSAGE -->

                    @error('email')
                    <div class="invalid-feedback text-red-600">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-6 pt-3 rounded bg-gray-200">
                    <label class="block text-gray-700 text-sm font-bold mb-2 ml-3" for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Your Password" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-purple-600 transition duration-500 px-3 pb-3
                    @error('password') is-invalid @enderror required">

                    <!-- INVALID INPUT MESSAGE -->

                    @error('password')
                    <div class="invalid-feedback text-red-600">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                
                <button class="bg-purple-600 hover:bg-purple-700 text-white font-bold py-2 rounded shadow-lg hover:shadow-xl transition duration-200" type="submit">Register</button>
            </form>
        </section>
    </main>

@endsection