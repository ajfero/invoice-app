{{-- Componente que extiende de layout App para aplicar estilos de la libreria --}}
<x-app-layout>
    <x-slot name="header" >
        <div class="grid grid-cols-3 gap-4 items-center">
            <div class=" col-span-2"  >
                <h1 class=" inline font-semibold ml-10 text-2xl text-gray-800 leading-tight">
                    {{ __('Main dashboard:') }}
                </h1>
                <h1 class=" inline font-bold text-2xl text-indigo-500 leading-tight">
                    {{ __('InvoiceApp') }}
                </h1>
            </div>

            <div class=" inline ">
                {{-- {{ route('invoices.add_products', ['invoice'=> $invoice->id]) }} --}}
                {{-- <form action="{{ route('invoice-details.show') }}" method="GET"
                    class=" relative mx-auto w-max" >
                    <input type="search"
                            class="peer cursor-pointer relative z-10 h-10 w-10 rounded-full border bg-transparent pl-12 outline-none focus:w-full focus:cursor-text focus:border-indigo-300 focus:pl-16 focus:pr-4" />
                    <svg xmlns="http://www.w3.org/2000/svg" class="absolute inset-y-0 my-auto h-8 w-12 border-r border-transparent stroke-indigo-400 px-3.5 peer-focus:border-indigo-400 peer-focus:stroke-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                    </form> --}}
            </div>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-jet-welcome />
            </div>
        </div>
    </div>
</x-app-layout>


{{-- <div style="display:grid; grid-template-columns:1fr 150px; align-items:center; gap:1rem;  "  class="grid col-span-6 sm:col-span-4 ">
    <div class=" inline ">
        <form action="" class=" relative mx-auto w-max">
            <input type="search"
                    class="peer cursor-pointer relative z-10 h-10 w-10 rounded-full border bg-transparent pl-12 outline-none focus:w-full focus:cursor-text focus:border-indigo-300 focus:pl-16 focus:pr-4" />
            <svg xmlns="http://www.w3.org/2000/svg" class="absolute inset-y-0 my-auto h-8 w-12 border-r border-transparent stroke-indigo-400 px-3.5 peer-focus:border-indigo-400 peer-focus:stroke-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
                <option value=""> Choose buyer </option>
                @foreach ($invoices as $invoice)
                    <option value="{{ $invoice->id }}"> {{ $invoice->name }} </option>
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
        </form>
    </div> --}}
