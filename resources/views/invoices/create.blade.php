<x-app-layout>

    <!-- Nav Bar -->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __(' Create Invoice Dashboard') }}
        </h2>
    </x-slot>

    <!-- Box -->
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-10 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="overflow-x-auto">
                <div class="min-w-screen .bg-gray-100 flex justify-center .bg-gray-100 font-sans overflow-hidden">
                    <div wire:id="zofCsSIIav8OAYfxW38a" class="md:grid md:grid-cols-3 md:gap-6">

                        <!-- Text -->
                        <div class="md:col-span-1 flex justify-between">
                            <div class="px-4 sm:px-4"><br>

                                <h1 class="text-lg font-medium text-gray-900">Create new invoice - Information</h1>
                                <!-- Title -->
                                <p class="mt-1 text-sm text-gray-600">
                                    Insert invoices into your database information (Name, Price and Image).
                                </p>

                                <!-- Buyer -->
                                <p class="mt-1 text-sm text-gray-600">
                                    <br>
                                    <b> Buyer;</b><br>
                                    Insert the <i>name</i> of invoice in this case any name is Valid! just remember one thing, the data Type for names of invoices are <i> string</i>.
                                </p>

                                <!-- Type - Serie -->
                                <p class="mt-1 text-sm text-gray-600">
                                    <br>
                                    <b> Type - Serie;</b><br>
                                    Put the <i>price</i> for you invoice but remember don't be expensive! the data Type for invoices prices are <i> numeric</i>.
                                </p>

                            </div>
                        </div>

                        <div class="mt-5 md:mt-0 md:col-span-2">
                            <form
                                @if($invoice->id)
                                    action="{{ route('invoices.update', ['invoice'=>$invoice->id]) }}"
                                @else
                                    action="{{ route('invoices.store', ['invoice'=>$invoice->id]) }}"
                                @endif
                                    enctype="multipart/form-data" method="POST">
                                @if ($invoice->id) {{ method_field('PUT') }} @endif
                                @csrf

                                <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md">
                                    <div class="grid grid-cols-3 gap-6">

                                        <!-- Name -->
                                        <div style="display:grid; grid-template-columns:1fr 150px; align-items:center; gap:1rem;  "  class="grid col-span-6 sm:col-span-4 ">
                                            <div >
                                                <label class="block font-medium text-sm text-gray-700" for="buyer_id">
                                                    Buyer
                                                </label>
                                                <select name='buyer_id' class="text-gray-700 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full" wire:model.defer="state.buyer_id" autocomplete="buyer_id">
                                                    <option value=""> Choose buyer </option>
                                                    @foreach ($buyers as $buyer)
                                                        <option value="{{ $buyer->id }}"> {{ $buyer->name }} </option>
                                                        @endforeach
                                                        <option @class(['p-4', 'font-bold' => true])
                                                            value="0">
                                                            Create New Buyer
                                                        </option>
                                                </select>
                                                @error('buyer_id')
                                                <span class=" text-sm text-red-600" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>

                                            {{-- Button New Buyer --}}
                                                <a href="{{ route('buyers.create') }}"
                                                    style="width: 100%; text-align:center; "
                                                    class=" text-center items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition mt-6 ">
                                                    {{__('New Buyer')}}
                                                </a>

                                        </div>

                                        <!-- Type - Serie -->
                                        <div class="col-span-6 sm:col-span-4">
                                            <div>
                                                <label class="block font-medium text-sm text-gray-700" for="serie">
                                                    Type - Serie
                                                </label>
                                                <select name="serie" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-md sm:text-sm border-gray-300">
                                                    <option value="">Choose option</option>
                                                    <option value="A">A</option>
                                                    <option value="B">B</option>
                                                    <option value="C">C</option>
                                                </select>
                                            </div>
                                            @error('serie')
                                            <span class=" text-sm text-red-600" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
a
                                    </div>
                                </div>
                                <!-- New Box for Buttoms -->
                                <div class="flex items-center justify-end px-4 py-3 bg-gray-150 text-right sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md">

                                    <!-- Buttom Back -->
                                    <div class="py-1">
                                        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                                            <a href="{{route('invoices.index')}}"
                                                        class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white
                                                            uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300
                                                            disabled:opacity-25 transition ml-4">
                                                {{-- Icon <- --}}
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="1 1 24 24" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M11 17l-5-5m0 0l5-5m-5 5h12" /> </svg>
                                                {{__('Back')}}
                                            </a>
                                        </div>
                                    </div>

                                    <!-- Buttom Save -->
                                    <button type="submit"
                                        class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition" wire:loading.attr="disabled" wire:target="photo">
                                        Add Products
                                    </button>

                                </div>
                            </form>
                        </div>

                    </div>
                    {{-- Shadow Box --}}
                    <div class="bg-white shadow-md rounded my-6"> </div>
                </div>
            </div>
        </div>
    </div>
</div>
</x-app-layout>
