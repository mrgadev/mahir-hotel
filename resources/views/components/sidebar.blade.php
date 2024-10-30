<aside class="fixed inset-y-0 flex-wrap items-center justify-between block w-full p-0 my-4 overflow-y-auto antialiased transition-transform duration-200 -translate-x-full bg-primary-100 border-2 border-primary-700 shadow-xl :shadow-none max-w-64 ease-nav-brand xl:ml-6 rounded-2xl xl:left-0 xl:translate-x-0" aria-expanded="false">
    <div class="h-19">
    <i class="absolute top-0 right-0 p-4 opacity-50 cursor-pointer fas fa-times  text-slate-400 xl:hidden" sidenav-close></i>
    <a class="block px-8 py-6 m-0 whitespace-nowrap  text-primary-700" href="https://demos.creative-tim.com/argon-dashboard-tailwind/pages/dashboard.html" target="_blank">
        <img src="/assets/img/logo-ct-dark.png" class="inline h-full max-w-full transition-all duration-200  ease-nav-brand max-h-8" alt="main_logo" />
        <img src="/assets/img/logo-ct.png" class="hidden h-full max-w-full transition-all duration-200  ease-nav-brand max-h-8" alt="main_logo" />
        <span class="ml-1 font-semibold transition-all duration-200 ease-nav-brand">Mahir Hotel</span>
    </a>
    </div>

    <hr class="h-px mt-0 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent" />

    <div class="items-center block w-auto overflow-auto grow basis-full">
        <ul class="flex flex-col pl-0 mb-0">
            <li class="mt-0.5 w-full">
                <a class="py-2.7 text-primary-700  text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap rounded-lg px-4 font-medium transition-all hover:bg-primary-500 hover:text-white {{Route::is('dashboard.home') ? 'bg-primary-500 text-white' : ''}}" href="{{route('dashboard.home')}}">
                    <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                    <i class="relative top-0 text-sm leading-normal ni ni-tv-2"></i>
                    </div>
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Beranda</span>
                </a>
            </li>
            @role('admin')
            {{-- Hotel Menu --}}
            <li class="mt-0.5 w-full">  
                <a class="py-2.7 text-primary-700  text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap rounded-lg px-4 font-medium justify-between transition-all hover:bg-primary-500 hover:text-white {{Route::is('dashboard.hotel_facilities.*') || Route::is('dashboard.nearby_location.*') || Route::is('dashboard.faq.*') ? 'bg-primary-500 text-white' : ''}}" href="#" id="hotelToggle">
                    <div class="flex items-center">
                        <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                            <i class="bi bi-buildings-fill"></i>
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Hotel</span>
                    </div>
                    <span class="material-symbols-rounded">keyboard_arrow_down</span>
                </a>
                <ul class="px-4 mx-2 flex flex-col  my-3 bg-primary-500 rounded-lg hidden" id="hotelSubmenu">
                    <li>
                        <a class="py-2.7  text-sm ease-nav-brand my-0 flex items-center whitespace-nowrap rounded-lg font-medium transition-all text-white {{Route::is('dashboard.hotel_facilities.*') ? 'font-medium' : ''}}" href="{{route('dashboard.hotel_facilities.index')}}">
                            <span class="px-2.5 ml-1 duration-300 opacity-100 pointer-events-none ease">Fasilitas Hotel</span>
                        </a>
                    </li>
                    <li>
                        <a class="py-2.7  text-sm ease-nav-brand my-0 flex items-center whitespace-nowrap rounded-lg font-medium transition-all text-white {{Route::is('dashboard.nearby_location.*') ? 'font-medium' : ''}}" href="{{route('dashboard.nearby_location.index')}}">
                            
                            <span class="px-2.5 ml-1 duration-300 opacity-100 pointer-events-none ease">Lokasi Terdekat</span>
                        </a>
                    </li>
                    <li>
                        <a class="py-2.7  text-sm ease-nav-brand my-0 flex items-center whitespace-nowrap rounded-lg font-medium transition-all text-white {{Route::is('dashboard.faq.*') ? 'font-medium' : ''}}" href="{{route('dashboard.faq.index')}}">
                            <span class="px-2.5 ml-1 duration-300 opacity-100 pointer-events-none ease">FAQ</span>
                        </a>
                    </li>
                </ul>

            </li>

            {{-- Menu Kamar --}}
            <li class="mt-0.5 w-full">  
                <a class="py-2.7 text-primary-700  text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap rounded-lg px-4 font-medium justify-between transition-all hover:bg-primary-500 hover:text-white {{Route::is('dashboard.room_facilities.*') || Route::is('dashboard.room.*') || Route::is('dashboard.accomodation_plan.*') ? 'bg-primary-500 text-white' : ''}}" href="#" id="roomToggle">
                    <div class="flex items-center">
                        <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                            <i class="relative top-0 text-base leading-normal bi bi-door-open"></i>
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Kamar</span>
                    </div>
                    <span class="material-symbols-rounded">keyboard_arrow_down</span>
                </a>
                <ul class="px-4 mx-2 flex flex-col  my-3 bg-primary-500 rounded-lg hidden" id="roomSubmenu">
                    <li>
                        <a class="py-2.7  text-sm ease-nav-brand my-0 flex items-center whitespace-nowrap rounded-lg font-medium transition-all text-white {{Route::is('dashboard.room.*') ? 'font-medium' : ''}}" href="{{route('dashboard.room.index')}}">
                            <span class="px-2.5 ml-1 duration-300 opacity-100 pointer-events-none ease">Lihat Semua</span>
                        </a>
                    </li>
                    <li>
                        <a class="py-2.7  text-sm ease-nav-brand my-0 flex items-center whitespace-nowrap rounded-lg font-medium transition-all text-white {{Route::is('dashboard.room_facilities.*') ? 'font-medium' : ''}}" href="{{route('dashboard.room_facilities.index')}}">
                            
                            <span class="px-2.5 ml-1 duration-300 opacity-100 pointer-events-none ease">Fasilitas Kamar</span>
                        </a>
                    </li>
                    <li>
                        <a class="py-2.7  text-sm ease-nav-brand my-0 flex items-center whitespace-nowrap rounded-lg font-medium  transition-all text-white {{Route::is('dashboard.accomodation_plan.*') ? 'font-medium' : ''}}" href="{{route('dashboard.accomodation_plan.index')}}">
                            
                            <span class="px-2.5 ml-1 duration-300 opacity-100 pointer-events-none ease">Rencana Penginapan</span>
                        </a>
                    </li>
                </ul>

            </li>

            {{-- Menu Layanan Lainnya --}}
            <li class="mt-0.5 w-full">  
                <a class="py-2.7 text-primary-700  text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap rounded-lg px-4 font-medium justify-between transition-all hover:bg-primary-500 hover:text-white {{Route::is('dashboard.service.*') || Route::is('dashboard.service_category.*') ? 'bg-primary-500 text-white' : ''}}" href="#" id="serviceToggle">
                    <div class="flex items-center">
                        <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                            <i class="bi bi-grid-fill"></i>
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Layanan Lainnya</span>
                    </div>
                    <span class="material-symbols-rounded">keyboard_arrow_down</span>
                </a>
                <ul class="px-4 mx-2 flex flex-col  my-3 bg-primary-500 rounded-lg hidden" id="serviceSubmenu">
                    <li>
                        <a class="py-2.7  text-sm ease-nav-brand my-0 flex items-center whitespace-nowrap rounded-lg font-medium transition-all text-white {{Route::is('dashboard.service.*') ? 'font-medium' : ''}}" href="{{route('dashboard.service.index')}}">
                            
                            <span class="px-2.5 ml-1 duration-300 opacity-100 pointer-events-none ease">Lihat Semua</span>
                        </a>
                    </li>
                    <li>
                        <a class="py-2.7  text-sm ease-nav-brand my-0 flex items-center whitespace-nowrap rounded-lg font-medium transition-all text-white {{Route::is('dashboard.service_category.*') ? 'font-medium' : ''}}" href="{{route('dashboard.service_category.index')}}">
                            
                            <span class="px-2.5 ml-1 duration-300 opacity-100 pointer-events-none ease">Kategori Layanan Lainnya</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="mt-0.5 w-full">  
                <a class="py-2.7 text-primary-700  text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap rounded-lg px-4 font-medium transition-all hover:bg-primary-500 hover:text-white {{Route::is('dashboard.promo.*') ? 'bg-primary-500 text-white' : ''}}" href="{{route('dashboard.promo.index')}}">
                    <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                        <i class="relative top-0 text-base leading-normal bi bi-percent"></i>
                    </div>
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Promo</span>
                </a>
            </li>
            
            <li class="mt-0.5 w-full">
                <a class="py-2.7 text-primary-700  text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap rounded-lg px-4 font-medium transition-all hover:bg-primary-500 hover:text-white" href="./pages/billing.html">
                    <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center fill-current stroke-0 text-center xl:p-2.5">
                        <i class="relative top-0 text-sm leading-normal ni ni-credit-card"></i>
                    </div>
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Riwayat Transaksi</span>
                </a>
            </li>
            
            <li class="mt-0.5 w-full">
                <a class="py-2.7 text-primary-700  text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap rounded-lg px-4 font-medium transition-all hover:bg-primary-500 hover:text-white" href="./pages/sign-up.html">
                    <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                        <i class="relative top-0 text-sm leading-normal ni ni-collection"></i>
                    </div>
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Laporan Keuangan</span>
                </a>
            </li>

            {{-- Menu General Settings --}}
            <li class="mt-0.5 w-full">  
                <a class="py-2.7 text-primary-700  text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap rounded-lg px-4 font-medium justify-between transition-all hover:bg-primary-500 hover:text-white {{Route::is('dashboard.users_management.*') || Route::is('dashboard.service_category.*') ? 'bg-primary-500 text-white' : ''}}" href="#" id="settingsToggle">
                    <div class="flex items-center">
                        <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                            <i class="bi bi-gear-wide-connected"></i>
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease capitalize">pengaturan umum</span>
                    </div>
                    <span class="material-symbols-rounded">keyboard_arrow_down</span>
                </a>
                <ul class="px-4 mx-2 flex flex-col  my-3 bg-primary-500 rounded-lg hidden" id="settingsMenu">
                    <li>
                        <a class="py-2.7  text-sm ease-nav-brand my-0 flex items-center whitespace-nowrap rounded-lg font-medium transition-all text-white {{Route::is('dashboard.users_management.*') ? 'font-medium' : ''}}" href="{{route('dashboard.users_management.index')}}">        
                            <span class="px-2.5 ml-1 duration-300 opacity-100 pointer-events-none ease">Kelola Pengguna</span>
                        </a>
                    </li>
                    <li>
                        <a class="py-2.7  text-sm ease-nav-brand my-0 flex items-center whitespace-nowrap rounded-lg font-medium transition-all text-white" href="">
                            <span class="px-2.5 ml-1 duration-300 opacity-100 pointer-events-none ease">Pengaturan Situs</span>
                        </a>
                    </li>
                </ul>
                </a>
            </li>

            
        
            <li class="w-full mt-4">
                <h6 class="pl-6 ml-2 text-xs font-bold leading-tight uppercase opacity-60">Account pages</h6>
            </li>
            
            <li class="mt-0.5 w-full">
                <a class="py-2.7 text-primary-700  text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap rounded-lg px-4 font-medium transition-all hover:bg-primary-500 hover:text-white" href="{{route('dashboard.profile.edit')}}">
                    <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                        <i class="relative top-0 text-sm leading-normal text-slate-700 ni ni-single-02"></i>
                    </div>
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Profile</span>
                </a>
            </li>
            @endrole

            @role('user')
                <li class="mt-0.5 w-full">  
                    <a class="py-2.7 text-primary-700  text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap rounded-lg px-4 font-medium transition-all hover:bg-primary-500 hover:text-white" href="#">
                        <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                            <i class="relative top-0 text-base leading-normal bi bi-door-open"></i>
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Bookings</span>
                    </a>
                </li>

                <li class="mt-0.5 w-full">  
                    <a class="py-2.7 text-primary-700  text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap rounded-lg px-4 font-medium transition-all hover:bg-primary-500 hover:text-white" href="#">
                        <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                            <i class="relative top-0 text-base leading-normal bi bi-clock-history"></i>
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">History</span>
                    </a>
                </li>

                <li class="w-full mt-4">
                    <h6 class="pl-6 ml-2 text-xs font-bold leading-tight uppercase opacity-60">Account pages</h6>
                </li>
                
                <li class="mt-0.5 w-full">
                    <a class="py-2.7 text-primary-700  text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap rounded-lg px-4 font-medium transition-all hover:bg-primary-500 hover:text-white" href="{{route('dashboard.profile.edit')}}">
                        <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                            <i class="relative top-0 text-sm leading-normal text-slate-700 ni ni-single-02"></i>
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Profile</span>
                    </a>
                </li>
            @endrole

            <li class="mt-0.5 w-full ">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class=" py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap rounded-lg px-4 text-slate-700 ">
                <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                    <i class="relative top-0 text-lg leading-normal bi bi-box-arrow-right"></i>
                </div>
                <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Logout</span>
                </button>
            </form>
            </li>
        </ul>
    </div>
</aside>
@push('addon-script')
    <script>
        const roomToggle = document.getElementById('roomToggle');
        const roomSubmenu = document.getElementById('roomSubmenu');

        roomToggle.addEventListener('click', function(){
            roomSubmenu.classList.toggle('hidden');
        });

        const hotelToggle = document.getElementById('hotelToggle');
        const hotelSubmenu = document.getElementById('hotelSubmenu');

        hotelToggle.addEventListener('click', function(){
            hotelSubmenu.classList.toggle('hidden');
        });

        const serviceToggle = document.getElementById('serviceToggle');
        const serviceSubmenu = document.getElementById('serviceMenu');

        serviceToggle.addEventListener('click', function(){
            serviceSubmenu.classList.toggle('hidden');
        });
        
        document.getElementById('serviceToggle').addEventListener('click', function() {
            const submenu = document.getElementById('serviceSubmenu');
            submenu.classList.toggle('hidden');
        });
    </script>
@endpush