@extends('layout.frontpage')
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
@section('title', 'Beranda')
@section('main')
<header class="lg:px-36 px-12 bg-hero-bg bg-fixed bg-cover relative w-screen h-screen">
    {{-- <div class="absolute h-screen w-full bg-[#162034] opacity-70 z-10"></div> --}}
    <nav class=" duration-500 transition-all flex items-center justify-between py-6 text-white" id="mainNavbar">
        <p class="text-lg font-medium">Mahir Hotel</p>
        <div class="lg:flex gap-8 font-light hidden">
            <a href="#" class="hover:font-medium">Beranda</a>
            <a href="#" class="hover:font-medium">Promo</a>
            <a href="#" class="hover:font-medium">Layanan Lainnya </a>
            <a href="#" class="hover:font-medium">Kontak</a>
            <a href="#" class="hover:font-medium">Tentang Kami</a>
        </div>
        <ion-icon name="menu-outline" class="lg:hidden text-4xl" id="openMobileMenu"></ion-icon>
        <div class=" items-center gap-3 auth-button hidden lg:flex">
            <a href="#" class="bg-white text-primary-500 px-5 py-2 rounded-full hover:bg-white transition-all">Daftar</a>
            <a href="#" class="px-5 py-2 border border-white text-white rounded-full hover:bg-white hover:text-primary-500 transition-all">Masuk</a>
        </div>
        
    </nav>
    <nav class="duration-500 bg-white w-screen h-screen fixed hidden top-0 left-0 right-0 z-10 px-12" id="mobileMenu">
        <div class="flex items-center justify-between py-6 text-primary-500">
            <p class="text-lg font-medium">Mahir Hotel</p>
            <span class="material-symbols-rounded" id="closeMobileMenu">close</span>
        </div>

        <div class="flex flex-col gap-8 mt-8 font-light">
            <a href="#" class="hover:font-medium">Beranda</a>
            <a href="#" class="hover:font-medium">Promo</a>
            <a href="#" class="hover:font-medium">Layanan Lainnya </a>
            <a href="#" class="hover:font-medium">Kontak</a>
            <a href="#" class="hover:font-medium">Tentang Kami</a>
            <a href="#" class="px-5 py-3 rounded-full bg-primary-500 text-white w-fit">Masuk / Daftar</a>
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
        <h1 class="text-4xl lg:text-6xl text-white">Liburan impian Anda<br>dimulai di sini!</h1>
        <p class=" text-white">Mahir Hotel menawarkan kenyamanan dan kemewahan yang tiada duanya,<br> dengan fasilitas kelas dunia dan layanan istimewa, kami siap menyambut Anda.</p>
        <form action="" class="hidden mt-5 bg-white py-5 ps-10 pe-5 lg:flex items-center justify-between w-3/5 rounded-full">
            <div class="flex items-center gap-2">
                <div class="grid grid-cols-1 gap-2">
                    <label for="" class="text-sm">Pilih Kamar</label>
                    <select name="" class="outline-none border-none text-lg p-0" id="">
                        <option value="" class="p-2 ">Pilih Kamar</option>
                        <option value="">Standard</option>
                        <option value="">Platinum</option>
                        <option value="">Premium</option>
                    </select>
                </div>
                <div class="grid grid-cols-1 gap-2">
                    <label for="" class="text-sm">Check-in</label>
                    <input type="date" class="outline-none border-none text-lg p-0">
                </div>
                <div class="grid grid-cols-1 gap-2">
                    <label for="" class="text-sm">Check-out</label>
                    <input type="date" class="outline-none border-none text-lg p-0" name="" id="">
                </div>
            </div>
            <button class="text-white bg-primary-500 w-fit px-5 py-3 rounded-full">
                Pesan
            </button>
        </form>

        {{-- Mobile booking form --}}
        <button class="text-white bg-primary-500 w-fit px-5 py-3 rounded-full block lg:hidden" id="openBookingForm">Pesan sekarang</button>
        <div class="inset-0 z-50 bg-gray-500 bg-opacity-75 fixed lg:hidden hidden min-h-screen w-screen" id="bookingForm">
            <form class="flex flex-col items-center justify-center bg-white w-[90%] rounded-xl p-5">
                <h2 class="text-xl font-semibold mb-3 text-primary-500">Booking sekarang!</h2>
                <div class="grid grid-cols-1 gap-2 w-full rounded border border-gray-400 p-2">
                    <label for="#rooms">Pilih Kamar</label>
                    <span class="material-symbols-rounded">meeting_room</span>
                    <select name="rooms" id="rooms" class="">
                        <option value="Pilih kamar">&#xeb4f; Pilih kamar</option>
                        <option value="Standar">Standar</option>
                        <option value="Premium">Premium</option>
                        <option value="Platinum">Platinum</option>
                    </select>
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
<div class="px-12 lg:px-36 py-6">
    <div class="flex items-center justify-between">
        <div class="flex flex-col gap-1 my-5">
            <p class="text-sm  text-primary-500">Temukan</p>
            <p class="text-2xl lg:text-5xl">Kamar Terbaik Kami</p>
        </div>
        {{-- <a href="#" class="px-5 py-3 rounded-full text-white bg-primary-500 transition-all hover:bg-primary-700">Lihat semua</a> --}}
        <div class="hidden lg:flex items-center gap-3">
            <button class="text-primary-500 bg-primary-100 flex items-center justify-center p-3 rounded-full transition-all hover:shadow-2xl" id="roomButtonLeft"><span class="material-symbols-rounded">chevron_left</span></button>
            <button class="text-primary-500 bg-primary-100 flex items-center justify-center p-3 rounded-full transition-all hover:shadow-2xl" id="roomButtonRight"><span class="material-symbols-rounded">chevron_right</span></button>
        </div>
    </div>

    <div class="flex overflow-x-scroll no-scrollbar" id="roomsContainer">
        <div class="flex flex-nowrap gap-10 ">
            
            <div class="w-[250px] lg:w-[350px] h-[450px] bg-white rounded-xl bg-[url('https://images.unsplash.com/photo-1531835551805-16d864c8d311?q=80&w=1887&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D')] bg-cover relative">
                <div class="bg-white absolute bottom-3 left-3 right-3 w-[225px] lg:w-[325px] flex items-end justify-between p-5 rounded-xl">
                    <div>
                        <h2 class="font-medium text-gray-600">Standard Room</h2>
                        <div class="flex items-center gap-2 text-xs my-3 text-primary-300">
                            <p class="flex items-center">
                                <span class="material-symbols-rounded scale-75">group</span>
                                1
                            </p>
                            <span class="material-symbols-rounded scale-75">restaurant</span>
                            <span class="material-symbols-rounded scale-75">bathtub</span>
                            <span class="material-symbols-rounded scale-75 leading-none">wifi</span>
                        </div>
                        <p class="text-xl text-primary-400 font-medium">IDR 500K</p>
                    </div>
                    <a href="#" class="items-end text-primary-400 font-medium">Pesan</a>
                </div>
            </div>   

            <div class="w-[250px] lg:w-[350px] h-[450px] bg-white rounded-xl bg-[url('https://images.unsplash.com/photo-1531835551805-16d864c8d311?q=80&w=1887&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D')] bg-cover relative">
                <div class="bg-white absolute bottom-3 left-3 right-3 w-[225px] lg:w-[325px] flex items-end justify-between p-5 rounded-xl">
                    <div>
                        <h2 class="font-medium text-gray-600">Family Room</h2>
                        <div class="flex items-center gap-1 text-xs my-3 text-primary-300">
                            <span class="material-symbols-rounded scale-75">restaurant</span>
                            <p class="flex items-center">
                                <span class="material-symbols-rounded scale-75">bathtub</span>
                                IN
                            </p>
                            <p class="flex items-center">
                                <span class="material-symbols-rounded scale-75">bed</span>
                                2
                            </p>
                            <span class="material-symbols-rounded scale-75 leading-none">wifi</span>
                        </div>
                        <p class="text-xl text-primary-400 font-medium">IDR 500K</p>
                    </div>
                    <a href="#" class="items-end text-primary-400 font-medium">Pesan</a>
                </div>
            </div>   
            
            <div class="w-[250px] lg:w-[350px] h-[450px] bg-white rounded-xl bg-[url('https://images.unsplash.com/photo-1531835551805-16d864c8d311?q=80&w=1887&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D')] bg-cover relative">
                <div class="bg-white absolute bottom-3 left-3 right-3 w-[225px] lg:w-[325px] flex items-end justify-between p-5 rounded-xl">
                    <div>
                        <h2 class="font-medium text-gray-600">Standard Room</h2>
                        <div class="flex items-center gap-2 text-xs my-3 text-primary-300">
                            <span class="material-symbols-rounded scale-75">restaurant</span>
                            <span class="material-symbols-rounded scale-75">bathtub</span>
                            <span class="material-symbols-rounded scale-75 leading-none">wifi</span>
                        </div>
                        <p class="text-xl text-primary-400 font-medium">IDR 500K</p>
                    </div>
                    <a href="#" class="items-end text-primary-400 font-medium">Pesan</a>
                </div>
            </div>   

            <div class="w-[250px] lg:w-[350px] h-[450px] bg-white rounded-xl bg-[url('https://images.unsplash.com/photo-1531835551805-16d864c8d311?q=80&w=1887&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D')] bg-cover relative">
                <div class="bg-white absolute bottom-3 left-3 right-3 w-[225px] lg:w-[325px] flex items-end justify-between p-5 rounded-xl">
                    <div>
                        <h2 class="font-medium text-gray-600">Standard Room</h2>
                        <div class="flex items-center gap-2 text-xs my-3 text-primary-300">
                            <span class="material-symbols-rounded scale-75">restaurant</span>
                            <span class="material-symbols-rounded scale-75">bathtub</span>
                            <span class="material-symbols-rounded scale-75 leading-none">wifi</span>
                        </div>
                        <p class="text-xl text-primary-400 font-medium">IDR 500K</p>
                    </div>
                    <a href="#" class="items-end text-primary-400 font-medium">Pesan</a>
                </div>
            </div>   

            <div class="w-[250px] lg:w-[350px] h-[450px] bg-white rounded-xl bg-[url('https://images.unsplash.com/photo-1531835551805-16d864c8d311?q=80&w=1887&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D')] bg-cover relative">
                <div class="bg-white absolute bottom-3 left-3 right-3 w-[225px] lg:w-[325px] flex items-end justify-between p-5 rounded-xl">
                    <div>
                        <h2 class="font-medium text-gray-600">Standard Room</h2>
                        <div class="flex items-center gap-2 text-xs my-3 text-primary-300">
                            <span class="material-symbols-rounded scale-75">restaurant</span>
                            <span class="material-symbols-rounded scale-75">bathtub</span>
                            <span class="material-symbols-rounded scale-75 leading-none">wifi</span>
                        </div>
                        <p class="text-xl text-primary-400 font-medium">IDR 500K</p>
                    </div>
                    <a href="#" class="items-end text-primary-400 font-medium">Pesan</a>
                </div>
            </div>   

        </div>
        {{-- <div class="flex flex-nowrap gap-10">
            <div class="w-[250px] lg:w-[350px] bg-white rounded-xl grid grid-rows-2 gap-5 border border-primary-300">
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

            <div class="w-[250px] lg:w-[350px] bg-white rounded-xl grid grid-rows-2 gap-5 border border-primary-300">
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

            <div class="w-[250px] lg:w-[350px] bg-white rounded-xl grid grid-rows-2 gap-5 border border-primary-300">
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

            <div class="w-[250px] lg:w-[350px] bg-white rounded-xl grid grid-rows-2 gap-5 border border-primary-300">
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
    <div class="grid lg:grid-cols-2 gap-5 items-center">
        <img src="https://images.unsplash.com/photo-1477959858617-67f85cf4f1df?q=80&w=1888&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="">
        <div class="flex flex-col gap-3">
            <h2 class="text-2xl">Pemandangan Kota yang Memukau</h2>
            <p>Hotel Citra Megah adalah destinasi yang sempurna bagi Anda yang menginginkan pengalaman menginap dengan pemandangan kota yang memukau. Kami berada di jantung kota, memberikan Anda pemandangan yang spektakuler, memadukan keindahan arsitektur modern dengan lanskap perkotaan yang gemerlap.</p>
        </div>
    </div> --}}

</div>
<div class="grid lg:grid-cols-2 gap-5 items-center my-16 px-12 lg:px-36 py-6">
    <div class="flex flex-col gap-5">
        <h2 class="text-3xl font-medium lg:text-5xl text-primary-700">Kepuasan Saat Menginap<br> di Hotel Kami</h2>
        <p>Mahir Hotel menawarkan berbagai fasilitas dan kemudahan<br> yang membuat liburan Anda menjadi semakin berkesan.</p>
    </div>

    <div class="flex flex-col gap-3">
        <div class="grid lg:grid-cols-2 gap-3">
            <img src="https://images.unsplash.com/photo-1577076095300-b8b1f2813cc3?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="">
            <div class="flex flex-col gap-2">
                <h3 class="text-2xl">Interior yang elegan dan modern</h3>
                <p class="text-sm">Kami menghadirkan keindahan interior yang elegan dan modern untuk memenuhi selera para tamu yang menghargai sentuhan keanggunan dan kemewahan. </p>
            </div>
        </div>
        <div class="grid lg:grid-cols-2 gap-3">
            <img src="https://images.unsplash.com/photo-1577076095300-b8b1f2813cc3?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="">
            <div class="flex flex-col gap-2">
                <h3 class="text-2xl">Interior yang elegan dan modern</h3>
                <p class="text-sm">Kami menghadirkan keindahan interior yang elegan dan modern untuk memenuhi selera para tamu yang menghargai sentuhan keanggunan dan kemewahan. </p>
            </div>
        </div>
        <div class="grid lg:grid-cols-2 gap-3">
            <img src="https://images.unsplash.com/photo-1577076095300-b8b1f2813cc3?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="">
            <div class="flex flex-col gap-2">
                <h3 class="text-2xl">Interior yang elegan dan modern</h3>
                <p class="text-sm">Kami menghadirkan keindahan interior yang elegan dan modern untuk memenuhi selera para tamu yang menghargai sentuhan keanggunan dan kemewahan. </p>
            </div>
        </div>
    </div>
</div>

{{-- Our Services Section --}}
<div class="px-12 lg:px-36 py-6">
    <div class="flex flex-col gap-1 justify-center items-center">
        <p class="font-medium text-primary-400">Kenali</p>
        <h2 class="text-3xl font-medium text-primary-700">Layanan Kami</h2>
    </div>
    <div class="grid lg:grid-cols-2 gap-5 my-11">
        <img src="{{asset('images/services.png')}}" alt="">
        <div class="flex flex-col gap-8">
            <div class="flex flex-col lg:flex-row gap-8 sm:items-start lg:items-center">
                <span class="material-symbols-rounded text-primary-400 scale-[200%]">local_taxi</span>
                <div class="flex flex-col gap-1">
                    <h2 class="text-2xl">Layanan Antar Jemput</h2>
                    <p class="font-light">Nikmati layanan antar-jemput 24 jam kami untuk perjalanan aman dan nyaman dari/ke bandara dan destinasi populer. Armada terawat dan sopir profesional memastikan perjalanan bebas stres. Pesan saat reservasi atau hubungi resepsionis.</p>
                </div>
            </div>

            <div class="flex flex-col lg:flex-row gap-8 sm:items-start lg:items-center">
                <span class="material-symbols-rounded text-primary-400 scale-[200%]">spa</span>
                <div class="flex flex-col gap-1">
                    <h2 class="text-2xl">Spa dan Kecantikan</h2>
                    <p class="font-light">Rasakan relaksasi total dengan layanan spa kami. Pijat, perawatan wajah, dan body scrub tersedia untuk memanjakan tubuh dan pikiran Anda</p>
                </div>
            </div>
            
            <div class="flex flex-col lg:flex-row gap-8 sm:items-start lg:items-center">
                <span class="material-symbols-rounded text-primary-400 scale-[200%]">fitness_center</span>
                <div class="flex flex-col gap-1">
                    <h2 class="text-2xl">Pusat Olahraga</h2>
                    <p class="font-light">Tetap bugar selama menginap dengan pusat kebugaran kami. Dilengkapi peralatan modern dan tersedia 24 jam untuk memenuhi kebutuhan olahraga Anda.</p>
                </div>
            </div>

            <div class="flex flex-col lg:flex-row gap-8 sm:items-start lg:items-center">
                <span class="material-symbols-rounded text-primary-400 scale-[200%]">local_laundry_service</span>
                <div class="flex flex-col gap-1">
                    <h2 class="text-2xl">Layanan Laundry</h2>
                    <p class="font-light">Kami menawarkan jasa laundry untuk pakaian Anda dengan standar kebersihan tertinggi. Dengan teknologi modern dan deterjen berkualitas, kami memastikan pakaian Anda selalu bersih dan segar. </p>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Our Location Section --}}
<div class="px-12 lg:px-36 my-10">
    <div class="flex flex-col gap-1">
        <p class="font-medium text-primary-400">Lokasi Kami</p>
        <h2 class="text-3xl font-medium text-primary-700">Strategis di Jantung Kota</h2>
    </div>

    <div class="grid lg:grid-cols-2 gap-5">
        <div class="flex flex-col gap-3">
            <p class="my-5">Mahir Hotel menawarkan akses mudah ke destinasi wisata utama 
                dan pusat perbelanjaan. Nikmati kenyamanan dan kemudahan selama menginap bersama kami!</p>
            <div class="grid lg:grid-cols-2 gap-8">
                <div class="flex items-center gap-5">
                    <span class="material-symbols-rounded text-primary-400 scale-[150%]">subway</span>
                    <div class="flex flex-col">
                        <p class="text-lg text-gray-700">Stasiun MRT Dukuh Atas</p>
                        <p class="text-primary-400">100 M</p>
                    </div>
                </div>

                <div class="flex items-center gap-5">
                    <span class="material-symbols-rounded text-primary-400 scale-[150%]">train</span>
                    <div class="flex flex-col">
                        <p class="text-lg text-gray-700">Stasiun KRL Sudirman</p>
                        <p class="text-primary-400">50 M</p>
                    </div>
                </div>

                <div class="flex items-center gap-5">
                    <span class="material-symbols-rounded text-primary-400 scale-[150%]">shopping_bag</span>
                    <div class="flex flex-col">
                        <p class="text-lg text-gray-700">Thamrin Nine</p>
                        <p class="text-primary-400">300 M</p>
                    </div>
                </div>

                <div class="flex items-center gap-5">
                    <span class="material-symbols-rounded text-primary-400 scale-[150%]">tram</span>
                    <div class="flex flex-col">
                        <p class="text-lg text-gray-700">Stasiun LRT Dukuh Atas</p>
                        <p class="text-primary-400">350 M</p>
                    </div>
                </div>

                <div class="flex items-center gap-5">
                    <span class="material-symbols-rounded text-primary-400 scale-[150%]">corporate_fare</span>
                    <div class="flex flex-col">
                        <p class="text-lg text-gray-700">Wisma 46 BNI</p>
                        <p class="text-primary-400">200 M</p>
                    </div>
                </div>

                <div class="flex items-center gap-5">
                    <span class="material-symbols-rounded text-primary-400 scale-[150%]">shopping_bag</span>
                    <div class="flex flex-col">
                        <p class="text-lg text-gray-700">Plaza Indonesia</p>
                        <p class="text-primary-400">100 M</p>
                    </div>
                </div>
            </div>
        </div>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4138.804388321211!2d106.82896076951583!3d-6.205752381880911!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f41ace344be7%3A0x7ca9fc55e762b09e!2sThe%20St.%20Regis%20Jakarta!5e1!3m2!1sid!2sid!4v1729430801393!5m2!1sid!2sid" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
</div>

{{-- Facilities --}}
<div class="px-12 lg:px-36 my-14">
    <div class="flex flex-col gap-1 items-center justify-center">
        <p class="font-medium text-primary-400">Fasilitas Kami</p>
        <h2 class="text-3xl font-medium text-primary-700">Siap Memanjakan Anda</h2>
    </div>

    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-5 my-10">
        <div class="flex items-center justify-center p-5 gap-5 bg-primary-500 text-white">
            <span class="material-symbols-rounded text-primary-100 scale-[150%]">prayer_times</span> 
            <p>Mushalla</p>
        </div>

        <div class="flex items-center justify-center p-5 gap-5 bg-primary-500 text-white">
            <span class="material-symbols-rounded text-primary-100 scale-[150%]">pool</span> 
            <p>Kolam Renang</p>
        </div>

        <div class="flex items-center justify-center p-5 gap-5 bg-primary-500 text-white">
            <span class="material-symbols-rounded text-primary-100 scale-[150%]">restaurant</span> 
            <p>Restoran Kelas Dunia</p>
        </div>

        <div class="flex items-center justify-center p-5 gap-5 bg-primary-500 text-white">
            <span class="material-symbols-rounded text-primary-100 scale-[150%]">ramen_dining</span> 
            <p>Gratis Sarapan</p>
        </div>

        <div class="flex items-center justify-center p-5 gap-5 bg-primary-500 text-white">
            <span class="material-symbols-rounded text-primary-100 scale-[150%]">wifi</span> 
            <p>WiFi Berkecepatan Tinggi</p>
        </div>

        <div class="flex items-center justify-center p-5 gap-5 bg-primary-500 text-white">
            <span class="material-symbols-rounded text-primary-100 scale-[150%]">child_care</span> 
            <p>Taman Bermain</p>
        </div>

        <div class="flex items-center justify-center p-5 gap-5 bg-primary-500 text-white">
            <span class="material-symbols-rounded text-primary-100 scale-[150%]">local_taxi</span> 
            <p>Antar Jemput</p>
        </div>

        <div class="flex items-center justify-center p-5 gap-5 bg-primary-500 text-white">
            <span class="material-symbols-rounded text-primary-100 scale-[150%]">child_care</span> 
            <p>Taman Bermain</p>
        </div>
    </div>
</div>

{{-- Testimonial Section --}}
<div class="px-12 lg:px-36 my-14">
    <div class="flex flex-col gap-1 items-center justify-center">
        <p class="font-medium text-primary-400">Testimonial</p>
        <h2 class="text-3xl font-medium text-primary-700">Apa Kata Mereka Tentang Kami?</h2> 
    </div>

    <div class="mt-10 grid lg:grid-cols-4 gap-5">
        <div class="flex flex-col gap-5 rounded-lg border border-primary-500 p-5 transition-all hover:shadow-xl">
            {{-- <object data="{{asset('images/traveloka-brown.svg')}}" type="image/svg+xml"></object> --}}
            <img src="{{asset('images/traveloka-brown.svg')}}" class="w-24" alt="">
            <p class="text-sm text-primary-800">Ultricies scelerisque netus maximus sodales facilisis orci neque. Magnis feugiat quam sociosqu ante facilisi justo vulputate pretium maximus. Class potenti velit tellus cubilia et ipsum accumsan fusce.</p>
            <div class="flex items-center gap-3">
                <img src="{{asset('assets/img/team-1.jpg')}}" class="w-14 h-14 rounded-full" alt="">
                <div class="flex flex-col">
                    <p class="font-medium text-primary-700">Fufufafa</p>
                    <p class="text-sm flex items-center gap-1 text-primary-500"><i class="bi bi-star-fill"></i>4.9</p>
                </div> 
            </div>
        </div>

        <div class="flex flex-col gap-5 rounded-lg border border-primary-500 p-5 transition-all hover:shadow-xl">
            {{-- <object data="{{asset('images/traveloka-brown.svg')}}" type="image/svg+xml"></object> --}}
            <img src="{{asset('images/traveloka-brown.svg')}}" class="w-24" alt="">
            <p class="text-sm text-primary-800">Ultricies scelerisque netus maximus sodales facilisis orci neque. Magnis feugiat quam sociosqu ante facilisi justo vulputate pretium maximus. Class potenti velit tellus cubilia et ipsum accumsan fusce.</p>
            <div class="flex items-center gap-3">
                <img src="{{asset('assets/img/team-1.jpg')}}" class="w-14 h-14 rounded-full" alt="">
                <div class="flex flex-col">
                    <p class="font-medium text-primary-700">Fufufafa</p>
                    <p class="text-sm flex items-center gap-1 text-primary-500"><i class="bi bi-star-fill"></i>4.9</p>
                </div> 
            </div>
        </div>

        <div class="flex flex-col gap-5 rounded-lg border border-primary-500 p-5 transition-all hover:shadow-xl">
            {{-- <object data="{{asset('images/traveloka-brown.svg')}}" type="image/svg+xml"></object> --}}
            <img src="{{asset('images/traveloka-brown.svg')}}" class="w-24" alt="">
            <p class="text-sm text-primary-800">Ultricies scelerisque netus maximus sodales facilisis orci neque. Magnis feugiat quam sociosqu ante facilisi justo vulputate pretium maximus. Class potenti velit tellus cubilia et ipsum accumsan fusce.</p>
            <div class="flex items-center gap-3">
                <img src="{{asset('assets/img/team-1.jpg')}}" class="w-14 h-14 rounded-full" alt="">
                <div class="flex flex-col">
                    <p class="font-medium text-primary-700">Fufufafa</p>
                    <p class="text-sm flex items-center gap-1 text-primary-500"><i class="bi bi-star-fill"></i>4.9</p>
                </div> 
            </div>
        </div>

        <div class="flex flex-col gap-5 rounded-lg border border-primary-500 p-5 transition-all hover:shadow-xl">
            {{-- <object data="{{asset('images/traveloka-brown.svg')}}" type="image/svg+xml"></object> --}}
            <img src="{{asset('images/traveloka-brown.svg')}}" class="w-24" alt="">
            <p class="text-sm text-primary-800">Ultricies scelerisque netus maximus sodales facilisis orci neque. Magnis feugiat quam sociosqu ante facilisi justo vulputate pretium maximus. Class potenti velit tellus cubilia et ipsum accumsan fusce.</p>
            <div class="flex items-center gap-3">
                <img src="{{asset('assets/img/team-1.jpg')}}" class="w-14 h-14 rounded-full" alt="">
                <div class="flex flex-col">
                    <p class="font-medium text-primary-700">Fufufafa</p>
                    <p class="text-sm flex items-center gap-1 text-primary-500"><i class="bi bi-star-fill"></i>4.9</p>
                </div> 
            </div>
        </div>
    </div>
</div>

<div class="px-12 lg:px-36 my-28">
    <div class="flex flex-col gap-1 items-center justify-center">
        <h2 class="text-3xl font-medium text-primary-700">Terimakasih atas Kepercayaan Anda</h2> 
        <p class=" text-primary-800">Kepercayaan Anda telah menghantarkan kami untuk mendapatkan berbagai penghargaan.</p>
    </div>

    <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8 my-10">
        <div class="flex items-center gap-3">
            <img src="{{asset('images/2017_COE_Logos_white-bkg_translations_en-US-UK.png')}}" class="w-24" alt="">
            <div class="flex flex-col gap-1">
                <p>Trip Advisor</p>
                <p>Certificate of Excellence (2017)</p>
            </div>
        </div>

        <div class="flex items-center gap-3">
            <img src="{{asset('images/6539a819440457af5afd1282_badge tripadvisor best of the best 2023.png')}}" class="w-24" alt="">
            <div class="flex flex-col gap-1">
                <p>Trip Advisor</p>
                <p>Best of the Best (2023)</p>
            </div>
        </div>

        <div class="flex items-center gap-3">
            <img src="{{asset('images/agoda_2022.png')}}" class="w-24" alt="">
            <div class="flex flex-col gap-1">
                <p>Agoda</p>
                <p>Best Review Awards (2022)</p>
            </div>
        </div>

        <div class="flex items-center gap-3">
            <img src="{{asset('images/TC_green_winner-gif_LL_2024.gif')}}" class="w-24" alt="">
            <div class="flex flex-col gap-1">
                <p>Trip Advisor</p>
                <p>Travellers' Choice Awards (2024)</p>
            </div>
        </div>
    </div>
</div>

{{-- FAQ Section --}}
<div class="px-12 lg:px-36 my-28">
    <div class="flex flex-col gap-1 justify-center items-center">
        <p class="font-medium text-primary-500">Frequently Asked Questions</p>
        <h2 class="text-3xl font-medium text-primary-700">Pertanyaan yang Sering Diajukan</h2>
    </div>

    <div class="grid lg:grid-cols-2 gap-5 mt-10">
        <img src="{{asset('images/Questions-bro 1.png')}}" alt="">
        
        <div id="accordion-collapse" data-accordion="collapse">
            <h2 id="accordion-collapse-heading-1">
            <button type="button" class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 rounded-t-xl focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3" data-accordion-target="#accordion-collapse-body-1" aria-expanded="true" aria-controls="accordion-collapse-body-1">
                <span>What is Flowbite?</span>
                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                </svg>
            </button>
            </h2>
            <div id="accordion-collapse-body-1" class="hidden" aria-labelledby="accordion-collapse-heading-1">
            <div class="p-5 border border-b-0 border-gray-200 ">
                <p class="mb-2 text-gray-500 dark:text-gray-400">Flowbite is an open-source library of interactive components built on top of Tailwind CSS including buttons, dropdowns, modals, navbars, and more.</p>
                <p class="text-gray-500 dark:text-gray-400">Check out this guide to learn how to <a href="/docs/getting-started/introduction/" class="text-blue-600 dark:text-blue-500 hover:underline">get started</a> and start developing websites even faster with components on top of Tailwind CSS.</p>
            </div>
            </div>
            <h2 id="accordion-collapse-heading-2">
            <button type="button" class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3" data-accordion-target="#accordion-collapse-body-2" aria-expanded="false" aria-controls="accordion-collapse-body-2">
                <span>Is there a Figma file available?</span>
                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                </svg>
            </button>
            </h2>
            <div id="accordion-collapse-body-2" class="hidden" aria-labelledby="accordion-collapse-heading-2">
            <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700">
                <p class="mb-2 text-gray-500 dark:text-gray-400">Flowbite is first conceptualized and designed using the Figma software so everything you see in the library has a design equivalent in our Figma file.</p>
                <p class="text-gray-500 dark:text-gray-400">Check out the <a href="https://flowbite.com/figma/" class="text-blue-600 dark:text-blue-500 hover:underline">Figma design system</a> based on the utility classes from Tailwind CSS and components from Flowbite.</p>
            </div>
            </div>
            <h2 id="accordion-collapse-heading-3">
            <button type="button" class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3" data-accordion-target="#accordion-collapse-body-3" aria-expanded="false" aria-controls="accordion-collapse-body-3">
                <span>What are the differences between Flowbite and Tailwind UI?</span>
                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                </svg>
            </button>
            </h2>
            <div id="accordion-collapse-body-3" class="hidden" aria-labelledby="accordion-collapse-heading-3">
            <div class="p-5 border border-t-0 border-gray-200 dark:border-gray-700">
                <p class="mb-2 text-gray-500 dark:text-gray-400">The main difference is that the core components from Flowbite are open source under the MIT license, whereas Tailwind UI is a paid product. Another difference is that Flowbite relies on smaller and standalone components, whereas Tailwind UI offers sections of pages.</p>
                <p class="mb-2 text-gray-500 dark:text-gray-400">However, we actually recommend using both Flowbite, Flowbite Pro, and even Tailwind UI as there is no technical reason stopping you from using the best of two worlds.</p>
                <p class="mb-2 text-gray-500 dark:text-gray-400">Learn more about these technologies:</p>
                <ul class="ps-5 text-gray-500 list-disc dark:text-gray-400">
                <li><a href="https://flowbite.com/pro/" class="text-blue-600 dark:text-blue-500 hover:underline">Flowbite Pro</a></li>
                <li><a href="https://tailwindui.com/" rel="nofollow" class="text-blue-600 dark:text-blue-500 hover:underline">Tailwind UI</a></li>
                </ul>
            </div>
            </div>
        </div>
  
    </div>
</div>

{{-- Featured by --}}
<div class="px-12 lg:px-36 my-28 flex flex-col gap-16">
    <h2 class="text-3xl font-medium text-primary-700 text-center">Partner Kami</h2>
    <div class="w-full inline-flex flex-nowrap overflow-hidden [mask-image:_linear-gradient(to_right,transparent_0,_black_128px,_black_calc(100%-200px),transparent_100%)]">
        <ul class="flex items-center justify-center md:justify-start [&_li]:mx-8 [&_img]:max-w-none animate-infinite-scroll">
            <li><img src="{{asset('images/1200px-Tiket.com_logo.png')}}" class="h-10 backdrop-grayscale" alt=""></li>
            <li><img src="{{asset('images/agoda-logo-8C565D040A-seeklogo.com.png')}}" class="h-10 backdrop-grayscale" alt=""></li>
            <li><img src="{{asset('images/Traveloka-Logo-Vector.svg-.png')}}" class="h-10 backdrop-grayscale" alt=""></li>
            <li><img src="{{asset('images/TripAdvisor_Logo.svg')}}" class="h-10 backdrop-grayscale" alt=""></li>
            <li><img src="{{asset('images/Airbnb_Logo_Bélo.svg')}}" class="h-10 backdrop-grayscale" alt=""></li>
            <li><img src="{{asset('images/garuda-indonesia.svg')}}" class="h-10 backdrop-grayscale" alt=""></li>
            <li><img src="{{asset('images/All_Nippon_Airways_Logo.svg.png')}}" class="h-10 backdrop-grayscale" alt=""></li>
    
        </ul>
    
        <ul class="flex items-center justify-center md:justify-start [&_li]:mx-8 [&_img]:max-w-none animate-infinite-scroll">
            <li><img src="{{asset('images/1200px-Tiket.com_logo.png')}}" class="h-10 backdrop-grayscale" alt=""></li>
            <li><img src="{{asset('images/agoda-logo-8C565D040A-seeklogo.com.png')}}" class="h-10 backdrop-grayscale" alt=""></li>
            <li><img src="{{asset('images/Traveloka-Logo-Vector.svg-.png')}}" class="h-10 backdrop-grayscale" alt=""></li>
            <li><img src="{{asset('images/TripAdvisor_Logo.svg')}}" class="h-10 backdrop-grayscale" alt=""></li>
            <li><img src="{{asset('images/Airbnb_Logo_Bélo.svg')}}" class="h-10 backdrop-grayscale" alt=""></li>
            <li><img src="{{asset('images/garuda-indonesia.svg')}}" class="h-10 backdrop-grayscale" alt=""></li>
            <li><img src="{{asset('images/All_Nippon_Airways_Logo.svg.png')}}" class="h-10 backdrop-grayscale" alt=""></li>
    
        </ul>
    </div>
</div>

<div class="mx-12 lg:mx-36 my-28">
    <div class="cta-card w-full rounded-xl h-60 px-14 flex flex-col justify-center gap-5 relative">
        <div class="absolute w-full h-full bg-primary-500 left-0 top-0 rounded-xl opacity-60">

        </div>
        <div class="flex flex-col gap-5 z-10">
            <h1 class="text-3xl text-white">Rasakan pengalaman menginap terbaik bersama kami</h1>
            <a href="#" class="text-lg px-8 rounded-full bg-white text-primary-500 py-4 w-fit">Pesan sekarang!</a>
        </div>
    </div>
</div>

<footer class="w-screen bg-primary-100 flex  justify-between px-12 lg:px-36 py-14">
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


        const roomButtonLeft = document.getElementById('roomButtonLeft');
        const roomButtonRight = document.getElementById('roomButtonRight');
        const roomsContainer = document.getElementById('roomsContainer');

        roomButtonLeft.addEventListener('click', function() {
            roomsContainer.scrollLeft -= 250;
            roomsContainer.style.transition = 'all 0.4s ease';
        });
        
        roomButtonRight.addEventListener('click', function() {
            roomsContainer.scrollLeft += 250;
            roomsContainer.style.transition = 'all 0.4s ease';
        });
    </script>
@endpush