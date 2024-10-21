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
    
    option {
        padding: 2rem;
    }

    .cta-card {
        background: url('https://images.unsplash.com/photo-1618773928121-c32242e63f39?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');
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
@section('title', 'Promo')
@section('main')
<header class="lg:px-36 px-12 bg-hero-bg bg-fixed bg-cover relative w-screen h-screen lg:h-[65vh]">
    {{-- <div class="absolute h-screen w-full bg-[#162034] opacity-70 z-10"></div> --}}
    <nav class=" duration-500 transition-all flex items-center justify-between py-6 text-white" id="mainNavbar">
        <p class="text-lg font-medium">Mahir Hotel</p>
        <div class="lg:flex gap-8 font-light hidden">
            <a href="{{route('frontpage.index')}}" class="hover:font-medium">Beranda</a>
            <a href="{{route('frontpage.promo')}}" class="hover:font-medium">Promo</a>
            <a href="#" class="hover:font-medium">Layanan Lainnya </a>
            <a href="#" class="hover:font-medium">Kontak</a>
            <a href="#" class="hover:font-medium">Tentang Kami</a>
        </div>
        <ion-icon name="menu-outline" class="lg:hidden text-4xl" id="openMobileMenu"></ion-icon>
        <div class=" items-center gap-3 auth-button hidden lg:flex">
            <a href="{{route('register')}}" class="bg-white text-primary-500 px-5 py-2 rounded-full hover:bg-white transition-all">Daftar</a>
            <a href="{{route('login')}}" class="px-5 py-2 border border-white text-white rounded-full hover:bg-white hover:text-primary-500 transition-all">Masuk</a>
        </div>
        
    </nav>
    <nav class="duration-500 bg-white w-screen h-screen fixed hidden top-0 left-0 right-0 z-10 px-12" id="mobileMenu">
        <div class="flex items-center justify-between py-6 text-primary-500">
            <p class="text-lg font-medium">Mahir Hotel</p>
            <span class="material-symbols-rounded" id="closeMobileMenu">close</span>
        </div>

        <div class="flex flex-col gap-8 mt-8 font-light">
            <a href="{{route('frontpage.index')}}" class="hover:font-medium">Beranda</a>
            <a href="{{route('frontpage.promo')}}" class="hover:font-medium">Promo</a>
            <a href="#" class="hover:font-medium">Layanan Lainnya </a>
            <a href="#" class="hover:font-medium">Kontak</a>
            <a href="#" class="hover:font-medium">Tentang Kami</a>
            <a href="#" class="px-5 py-3 rounded-full bg-primary-500 text-white w-fit">Masuk / Daftar</a>
        </div>
    </nav>

    <div class="flex flex-col gap-8 h-[90%] justify-center">
        <h1 class="text-4xl lg:text-6xl text-white">Nikmati Promo Spesial Kami!</h1>
        <p class=" text-white">Dapatkan perjalanan sempurna dan pengalaman baru bersama Mahir Hotel!<br> Tambahkan kesenangan ke dalamnya dengan promo kami. Jadikan liburan Anda momen yang tak terlupakan.</p>
        <a href="#promos" class="px-7 py-3 rounded-full bg-primary-500 text-white w-fit text-lg transition-all hover:bg-white hover:text-primary-500 hover:border hover:border-primary-500">Lihat promo</a>
    </div>
</header>

{{-- Promo List Container --}}
<div class="mx-12 lg:mx-36 my-16 " id="promos">
    <div class="flex flex-col gap-1 my-5 justify-center items-center">
        <p class="text-2xl lg:text-5xl font-medium text-primary-700">Promo Terbaru Kami</p>
        <p class="text-sm text-center text-gray-600">Temukan penawaran eksklusif dan penginapan mewah yang dirancang khusus untuk Anda di hotel kami.<br> Pesan sekarang dan nikmati kenyamanan serta penghematan yang tak tertandingi</p>
    </div>
    <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
        {{-- Single Promo Card --}}
        <div class="rounded-xl flex flex-col gap-3 border shadow-xl hover:cursor-pointer" id="openDetailPromo">
            <img src="https://images.pexels.com/photos/6373176/pexels-photo-6373176.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="" class="rounded-t-xl">
            <div class="p-5 flex flex-col gap-2">
                <h3 class="text-xl text-primary-700 font-medium hover:underline hover:cursor-pointer">Promo Gajian: Diskon 25%</h3>
                <div class="flex items-center gap-3">
                    <span class="material-symbols-rounded">timer</span>
                    <div class="flex flex-col gap-1">
                        <p class="text-sm text-gray-600">Berlaku hingga</p>
                        <p class="text-primary-600">10 hari 3 jam 5 menit</p>
                    </div>
                </div>
            </div>
        </div>
        {{-- Single Promo Card --}}
        <div class="rounded-xl flex flex-col gap-3 border shadow-xl hover:cursor-pointer">
            <img src="https://images.pexels.com/photos/6373176/pexels-photo-6373176.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="" class="rounded-t-xl">
            <div class="p-5 flex flex-col gap-2">
                <h3 class="text-xl text-primary-700 font-medium hover:underline hover:cursor-pointer">Promo Gajian: Diskon 25%</h3>
                <div class="flex items-center gap-3">
                    <span class="material-symbols-rounded">timer</span>
                    <div class="flex flex-col gap-1">
                        <p class="text-sm text-gray-600">Berlaku hingga</p>
                        <p class="text-primary-600">10 hari 3 jam 5 menit</p>
                    </div>
                </div>
            </div>
        </div>
        {{-- Single Promo Card --}}
        <div class="rounded-xl flex flex-col gap-3 border shadow-xl hover:cursor-pointer">
            <img src="https://images.pexels.com/photos/6373176/pexels-photo-6373176.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="" class="rounded-t-xl">
            <div class="p-5 flex flex-col gap-2">
                <h3 class="text-xl text-primary-700 font-medium hover:underline hover:cursor-pointer">Promo Gajian: Diskon 25%</h3>
                <div class="flex items-center gap-3">
                    <span class="material-symbols-rounded">timer</span>
                    <div class="flex flex-col gap-1">
                        <p class="text-sm text-gray-600">Berlaku hingga</p>
                        <p class="text-primary-600">10 hari 3 jam 5 menit</p>
                    </div>
                </div>
            </div>
        </div>
        {{-- Single Promo Card --}}
        <div class="rounded-xl flex flex-col gap-3 border shadow-xl hover:cursor-pointer">
            <img src="https://images.pexels.com/photos/6373176/pexels-photo-6373176.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="" class="rounded-t-xl">
            <div class="p-5 flex flex-col gap-2">
                <h3 class="text-xl text-primary-700 font-medium hover:underline hover:cursor-pointer">Promo Gajian: Diskon 25%</h3>
                <div class="flex items-center gap-3">
                    <span class="material-symbols-rounded">timer</span>
                    <div class="flex flex-col gap-1">
                        <p class="text-sm text-gray-600">Berlaku hingga</p>
                        <p class="text-primary-600">10 hari 3 jam 5 menit</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="inset-0 z-20 bg-gray-500 bg-opacity-45 hidden fixed min-h-screen w-screen" id="detailPromo">
        <div class="flex flex-col items-center gap-5 top-0 left-0 translate-x-1/2 translate-y-1/3 absolute justify-center w-1/2 bg-white rounded-xl p-5">
            <img src="https://images.pexels.com/photos/6373176/pexels-photo-6373176.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="" class="h-64 w-full object-cover rounded-xl">
            <h2 class="text-xl font-semibold mb-3 text-primary-500">Promo Gajian: Diskon 25%!</h2>
            <div class="flex items-center gap-8">
                <div class="flex gap-3 items-center">
                    <span class="material-symbols-rounded text-primary-800">calendar_month</span>
                    <div class="flex flex-col gap-1">
                        <p class="text-sm text-primary-500">Masa Berlaku:</p>
                        <p class="text-primary-800">1 Okt 2024 - 10 Okt 2024</p>
                    </div>
                </div>
                
                <div class="flex items-center gap-5">
                    <div class="flex items-center gap-3 ">
                        <span class="material-symbols-rounded">confirmation_number</span>
                        <div class="flex flex-col gap-1">
                            <p class="text-sm text-primary-500">Kode Promo:</p>
                        <p class="text-primary-800">PAYDAY</p>
                        </div>
                    </div>
                    <a href="#" class="px-5 py-3 rounded-full flex items-center gap-2 bg-primary-500 text-white text-sm"><span class="material-symbols-rounded">file_copy</span>Salin</a>
                </div>
            </div>

            <div class="flex items-center gap-2 mt-3">
                <button class="px-5 py-2 border border-primary-500 text-primary-500 rounded-full hover:bg-primary-500 hover:text-white transition-all" id="closeDetailPromo">Tutup</button>
                {{-- <button class="bg-primary-500 text-white px-5 py-2 rounded-full hover:bg-primary-700 transition-all">Pesan</button> --}}
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
        document.addEventListener('scroll', function() {
            const mainNavbar = document.getElementById('mainNavbar');
            if(window.scrollY > 0) {
                mainNavbar.classList.add('scrolled');
            } else {
                mainNavbar.classList.remove('scrolled');
            }
        });

        const openMobileMenu = document.getElementById('openMobileMenu');
        const closeMobileMenu = document.getElementById('closeMobileMenu');
        const mobileMenu = document.getElementById('mobileMenu');

        openMobileMenu.addEventListener('click', function() {
            mobileMenu.classList.remove('hidden');
        });

        closeMobileMenu.addEventListener('click', function() {
            mobileMenu.classList.add('hidden');
        });

        const openDetailPromo = document.getElementById('openDetailPromo');
        const closeDetailPromo = document.getElementById('closeDetailPromo');
        const detailPromo = document.getElementById('detailPromo');

        openDetailPromo.addEventListener('click', function() {
            detailPromo.classList.remove('hidden');
        });

        closeDetailPromo.addEventListener('click', function() {
            detailPromo.classList.add('hidden');
        });
    </script>
@endpush