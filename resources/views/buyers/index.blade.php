<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
             {{ __('Buyers Dashboard') }}
        </h2>
    </x-slot>

    <div class="pt-6 max-w-7xl mx-auto sm:px-6 lg:px-8 bg-opacity-25 grid grid-cols-1 md:grid-cols-2">
        
        {{-- Button New Buyer --}}
        <div class=" inline-flex items-center max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{ route('buyers.create') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition ml-3 mr-3">
                {{__('New Buyer')}}
            </a>
        </div>

        {{-- Alert Message --}}
        @if (session('status'))
            <div class="ml-auto mr-3 flex flex-col gap-2 w-auto border-b-2 border-indigo-700">
                <div class="bg-blue-50 rounded-t text-blue-900 px-4 py-3" role="alert">
                    <div class="flex items-center">
                        <!-- ! -->
                        <div>
                            <svg class="fill-current h-5 w-5 text-indigo-700" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z" /></svg>
                        </div>
                        <!--  -->
                        <div>
                            <p class="inline-flex flex items-center text-sm font-semibold  rounded-md uppercase tracking-widest focus:outline-none disabled:opacity-25 transition ml-3 mr-3 text-xs text-indigo-700 ">
                                {{ session('message') }}
                            </p>
                        </div>
                        <!-- X -->
                        <p class="flex cursor-pointer">
                        <form method="GET" action="{{ route('buyers.index') }}">
                            @csrf
                            <a href="{{ route('buyers.index') }}" onclick="event.preventDefault(); this.closest('form').submit();">
                                <svg class="text-indigo-700 text-xl" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 1024 1024" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M685.4 354.8c0-4.4-3.6-8-8-8l-66 .3L512 465.6l-99.3-118.4-66.1-.3c-4.4 0-8 3.5-8 8 0 1.9.7 3.7 1.9 5.2l130.1 155L340.5 670a8.32 8.32 0 0 0-1.9 5.2c0 4.4 3.6 8 8 8l66.1-.3L512 564.4l99.3 118.4 66 .3c4.4 0 8-3.5 8-8 0-1.9-.7-3.7-1.9-5.2L553.5 515l130.1-155c1.2-1.4 1.8-3.3 1.8-5.2z"></path>
                                    <path d="M512 65C264.6 65 64 265.6 64 513s200.6 448 448 448 448-200.6 448-448S759.4 65 512 65zm0 820c-205.4 0-372-166.6-372-372s166.6-372 372-372 372 166.6 372 372-166.6 372-372 372z"></path>
                                </svg>
                            </a>
                        </form>
                    </p>
                    </div>
                </div>
            </div>
        @endif

    </div>

    <!-- Box -->
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Division for Table Buyers -->
            <div class=" bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="bg-white shadow-md rounded">
                    <table class="min-w-max w-full table-auto">
                        
                        <!-- Titles Table -->
                        <thead>
                            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                <th class="py-3 px-6 text-left">#ID</th>
                                <th class="py-3 px-6 text-center">BUYER</th>
                                <th class="py-3 px-6 text-center">DOCUMENT</th>
                                <th class="py-3 px-6 text-center">CREATE AT</th>
                                <th class="py-3 px-6 text-center">ACTIONS</th>
                            </tr>
                        </thead>

                        <!-- Body -->
                        <tbody class="text-gray-600 text-sm font-light">
                            @foreach ($buyers as $buyer)
                            <tr class="border-b border-gray-200 hover:bg-gray-100">

                                <!-- id -->
                                <td class="py-3 px-6 text-left whitespace-nowrap">
                                    <div class="flex items-center">
                                        {{--   Determinando que sera en la parte izquierda  --}}
                                        <span class="font-medium">{{ str_pad($buyer->id, 2 , 0, STR_PAD_LEFT)  }}</span>
                                    </div>
                                </td>

                                <!-- Buyer -->
                                <td class="py-3 px-6 text-left">
                                    <div class="flex items-center">
                                        <div class="mr-2">
                                            {{-- <img class="w-8 h-8 rounded-full" src="https://randomuser.me/api/portraits/men/1.jpg"/> --}}
                                            <img class="w-8 h-8 rounded-full" src="{{ asset($buyer->img_url) }}" />
                                        </div>
                                        <div>
                                            <p class="font-semibold text-black">{{ $buyer->name }}</p>
                                            {{-- <p class="text-xs text-gray-600">Backend Developer</p> --}}
                                            <p class="text-xs text-gray-600">{{ $buyer->email }}</p>
                                        </div>
                                    </div>
                                </td>
                                <!-- Document -->
                                <td class="py-3 px-6 text-center">
                                    <span>{{ $buyer->nif }}</span>
                                </td>

                                <!-- create_at -->
                                <td class="py-3 px-6 text-center">
                                    <span>{{ $buyer->created_at }}</span>
                                </td>

                                <!-- Actions -->
                                <td class="py-3 px-6 text-center">
                                    <div class="flex item-center justify-center">

                                        <!-- Edit -->
                                        <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                            <!-- En este caso englobaremos el boton de editar con la etiqueta a que conbertira la imagen en un link
                                                            Tambien vamos a decir que buyer sera igual al id de la variable buyer -->
                                            <a href="{{ route('buyers.edit', ['buyer'=> $buyer->id]) }}">

                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                </svg>
                                            </a>
                                        </div>

                                        <!-- Eliminar -->
                                        <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                            <!-- The Route: buyers/{buyer} ......................... buyers.destroy › buyerController@destroy  -->
                                            <form method="POST" action="{{ route('buyers.destroy', ['buyer'=> $buyer->id]) }}">
                                                @csrf
                                                {{  method_field("DELETE") }}
                                            
                                                <a href="{{ route('buyers.destroy', ['buyer'=> $buyer->id]) }}" onclick="event.preventDefault(); this.closest('form').submit();">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                    </svg>
                                                </a>
                                            </form>
                                        </div>
                                        
                                    </div>
                                </td>

                            </tr>
                            @endforeach
                        </tbody>
                        
                    </table>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
