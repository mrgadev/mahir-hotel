@extends('layouts.frontpage')
@push('addons-style')

{{-- <style>
    #mainNavbar.scrolled {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        z-index:1;
        background-color: white;
        /* border-radius: 25px; */
        /* border: 2px solid #976033; */
        width: 100%;
        padding: 1.5rem 9rem;
        transition: all 0.5s ease;
    }

    #mainNavbar.scrolled p {
        color: #976033;
    }
    #mainNavbar.scrolled a {
        color: #333;
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
    
    

    @media (max-width: 1024px) {
        #mainNavbar.scrolled {
            padding: 1.5rem 3rem;
        }

        #mainNavbar.scrolled [name="menu-outline"] {
            color: #976033;
        }
    }
</style> --}}
@endpush
@section('title', 'Detail Kamar')
@section('main')
@include('components.frontpage-navbar')
<div class="lg:px-36 px-12 w-screen pt-36 flex items-center gap-1 text-sm lg:text-base">
    <a href="{{route('frontpage.index')}}" class="flex items-center text-primary-500">
        <span class="material-symbols-rounded">home</span>
    </a>
    <span class="material-symbols-rounded text-primary-500">chevron_right</span>
    <a href="{{route('frontpage.rooms')}}" class="flex items-center text-primary-500">
        Daftar Kamar
    </a>
    <span class="material-symbols-rounded text-primary-500">chevron_right</span>
    <p class="text-primary-700">Detail Kamar</p>
</div>
<header class="lg:px-36 px-12 py-11 w-screen grid lg:grid-cols-2 gap-8">
    <div class="grid gap-3">
        <div class="relative">
            <img src="{{url($room->cover)}}" class="rounded-2xl h-96 object-cover object-center w-full" alt="">
            <button class="absolute bottom-5 left-5 bg-primary-100 px-5 py-2 rounded-full border border-primary-700 flex items-center gap-1 text-primary-700 transition-all hover:bg-primary-700 hover:text-primary-100" id="galleryBtn"><ion-icon name="images-outline"></ion-icon> Lihat foto lainnya</button>

            <div class="flex flex-col justify-center items-center gap-8 px-12 lg:px-36 w-screen h-screen hidden fixed bg-gray-800/75 z-20  top-0 left-0" id="gallery">
                <button class="top-14 absolute right-14 text-white" id="closeGallery">
                    <span class="material-symbols-rounded">close</span>
                </button>
                <h1 class="text-3xl text-white">Galeri Kamar</h1>
                <div class="image-container-wrapper flex items-center gap-8 ">
                    <button class="text-primary-700 bg-primary-100 flex items-center justify-center p-3 rounded-full slider-button" id="galleryBack">
                        <span class="material-symbols-rounded">arrow_back</span>
                    </button>

                    <div class="image-container max-h-lvh max-w-2xl w-full">
                        <div class="carousel flex overflow-hidden transition-all">
                            @php
                                $photos = explode('|',$room->photos);
                            @endphp
                            @foreach ($photos as $photo)    
                            <img src="{{url($photo)}}" class="rounded-xl img" alt="">
                            {{-- <span class="material-icons-round">{{</span> --}}
                            @endforeach
                        {{-- <img src="https://images.unsplash.com/photo-1512918728675-ed5a9ecdebfd?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="rounded-xl img" alt="">
                        <img src="https://images.unsplash.com/photo-1505692795793-20f543407193?q=80&w=2039&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="rounded-xl img" alt="">
                        <img src="https://images.unsplash.com/photo-1496417263034-38ec4f0b665a?q=80&w=2071&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="rounded-xl img" alt=""> --}}
                        </div>
                    </div>

                    <button class="text-primary-700 bg-primary-100 flex items-center justify-center p-3 rounded-full slider-button" id="galleryForward">
                        <span class="material-symbols-rounded">arrow_forward</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="flex flex-col gap-5">
        <div class="flex items-center justify-between">
            <div class="flex flex-col gap-1.5">
                <div class="flex items-center gap-1 font-light text-gray-700">
                    <i class="bi bi-star-fill text-primary-500"></i>
                    4.6 (120 Ulasan)
                </div>
                <h1 class="text-4xl text-primary-700">{{$room->name}}</h1>
                <p class="text-2xl text-primary-500">Rp. {{number_format($room->price,0,',','.')}} <span class="text-sm">/malam</span>
            </div>
            {{-- <a href="#" class="text-lg px-5 py-2 bg-primary-700 rounded-full text-white">Pesan sekarang</a> --}}
        </div>
        </p>
        {{-- <p class="text-lg text-primary-700">Fasilitas Kamar</p> --}}
        <div class="flex flex-col lg:flex-row lg:items-center gap-5 font-light text-primary-700">
            @foreach ($room->room_facility as $facility)    
            <p class="flex flex-col gap-1">
                {{-- <img src="{{Storage::url($facility->icon)}}" class="w-7 h-7" alt=""> --}}
                <span class="material-icons-round">{{$facility->icon}}</span>
                {{$facility->name}}
            </p>
            @endforeach
        </div>
        {{-- <p class="font-light text-gray-700">
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Facilis harum provident ratione odit hic sequi. Libero nostrum necessitatibus eos nobis eaque quisquam minus omnis commodi, sint laborum! 
        </p> --}}
        @if ($room->available_rooms == 0)
            <p class="font-medium p-2 rounded-lg bg-red-100 w-fit text-red-700 border border-red-700">SOLD OUT</p>
        @elseif ($room->available_rooms < 10)
            <p class="font-medium p-2 rounded-lg bg-red-100 w-fit text-red-700 border border-red-700">Tersisa {{$room->total_rooms}} kamar lagi!</p>
        @endif


        <form action="{{route('frontpage.checkout', $room->id)}}" class="hidden mt-5 py-3 ps-10 w-fit pe-3 lg:flex items-center gap-8 bg-primary-100 border border-primary-700 text-primary-700 rounded-full" method="GET" id="reservationForm">
            <div class="flex items-center gap-3">
                <div class="grid grid-cols-1 gap-2">
                    <label for="" class="text-sm">Check-in</label>
                    <input type="date" name="check_in" id="checkIn" value="{{ session('check_in') }}" class="outline-none border-none bg-transparent text-lg p-0">
                </div>
                <div class="grid grid-cols-1 gap-2">
                    <label for="" class="text-sm">Check-out</label>
                    <input type="date" name="check_out" id="checkOut" value="{{ session('check_out') }}" class="outline-none border-none bg-transparent text-lg p-0" name="" id="">
                </div>
            </div>
            <button class="text-white bg-primary-500 w-fit px-5 py-3 rounded-full">
                Pesan
            </button>
        </form>
        <a href="#" class="lg:hidden text-white bg-primary-500 w-fit px-5 py-3 rounded-full">Pesan sekarang</a>
    </div>
</header>



</section>

<div class="mx-12 lg:mx-36">
    <div class="flex flex-col gap-2">
        <h1 class="text-2xl text-primary-700">Deskripsi</h1>
        <div class="text-gray-700 font-light">
            {!!$room->description!!}
        </div>

        <h1 class="text-2xl text-primary-700 mt-5">Peraturan dan Tata Tertib</h1>
        <div class="text-gray-700 font-light flex flex-col gap-2">
            <p><i class="bi bi-calendar2-check"></i> Checkin hanya dibolehkan di hari yang sama diatas jam {{Carbon\Carbon::parse($site_setting->checkin_time)->format('H:i')}}</p>
            <p><i class="bi bi-calendar2-x"></i> Adapun checkout hanya dibolehkan diatas jam {{Carbon\Carbon::parse($site_setting->checkout_time)->format('H:i')}}</p>
            @php
                $global_rules = App\Models\RoomRule::where('room_id', NULL)->get();
                $specific_rules = App\Models\RoomRule::where('room_id', $room->id)->get();
                @endphp
            @foreach ($global_rules as $global_rule)
            <p><span class="material-icons">{{$global_rule->icon}}</span>{{$global_rule->rule}}</p>
            @endforeach
            @if($specific_rules->count() >= 1) 
            @foreach ($specific_rules as $specific_rule)
            <p><span class="material-icons">
                {{$specific_rule->icon}}
                </span> {{$specific_rule->rule}}</p>
            @endforeach
            @endif
        </div>
    </div>
    <div class="my-12 grid lg:grid-cols-3 gap-10">
        <div class="flex flex-col gap-8 col-span-2">
            <div class="flex flex-col gap-3">
                <h2 class="text-2xl text-primary-700">Ulasan</h2>
                <p class="flex items-center gap-2 text-gray-700">
                    @php
                        $total_rating = 0;
                        foreach($reviews as $review) {
                            $total_rating += $review->rating;
                        }
                    @endphp
                    @if ($reviews->count() >= 1) 
                    <ion-icon name="star" class="text-primary-500"></ion-icon>

                    {{$total_rating/$reviews->count()}} ({{$reviews->count()}} pelanggan)                    
                    @endif
                </p>
            </div>

            {{-- Review Section --}}
            @if($reviews->count() >= 1)
            @foreach ($reviews as $review)
            <div class="flex flex-col gap-5 bg-primary-100 lg:w-1/2 p-5 rounded-xl border border-primary-700">
                <div class="flex items-center gap-5">
                    <img src="{{Storage::url($review->user->avatar)}}" class="w-14 h-14 rounded-full" alt="">
                    <div class="flex flex-col ">
                        {{-- <p>{{$review->rating}} ({{$review->rating_text}})</p> --}}
                        <p class="text-lg text-primary-700 font-medium">{{$review->user->name}}</p>
                        <p class="font-light text-primary-600 text-sm">{{Carbon\Carbon::parse($review->created_at)->isoFormat('dddd, D MMM YYYY')}}</p>
                    </div>
                </div>
                <div class="flex flex-col">
                    <p class="text-primary-700">{{$review->title}}</p>
                    <div class="text-gray-700">

                        {!!$review->description!!}
                    </div>
                    <p class="flex items-center gap-2 text-primary-700"><ion-icon name="star" class="text-primary-500"></ion-icon> {{$review->rating}}</p>
                </div>
            </div>
            @endforeach
            @else
            <p>Belum ada ulasan</p>
            @endif
        </div>

        <div class="col-span-1 flex flex-col gap-10 order-first lg:order-last">
            {{-- {{$other_room}} --}}
            <div class="flex flex-col gap-3">
                <h2 class="text-2xl text-primary-700">Kamar Lainnya</h2>
            </div>
            @foreach ($other_room as $item)    
            <a href="{{route('frontpage.rooms.detail',$item->slug)}}" class="flex flex-col gap-3">
                <img src="{{url($item->cover)}}" class="h-56 w-full object-cover rounded-lg" alt="">
                <div class="flex items-center justify-between">
                    <div class="flex flex-col gap-2">
                        <h3 class="text-xl text-primary-700">{{$item->name}}</h3>
                        <div class="flex gap-1 items-center">
                        @foreach ($item->room_facility as $facility)
                            <div class="flex items-center text-sm text-primary-500">
                                <span class="material-icons-round scale-75">{{$facility->icon}}</span>
                                <p>{{$facility->name}}</p>
                            </div>
                        @endforeach
                        </div>
                    </div>
                    <p class="text-lg text-primary-500">Rp. {{number_format($item->price,0,',','.')}}</p>
                </div>
            </a>
            @endforeach
        </div>
        {{-- <div class="w-1/4">
            <h1>Kamar lainnya</h1>
        </div> --}}
    </div>

   
</div>

@include('components.frontpage-footer')

@endsection
@push('addons-script')
    <script>
        const openMobileMenu = document.getElementById('openMobileMenu');
        const closeMobileMenu = document.getElementById('closeMobileMenu');
        const mobileMenu = document.getElementById('mobileMenu');

        openMobileMenu.addEventListener('click', function() {
            mobileMenu.classList.remove('hidden');
        });

        closeMobileMenu.addEventListener('click', function() {
            mobileMenu.classList.add('hidden');
        });

        const galleryBtn = document.getElementById('galleryBtn');
        const galleryContainer = document.getElementById('gallery');
        galleryBtn.addEventListener('click', function() {
            galleryContainer.classList.remove('hidden');
        });

        const galleryBack = document.getElementById('galleryBack');
        const galleryForward = document.getElementById('galleryForward');
        const gallery = document.querySelector('.carousel');
        const closeGallery = document.getElementById('closeGallery');
        galleryBack.addEventListener('click', function() {
            gallery.scrollLeft -= 672;
            // gallery.style.transition = 'all 0.4s ease';
        });
        
        galleryForward.addEventListener('click', function() {
            gallery.scrollLeft += 672;
            // gallery.style.transition = 'all 0.4s ease';
        });

        closeGallery.addEventListener('click', function() {
            galleryContainer.classList.add('hidden');
        });

        // document.onclick = function(e){
        //     if (!galleryContainer.contains(e.target)) {
        //         galleryContainer.classList.add("hidden");
        //         // box.classList.remove("active_box");
        //     }
        // }
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
@endpush
