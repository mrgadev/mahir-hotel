@extends('layouts.frontpage')
@push('addons-style')
@vite('resources/css/app.css')
<script src="https://cdn.tailwindcss.com"></script>
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
<nav class="fixed w-full px-12 lg:px-36 z-20 bg-white border-b border-primary-300 duration-500 transition-all flex items-center justify-between py-6 text-primary-500" id="mainNavbar">
    <p class="text-lg font-medium">Mahir Hotel</p>
    <div class="lg:flex gap-8 font-light hidden">
        <a href="{{route('frontpage.index')}}" class="hover:font-medium {{(Route::is('frontpage.index') ? 'font-medium' : '')}}">Beranda</a>
        <a href="{{route('frontpage.promo')}}" class="hover:font-medium {{(Route::is('frontpage.promo') ? 'font-medium' : '')}}">Promo</a>
        <a href="#" class="hover:font-medium">Layanan Lainnya </a>
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
        <p class="text-lg font-medium">Mahir Hotel</p>
        <span class="material-symbols-rounded cursor-pointer" id="closeMobileMenu">close</span>
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

<header>
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
</header>

<section class="md:px-24 sm:px-0 pt-3 bg-white antialiase">
    <form action="#" class="mx-auto max-w-screen-xl px-12 2xl:px-0">
    <div class="mt-6 sm:mt-8 lg:flex lg:items-start lg:gap-12 xl:gap-16">
      <div class="min-w-0 flex-1 space-y-8">
        <div class="space-y-4">
          <h2 class="text-xl font-semibold text-gray-900">Delivery Details</h2>
            <div>
              <label for="your_name" class="mb-2 block text-sm font-medium text-gray-900"> Your name </label>
              <input type="text" id="your_name" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500" placeholder="Bonnie Green" required autocomplete="off" />
            </div>
        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
            <div>
              <label for="your_email" class="mb-2 block text-sm font-medium text-gray-900"> Your email* </label>
              <input type="email" id="your_email" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500" placeholder="name@gmail.com" required autocomplete="off" />
            </div>

            <div>
                <label for="phone-input-3" class="mb-2 block text-sm font-medium text-gray-900"> Phone Number </label>
                <input type="text" id="phone-input" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500" type="number" placeholder="123-456-7890" required autocomplete="off" />
            </div>

            <div class="sm:col-span-2">
              <button type="submit" class="flex w-full items-center justify-center gap-2 rounded-lg border border-gray-200 bg-white px-5 py-2.5 text-sm font-medium text-gray-900 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-100">
                <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-7 7V5" />
                </svg>
                Add new address
              </button>
            </div>
          </div>
        </div>

        <div class="space-y-4">
            <h3 class="text-xl font-semibold text-gray-900">Rencana Penginapan</h3>

            <div class="grid grid-cols-1 gap-4 md:grid-cols-3">
                <div class="rounded-lg border border-gray-200 bg-gray-50 p-4 ps-4">
                <div class="flex items-start">
                    <div class="flex h-5 items-center">
                    <input id="spa" aria-describedby="spa-text" type="checkbox" name="stay-plan[]" value="spa" class="h-4 w-4 border-gray-300 bg-white text-primary-600 rounded-md focus:ring-2 focus:ring-primary-600" />
                    </div>

                    <div class="ms-4 text-sm">
                    <label for="spa" class="font-medium leading-none text-gray-900">$15 - Spa dan Kebugaran</label>
                    <p id="spa-text" class="mt-1 text-xs font-normal text-gray-500">Get it by Tomorrow</p>
                    </div>
                </div>
                </div>

                <div class="rounded-lg border border-gray-200 bg-gray-50 p-4 ps-4">
                <div class="flex items-start">
                    <div class="flex h-5 items-center">
                    <input id="airport" aria-describedby="airport-text" type="checkbox" name="stay-plan[]" value="airport-pickup" class="h-4 w-4 border-gray-300 bg-white text-primary-600 rounded-md focus:ring-2 focus:ring-primary-600" />
                    </div>

                    <div class="ms-4 text-sm">
                    <label for="airport" class="font-medium leading-none text-gray-900">$100 - Penjemputan Di Bandara</label>
                    <p id="airport-text" class="mt-1 text-xs font-normal text-gray-500">Get it by Friday, 13 Dec 2023</p>
                    </div>
                </div>
                </div>

                <div class="rounded-lg border border-gray-200 bg-gray-50 p-4 ps-4">
                <div class="flex items-start">
                    <div class="flex h-5 items-center">
                    <input id="laundry" aria-describedby="laundry-text" type="checkbox" name="stay-plan[]" value="laundry" class="h-4 w-4 border-gray-300 bg-white text-primary-600 rounded-md focus:ring-2 focus:ring-primary-600" />
                    </div>

                    <div class="ms-4 text-sm">
                    <label for="laundry" class="font-medium leading-none text-gray-900">$49 - Laundry</label>
                    <p id="laundry-text" class="mt-1 text-xs font-normal text-gray-500">Get it today</p>
                    </div>
                </div>
                </div>
            </div>
        </div>



        <div>
          <label for="voucher" class="mb-2 block text-sm font-medium text-gray-900"> Enter a gift card, voucher or promotional code </label>
          <div class="flex max-w-md items-center gap-4">
            <input type="text" id="voucher" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500" placeholder="" required />
            <button type="button" class="flex items-center justify-center rounded-lg bg-primary-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-primary-800 focus:outline-none focus:ring-4 focus:ring-primary-300">Apply</button>
          </div>
        </div>
      </div>

      <div class="mt-6 w-full space-y-6 rounded-t-lg shadow-lg sm:mt-8 lg:mt-0 lg:max-w-xs xl:max-w-md mb-10">
        <div class="flow-root">
            <div class="relative flex h-56 w-auto cursor-pointer">
                <a href="#image-modal" class="block w-full">
                    <img
                    class="h-full w-full object-cover object-center rounded-t-xl"
                    src="https://plus.unsplash.com/premium_photo-1684445035187-c4bc7c96bc5d?q=80&w=1374&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                    />
                </a>
            </div>

            <!-- Modal -->
            <div id="image-modal" class="fixed inset-0 z-50 bg-black bg-opacity-60 backdrop-blur-sm opacity-0 pointer-events-none transition-opacity duration-300 target:opacity-100 target:pointer-events-auto">
                <!-- Link pembungkus untuk close saat klik anywhere -->
                <a href="#" class="fixed inset-0 flex items-center justify-center p-4">
                    <div class="relative max-w-3xl mx-auto" onclick="event.stopPropagation()">
                        <div>
                            <img
                                class="w-full max-h-[80vh] object-contain"
                                src="https://plus.unsplash.com/premium_photo-1684445035187-c4bc7c96bc5d?q=80&w=1374&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                            />
                        </div>
                    </div>
                </a>
            </div>

            <div class="p-5">
                <h3 class=" mt-5 text-xl font-semibold text-gray-900 mb-2">The Sawangan, Junior Suite, 1 King or 2 Queen, Balcony</h3>
                <div class="items-center justify-between gap-4 py-3 mt-3">
                    <p class="text-base font-light text-gray-900 mb-2">Wed, Oct 23, 2024 - Thu, Oct 24, 2024</p>
                </div>
            </div>
            <div class="-my-3 px-5 divide-y divide-gray-200">
                <dl class="flex flex-col gap-4 py-3">
                    <div class="text-left">
                        <dt class="text-base font-normal text-gray-500">Total Kasur </dt>
                    </div>
                    <div class="flex items-center justify-between gap-4">
                        <dd class="text-base font-light text-gray-500">Double Bed</dd>
                        <dd class="text-base font-medium text-gray-900">1</dd>
                    </div>
                </dl>

                <dl class="flex flex-col gap-4 py-3">
                    <div class="text-left">
                        <dt class="text-base font-normal text-gray-500">Total Tamu </dt>
                    </div>
                    <div class="flex items-center justify-between gap-4">
                        <dd class="text-base font-light text-gray-500">Dewasa</dd>
                        <dd class="text-base font-medium text-gray-900">2</dd>
                    </div>
                    <div class="flex items-center justify-between gap-4">
                        <dd class="text-base font-light text-gray-500">Anak</dd>
                        <dd class="text-base font-medium text-gray-900">1</dd>
                    </div>
                </dl>

                <dl class="flex items-center justify-between gap-4 py-3">
                    <dt class="text-base font-normal text-gray-500">Total Harga Kamar</dt>
                    <div>
                        <dd class="text-base font-medium text-gray-900">$8,094.00</dd>
                    </div>
                </dl>

                <dl class="flex flex-col gap-4 py-3">
                    <div class="text-left">
                        <dt class="text-base font-normal text-gray-500">Rencana Penginapan</dt>
                    </div>
                    <div class="flex items-center justify-between gap-4">
                        <dd class="text-base font-light text-gray-500">Spa dan Kebugaran</dd>
                        <dd class="text-base font-medium text-gray-900">$15</dd>
                    </div>
                    <div class="flex items-center justify-between gap-4">
                        <dd class="text-base font-light text-gray-500">Laundry</dd>
                        <dd class="text-base font-medium text-gray-900">$49</dd>
                    </div>
                </dl>

                <dl class="flex items-center justify-between gap-4 py-3">
                    <dt class="text-base font-normal text-gray-500">Diskon</dt>
                    <div>
                        <dd class="text-base font-medium text-green-500">0</dd>
                    </div>
                </dl>

                <dl class="flex items-center justify-between gap-4 py-3">
                    <dt class="text-base font-normal text-gray-500">Pajak</dt>
                    <div>
                        <dd class="text-base font-medium text-gray-900">$199</dd>
                    </div>
                </dl>

                <dl class="flex items-center justify-between gap-4 py-3">
                    <dt class="text-base font-bold text-gray-900">Total</dt>
                    <div>
                        <dd class="text-base font-bold text-gray-900">$8,392.00</dd>
                    </div>
                </dl>
            </div>
        </div>

        <div class="space-y-3 p-5">
          <button type="submit" class="flex w-full items-center bg-[#5b3a1f] justify-center rounded-lg px-5 py-2.5 text-sm font-medium text-white" style="background-color: #5b3a1f">Proceed to Payment</button>

          <p class="text-sm font-normal text-gray-500 pb-5">One or more items in your cart require an account. <a href="#" title="" class="font-medium text-primary-700 underline hover:no-underline">Sign in or create an account now.</a>.</p>
        </div>
      </div>
    </div>
  </form>
</section>

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

        window.addEventListener('scroll', function() {
            const navbar = document.getElementById('mainNavbar');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
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