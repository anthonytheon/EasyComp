@extends('layouts.app')

@section('page-content')
    <section class="py-20 min-h-screen flex items-center">
        <div class="max-w-screen-lg mx-auto">
            <form class="w-full max-w-lg" method="POST" enctype="multipart/form-data" action="{{ route('competitions.update', $competition->id) }}">
                @csrf
                @method('PUT')
                
                <div class="md:flex md:items-center mb-6">
                  <div class="md:w-1/3">
                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="name">
                        Name
                    </label>
                  </div>
                  <div class="md:w-2/3">
                    <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight 
                    focus:outline-none focus:bg-white focus:border-purple-500" id="name" name="name" type="text" placeholder="Competition Name" value="{{ $competition->name }}"
                    @error('name') is-invalid @enderror required">

                    @error('name')
                    <div class="invalid-feedback text-red-600">
                        {{ $message }}
                    </div>
                    @enderror

                  </div>
                </div>


                <div class="md:flex md:items-center mb-6">
                    <div class="md:w-1/3">
                      <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="category">
                          Category
                      </label>
                    </div>
                    <div class="md:w-2/3">
                        <div class="inline-block relative w-64">
                            <select name="category" class="block appearance-none text-gray-700 w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                              <option>Machine Learning</option>
                              <option>Game Development</option>
                              <option>Web Development</option>
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                            </div>
                            
                          </div>
                    </div>
                </div>

                <div class="md:flex md:items-center mb-6">
                    <div class="md:w-1/3">
                        <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="date">
                            Date
                        </label>
                    </div>
                    <div class="md:w-2/3">
                        <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white 
                        focus:border-purple-500" id="date" name="date" type="text" placeholder="Date" value="{{ $competition->date }}"
                        @error('date') is-invalid @enderror required">

                        @error('date')
                        <div class="invalid-feedback text-red-600">
                            {{ $message }}
                        </div>
                        @enderror

                    </div>
                  </div>

                  <div class="md:flex md:items-center mb-6">
                    <div class="md:w-1/3">
                      <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="description">
                          Description
                      </label>
                    </div>
                    <div class="md:w-2/3">
                      <textarea class="form-control bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight 
                      focus:outline-none focus:bg-white focus:border-purple-500" cols="50" rows="5" id="description" name="description" placeholder="Your Description""
                      @error('description') is-invalid @enderror required">{{ $competition->description }}</textarea>
  
                      @error('description')
                      <div class="invalid-feedback text-red-600">
                          {{ $message }}
                      </div>
                      @enderror
  
                    </div>
                  </div>

                  <div class="md:flex md:items-center mb-6">
                    <div class="md:w-1/3">
                      <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="poster">
                          Poster
                      </label>
                    </div>
                    <div class="md:w-2/3">
                      <input type="file" class="mt-4" name="poster">

                      @error('poster')
                      <div class="invalid-feedback text-red-600">
                          {{ $message }}
                      </div>
                      @enderror
  
                    </div>
                  </div>


                <div class="md:flex md:items-center">
                  <div class="md:w-1/3"></div>
                    <div class="md:w-2/3">
                      <button class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
                        Publish
                      </button>
                    </div>
                </div>
            </form>
            
        </div>
    </section>
@endsection