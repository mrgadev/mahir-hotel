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
            <img src="{{url($room->cover)}}" class="rounded-2xl" alt="">
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
        <p class="font-medium p-2 rounded-lg bg-red-100 w-fit text-red-700 border border-red-700">Tersisa 10 kamar lagi!</p>
        <form action="" class="hidden mt-5 py-3 ps-10 w-fit pe-3 lg:flex items-center gap-8 bg-primary-100 border border-primary-700 text-primary-700 rounded-full">
            <div class="flex items-center gap-3">
                <div class="grid grid-cols-1 gap-2">
                    <label for="" class="text-sm">Check-in</label>
                    <input type="date" class="outline-none border-none bg-transparent text-lg p-0">
                </div>
                <div class="grid grid-cols-1 gap-2">
                    <label for="" class="text-sm">Check-out</label>
                    <input type="date" class="outline-none border-none bg-transparent text-lg p-0" name="" id="">
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
        <h1 class="text-xl text-primary-700">Deskripsi</h1>
        <div class="text-gray-600 font-light">
            {!!$room->description!!}
        </div>
    </div>
    <div class="my-12 flex flex-col lg:flex-row justify-between">
        <div class="flex flex-col gap-8 w-3/4">
            <div class="flex flex-col gap-3">
                <h2 class="text-2xl text-primary-700">Ulasan</h2>
                <p class="flex items-center gap-2 text-gray-800">
                    <ion-icon name="star" class="text-primary-500"></ion-icon>
                    5.0 (125 pelanggan)
                </p>
            </div>

            {{-- Review Section --}}
            <div class="flex flex-col lg:flex-row gap-5">
                <img src="{{asset('assets/img/marie.jpg')}}" alt="" class="w-20 h-20 rounded-full">
                <div class="flex flex-col gap-3">
                    <div class="flex flex-col gap-2">
                        <h3>Marie Antoinette</h3>

                    </div>
                    <p class="font-light text-gray-700">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius perspiciatis dolorum hic possimus labore sit error odit magnam veritatis optio impedit quos, earum ad illum eum nostrum. Nisi ab, dolor molestiae aspernatur in numquam accusantium qui sed dolores impedit quos repellendus delectus vitae vero itaque officiis quisquam consequatur aut velit, amet officia, ipsum minus quia est? Quas cumque harum exercitationem, facere voluptate unde officiis in! Architecto deserunt laudantium a aspernatur animi repudiandae, atque rem nobis!</p>
                </div>
            </div>
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
@endpush
