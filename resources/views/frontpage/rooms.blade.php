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
@section('title', 'Daftar Kamar')
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
<header class="lg:px-36 px-12 w-screen lg:h-[60vh] pt-36">
    {{-- <div class="absolute h-screen w-full bg-[#162034] opacity-70 z-10"></div> --}}
    <div class="flex items-center gap-1 text-primary-700">
        <a href="{{route('frontpage.index')}}" class="flex items-center">
            <span class="material-symbols-rounded">home</span>
        </a>
        <span class="material-symbols-rounded">chevron_right</span>
        <p>Daftar Kamar</p>
    </div>
    <div class="flex flex-col gap-8 h-[70%] justify-center">
        <h1 class="text-4xl lg:text-6xl text-primary-700">Jelajahi Kamar Terbaik Kami</h1>
        <p class=" text-primary-500">Dapatkan perjalanan sempurna dan pengalaman baru bersama Mahir Hotel!<br> Tambahkan kesenangan ke dalamnya dengan promo kami. Jadikan liburan Anda momen yang tak terlupakan.</p>
    </div>
</header>

{{-- Promo List Container --}}
<div class="mx-12 lg:mx-36  " id="promos">
    {{-- <div class="flex flex-col gap-1 my-5 justify-center items-center">
        <p class="text-2xl lg:text-5xl font-medium text-primary-700">Promo Terbaru Kami</p>
        <p class="text-sm text-center text-gray-600">Temukan penawaran eksklusif dan penginapan mewah yang dirancang khusus untuk Anda di hotel kami.<br> Pesan sekarang dan nikmati kenyamanan serta penghematan yang tak tertandingi</p>
    </div> --}}
    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-5 my-12">
        <a href="{{route('frontpage.rooms.detail')}}" class="flex flex-col gap-5">
            <div class="relative">
                <img src="https://images.unsplash.com/photo-1522771739844-6a9f6d5f14af?q=80&w=2071&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="" class="w-full h-64 object-cover rounded-xl relative">
                <p class="absolute bottom-5 left-5 flex items-end gap-1 px-3 py-1 rounded-full bg-primary-100 text-primary-600 text-sm">
                   <span class="text-lg">IDR 500K</span>/malam 
                </p>
            </div>
            <div class="flex flex-col gap-2">
                <h3 class="text-xl text-primary-700 hover:underline">Kamar Standard</h3>
                <div class="text-sm flex items-center gap-2 text-primary-500">
                    <span class="material-symbols-rounded scale-75">bed</span>
                    <span class="material-symbols-rounded scale-75">wifi</span>
                    <span class="material-symbols-rounded scale-75">group</span> 1
                </div>
            </div>
        </a>
        
        <a href="{{route('frontpage.rooms.detail')}}" class="flex flex-col gap-5">
            <div class="relative">
                <img src="https://images.unsplash.com/photo-1522771739844-6a9f6d5f14af?q=80&w=2071&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="" class="w-full h-64 object-cover rounded-xl relative">
                <p class="absolute bottom-5 left-5 flex items-end gap-1 px-3 py-1 rounded-full bg-primary-100 text-primary-600 text-sm">
                   <span class="text-lg">IDR 500K</span>/malam 
                </p>
            </div>
            <div class="flex flex-col gap-2">
                <h3 class="text-xl text-primary-700 hover:underline">Kamar Standard</h3>
                <div class="text-sm flex items-center gap-2 text-primary-500">
                    <span class="material-symbols-rounded scale-75">bed</span>
                    <span class="material-symbols-rounded scale-75">wifi</span>
                    <span class="material-symbols-rounded scale-75">group</span> 1
                </div>
            </div>
        </a>

        <a href="{{route('frontpage.rooms.detail')}}" class="flex flex-col gap-5">
            <div class="relative">
                <img src="https://images.unsplash.com/photo-1522771739844-6a9f6d5f14af?q=80&w=2071&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="" class="w-full h-64 object-cover rounded-xl relative">
                <p class="absolute bottom-5 left-5 flex items-end gap-1 px-3 py-1 rounded-full bg-primary-100 text-primary-600 text-sm">
                   <span class="text-lg">IDR 500K</span>/malam 
                </p>
            </div>
            <div class="flex flex-col gap-2">
                <h3 class="text-xl text-primary-700 hover:underline">Kamar Standard</h3>
                <div class="text-sm flex items-center gap-2 text-primary-500">
                    <span class="material-symbols-rounded scale-75">bed</span>
                    <span class="material-symbols-rounded scale-75">wifi</span>
                    <span class="material-symbols-rounded scale-75">group</span> 1
                </div>
            </div>
        </a>
    </div>

   
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
    </script>
@endpush
