@extends('layouts.dahboard_layout')

@section('title', 'Tambah Kamar')
{{-- 
@section('breadcrumb')
    <ol class="flex flex-wrap pt-1 mr-12 bg-transparent rounded-lg sm:mr-16">
            <li class="text-sm leading-normal">
            <a class="text-white opacity-90" href="javascript:;">Dashboard</a>
            </li>
            <li class="text-sm pl-2 text-white capitalize leading-normal  before:float-left before:pr-2 before: before:content-['/']" aria-current="page">Profile</li>
        </ol>
    <h6 class="mb-0 font-bold text-white capitalize">My Account</h6>
@endsection --}}

@section('content')
    <main class="h-full overflow-y-auto">
        <div class="container mx-auto">
            <div class="flex flex-col gap-5 w-full p-6">
                <div class="flex items-center gap-1 bg-primary-100 p-2 text-primary-700 rounded-lg w-fit text-sm">
                    <a href="{{route('dashboard.home')}}" class="flex items-center">
                        <span class="material-symbols-rounded scale-75">home</span>
                    </a>
                    <span class="material-symbols-rounded">chevron_right</span>
                    <a href="{{route('dashboard.room.index')}}" class="flex items-center hover:underline">
                        <p>Daftar Kamar</p>
                    </a>
                    <span class="material-symbols-rounded">chevron_right</span>
                    <p>Buat Kamar</p>
                </div>
        
                <h1 class="text-white text-4xl font-medium">
                    Buat Kamar
                </h1>
            </div>
            
        </div>
        <section class="container px-6 mx-auto">
            <main class="col-span-12 md:pt-0">
                <div class="p-2 mt-2 bg-white rounded-xl shadow-lg">
                    <form action="{{route('dashboard.room.store')}}" method="POST" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="">
                            <div class="px-4 py-5 sm:p-6">
                                <div class="mt-10">
                                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 items-center">
                                        <div>
                                            <label for="name" class="block mb-3 font-medium text-gray-700 text-md">Nama Kamar</label>
                                            <input placeholder="Nama Kamar" type="text" name="name" id="name" autocomplete="off" class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-primary-500 focus:border-primary-500 sm:text-sm">

                                            @if ($errors->has('name'))
                                                <p class="text-red-500 mb-3 text-sm">{{$errors->first('name')}}</p>
                                            @endif
                                        </div>
                                        
                                        <div>
                                            <label for="cover" class="block mb-3 font-medium text-gray-700 text-md">Gambar Sampul</label>
                                            <input placeholder="" type="file" name="cover" id="cover" autocomplete="off" class="block border  w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-primary-500 focus:border-primary-500 sm:text-sm">

                                            @if ($errors->has('cover'))
                                                <p class="text-red-500 mb-3 text-sm">{{$errors->first('cover')}}</p>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 items-center my-5">
                                        <div>
                                            <label for="price" class="block mb-3 font-medium text-gray-700 text-md">Harga per Malam</label>
                                            <input placeholder="Harga per Malam" type="number" data-a-sign="" data-a-dec="," data-a-sep="." name="price" id="price" autocomplete="off" class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-primary-500 focus:border-primary-500 sm:text-sm">

                                            @if ($errors->has('price'))
                                                <p class="text-red-500 mb-3 text-sm">{{$errors->first('price')}}</p>
                                            @endif
                                        </div>
                                        
                                        <div>
                                            <label for="photos" class="block mb-3 font-medium text-gray-700 text-md">Gambar Lainnya</label>
                                            <input placeholder="" type="file" name="photos[]" id="photos" multiple autocomplete="off" class="block border w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-primary-500 focus:border-primary-500 sm:text-sm">

                                            @if ($errors->has('photos'))
                                                <p class="text-red-500 mb-3 text-sm">{{$errors->first('photos')}}</p>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="grid lg:grid-cols-2 gap-5 ">
                                        <div>
                                            <h2 class="text-md font-medium mb-3">Fasilitas Kamar</h2>
                                            <div class="flex flex-wrap gap-5">
                                                @foreach ($room_facilities as $room_facility)
                                                <div class="flex items-center gap-2 rounded-full bg-primary-100 text-primary-700 w-fit px-5 py-2 has-[:checked]:border-primary-700  has-[:checked]:border-2 transition-all hover:cursor-pointer">
                                                    <input type="checkbox" name="room_facilities_id[]" id="room_facilities_id{{$loop->iteration}}" value="{{$room_facility->id}}" class="hidden" onclick="console.log('{{$room_facility->name}}')">
                                                    {{-- <img src="{{Storage::url($room_facility->icon)}}" class="w-5 h-5" alt=""> --}}
                                                    <span class="material-icons-round">{{$room_facility->icon}}</span>
                                                    <label for="room_facilities_id{{$loop->iteration}}" class="hover:cursor-pointer">{{$room_facility->name}}</label>
                                                </div>
                                            
                                                @endforeach
                                            </div>
                                        </div>

                                        <div>
                                            <label for="total_rooms" class="block mb-3 font-medium text-gray-700 text-md">Total Kamar</label>
                                            <input type="number" name="total_rooms" id="total_rooms" autocomplete="off" class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-primary-500 focus:border-primary-500 sm:text-sm">

                                            @if ($errors->has('total_rooms'))
                                                <p class="text-red-500 mb-3 text-sm">{{$errors->first('total_rooms')}}</p>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="grid grid-cols-1 mt-5 items-center">
                                        <div>
                                            <label for="description" class="block mb-3 font-medium text-gray-700 text-md">Deskripsi Kamar</label>
                                            <textarea name="description" id="description" rows="10" cols="80"></textarea>

                                            @error('description')
                                                <span class="text-red-500 text-sm">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            
                            <div class="px-4 py-3 text-right sm:px-6">
                                <a href="" type="button" class="inline-flex justify-center px-4 py-2 mr-4 text-sm font-medium text-gray-700 bg-white border border-gray-600 rounded-lg shadow-sm hover:bg-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300" onclick="return confirm('are you want to cancel?')">
                                    Cancel
                                </a>
                                <button type="submit" class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-primary-500 border border-transparent rounded-lg shadow-sm hover:bg-primary-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500" onclick="return confirm('are you want to submit this data?')">
                                    Save Changes
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </main>
        </section>
    </main>
@endsection
@push('addon-script')
    <!-- Panggil CKEditor versi 5 -->
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#description'))
            .catch(error => {
                console.error(error);
            });
    </script>
    <script>
        jQuery(function($) {
       $('#price').autoNumeric('init');   
        });
       </script>
       
@endpush