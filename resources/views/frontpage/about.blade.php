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
@section('title', 'Tentang Kami')
@section('main')
@include('components.frontpage-navbar')
<header class="lg:px-36 px-12 pt-36 lg:h-screen flex flex-col justify-center items-center">
    <div class="flex flex-col gap-8 h-[70%] items-center justify-center">
        <h1 class="text-4xl lg:text-6xl text-center text-primary-700">Akomodasi Sempurna untuk<br> Perjalanan Sempurna</h1>
        <p class=" text-primary-500 text-center text-sm">Berwisata bukan hanya sekedar datang ke suatu kota, mengunjungi suatu tempat, dan mudik. Perjalanan sebenarnya adalah saat Anda menjadi bagian dari penduduk setempat, mencicipi makanan lokal, dan merasakan budaya lokal. Sejak tahun 2017, Mahir Hotel hadir untuk menawarkan pengalaman berbeda bagi wisatawan untuk menikmati perjalanan yang sempurna.</p>
    </div>

    {{-- Featured by --}}
    <div class="px-12 lg:px-36 my-14 flex flex-col gap-16">
        <div class="w-full inline-flex flex-nowrap overflow-hidden [mask-image:_linear-gradient(to_right,transparent_0,_black_128px,_black_calc(100%-200px),transparent_100%)]">
            <ul class="flex items-center justify-center md:justify-start [&_li]:mx-8 [&_img]:max-w-none animate-infinite-scroll">
                <li><img src="{{asset('images/about (1).avif')}}" class="h-64 lg:h-96 rounded-xl" alt=""></li>
                <li><img src="{{asset('images/about (2).avif')}}" class="h-64 lg:h-96 rounded-xl" alt=""></li>
                <li><img src="{{asset('images/about (3).avif')}}" class="h-64 lg:h-96 rounded-xl" alt=""></li>
                <li><img src="{{asset('images/about (4).avif')}}" class="h-64 lg:h-96 rounded-xl" alt=""></li>
                <li><img src="{{asset('images/about (5).avif')}}" class="h-64 lg:h-96 rounded-xl" alt=""></li>
                <li><img src="{{asset('images/about (6).avif')}}" class="h-64 lg:h-96 rounded-xl" alt=""></li>
                <li><img src="{{asset('images/about (7).avif')}}" class="h-64 lg:h-96 rounded-xl" alt=""></li>
                <li><img src="{{asset('images/about (8).avif')}}" class="h-64 lg:h-96 rounded-xl" alt=""></li>
            </ul>

            <ul class="flex items-center justify-center md:justify-start [&_li]:mx-8 [&_img]:max-w-none animate-infinite-scroll">
                <li><img src="{{asset('images/about (1).avif')}}" class="h-64 lg:h-96 rounded-xl" alt=""></li>
                <li><img src="{{asset('images/about (2).avif')}}" class="h-64 lg:h-96 rounded-xl" alt=""></li>
                <li><img src="{{asset('images/about (3).avif')}}" class="h-64 lg:h-96 rounded-xl" alt=""></li>
                <li><img src="{{asset('images/about (4).avif')}}" class="h-64 lg:h-96 rounded-xl" alt=""></li>
                <li><img src="{{asset('images/about (5).avif')}}" class="h-64 lg:h-96 rounded-xl" alt=""></li>
                <li><img src="{{asset('images/about (6).avif')}}" class="h-64 lg:h-96 rounded-xl" alt=""></li>
                <li><img src="{{asset('images/about (7).avif')}}" class="h-64 lg:h-96 rounded-xl" alt=""></li>
                <li><img src="{{asset('images/about (8).avif')}}" class="h-64 lg:h-96 rounded-xl" alt=""></li>
            </ul>
        </div>
    </div>
</header>


<div class="mx-12 mb-16 lg:mx-36 flex flex-col lg:flex-row lg:justify-between">
    <form action="#" class="">
        <h2 class="mb-5 text-2xl text-primary-700">Kirim Pesan</h2>
        <div class="grid lg:grid-cols-2 gap-5 text-gray-800 font-light">
            <div class="flex flex-col gap-2">
                <label for="firstName">Nama depan</label>
                <input type="text" class="rounded-lg">
            </div>
            <div class="flex flex-col gap-2">
                <label for="lastName">Nama belakang</label>
                <input type="text" class="rounded-lg">
            </div>
        </div>

        <div class="grid lg:grid-cols-2 gap-5 my-5 text-gray-800 font-light">
            <div class="flex flex-col gap-2">
                <label for="email">Email</label>
                <input type="email" class="rounded-lg">
            </div>
            <div class="flex flex-col gap-2">
                <label for="phone">Nomor telepon</label>
                <input type="text" class="rounded-lg">
            </div>
        </div>

        <div class="flex flex-col gap-2 text-gray-800 font-light">
            <label for="message">Pesan</label>
            <textarea name="" id="" cols="30" rows="10" class="rounded-lg"></textarea>
        </div>

        <button type="submit" class="px-7 py-3 rounded-full bg-primary-100 text-white">Kirim Pesan</button>
    </form>

    <div class="flex flex-col gap-8">
        <div class="flex flex-col gap-3">
            <h3 class="text-xl">Hubungi Kami</h3>
            <p>Hubungi tim kami setiap hari dari 08:00 sampai 16:00</p>
            <div class="flex items-center gap-2">
                <span class="material-symbols-rounded">call</span>
                <a href="tel:02190675444" class="underline">(021) 9067 5444</a>
            </div>
        </div>

        <div class="flex flex-col gap-3">
            <h3 class="text-xl">Mengobrol dengan Kami</h3>
            <p>Ngobrol dengan tim kami yang ramah via live chat</p>
            <div class="flex items-center gap-2">
                <span class="material-symbols-rounded">call</span>
                <a href="tel:02190675444" class="underline">(021) 9067 5444</a>
            </div>
            <div class="flex items-center gap-2">
                <span class="material-symbols-rounded">call</span>
                <a href="tel:02190675444" class="underline">(021) 9067 5444</a>
            </div>
            <div class="flex items-center gap-2">
                <span class="material-symbols-rounded">call</span>
                <a href="tel:02190675444" class="underline">(021) 9067 5444</a>
            </div>
        </div>

        <div class="flex flex-col gap-3">
            <h3 class="text-xl">Hubungi Kami</h3>
            <p>Hubungi tim kami setiap hari dari 08:00 sampai 16:00</p>
            <div class="flex items-center gap-2">
                <span class="material-symbols-rounded">call</span>
                <a href="tel:02190675444" class="underline">(021) 9067 5444</a>
            </div>
        </div>
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
