@extends('layouts.app')

@section('page-content')
    <section class="py-20 min-h-screen flex items-center">
        <div class="max-w-screen-lg mx-auto">
            <h3 class="text-4xl text-center text-gray-200 mb-6 mt-16">{{ $competition->name }}</h3>

            <img src="{{ asset('images/' . $competition->poster) }}" class="mx-auto object-contain h-48 w-96 mb-8 mt-8 shadow-xl" alt="">
            
            <h4 class="text-lg text-center text-gray-200 mb-6">Due date : {{ $competition->date }}</h3>
            <p class="text-2lg mb-3">
                {{ $competition->description }}
            </p>
            <div class="text-center mb-36 mt-8">
                <a href="{{ route('competitions.index') }}" class="relative inline-block bg-pink-500 text-center py-2 px-4 rounded hover:bg-purple-500 transition">Go Back </a>
            </div>

            

            <div class="absolute bottom-0 left-0 right-0 p-20 mt-20">
                <p class="text-center">Scroll to learn more</p>
            </div>
        </div>
    </section>




    {{-- APPEALS START --}}
    <section class="py-20 min-h-screen flex items-center">
        <div class="max-w-screen-lg mx-auto">
            @if ($competition->appeals->count())

                {{-- ACCEPTED APPEALS --}}

                {{-- <h4 class="text-lg text-left text-gray-200 mb-6 mt-14">Participants</h4> --}}
                @if ($accepted_appeals_count > 0)
                <h4 class="title text-5xl md:text-7xl lg:text-7xl max-w-[720px] mb-6">Participants</h4>
                @endif

                    @foreach ($competition->appeals as $appeal)
                    @if ($appeal->appeal_status == 1)
                    <div class="mt-20 flex flex-col">
                        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="inline-block py-2 min-w-full sm:px-6 lg:px-8">
                                <div class="overflow-hidden shadow-md sm:rounded-lg">
                                    <table style="width:750px" class="min-w-full">
                                        <thead class="bg-gray-50 dark:bg-gray-700">
                                            <tr>
                                                <th scope="col" class="py-3 px-6 text-base font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                                    Supervisor :
                                                </th>
                                                <th scope="col" class="py-3 px-6 text-base font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                                    {{ $appeal->supervisor_name }}
                                                </th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Product 1 -->
                                                @if (!is_null($appeal->participant1_name))
                                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                                    <td class="py-4 px-6 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                        {{ $appeal->participant1_name }}
                                                    </td>
                                                    <td class="py-4 px-6 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                        {{ $appeal->participant1_university }}
                                                    </td>
                                                </tr>
                                                @else
                                                @endif
                                                
                                                @if (!is_null($appeal->participant2_name))
                                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                                    <td class="py-4 px-6 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                        {{ $appeal->participant2_name }}
                                                    </td>
                                                    <td class="py-4 px-6 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                        {{ $appeal->participant2_university }}
                                                    </td>
                                                </tr>
                                                @else
                                                @endif
                                                
                                                @if (!is_null($appeal->participant3_name))
                                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                                    <td class="py-4 px-6 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                        {{ $appeal->participant3_name }}
                                                    </td>
                                                    <td class="py-4 px-6 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                        {{ $appeal->participant3_university }}
                                                    </td>
                                                </tr>
                                                @else
                                                @endif

                                                @if (!is_null($appeal->participant4_name))
                                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                                    <td class="py-4 px-6 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                        {{ $appeal->participant4_name }}
                                                    </td>
                                                    <td class="py-4 px-6 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                        {{ $appeal->participant4_university }}
                                                    </td>
                                                </tr>
                                                @else
                                                @endif

                                                @if (!is_null($appeal->participant5_name))
                                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                                    <td class="py-4 px-6 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                        {{ $appeal->participant5_name }}
                                                    </td>
                                                    <td class="py-4 px-6 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                        {{ $appeal->participant5_university }}
                                                    </td>
                                                </tr>
                                                @else
                                                @endif

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    @endforeach

                {{-- END OF ACCEPTED APPEALS --}}

                {{-- PENDING APPEALS --}}

                @if(session()->has('success'))
                    <div class="bg-green-100 border-t border-b border-green-500 text-green-700 px-4 py-3 mb-4 mt-8" role="alert">
                        <p class="font-bold">{{ session('success') }}</p>
                        <p class="text-sm pt-2">Appeal Accepted</p>
                    </div>
                @endif


            @if ($pending_appeals_count > 0)
                {{-- <h4 class="text-lg text-left text-gray-200 mb-6 mt-4">Pending requests</h3> --}}
                <h4 class="title text-5xl md:text-7xl lg:text-7xl max-w-[720px] mt-96 mb-6">Pending requests</h3>
            @endif
                    
                    

                @foreach ($competition->appeals as $appeal)
                @if ($appeal->appeal_status == 0)
                <div class="mt-20 flex flex-col">
                    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block py-2 min-w-full sm:px-6 lg:px-8">
                            <div class="overflow-hidden shadow-md sm:rounded-lg">
                                @error('supervisor_name')
                                <div class="mx-auto invalid-feedback text-red-600">
                                    {{ $message }}
                                </div>
                                @enderror
                                <table class="min-w-full">
                                    <thead class="bg-gray-50 dark:bg-gray-700">
                                        <tr>
                                            <th scope="col" class="py-3 px-6 text-base font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                                Name
                                            </th>
                                            <th scope="col" class="py-3 px-6 text-base font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                                University
                                            </th>
                                            <th scope="col" class="py-3 px-6 text-base font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                                Supervisor
                                            </th>
                                    
                                            {{-- <th scope="col" class="relative py-3 px-6">
                                                <span class="sr-only">Accept</span>
                                            </th> --}}

                                            <th scope="col" class="relative py-3 px-6">
                                                <span class="sr-only">Reject</span>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Product 1 -->
                                        
                                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                                <td class="py-4 px-6 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                    {{ $appeal->participant1_name }}
                                                </td>
                                                <td class="py-4 px-6 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                    {{ $appeal->participant1_university }}
                                                </td>
                                                
                                                
                                                <td class="py-4 px-6 text-sm font-medium text-right whitespace-nowrap">
                                                    <form action="{{ route('admins.store', $appeal) }}" method="POST">
                                                        @csrf
                                                        <input type="text" id="supervisor_name" name="supervisor_name" class="bg-transparent mr-12 px-4 py-2 w-64 text-gray-900" placeholder="Supervisor name...
                                                        @error('supervisor_name') is-invalid @enderror required">

                                                        <button type="submit" class="bg-transparent hover:text-blue-900 text-blue-500 font-semibold hover:text-blue py-2 px-4">
                                                            Accept
                                                        </button>
                                                    </form>
                                                    
                                                    {{-- <a href="{{ route('admins.show', $appeal) }}" class="text-blue-600 dark:text-blue-500 hover:underline">Accept</a> --}}
                                                </td>
                                                
                                                <td class="py-4 px-6 text-sm font-medium text-right whitespace-nowrap">
                                                    <form action="{{ route('admins.destroy', $appeal->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="bg-transparent hover:text-pink-900 text-pink-500 font-semibold hover:text-pink py-2 px-4">
                                                            Reject
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                            
                                            @if (!is_null($appeal->participant2_name))
                                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                                <td class="py-4 px-6 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                    {{ $appeal->participant2_name }}
                                                </td>
                                                <td class="py-4 px-6 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                    {{ $appeal->participant2_university }}
                                                </td>
                                                <td class="py-4 px-6 text-sm font-medium text-right whitespace-nowrap">
                                                    
                                                </td>
                                                <td class="py-4 px-6 text-sm font-medium text-right whitespace-nowrap">
                                                    
                                                </td>
                                                
                                            </tr>
                                            @else
                                            @endif

                                            @if (!is_null($appeal->participant3_name))
                                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                                <td class="py-4 px-6 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                    {{ $appeal->participant3_name }}
                                                </td>
                                                <td class="py-4 px-6 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                    {{ $appeal->participant3_university }}
                                                </td>
                                                <td class="py-4 px-6 text-sm font-medium text-right whitespace-nowrap">
                                                    
                                                </td>
                                                <td class="py-4 px-6 text-sm font-medium text-right whitespace-nowrap">
                                                    
                                                </td>
                                                
                                            </tr>
                                            @else
                                            @endif

                                            @if (!is_null($appeal->participant4_name))
                                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                                <td class="py-4 px-6 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                    {{ $appeal->participant4_name }}
                                                </td>
                                                <td class="py-4 px-6 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                    {{ $appeal->participant4_university }}
                                                </td>
                                                <td class="py-4 px-6 text-sm font-medium text-right whitespace-nowrap">
                                                    
                                                </td>
                                                <td class="py-4 px-6 text-sm font-medium text-right whitespace-nowrap">
                                                    
                                                </td>
                                                
                                            </tr>
                                            @else
                                            @endif

                                            @if (!is_null($appeal->participant5_name))
                                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                                <td class="py-4 px-6 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                    {{ $appeal->participant5_name }}
                                                </td>
                                                <td class="py-4 px-6 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                    {{ $appeal->participant5_university }}
                                                </td>
                                                <td class="py-4 px-6 text-sm font-medium text-right whitespace-nowrap">
                                                    
                                                </td>
                                                <td class="py-4 px-6 text-sm font-medium text-right whitespace-nowrap">
                                                    
                                                </td>
                                                
                                            </tr>
                                            @else
                                            @endif

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
            
                {{-- PENDING APPEALS END --}}
            @else

            @endif
        </div>
    </section>
            

        
@endsection