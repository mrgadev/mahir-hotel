@extends('layouts.dahboard_layout')

@section('title', 'Layanan Lainnya')
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
                    <a href="{{route('dashboard.hotel_facilities.index')}}" class="flex items-center hover:underline">
                        <p>Layanan Lainnya</p>
                    </a>
                    <span class="material-symbols-rounded">chevron_right</span>
                    <p>Buat Layanan Lainnya</p>
                </div>
        
                <h1 class="text-white text-4xl font-medium">
                    Buat Layanan Lainnya
                </h1>
            </div>
            
        </div>
        <section class="container px-6 mx-auto">
            <main class="col-span-12 md:pt-0">
                <div class="p-2 mt-2 bg-white rounded-xl shadow-lg">
                    <form action="{{route('dashboard.service.store')}}" method="POST" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="">
                            <div class="px-4 py-5 sm:p-6">
                                <div class="">
                                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 items-center">
                                        <div>
                                            <label for="name" class="block mb-3 font-medium text-gray-700 text-md">Nama Layanan Lainnya</label>
                                            <input placeholder="Nama Layanan Lainnya" type="text" name="name" id="name" autocomplete="off" class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-primary-500 focus:border-primary-500 sm:text-sm">

                                            @if ($errors->has('name'))
                                                <p class="text-red-500 mb-3 text-sm">{{$errors->first('name')}}</p>
                                            @endif
                                        </div>

                                        <div class="">
                                            <label for="service_category_id" class="block mb-3 font-medium text-gray-700 text-md">Kategori Layanan Lainnya</label>
                                            <select name="service_category_id" id="service_category_id" class="block w-full py-3 px-5 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-primary-500 focus:border-primary-500 sm:text-sm">
                                                <option value="">-- Pilih Kategori Layanan Lainnya --</option>
                                                @foreach ($service_categories as $service_category)
                                                    <option value="{{$service_category->id}}">{{$service_category->name}}</option>
                                                @endforeach
                                            </select>

                                            @if ($errors->has('service_category_id'))
                                                <p class="text-red-500 mb-3 text-sm">{{$errors->first('price')}}</p>
                                            @endif
                                        </div>

                                        <div>
                                            <label for="price" class="block mb-3 font-medium text-gray-700 text-md">Harga</label>
                                            <input placeholder="Harga" type="number" name="price" id="price" autocomplete="off" class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-primary-500 focus:border-primary-500 sm:text-sm">

                                            @if ($errors->has('price'))
                                                <p class="text-red-500 mb-3 text-sm">{{$errors->first('price')}}</p>
                                            @endif
                                        </div>
                                        
                                        <div class="mt-5">
                                            <label for="image" class="block mb-3 font-medium text-gray-700 text-md">Foto Layanan Lainnya</label>
                                            <input placeholder="" type="file" name="image[]" id="image" autocomplete="off" class="block border  w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-primary-500 focus:border-primary-500 sm:text-sm" multiple>

                                            @if ($errors->has('image'))
                                                <p class="text-red-500 mb-3 text-sm">{{$errors->first('image')}}</p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-1 mt-10 items-center">
                                        <div>
                                            <label for="description" class="block mb-3 font-medium text-gray-700 text-md">Deskripsi Layanan Lainnya</label>
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
@endpush