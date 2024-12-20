@extends('layouts.frontpage')
@push('addons-style')
<style>
    #mainNavbar.scrolled {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        z-index:1;
        background-color: white;
        /* border-radius: 25px; */
        /* border: 2px solid #976033; */
        /* width: ; */
        padding: 1.5rem 9rem;
        transition: all 0.5s ease;
    }

    #mainNavbar.scrolled p,
    #mainNavbar.scrolled button {
        color: #976033;
    }
    #mainNavbar.scrolled a {
        color: #976033;
        transition: all 0.4s ease;
    }
    #mainNavbar.scrolled a:hover {
        color: #976033;
        transition: all 0.4s ease;
    }

    #mainNavbar.scrolled .auth-button a:first-child {
        background-color: #976033;
        color: #fff
    }

    #mainNavbar.scrolled .auth-button a:nth-child(2) {
        border: 2px solid #976033;
        color: #976033;
        transition: all 0.4s ease;
    }

    #mainNavbar.scrolled .auth-button a:nth-child(2):hover {
        background-color: #976033;
        color: #fff;
        transition: all 0.4s ease;
    }

    #mainNavbar.scrolled p.user-role {
        background: #976033;
        color: white;
    }

    option {
        padding: 2rem;
    }

    header {
        background: url({{url($frontpage_site_setting->hero_cover) ?? ''}});
    }

    .cta-card {
        background: url({{url($frontpage_site_setting->cta_cover) ?? ''}});
        background-position: center;
        background-size: cover;
    }

    @media (max-width: 1024px) {
        #mainNavbar.scrolled {
            padding: 1.5rem 3rem;
        }

        #mainNavbar.scrolled [name="menu-outline"] {
            color: #976033;
        }
    }
</style>
@endpush
@section('title', 'Beranda')
@section('main')
<header class="xl:px-36 px-12 bg-fixed relative w-screen h-screen">
    {{-- <div class="absolute h-screen w-full bg-[#162034] opacity-70 z-10"></div> --}}
    <nav class=" duration-500 transition-all flex items-center justify-between py-6 text-white" id="mainNavbar">
        <a href="{{route('frontpage.index')}}"  class="text-lg font-medium">Mahir Hotel</a>
        <div class="xl:flex gap-8 font-light hidden">
            <a href="{{route('frontpage.index')}}" class="hover:font-medium {{(Route::is('frontpage.index') ? 'font-medium' : '')}}">Beranda</a>
            <a href="{{route('frontpage.rooms')}}" class="hover:font-medium {{(Route::is('frontpage.rooms') ? 'font-medium' : '')}}">Kamar</a>
            <a href="{{route('frontpage.promo')}}" class="hover:font-medium {{(Route::is('frontpage.promo') ? 'font-medium' : '')}}">Promo</a>
            <a href="{{route('frontpage.services')}}" class="hover:font-medium {{(Route::is('frontpage.services') ? 'font-medium' : '')}}">Layanan Lainnya </a>
            <a href="{{route('frontpage.about')}}" class="hover:font-medium {{(Route::is('frontpage.about') ? 'font-medium' : '')}}">Tentang Kami</a>
        </div>
        <ion-icon name="menu-outline" class="xl:hidden text-4xl" id="openMobileMenu"></ion-icon>
        @auth
            <div class="hidden xl:flex items-center gap-2">
                @if(url(Auth::user()->avatar))
                <img src="{{url(Auth::user()->avatar)}}" class="w-12 h-12 object-cover object-center rounded-full" alt="">
                @else
                <span class="material-symbols-rounded">account_circle</span>
                @endif
                <div class="flex flex-col gap-1">
                    <button class="text-lg" id="toggleUserMenu">{{Auth::user()->name}}</button>
                    <p class="user-role text-xs px-2 py-1 bg-white text-primary-700 rounded-md w-fit">{{ucfirst(Auth::user()->roles->first()->name)}}</p>
                </div>
                <div id="userMenu" class="bg-white absolute right-28 top-28 border border-primary-700 rounded-xl p-3 hidden">
                    <div class="flex flex-col gap-2">
                        <a href="{{route('dashboard.home')}}" class="text-primary-700">Dashboard</a>
                        <hr>
                        <form action="{{route('logout')}}" method="POST">
                            @csrf
                            @method('POST')
                            <button type="submit" class="text-red-600 z-20">Keluar</button>
                        </form>
                    </div>
                </div>
            </div>

        @endauth
        @guest

        <div class=" items-center gap-3 auth-button hidden xl:flex">
            @auth
                <a href="{{route('admin.dashboard')}}" class="px-5 py-2 border border-white text-white rounded-full hover:bg-white hover:text-primary-500 transition-all">Dashboard</a>
            @endauth
            @guest
                <a href="{{route('register')}}" class="bg-white text-primary-500 px-5 py-2 rounded-full hover:bg-white transition-all">Daftar</a>
                <a href="{{route('login')}}" class="px-5 py-2 border border-white text-white rounded-full hover:bg-white hover:text-primary-500 transition-all">Masuk</a>
            @endguest
        </div>
        @endguest

    </nav>
    <nav class="duration-500 bg-white w-screen h-screen fixed hidden top-0 left-0 right-0 z-10 px-12" id="mobileMenu">
        <div class="flex items-center justify-between py-6 text-primary-500">
            <a href="{{route('frontpage.index')}}"  class="text-lg font-medium">Mahir Hotel</a>
            <span class="material-symbols-rounded" id="closeMobileMenu">close</span>
        </div>

        <div class="flex flex-col gap-8 mt-8 font-light">
            <a href="{{route('frontpage.index')}}" class="hover:font-medium {{(Route::is('frontpage.index') ? 'font-medium' : '')}}">Beranda</a>
            <a href="{{route('frontpage.rooms')}}" class="hover:font-medium {{(Route::is('frontpage.rooms') ? 'font-medium' : '')}}">Kamar </a>
            <a href="{{route('frontpage.promo')}}" class="hover:font-medium {{(Route::is('frontpage.promo') ? 'font-medium' : '')}}">Promo</a>
            <a href="{{route('frontpage.services')}}" class="hover:font-medium {{(Route::is('frontpage.services') ? 'font-medium' : '')}}">Layanan Lainnya </a>
            <a href="{{route('frontpage.about')}}" class="hover:font-medium {{(Route::is('frontpage.about') ? 'font-medium' : '')}}">Tentang Kami</a>
            @guest
            <a href="{{route('login')}}" class="px-5 py-3 rounded-full bg-primary-500 text-white w-fit">Masuk / Daftar</a>
            @endguest
            @auth
            <a href="{{route('dashboard.home')}}" class="px-5 py-3 rounded-full bg-primary-500 text-white w-fit">Dashboard</a>
            <form action="{{route('logout')}}" method="POST">
                <button type="submit" class="text-red-500 font-medium">Keluar</button>
            </form>
            @endauth
        </div>
    </nav>


    <div class="hidden bg-white absolute w-screen h-screen top-0 left-0 z-20 px-11">
        {{-- <div class="flex items-center justify-between py-6">
            <p class="text-primary-500">Mahir Hotel</p>
            <span class="material-symbols-rounded">
                close
                </span>
        </div> --}}
        {{-- <div class="flex md:flex-row flex-col gap-3 font-light">
            <p>Beranda</p>
            <p>Promo</p>
            <p>Layanan Lainnya</p>
            <p>Kontak</p>
            <p>Tentang Kami</p>
            <div class="flex items-center gap-3 mt-10">
                <a href="#" class="bg-primary-500 text-white px-5 py-2 rounded-full hover:bg-primary-700 transition-all">Daftar</a>
                <a href="#" class="px-5 py-2 border border-primary-500 text-primary-500 rounded-full hover:bg-primary-500 hover:text-white transition-all">Masuk</a>
            </div>
        </div> --}}
    </div>

    <section class="main h-[90%] flex flex-col justify-center gap-3 relative">
        <h1 class="text-4xl xl:text-6xl text-white">{!!$frontpage_site_setting->tagline!!}</h1>
        <div class="text-white">
            {!!$frontpage_site_setting->description!!}
        </div>

        <form action="{{route('frontpage.search.rooms')}}" id="reservationForm" class="hidden mt-5 bg-white py-5 ps-10 pe-5 xl:flex items-center justify-between w-3/5 rounded-full" method="GET">
            <div class="flex items-center gap-2">
                <div class="grid grid-cols-1 gap-2">
                    <label for="" class="text-sm px-3">Pilih Kamar</label>
                    <select name="room_id" class="outline-none border-none text-lg px-3" id="">
                        <option value="" class="p-2 ">-- Pilih Kamar --</option>
                        @forelse ($rooms as $room)
                            <option value="{{$room->id}}">{{$room->name}}</option>
                        @empty

                        @endforelse
                    </select>
                </div>
                <div class="grid grid-cols-1 gap-2">
                    <label for="checkIn" class="text-sm px-3">Check-in</label>
                    <input type="date" id="checkIn" name="check_in" class="outline-none border-none text-lg px-3">
                </div>
                <div class="grid grid-cols-1 gap-2">
                    <label for="checkOut" class="text-sm px-3">Check-out</label>
                    <input type="date" id="checkOut" name="check_out" class="outline-none border-none text-lg px-3" name="" id="">
                </div>
            </div>
            <button class="text-white bg-primary-500 w-fit px-5 me-3 py-3 rounded-full">
                Pesan
            </button>
        </form>

        {{-- Mobile booking form --}}
        <button class="text-white bg-primary-500 w-fit px-5 py-3 rounded-full block xl:hidden" id="openBookingForm">Pesan sekarang</button>
        <div class="inset-0 z-20 bg-gray-500 bg-opacity-65 fixed flex items-center justify-center xl:hidden hidden min-h-screen w-screen " id="bookingForm">
            <form action="{{route('frontpage.search.rooms')}}" id="reservationFormMobile" method="GET" class="flex flex-col gap-5 justify-center bg-white w-[90%] rounded-xl p-5">
                <h2 class="text-2xl font-medium mb-5 text-primary-500">Pesan Kamar</h2>
                <div class="grid grid-cols-1 gap-2 w-full">
                    <label for="#rooms" class="flex items-center gap-1 text-primary-700 font-light text-sm"><span class="material-symbols-rounded scale-75">meeting_room</span> Pilih Kamar</label>

                    <select name="room_id" id="rooms" class="p-2 bg-primary-100 border border-primary-700 rounded-lg text-primary-700">
                        <option value="Pilih kamar">Pilih kamar</option>
                        @foreach ($rooms as $room)
                        <option value="{{$room->id}}">{{$room->name}}</option>
                        @endforeach

                    </select>
                </div>

                <div class="flex items-center gap-3">
                    <div class="grid grid-cols-1 gap-2 w-full">
                        <label for="#rooms" class="flex items-center gap-1 text-primary-700 font-light text-sm"><span class="material-symbols-rounded scale-75">meeting_room</span> Check-in</label>
                        <input type="date" name="check_in" id="checkInMobile" class="p-2 bg-primary-100 border border-primary-700 rounded-lg text-primary-700" id="">
                    </div>
                    <div class="grid grid-cols-1 gap-2 w-full">
                        <label for="#rooms" class="flex items-center gap-1 text-primary-700 font-light text-sm"><span class="material-symbols-rounded scale-75">meeting_room</span> Check-out</label>
                        <input type="date" name="check_out" id="checkOutMobile" class="p-2 bg-primary-100 border border-primary-700 rounded-lg text-primary-700" id="">
                    </div>
                </div>

                <div class="flex items-center gap-2 mt-3">
                    <button class="px-5 py-2 border border-primary-500 text-primary-500 rounded-full hover:bg-primary-500 hover:text-white transition-all" id="closeBookingForm">Batal</button>
                    <button class="bg-primary-500 text-white px-5 py-2 rounded-full hover:bg-primary-700 transition-all">Pesan</button>
                </div>
            </form>

        </div>
    </section>
</header>
{{-- Our Rooms Section --}}
<div class="px-12 xl:px-36 py-6">
    <div class="flex items-center justify-between">
        <div class="flex flex-col gap-1 my-5">
            <p class="text-sm  text-primary-500">Temukan</p>
            <p class="text-2xl font-medium text-primary-700">Kamar Terbaik Kami</p>
        </div>
        <a href="{{route('frontpage.rooms')}}" class="px-5 py-3 rounded-full text-white bg-primary-500 transition-all hover:bg-primary-700">Lihat semua</a>
        {{-- <div class="hidden xl:flex items-center gap-3">
            <button class="text-primary-500 bg-primary-100 flex items-center justify-center p-3 rounded-full transition-all hover:shadow-2xl" id="roomButtonLeft"><span class="material-symbols-rounded">chevron_left</span></button>
            <button class="text-primary-500 bg-primary-100 flex items-center justify-center p-3 rounded-full transition-all hover:shadow-2xl" id="roomButtonRight"><span class="material-symbols-rounded">chevron_right</span></button>
        </div> --}}
    </div>

    <div class="" id="roomsContainer">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-5">
           @foreach ($rooms as $room)
           <a href="{{route('frontpage.rooms.detail', $room->slug)}}" class="flex flex-col rounded-xl shadow-xl">
               <img src="{{url($room->cover)}}" alt="" class="w-full h-64 object-cover rounded-t-xl relative">
            {{-- <div class="relative">
                <p class="absolute bottom-5 left-5 flex items-end gap-1 px-3 py-1 rounded-full bg-primary-100 text-primary-600 text-sm">
                <span class="text-lg">IDR {{number_format($room->price,0,',','.')}}</span>
                </p>
            </div> --}}
            <div class="flex flex-col gap-2 p-5">
                <div class="flex items-center justify-between">
                    <h3 class="text-2xl text-primary-700 hover:underline">{{$room->name}}</h3>
                    {{-- <p class="bg-primary-100 text-primary-600 text-xs r    ounded-full px-3 py-1 border border-primary-600"><i class="bi bi-star-fill"></i> 4.5 (120)</p> --}}
                </div>
                <div class="text-sm flex items-center gap-1 text-primary-500">
                    @foreach ($room->room_facility as $facility)
                        <div class="flex items-center gap-1">
                            {{-- <img src="{{Storage::url($facility->icon)}}" alt="" class="w-5 h-5"> --}}
                            <span class="material-icons-round scale-50">{{$facility->icon}}</span>
                            <p class="text-xs">{{$facility->name}}</p>
                        </div>
                    @endforeach
                </div>
                <p class="text-lg mt-3 text-primary-500">Rp. {{number_format($room->price,0,',','.')}}/malam</p>
            </div>
        </a>
        @endforeach
        </div>
        {{-- <div class="flex flex-nowrap gap-10">
            <div class="w-[250px] xl:w-[350px] bg-white rounded-xl grid grid-rows-2 gap-5 border border-primary-300">
                <img src="https://images.unsplash.com/photo-1586105251261-72a756497a11?q=80&w=1916&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="rounded-t-xl h-36" alt="">
                <div class="p-5 flex flex-col gap-5">
                    <div class="flex items-center justify-between">
                        <div class="flex flex-col gap-2">
                            <p>Standard Room</p>
                            Amenities here
                        </div>
                        <div class="flex items-center gap-1">
                            <i class="bi bi-star-fill"></i>
                            4.8
                        </div>
                    </div>
                </div>
            </div>

            <div class="w-[250px] xl:w-[350px] bg-white rounded-xl grid grid-rows-2 gap-5 border border-primary-300">
                <img src="https://images.unsplash.com/photo-1586105251261-72a756497a11?q=80&w=1916&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="">
                <div class="p-5 flex flex-col gap-5">
                    <div class="flex items-center justify-between">
                        <div class="flex flex-col gap-2">
                            <p>Standard Room</p>
                            Amenities here
                        </div>
                        <div class="flex items-center gap-1">
                            <i class="bi bi-star-fill"></i>
                            4.8
                        </div>
                    </div>
                </div>
            </div>

            <div class="w-[250px] xl:w-[350px] bg-white rounded-xl grid grid-rows-2 gap-5 border border-primary-300">
                <img src="https://images.unsplash.com/photo-1586105251261-72a756497a11?q=80&w=1916&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="">
                <div class="p-5 flex flex-col gap-5">
                    <div class="flex items-center justify-between">
                        <div class="flex flex-col gap-2">
                            <p>Standard Room</p>
                            Amenities here
                        </div>
                        <div class="flex items-center gap-1">
                            <i class="bi bi-star-fill"></i>
                            4.8
                        </div>
                    </div>
                </div>
            </div>

            <div class="w-[250px] xl:w-[350px] bg-white rounded-xl grid grid-rows-2 gap-5 border border-primary-300">
                <img src="https://images.unsplash.com/photo-1586105251261-72a756497a11?q=80&w=1916&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="">
                <div class="p-5 flex flex-col gap-5">
                    <div class="flex items-center justify-between">
                        <div class="flex flex-col gap-2">
                            <p>Standard Room</p>
                            Amenities here
                        </div>
                        <div class="flex items-center gap-1">
                            <i class="bi bi-star-fill"></i>
                            4.8
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>

    {{-- <div class="flex flex-col items-center justify-center gap-1 my-10">
        <p class="text-primary-500 font-medium">Rasakan</p>
        <h2 class="text-2xl font-medium">Kepuasan Saat Menginap di Hotel Kami</h2>
    </div>
    <div class="grid xl:grid-cols-2 gap-5 items-center">
        <img src="https://images.unsplash.com/photo-1477959858617-67f85cf4f1df?q=80&w=1888&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="">
        <div class="flex flex-col gap-3">
            <h2 class="text-2xl">Pemandangan Kota yang Memukau</h2>
            <p>Hotel Citra Megah adalah destinasi yang sempurna bagi Anda yang menginginkan pengalaman menginap dengan pemandangan kota yang memukau. Kami berada di jantung kota, memberikan Anda pemandangan yang spektakuler, memadukan keindahan arsitektur modern dengan lanskap perkotaan yang gemerlap.</p>
        </div>
    </div> --}}

</div>


{{-- Our Services Section --}}
<div class="px-12 xl:px-36 py-12">
    <div class="flex flex-col gap-1 justify-center items-center">
        <p class="font-medium text-primary-400">Kenali</p>
        <h2 class="text-3xl font-medium text-primary-700">{{$frontpage_site_setting->our_service_title}}</h2>
    </div>
    <div class="grid xl:grid-cols-2 gap-5 my-11">
        <img src="{{url($frontpage_site_setting->service_image)}}" alt="">
        <div class="flex flex-col gap-8">
            @foreach ($hotel_services as $hotel_service)
            <div class="flex flex-col xl:flex-row gap-8 sm:items-start xl:items-center">
                <span class="material-icons-round text-primary-400 scale-[200%]">{{$hotel_service->icon}}</span>
                <div class="flex flex-col gap-1">
                    <h2 class="text-2xl">{{$hotel_service->name}}</h2>
                    <p class="font-light">{!!$hotel_service->description!!}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

{{-- Our Location Section --}}
<div class="px-12 xl:px-36 my-10">
    <div class="flex flex-col gap-1">
        <p class="font-medium text-primary-400">Lokasi Kami</p>
        <h2 class="text-3xl font-medium text-primary-700">{{$frontpage_site_setting->our_location_title}}</h2>
    </div>

    <div class="grid xl:grid-cols-2 gap-5">
        <div class="flex flex-col gap-3">
            <p class="my-5">{!!$frontpage_site_setting->our_location_desc!!}</p>
            <div class="grid xl:grid-cols-2 gap-8">
                @foreach ($nearby_locations as $nearby_location)
                <div class="flex items-center gap-5">
                    <span class="material-icons-round text-primary-400 scale-[150%]">{{$nearby_location->icon}}</span>
                    <div class="flex flex-col">
                        <p class="text-lg text-gray-700">{{$nearby_location->name}}</p>
                        <p class="text-primary-400">{{$nearby_location->distance}} M</p>
                    </div>
                </div>
                @endforeach


            </div>
        </div>
        {{-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1187.875311872304!2d106.82119754241114!3d-6.201478784166075!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f41e140f587f%3A0xc354e589ba37fb1!2sAll%20Seasons%20Thamrin!5e1!3m2!1sid!2sid!4v1732107745936!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> --}}
        {{-- @php
            $site_settings = App\Models\SiteSettings::where('id',1)->first();
        @endphp --}}
        <iframe width="600" height="450" loading="lazy" allowfullscreen src="https://www.google.com/maps/embed/v1/place?key=AIzaSyBFw0Qbyq9zTFTd-tUY6dZWTgaQzuU17R8&q={{ urlencode($site_setting->address) }}&zoom=15&maptype=roadmap"></iframe>
    </div>
</div>

{{-- Facilities --}}
<div class="px-12 xl:px-36 my-14">
    <div class="flex flex-col gap-1 items-center justify-center">
        <p class="font-medium text-primary-400">Fasilitas Kami</p>
        <h2 class="text-3xl font-medium text-primary-700">{{$frontpage_site_setting->our_facilities_title}}</h2>
    </div>

    <div class="grid grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-5 my-10">
        @foreach ($hotel_facilities as $hotel_facility)
        <div class="flex items-center justify-center px-5 py-2 rounded-xl border border-primary-500 gap-5 bg-primary-100 text-primary-500">
            <span class="material-icons-round text-primary-700">{{$hotel_facility->icon}}</span>

            <p>{{$hotel_facility->name}}</p>
        </div>
        @endforeach
    </div>
</div>

{{-- Testimonial Section --}}
<div class="px-12 xl:px-36 my-16">
    <div class="flex flex-col lg:flex-row items-center justify-between">
        <div class="flex flex-col gap-1">
            <p class="font-medium text-primary-400">Testimonial</p>
            <h2 class="text-3xl font-medium text-primary-700">{{$frontpage_site_setting->testimonial_title}}</h2>
        </div>

    </div>

    {{-- <!-- Testimonial Content -->
    <div class="testimonial-content text-center p-8">
        <div id="testimonialText" class="text-lg text-gray-700 mb-4"></div>
        <div id="testimonialAuthor" class="font-bold text-blue-600"></div>
        <div id="testimonialPosition" class="text-gray-500 text-sm"></div>
    </div>

    <!-- Navigation Buttons -->
    <div class="absolute top-1/2 left-4 transform -translate-y-1/2">
        <button id="prevTestimonial" class="bg-blue-500 text-white p-2 rounded-full hover:bg-blue-600 transition">
            &#10094;
        </button>
    </div>
    <div class="absolute top-1/2 right-4 transform -translate-y-1/2">
        <button id="nextTestimonial" class="bg-blue-500 text-white p-2 rounded-full hover:bg-blue-600 transition">
            &#10095;
        </button>
    </div>

    <!-- Pagination Dots -->
    <div id="testimonialDots" class="flex justify-center mt-4 pb-4"></div> --}}
    <div class="mt-10 grid xl:grid-cols-4 gap-5">
        <div id="testimonialSlider" class="relative">
            @foreach ($room_reviews as $room_review)
            <div class="flex flex-col gap-5 rounded-lg border border-primary-500 p-5 transition-all testimonial-content hover:shadow-xl">
                {{-- <object data="{{asset('images/traveloka-brown.svg')}}" type="image/svg+xml"></object> --}}
                {{-- <img src="{{asset('images/traveloka-brown.svg')}}" class="w-24" alt=""> --}}
                <h3 class="font-medium text-primary-700 text-xl">{{$room_review->title}}</h3>
                <div class="text-sm text-primary-800">{!!$room_review->description!!}</div>
                <div class="flex items-center gap-3">
                    <img src="{{url($room_review->user->avatar)}}" class="w-14 h-14 rounded-full object-cover object-center" alt="">
                    <div class="flex flex-col">
                        <p class="font-medium text-primary-700">{{$room_review->user->name}}</p>
                        <p class="text-sm flex items-center gap-1 text-primary-500"><i class="bi bi-star-fill"></i>{{$room_review->rating}} ({{$room_review->rating_text}})</p>
                    </div>
                </div>
            </div>
            @endforeach

            <!-- Pagination Dots -->
            {{-- <div id="testimonialDots" class="flex justify-center mt-4 pb-4"></div>  --}}
        </div>


    </div>
</div>

<div class="px-12 xl:px-36 my-28">
    <div class="flex flex-col gap-1 items-center justify-center">
        <h2 class="text-3xl font-medium text-center text-primary-700">{{$frontpage_site_setting->award_title}}</h2>
        <p class=" text-primary-800">{!!$frontpage_site_setting->award_desc!!}</p>
    </div>

    <div class="grid md:grid-cols-2 xl:grid-cols-4 gap-8 my-10">
        @foreach ($hotel_awards as $hotel_award)
        <div class="flex items-center gap-3">
            <img src="{{url($hotel_award->badge)}}" class="w-24 h-24 rounded-full" alt="">
            <div class="flex flex-col gap-1">
                <p>{{$hotel_award->name}}</p>
            </div>
        </div>
        @endforeach
    </div>
</div>

{{-- FAQ Section --}}
<div class="px-12 xl:px-36 my-28">
    <div class="flex flex-col gap-1 justify-center items-center">
        <p class="font-medium text-primary-500">Frequently Asked Questions</p>
        <h2 class="text-3xl font-medium text-primary-700">Pertanyaan yang Sering Diajukan</h2>
    </div>

    <div class="grid xl:grid-cols-2 gap-5 mt-10">
        <img src="{{url($frontpage_site_setting->faq_illustration ?? '')}}" alt="">
        <div>
            @foreach($faqs as $faq)
                <x-faq-item :faq="$faq" :isFirst="$loop->first" />
            @endforeach
        </div>
        {{-- <div class="space-y-4"> --}}
            {{-- @foreach($faqs as $faq)
                <div x-data="{ open: false }" class="bg-white rounded-lg shadow">
                    <button
                        @click="open = !open"
                        class="w-full px-6 py-4 text-left flex justify-between items-center">
                        <span class="font-semibold text-gray-900">{{ $faq->question }}</span>
                        <svg
                            class="w-5 h-5 transform transition-transform"
                            :class="{ 'rotate-180': open }"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div
                        x-show="open"
                        x-cloak
                        class="px-6 pb-4">
                        <p class="text-gray-600">{{ $faq->answer }}</p>
                    </div>
                </div>
            @endforeach --}}
        </div>
    </div>
</div>

{{-- Featured by --}}
<div class="px-12 xl:px-36 my-28 flex flex-col gap-16">
    <h2 class="text-3xl font-medium text-primary-700 text-center">Partner Kami</h2>
    <div class="w-full inline-flex flex-nowrap overflow-hidden [mask-image:_linear-gradient(to_right,transparent_0,_black_128px,_black_calc(100%-200px),transparent_100%)]">
        <ul class="flex items-center justify-center md:justify-start [&_li]:mx-8 [&_img]:max-w-none animate-infinite-scroll">
            @foreach ($partners as $partner)
            <li>
                <a href="{{$partner->link}}" title="{{$partner->name}}">
                    <img src="{{url($partner->logo)}}" target="_blank" class="h-14 grayscale hover:grayscale-0" alt="">
                </a>
            </li>
            @endforeach
        </ul>

        <ul class="flex items-center justify-center md:justify-start [&_li]:mx-8 [&_img]:max-w-none animate-infinite-scroll">
            @foreach ($partners as $partner)
            <li>
                <a href="{{$partner->link}}" title="{{$partner->name}}">
                    <img src="{{url($partner->logo)}}" target="_blank" class="h-14 grayscale hover:grayscale-0" alt="">
                </a>
            </li>
            @endforeach
        </ul>
    </div>
</div>

<div class="mx-12 xl:mx-36 my-28">
    <div class="cta-card w-full rounded-xl h-60 px-14 flex flex-col justify-center gap-5 relative">
        <div class="absolute w-full h-full bg-primary-500 left-0 top-0 rounded-xl opacity-60">

        </div>
        <div class="flex flex-col gap-5 z-10">
            <h1 class="text-3xl text-white">{{$frontpage_site_setting->cta_text}}</h1>
            <a href="{{$frontpage_site_setting->cta_button_link}}" class="text-lg px-8 rounded-full bg-white text-primary-500 py-4 w-fit">{{$frontpage_site_setting->cta_button_text}}</a>
        </div>
    </div>
</div>

@include('components.frontpage-footer')

@endsection
@push('addons-script')
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script>
        const openMobileMenu = document.getElementById('openMobileMenu');
        const closeMobileMenu = document.getElementById('closeMobileMenu');
        const mobileMenu = document.getElementById('mobileMenu');

        openMobileMenu.addEventListener('click', function() {
            mobileMenu.classList.remove('hidden');
        })

        closeMobileMenu.addEventListener('click', function() {
            mobileMenu.classList.add('hidden');
        })

        const openBookingForm = document.getElementById('openBookingForm');
        const closeBookingForm = document.getElementById('closeBookingForm');
        const bookingForm = document.getElementById('bookingForm');

        openBookingForm.addEventListener('click', function() {
            bookingForm.classList.remove('hidden');
        });

        closeBookingForm.addEventListener('click', function() {
            bookingForm.classList.add('hidden');
        });

        document.addEventListener('scroll', function() {
            const mainNavbar = document.getElementById('mainNavbar');
            if(window.scrollY > 0) {
                mainNavbar.classList.add('scrolled');
            } else {
                mainNavbar.classList.remove('scrolled');
            }
        });


        // const roomButtonLeft = document.getElementById('roomButtonLeft');
        // const roomButtonRight = document.getElementById('roomButtonRight');
        // const roomsContainer = document.getElementById('roomsContainer');

        // roomButtonLeft.addEventListener('click', function() {
        //     roomsContainer.scrollLeft -= 250;
        //     roomsContainer.style.transition = 'all 0.4s ease';
        // });

        // roomButtonRight.addEventListener('click', function() {
        //     roomsContainer.scrollLeft += 250;
        //     roomsContainer.style.transition = 'all 0.4s ease';
        // });

        const toggleUserMenu = document.getElementById('toggleUserMenu');
        const userMenu = document.getElementById('userMenu');

        toggleUserMenu.addEventListener('click', function() {
            userMenu.classList.toggle('hidden');
        })
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const checkInInput = document.getElementById('checkIn');
            const checkOutInput = document.getElementById('checkOut');
            const reservationForm = document.getElementById('reservationForm');

            // Set minimum date for check-in to today
            const today = new Date().toISOString().split('T')[0];
            checkInInput.setAttribute('min', today);

            // Enable check-out input and set its min date when check-in is selected
            checkInInput.addEventListener('change', function() {
                // Enable check-out input
                checkOutInput.disabled = false;
                checkOutInput.classList.remove('bg-gray-100', 'cursor-not-allowed');
                checkOutInput.classList.add('bg-white', 'cursor-default');

                // Set minimum date for check-out to the selected check-in date
                checkOutInput.setAttribute('min', this.value);

                // Reset check-out input
                checkOutInput.value = '';
            });

            // Ensure check-out is after check-in
            checkOutInput.addEventListener('change', function() {
                if (new Date(this.value) <= new Date(checkInInput.value)) {
                    alert('Tanggal checkout harus setelah tanggal checkin!');
                    this.value = '';
                }
            });

            // Form submission handler
            // reservationForm.addEventListener('submit', function(e) {
            //     e.preventDefault();

            //     const checkInDate = checkInInput.value;
            //     const checkOutDate = checkOutInput.value;

            //     // Basic validation
            //     if (!checkInDate || !checkOutDate) {
            //         alert('Tolong pilih tanggal checkin dan checkout!');
            //         return;
            //     }

            //     // You can add more validation or send data to server here
            //     console.log('Reservation Details:', {
            //         checkIn: checkInDate,
            //         checkOut: checkOutDate
            //     });

            //     alert('Berhasil reservasi kamar!');
            // });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const checkInInputMobile = document.getElementById('checkInMobile');
            const checkOutInputMobile = document.getElementById('checkOutMobile');
            const reservationFormMobile = document.getElementById('reservationFormMobile');

            // Set minimum date for check-in to today
            const today = new Date().toISOString().split('T')[0];
            checkInInputMobile.setAttribute('min', today);
            checkOutInputMobile.setAttribute('min', today);

            // Dynamically update check-out min date based on check-in date
            checkInInputMobile.addEventListener('change', function() {
                checkOutInputMobile.setAttribute('min', this.value);

                // If current check-out date is before new check-in date, reset it
                if (new Date(checkOutInputMobile.value) < new Date(this.value)) {
                    checkOutInputMobile.value = this.value;
                }
            });

            // Form submission handler
            reservationFormMobile.addEventListener('submit', function(e) {
                // e.preventDefault();

                const checkInDateMobile = checkInInputMobile.value;
                const checkOutDateMobile = checkOutInputMobile.value;

                // Basic validation
                if (!checkInDateMobile || !checkOutDateMobile) {
                    alert('Tolong tentukan waktu checkin dan checkout!');
                    return;
                }

                // You can add more validation or send data to server here
                // console.log('Reservation Details:', {
                //     checkIn: checkInDate,
                //     checkOut: checkOutDate
                // });

                // alert('Room reservation submitted successfully!');
            });
        });
        </script>
@endpush
