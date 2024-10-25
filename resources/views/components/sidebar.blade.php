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

    <div class="items-center block w-auto max-h-screen overflow-auto grow basis-full">
    <ul class="flex flex-col pl-0 mb-0">
        <li class="mt-0.5 w-full">
            <a class="py-2.7 text-primary-700  text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap rounded-lg px-4 font-mediumtransition-colors transition-all hover:bg-primary-500 hover:text-white {{Route::is('admin.dashboard') ? 'bg-primary-500 text-white' : ''}}" href="{{route('admin.dashboard')}}">
                <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                <i class="relative top-0 text-sm leading-normal ni ni-tv-2"></i>
                </div>
                <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Dashboard</span>
            </a>
        </li>
        @role('admin')
            <li class="mt-0.5 w-full">  
                <a class=" py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center rounded-lg px-4 text-slate-700 transition-colors" href="#">
                    <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                        <i class="relative top-0 text-base leading-normal bi bi-door-open"></i>
                    </div>
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Room</span>
                </a>
            </li>

            <li class="mt-0.5 w-full">  
                <a class=" py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center rounded-lg px-4 text-slate-700 transition-colors" href="#">
                    <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                        <i class="relative top-0 text-base leading-normal bi bi-percent"></i>
                    </div>
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Promos</span>
                </a>
            </li>
            
            <li class="mt-0.5 w-full">
                <a class="  py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors" href="./pages/billing.html">
                    <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center fill-current stroke-0 text-center xl:p-2.5">
                        <i class="relative top-0 text-sm leading-normal ni ni-credit-card"></i>
                    </div>
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">History Transaction</span>
                </a>
            </li>
            
            <li class="mt-0.5 w-full">
                <a class="py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors" href="./pages/sign-up.html">
                    <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                        <i class="relative top-0 text-sm leading-normal ni ni-collection"></i>
                    </div>
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Manage Reports</span>
                </a>
            </li>
            
            <li class="mt-0.5 w-full">  
                <a class=" py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center rounded-lg px-4 text-slate-700 transition-colors" href="#">
                    <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                        <i class="relative top-0 text-base leading-normal bi bi-sliders"></i>
                    </div>
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Manage Sites</span>
                </a>
            </li>
        
            <li class="w-full mt-4">
                <h6 class="pl-6 ml-2 text-xs font-bold leading-tight uppercase opacity-60">Account pages</h6>
            </li>
            
            <li class="mt-0.5 w-full">
                <a class="py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors" href="{{route('profile.edit')}}">
                    <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                        <i class="relative top-0 text-sm leading-normal text-slate-700 ni ni-single-02"></i>
                    </div>
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Profile</span>
                </a>
            </li>
        @endrole

        @role('user')
            <li class="mt-0.5 w-full">  
                <a class=" py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center rounded-lg px-4 text-slate-700 transition-colors" href="#">
                    <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                        <i class="relative top-0 text-base leading-normal bi bi-door-open"></i>
                    </div>
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Bookings</span>
                </a>
            </li>

            <li class="mt-0.5 w-full">  
                <a class=" py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center rounded-lg px-4 text-slate-700 transition-colors" href="#">
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
                <a class="py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors" href="{{route('profile.edit')}}">
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
            <button class=" py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap rounded-lg px-4 text-slate-700 transition-colors">
              <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                <i class="relative top-0 text-lg leading-normal bi bi-box-arrow-right"></i>
              </div>
              <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Logout</span>
            </button>
          </form>
        </li>
    </ul>
</aside>