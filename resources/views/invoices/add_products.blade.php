<x-app-layout>
    {{-- Dashboard --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight ">
            {{ __('Dashboard Invoice N°') }} {{ $invoice->id }}
        </h2>
    </x-slot>

    <div class="pt-6 max-w-7xl mx-auto sm:px-6 lg:px-8 bg-opacity-25 grid grid-cols-1 md:grid-cols-2">

        {{-- Button New invoice --}}
        <div class=" inline-flex items-right max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            <a href="{{ route('invoices.index') }}"
                class="inline-flex items-center px-4 py-2 bg-indigo-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition ml-3 mr-3">
                {{ __('Invoice List') }}
            </a>
        </div>

        {{-- Alert Message --}}
        {{-- @if (session('status'))
            <div class="ml-auto mr-3 flex flex-col gap-2 w-auto border-b-2 border-indigo-700">
                <div class="bg-blue-50 rounded-t text-blue-900 px-4 py-3" role="alert">
                    <div class="flex items-center">
                        <!-- ! -->
                        <div>
                            <svg class="fill-current h-5 w-5 text-indigo-700" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20">
                                <path
                                    d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z" />
                            </svg>
                        </div>
                        <!--  -->
                        <div>
                            <p
                                class=".inline-flex flex items-center .text-sm font-semibold  rounded-md uppercase tracking-widest focus:outline-none disabled:opacity-25 transition ml-3 mr-3 text-xs text-indigo-700 ">
                                {{ session('message') }}
                            </p>
                        </div>
                        <!-- X -->
                        <p class="flex cursor-pointer">
                        <form method="POST" action="{{ route('invoices.index') }}">
                            @csrf
                            <a href="{{ route('invoices.index') }}"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                <svg class="text-indigo-700 text-xl" stroke="currentColor" fill="currentColor"
                                    stroke-width="0" viewBox="0 0 1024 1024" height="1em" width="1em"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M685.4 354.8c0-4.4-3.6-8-8-8l-66 .3L512 465.6l-99.3-118.4-66.1-.3c-4.4 0-8 3.5-8 8 0 1.9.7 3.7 1.9 5.2l130.1 155L340.5 670a8.32 8.32 0 0 0-1.9 5.2c0 4.4 3.6 8 8 8l66.1-.3L512 564.4l99.3 118.4 66 .3c4.4 0 8-3.5 8-8 0-1.9-.7-3.7-1.9-5.2L553.5 515l130.1-155c1.2-1.4 1.8-3.3 1.8-5.2z">
                                    </path>
                                    <path
                                        d="M512 65C264.6 65 64 265.6 64 513s200.6 448 448 448 448-200.6 448-448S759.4 65 512 65zm0 820c-205.4 0-372-166.6-372-372s166.6-372 372-372 372 166.6 372 372-166.6 372-372 372z">
                                    </path>
                                </svg>
                            </a>
                        </form>
                        </p>
                    </div>
                </div>
            </div>
        @endif --}}

    </div>

<!-- Table Invoice -->
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Division for Tables  -->
            <div class=" bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="bg-white shadow-md rounded">

                    <!-- Table Invoice -->
                    <table class="min-w-max w-full table-auto">
                        <!-- Titles Table -->
                        <thead>
                            <tr class="bg-indigo-500 text-white	 uppercase text-sm leading-normal">
                                <th class="py-3 px-6 text-center"># INVOICE</th>
                                <th class="py-3 px-6 text-center">SERIE</th>
                                <th class="py-3 px-6 text-center">STATUS</th>
                                <th class="py-3 px-6 text-center">CREATE AT</th>
                                <th class="py-3 px-6 text-center">BUYER</th>
                            </tr>
                        </thead>
                        <!-- Body -->
                        <tbody class="text-gray-600 text-sm font-light">
                                <tr class="border-b border-gray-200 hover:bg-gray-100">

                                    <!-- id -->
                                    <td class="py-3 px-6 text-center whitespace-nowrap">
                                        <div class="items-center">
                                            <div class="mr-2">
                                                <span
                                                    class="font-medium">{{ str_pad($invoice->id, 2, 0, STR_PAD_LEFT) }}</span>
                                            </div>
                                        </div>
                                    </td>

                                    <!-- Serie -->
                                    <td class="py-3 px-6 text-center">
                                        <span>{{ $invoice->serie }}</span>
                                    </td>

                                    <!-- Status -->
                                    <td class="py-3 px-6 text-center">
                                        <span> Payed </span>
                                    </td>

                                    <!-- Created at -->
                                    <td class="py-3 px-6 text-center">
                                        <span>{{ $invoice->created_at }}</span>
                                    </td>

                                    <!-- Buyer -->
                                    <td class="py-3 px-6 text-left">
                                        <div class="flex items-center">
                                            <div class="mr-2">
                                                <img class="w-8 h-8 rounded-full"
                                                    src="{{ asset($invoice->buyer->img_url) }}" />
                                            </div>
                                            <div>
                                                <p class="font-semibold text-black">{{ $invoice->buyer->name }}</p>
                                                <p class="text-xs text-gray-600">{{ $invoice->buyer->email }}</p>
                                            </div>
                                        </div>
                                    </td>

                                </tr>
                        </tbody>
                    </table>

                </div>
            </div>

        </div>
    </div>

<!-- Form add Products -->
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <form class="grid gap-8 grid-cols-1" action="{{ route('invoice-details.store') }}" method="POST">
            @csrf
            <input type="hidden" value="{{ $invoice->id }}" name="invoice_id">
            <div class="shadow sm:rounded-md sm:overflow-hidden">
                <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                    <div class="grid grid-cols-3 gap-4">

                        <div>
                            <label for="nif" class="block text-sm font-medium text-gray-700">
                                Product
                            </label>
                            <div class="mt-1 flex rounded-md shadow-sm">
                                <select name="product_id"
                                    class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-md sm:text-sm border-gray-300">
                                    <option value="">Choose one</option>
                                    @foreach ($products as $product)
                                    <option value="{{ $product->id }}"> {{ $product->name }} ({{ $product->price }}) </option>
                                    @endforeach
                                </select>
                            </div>
                            @error('nif')
                            <span class=" text-sm text-red-600" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div>
                            <label for="quantity" class="block text-sm font-medium text-gray-700">
                                Quantity
                            </label>
                            <div class="mt-1 flex rounded-md shadow-sm">
                                <input type="number" name="quantity" id="quantity" value="{{ old('quantity') }}"
                                    class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-md sm:text-sm border-gray-300">
                            </div>
                            @error('quantity')
                            <span class=" text-sm text-red-600" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div>
                            <label for="price" class="block text-sm font-medium text-gray-700">
                                Price (Leave blank to not modify)
                            </label>
                            <div class="mt-1 flex rounded-md shadow-sm">
                                <input type="text" name="price" id="price" value="{{ old('price') }}"
                                    class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-md sm:text-sm border-gray-300">
                            </div>
                            @error('price')
                            <span class=" text-sm text-red-600" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                    </div>
                </div>
                <!-- Button Add -->
                <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                    <button type="submit"
                        class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Add
                    </button>
                </div>

            </div>
        </form>
    </div>


<!-- Table Products added -->
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="bg-white shadow-md rounded">
                    <table class="min-w-max w-full table-auto">

                        <!-- Titles Table -->
                        <thead>
                            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                <th class="py-3 px-6 text-center">ID PRODUCT</th>
                                <th class="py-3 px-6 text-center">PRODUCT</th>
                                <th class="py-3 px-6 text-center">PRICE</th>
                                <th class="py-3 px-6 text-center">QUANTITY</th>
                                <th class="py-3 px-6 text-center">TOTAL</th>
                                <th class="py-3 px-6 text-center">ACTION</th>
                            </tr>
                        </thead>

                        @php
                        $total= 0;
                        @endphp
                        @foreach ($details as $item)

                        <!-- Body -->
                        <tbody class="text-gray-600 text-sm font-light">
                            <tr class="border-b border-gray-200 hover:bg-gray-100">

                                <!-- id -->
                                <td class="py-3 px-6 text-center whitespace-nowrap">
                                    <div class="items-center">
                                        <div class="mr-2">
                                        <span class="font-medium">{{ str_pad($item->id, 3 , 0, STR_PAD_LEFT)  }}</span>
                                    </div>
                                </td>

                                <!-- name -->
                                <td class="py-3 px-6 text-left">
                                    <div class="flex items-center">
                                        <div class="mr-2">
                                            {{-- <img class="w-8 h-8 rounded-full" src="{{ asset($product->img_url) }}" /> --}}
                                            <img class="w-8 h-8 rounded-full" src="{{ asset($item->product->img_url) }}" />
                                        </div>
                                        <span>{{ $item->product->name }}</span>
                                    </div>
                                </td>

                                <!-- price -->
                                <td class="py-3 px-6 text-center">
                                    <span>{{ $item->price }}</span>
                                </td>

                                <!-- Quantity -->
                                <td class="py-3 px-6 text-center">
                                    <span>{{ $item->quantity }} </span>
                                </td>

                                <!-- Total QUANTITY -->
                                <td class="py-3 px-6 text-center">
                                    <span> {{ $item->total_product }} </span>
                                </td>

                                <!-- Actions -->
                                <td class="py-3 px-6 text-center">
                                    <div class="flex item-center justify-center">
                                        <!-- Eliminar -->
                                        <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                            <form method="POST" action="{{ route('invoice-details.destroy', ['invoice_detail'=> $item->id]) }}">
                                                @csrf
                                                {{  method_field("DELETE") }}
                                                <a href="{{ route('invoice-details.destroy', ['invoice_detail'=> $item->id]) }}" onclick="event.preventDefault(); this.closest('form').submit();">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                    </svg>
                                                </a>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>

                        @php
                        $total = $total + $item->total_product;
                        @endphp
                        @endforeach

                        <!-- Total -->
                        <tfoot class="bg-gray-200 border-t border-gray-200">
                            <tr>
                                <td colspan="5" class="py-3 px-6 text-right whitespace-nowrap ">
                                    Total to Pay: {{ $total }}
                                </td>
                                <td>
                                    <div class="px-4 py-3 bg-gray-200 text-right sm:px-6">
                                        <form method="POST" action="{{ route('invoices.complete', ['invoice'=> $invoice->id]) }}">
                                            @csrf
                                            <a href="{{ route('invoices.complete', ['invoice'=> $invoice->id]) }}" onclick="event.preventDefault(); this.closest('form').submit();"
                                                class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                {{ __('Complete and Send') }}
                                            </a>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        </tfoot>

                    </table>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>

{{-- Other form to create foot of table --}}
{{-- <tfoot class="bg-gray-200 border-t border-gray-200">
    <tr class="text-right  ">
        <td class="py-3 px-6"></td>
        <td class="py-3 px-6"></td>
        <td class="py-3 px-6"></td>
        <td class="py-3 px-6"></td>
        <td class="py-3 px-6"></td>
        <td class="py-3 px-6"> <span class="font-medium">Total to Pay: {{ $total }}</span> </td>
    </tr>
</tfoot> --}}

{{-- Payed
New --}}
