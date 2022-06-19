<x-app-layout>

    <!-- Nav Bar -->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Buyer Dashboard') }}
        </h2>
    </x-slot>

    <!-- Box -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-10 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="overflow-x-auto">
                    <div class="min-w-screen bg-gray-100 flex justify-center bg-gray-100 font-sans overflow-hidden">
                        <div wire:id="zofCsSIIav8OAYfxW38a" class="md:grid md:grid-cols-3 md:gap-6">

                            <!-- Text -->
                            <div class="md:col-span-1 flex justify-between">
                                <div class="px-4 sm:px-4"><br>

                                    <h1 class="text-lg font-medium text-gray-900">Create new buyer - Information</h1>
                                    <!-- Title -->
                                    <p class="mt-1 text-sm text-gray-600">
                                        Insert buyers into your database information (Name, Price and Image).
                                    </p>
                                    <!-- Name -->
                                    <p class="mt-1 text-sm text-gray-600">
                                        <br>
                                        <b> Name;</b><br>
                                        Insert the <i>name</i> of buyer in this case any name is Valid! just remember one thing, the data Type for names of buyers are <i> string</i>.
                                    </p>
                                    <!-- Document -->
                                    <p class="mt-1 text-sm text-gray-600">
                                        <br>
                                        <b> Document;</b><br>
                                        Put the <i>Document</i> for you buyer but remember don't be expensive! the data Type for buyers prices are <i> numeric</i>.
                                    </p>
                                    <!-- Image -->
                                    <p class="mt-1 text-sm text-gray-600">
                                        <br>
                                        <b> Image;</b><br>
                                        Select or Drag & Drop your <i>Image</i> of buyer, in the box area. the data Type for Images are <i> PNG, JPG, GIF </i> up to 1024KB.
                                    </p>

                                </div>
                            </div>

                            <!-- Formo Create Buyer  -->
                            <div class="mt-5 md:mt-0 md:col-span-2">
                                <form
                                    @if($buyer->id)
                                        action="{{ route('buyers.update', ['buyer'=>$buyer->id]) }}"
                                    @else
                                        action="{{ route('buyers.store', ['buyer'=>$buyer->id]) }}"
                                    @endif

                                    enctype="multipart/form-data" method="POST">

                                    @if ($buyer->id)
                                        {{ method_field('PUT') }}
                                        {{-- @method('PUT') --}} <!-- Comentamos para probar luego si funciona sin los corchetes -->
                                    @endif
                                    @csrf

                                    <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md">
                                        <div class="grid grid-cols-3 gap-6">

                                            <!-- Name -->
                                            <div class="col-span-6 sm:col-span-4">
                                                <div>
                                                    <label class="block font-medium text-sm text-gray-350" for="name">
                                                        Full Name
                                                    </label>
                                                    <input type="text" name="name" id="name" value="{{ old('name', $buyer->name) }}" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full " wire:model.defer="state.name" autocomplete="name">
                                                </div>
                                                @error('name')
                                                <span class=" text-sm text-red-600" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>

                                            <!-- Document -->
                                            <div class="col-span-6 sm:col-span-4">
                                                <div>
                                                    <label class="block font-medium text-sm text-gray-700" for="price">
                                                        Document
                                                    </label>
                                                    <input type="text" name="nif" id="nif" value="{{ old('price', $buyer->nif) }}" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full">
                                                </div>
                                                @error('nif')
                                                <span class=" text-sm text-red-600" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>

                                            <!-- Email -->
                                            <div class="col-span-6 sm:col-span-4">
                                                <div>
                                                    <label class="block font-medium text-sm text-gray-700" for="price">
                                                        Email
                                                    </label>
                                                    <input type="email" name="email" id="email" value="{{ old('email', $buyer->email) }}" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full">
                                                </div>
                                                @error('price')
                                                <span class=" text-sm text-red-600" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>

                                            <!-- Photo -->
                                            <div class="flexcol-span-6 sm:col-span-4">
                                                <div>
                                                    {{-- Definomos que si el buyero tiene un "id" debe tener una imagen por lo cual vamos a mostrarla --}}
                                                    <label class="block font-medium text-sm text-gray-700" for="image">
                                                        Photo
                                                    </label>
                                                    @if($buyer->id)
                                                    <div class="pb-4" >
                                                        <img class="inline w-16 h-16 rounded-full" src="{{ asset($buyer->img_url) }}" />
                                                        <input type="file"
                                                        class="inline-flex items-center ml-2 px-1 py-1 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition"
                                                        wire:loading.attr="disabled" wire:target="image"
                                                        id="image" name="image" accept="*"
                                                        @change="addFiles($event)"
                                                        title=""
                                                        />
                                                    </div>
                                                @endif
                                                    <br>
                                                </div>
                                                <!-- Stile Drag & Drop  -->
                                                <div class="bg-white p7 rounded mx-auto mt-1">
                                                    <div x-data="dataFileDnD()" class="relative flex flex-col p-4 text-gray-400 border border-gray-200 rounded">
                                                        <div x-ref="dnd"
                                                            class="relative flex flex-col text-gray-400 border border-gray-200 border-dashed rounded cursor-pointer mt-1">
                                                            <input id="image" name="image" accept="*"
                                                                type="file" multiple class="absolute inset-0 z-50 w-full h-full p-0 m-0 outline-none opacity-0 cursor-pointer"
                                                                @change="addFiles($event)"
                                                                @dragover="$refs.dnd.classList.add('border-blue-400'); $refs.dnd.classList.add('ring-4'); $refs.dnd.classList.add('ring-inset');"
                                                                @dragleave="$refs.dnd.classList.remove('border-blue-400'); $refs.dnd.classList.remove('ring-4'); $refs.dnd.classList.remove('ring-inset');"
                                                                @drop="$refs.dnd.classList.remove('border-blue-400'); $refs.dnd.classList.remove('ring-4'); $refs.dnd.classList.remove('ring-inset');"
                                                                title="" />
                                                            <div class="flex flex-col items-center justify-center py-10 text-center">
                                                                <svg class="w-6 h-6 mr-1 text-current-50" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                                </svg>
                                                                <p class="m-0">Drag your files here or click in this area</p>
                                                                <p class="m-0"> PNG, JPG, GIF up to 1024KB. </p>
                                                            </div>
                                                        </div>
                                                        <!-- Template -->
                                                        <template x-if="files.length > 0">
                                                            <div class="grid grid-cols-2 gap-4 mt-4 md:grid-cols-6" @drop.prevent="drop($event)" @dragover.prevent="$event.dataTransfer.dropEffect = 'move'">
                                                                <template x-for="(_, index) in Array.from({ length: files.length })">
                                                                    <div class="relative flex flex-col items-center overflow-hidden text-center bg-gray-100 border rounded cursor-move select-none"
                                                                        style="padding-top: 100%;" @dragstart="dragstart($event)" @dragend="fileDragging = null"
                                                                        :class="{'border-blue-600': fileDragging == index}" draggable="true" :data-index="index">

                                                                        <button class="absolute top-0 right-0 z-50 p-1 bg-white rounded-bl focus:outline-none" type="button" @click="remove(index)">
                                                                            <svg class="w-4 h-4 text-gray-700" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                                            </svg>
                                                                        </button>

                                                                        {{-- <template x-if="files[index].type.includes('audio/')">
                                                                            <svg class="absolute w-12 h-12 text-gray-400 transform top-1/2 -translate-y-2/3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3" />
                                                                            </svg>
                                                                        </template>
                                                                        --}}
                                                                        {{-- <template x-if="files[index].type.includes('application/') || files[index].type === ''">
                                                                            <svg class="absolute w-12 h-12 text-gray-400 transform top-1/2 -translate-y-2/3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                                                            </svg>
                                                                        </template>
                                                                        --}}
                                                                        <template x-if= " files[index]?.type || files[index]?.type.includes('image/')">
                                                                            <img class="absolute inset-0 z-0 object-cover w-full h-full border-4 border-white preview" x-bind:src="loadFile(files[index])" />
                                                                        </template>

                                                                        {{-- <template x-if="files[index].type.includes('video/')">
                                                                            <video class="absolute inset-0 object-cover w-full h-full border-4 border-white pointer-events-none preview">
                                                                                <fileDragging x-bind:src="loadFile(files[index])" type="video/mp4">
                                                                            </video>
                                                                        </template> --}}

                                                                        <div class="absolute bottom-0 left-0 right-0 flex flex-col p-2 text-xs bg-white bg-opacity-50">
                                                                            <span class="w-full font-bold text-gray-900 truncate" x-text="files[index]?.name">Loading</span>
                                                                            <span class="text-xs text-gray-900" x-text="humanFileSize(files[index]?.size)">...</span>
                                                                        </div>

                                                                        <div class="absolute inset-0 z-40 transition-colors duration-300" @dragenter="dragenter($event)" @dragleave="fileDropping = null" :class="{'bg-blue-200 bg-opacity-80': fileDropping == index && fileDragging != index}">

                                                                        </div>
                                                                    </div>
                                                                </template>
                                                            </div>
                                                        </template>
                                                    </div>
                                                </div>
                                                <!-- Function -->
                                                <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
                                                <script src="https://unpkg.com/create-file-list"></script>
                                                <script>
                                                    function dataFileDnD() {
                                                        return {
                                                            files: []
                                                            , fileDragging: null
                                                            , fileDropping: null
                                                            , humanFileSize(size) {
                                                                const i = Math.floor(Math.log(size) / Math.log(1024));
                                                                return (
                                                                    (size / Math.pow(1024, i)).toFixed(2) * 1 +
                                                                    " " + ["B", "kB", "MB", "GB", "TB"][i]
                                                                );
                                                            }
                                                            , remove(index) {
                                                                let files = [...this.files];
                                                                files.splice(index, 1);
                                                                this.files = createFileList(files);
                                                            }
                                                            , drop(e) {
                                                                let removed, add;
                                                                let files = [...this.files];

                                                                removed = files.splice(this.fileDragging, 1);
                                                                files.splice(this.fileDropping, 0, ...removed);

                                                                this.files = createFileList(files);

                                                                this.fileDropping = null;
                                                                this.fileDragging = null;
                                                            }
                                                            , dragenter(e) {
                                                                let targetElem = e.target.closest("[draggable]");

                                                                this.fileDropping = targetElem.getAttribute("data-index");
                                                            }
                                                            , dragstart(e) {
                                                                this.fileDragging = e.target
                                                                    .closest("[draggable]")
                                                                    .getAttribute("data-index");
                                                                e.dataTransfer.effectAllowed = "move";
                                                            }
                                                            , loadFile(file) {
                                                                const preview = document.querySelectorAll(".preview");
                                                                const blobUrl = URL.createObjectURL(file);

                                                                preview.forEach(elem => {
                                                                    elem.onload = () => {
                                                                        URL.revokeObjectURL(elem.src); // free memory
                                                                    };
                                                                });

                                                                return blobUrl;
                                                            }
                                                            , addFiles(e) {
                                                                const files = createFileList([...this.files], [...e.target.files]);
                                                                this.files = files;
                                                            }
                                                        };
                                                    }
                                                </script>
                                            </div>

                                        </div>
                                    </div>
                                    <!-- New Box for Buttoms -->
                                    <div class="flex items-center justify-end px-4 py-3 bg-gray-150 text-right sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md">

                                        <!-- Buttom Back -->
                                        <div class="py-1">
                                            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                                                <a href="{{route('buyers.index')}}"
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
                                            Save
                                        </button>

                                    </div>
                                </form>
                            </div>

                        </div> <!-- End of Main Content -->
                        {{-- Shadow Box --}}
                        <div class="bg-white shadow-md rounded my-6"> </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
