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
@section('title', 'Paket Pernikahan')
@section('main')
<nav class="fixed w-full px-12 lg:px-36 z-20 bg-white border-b border-primary-300 duration-500 transition-all flex items-center justify-between py-6 text-primary-500" id="mainNavbar">
    <a href="{{route('frontpage.index')}}" class="text-lg font-medium">Mahir Hotel</a>
    <div class="lg:flex gap-8 font-light hidden">
        <a href="{{route('frontpage.index')}}" class="hover:font-medium {{(Route::is('frontpage.index') ? 'font-medium' : '')}}">Beranda</a>
        <a href="{{route('frontpage.promo')}}" class="hover:font-medium {{(Route::is('frontpage.promo') ? 'font-medium' : '')}}">Promo</a>
        <a href="{{route('frontpage.services')}}" class="hover:font-medium {{(Route::is('frontpage.services') ? 'font-medium' : '')}}">Layanan Lainnya </a>
        <a href="#" class="hover:font-medium">Kontak</a>
        <a href="#" class="hover:font-medium">Tentang Kami</a>
    </div>
    <ion-icon name="menu-outline" class="lg:hidden text-4xl" id="openMobileMenu"></ion-icon>
    <div class=" items-center gap-3 auth-button hidden lg:flex">
        <a href="{{route('register')}}" class="bg-primary-500 text-white px-5 py-2 rounded-full hover:bg-white transition-all">Daftar</a>
        <a href="{{route('login')}}" class="px-5 py-2 border border-primary-500 text-primary-500 rounded-full hover:bg-primary-500 hover:text-white transition-all">Masuk</a>
    </div>
    
</nav>
<nav class="duration-500 bg-white w-screen h-screen fixed hidden top-0 left-0 right-0 z-30 px-12" id="mobileMenu">
    <div class="flex items-center justify-between py-6 text-primary-500">
        <a href="{{route('frontpage.index')}}" class="text-lg font-medium">Mahir Hotel</a>
        <span class="material-symbols-rounded cursor-pointer" id="closeMobileMenu">close</span>
    </div>

    <div class="flex flex-col gap-8 mt-8 font-light">
        <a href="{{route('frontpage.index')}}" class="hover:font-medium">Beranda</a>
        <a href="{{route('frontpage.promo')}}" class="hover:font-medium">Promo</a>
        <a href="{{route('frontpage.services')}}" class="hover:font-medium {{(Route::is('frontpage.services') ? 'font-medium' : '')}}">Layanan Lainnya </a>
        <a href="#" class="hover:font-medium">Kontak</a>
        <a href="#" class="hover:font-medium">Tentang Kami</a>
        <a href="#" class="px-5 py-3 rounded-full bg-primary-500 text-white w-fit">Masuk / Daftar</a>
    </div>
</nav>
<div class="lg:px-36 px-12 w-screen pt-36 flex items-center gap-1 text-sm lg:text-base">
    <a href="{{route('frontpage.index')}}" class="flex items-center text-primary-500">
        <span class="material-symbols-rounded">home</span>
    </a>
    <span class="material-symbols-rounded text-primary-500">chevron_right</span>
    <a href="{{route('frontpage.rooms')}}" class="flex items-center text-primary-500">
        Layanan Lainnya
    </a>
    <span class="material-symbols-rounded text-primary-500">chevron_right</span>
    <p class="text-primary-700">Detail</p>
</div>
<header class="lg:px-36 px-12 py-11 w-screen grid lg:grid-cols-2 gap-8">
    <div class="grid gap-3">
        <div class="relative">
            <img src="https://images.unsplash.com/photo-1522771739844-6a9f6d5f14af?q=80&w=2071&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="rounded-2xl" alt="">
        </div>
    </div>

    <div class="grid grid-cols-2 gap-5">
        <img src="https://images.unsplash.com/photo-1522058171200-e61f77c7353d?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="rounded-xl" alt="">
        <img src="https://images.unsplash.com/photo-1571268373914-e888c6dafeff?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="rounded-xl" alt="">
        <img src="https://images.unsplash.com/photo-1571268373914-e888c6dafeff?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="rounded-xl" alt="">
        <img src="https://images.unsplash.com/photo-1524479967500-c3a0bf56d080?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="rounded-xl" alt="">
    </div>
    {{-- <div class="flex flex-col gap-5">
        <div class="flex items-center justify-between">
            <div class="flex flex-col gap-1.5">
                <div class="flex items-center gap-1 font-light text-gray-700">
                    <i class="bi bi-star-fill text-primary-500"></i>
                    4.6 (120 Ulasan)
                </div>
                <h1 class="text-4xl text-primary-700">Royal Wedding Package</h1>
                <p class="text-2xl text-primary-500">Mulai dari IDR 88jt</p>
            </div>
        </div>
        </p>
        <div class="flex flex-col lg:flex-row lg:items-center gap-5 font-light text-primary-700">
            <p class="flex flex-col gap-1">
                <span class="material-symbols-rounded">bed</span>
                1 Tempat tidur
            </p>
            
            <p class="flex flex-col gap-1">
                <span class="material-symbols-rounded">live_tv</span>
                Video on-demand
            </p>
            
            <p class="flex flex-col gap-1">
                <span class="material-symbols-rounded">group</span>
                1 Dewasa
            </p>
        </div>

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
    </div> --}}
</header>



</section>

<div class="mx-12 lg:mx-36">
    <div class="flex items-center justify-between mb-8">
        <div class="flex flex-col gap-1.5">
            {{-- <div class="flex items-center gap-1 font-light text-gray-700">
                <i class="bi bi-star-fill text-primary-500"></i>
                4.6 (120 Ulasan)
            </div> --}}
            <h1 class="text-4xl text-primary-700">Royal Wedding Package</h1>
            <p class="text-xl text-primary-500">Mulai dari IDR 88jt</p>
        </div>

        <a href="#" class="px-7 py-3 rounded-full bg-primary-700 text-white">Pesan sekarang</a>
    </div>

    <div class="flex flex-col gap-2">
        <div class="text-gray-600 font-light">
            <p>Aspernatur dolorum cupiditate, voluptatibus perferendis tempore amet explicabo accusamus enim saepe repellendus aperiam tempora, magni accusantium sit molestias ut quaerat rem, ipsam consequuntur debitis. Voluptatem facere quasi porro maiores incidunt temporibus? Dolores corporis magnam quidem cum in animi at nisi quas ipsam nam sint dicta accusamus nostrum modi id minus autem, perferendis ipsum quis natus adipisci.</p> 
        </div>
        <h2 class="my-5 text-xl text-primary-700 font-medium">Fasilitas yang Didapatkan</h2>
        <div class="flex flex-col gap-8">
            <div class="flex flex-col gap-3">
                <h2 class="text-primary-700 text-lg">Pre-Wedding</h2>
                <ul class="text-gray-600 font-light flex flex-col gap-3">
                    <li>Food Testing for 8 persons</li>
                    <li>Coffee Break on Technical Meeting for 15 Persons</li>
                    <li>Venue for Pre-Wedding Photo Shoot or Video Shoot</li>  
                </ul>
            </div>
            
            <div class="flex flex-col gap-3">
                <h2 class="text-primary-700 text-lg">On The Wedding Day</h2>
                <ul class="text-gray-600 font-light flex flex-col gap-3">
                    <li>Best quality dishes of buffet menu for 300 pax</li>
                    <li>Free welcome drink</li>
                    <li>Free flow mineral water, soft drinks/chilled juice</li>  
                    <li>Light decoration (Flower arrangement for VIP table)</li>  
                    <li>Free flow mineral water, soft drinks/chilled juice</li>  
                    <li>1 Executive Suite for 1 night stay with honeymoon decorations  (Include breakfast at SamaZana Restaurant)</li>  
                    <li>Free make up room for family</li>  
                    <li>Hospitality room on the day of event</li>  
                </ul>
            </div>
            
            <div class="flex flex-col gap-3">
                <h2 class="text-primary-700 text-lg">Post Wedding</h2>
                <ul class="text-gray-600 font-light flex flex-col gap-3">
                    <li>90 Minutes Traditional Honeymoon Spa Treatment (Couple)</li>
                </ul>
            </div>
        </div>
    </div>
    {{-- <div class="my-12 flex flex-col lg:flex-row justify-between">
        <div class="flex flex-col gap-8 w-3/4">
            <div class="flex flex-col gap-3">
                <h2 class="text-2xl text-primary-700">Ulasan</h2>
                <p class="flex items-center gap-2 text-gray-800">
                    <ion-icon name="star" class="text-primary-500"></ion-icon>
                    5.0 (125 pelanggan)
                </p>
            </div>

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

        <div class="w-1/4">
            <h1>Kamar lainnya</h1>
        </div>
    </div> --}}

   
</div>

<footer class="w-screen bg-primary-100 flex justify-between px-12 lg:px-36 py-14">
    <div class="flex flex-col gap-5">
        <h2 class="text-3xl text-primary-500">Mahir Hotel</h2>
        <p class="text-primary-800">Jl. H. R. Rasuna Said No.4 Blok Kav. B<br> Kuningan, Setia Budi, Kota Jakarta Selatan<br>DKI Jakarta 12910</p>
        <div class="flex items-center gap-5 text-2xl text-primary-800">
            <a href="#" class=""><i class="bi bi-instagram"></i></a>
            <a href="#"><i class="bi bi-facebook"></i></a>
            <a href="#"><i class="bi bi-twitter"></i></a>
            <a href="#"><i class="bi bi-tiktok"></i></a>
        </div>
    </div>

    <div class="grid grid-cols-2 gap-8">
        <div class="flex flex-col gap-5">
            <h2 class="text-primary-700 text-xl font-medium">Perusahaan</h2>
            <div class="flex flex-col gap-1">
                <a href="#">Tentang Kami</a>
                <a href="#">Karir</a>
                <a href="#">Kontak</a>
                <a href="#"></a>
                <a href=""></a>
            </div>
        </div>
    </div>
</footer>
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
    </script>
@endpush