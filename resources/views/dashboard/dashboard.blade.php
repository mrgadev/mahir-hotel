@extends('layouts.dahboard_layout')

@section('title', 'Home')

@section('breadcrumbs')
    <ol class="flex flex-wrap pt-1 mr-12 bg-transparent text-white rounded-lg sm:mr-16">
            <li class="text-sm leading-normal">
            <a class="text-white opacity-90" href="javascript:;">Pages</a>
            </li>
            <li class="text-sm pl-2 text-white capitalize leading-normal  before:float-left before:pr-2 before: before:content-['/']" aria-current="page">Dashboard</li>
        </ol>
    <h6 class="mb-0 font-bold text-white capitalize">Dashboard</h6>
@endsection

@section('content')
    <h1 class="w-full p-6 text-white text-4xl font-medium">
        Halo, {{Auth::user()->name}}
    </h1>
    <div class="w-full px-6 py-6 mx-auto">
        @role(['admin|staff'])
        <!-- row 1 -->
        <div class="flex flex-wrap -mx-3">
            <!-- card1 -->
            <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
                <div class="relative flex flex-col min-w-0 break-words bg-white shadow-xl rounded-2xl bg-clip-border">
                <div class="flex-auto p-4">
                    <div class="flex flex-row -mx-3">
                    <div class="flex-none w-2/3 max-w-full px-3">
                        <div>
                        <p class="mb-0 font-sans text-sm font-semibold leading-normal uppercase">Jumlah Kamar</p>
                        <h5 class="mb-2 font-semibold text-xl">2000</h5>
                        {{-- <p class="mb-0">
                            <span class="text-sm font-bold leading-normal text-emerald-500">+55%</span>
                            since yesterday
                        </p> --}}
                        </div>
                    </div>
                    <div class="px-3 text-right basis-1/3">
                        <div class="inline-flex items-center justify-center w-12 h-12 rounded-circle border-2 border-[#976033]">
                            <span class="material-symbols-rounded text-primary-500">bed</span>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>

            <!-- card2 -->
            <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
                <div class="relative flex flex-col min-w-0 break-words bg-white shadow-xl rounded-2xl bg-clip-border">
                <div class="flex-auto p-4">
                    <div class="flex flex-row -mx-3">
                    <div class="flex-none w-2/3 max-w-full px-3">
                        <div>
                        <p class="mb-0 font-sans text-sm font-semibold leading-normal uppercase">Jumlah Reservasi</p>
                        <h5 class="mb-2 font-semibold text-xl">175</h5>
                        </div>
                    </div>
                    <div class="px-3 text-right basis-1/3">
                        <div class="inline-flex items-center justify-center w-12 h-12 rounded-circle  border-2 border-[#976033]">
                            <span class="material-symbols-rounded text-primary-500">confirmation_number</span>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>

            <!-- card3 -->
            <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
                <div class="relative flex flex-col min-w-0 break-words bg-white shadow-xl rounded-2xl bg-clip-border">
                <div class="flex-auto p-4">
                    <div class="flex flex-row -mx-3">
                    <div class="flex-none w-2/3 max-w-full px-3">
                        <div>
                        <p class="mb-0 font-sans text-sm font-semibold leading-normal uppercase">Total Pendapatan</p>
                        <h5 class="mb-2 font-semibold text-xl">Rp. 17.500.000</h5>
                        </div>
                    </div>
                    <div class="px-3 text-right basis-1/3">
                        <div class="inline-flex items-center justify-center w-12 h-12 rounded-circle  border-2 border-[#976033]">
                            <span class="material-symbols-rounded text-primary-500">payments</span>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>

            <!-- card4 -->
            <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
                <div class="relative flex flex-col min-w-0 break-words bg-white shadow-xl rounded-2xl bg-clip-border">
                <div class="flex-auto p-4">
                    <div class="flex flex-row -mx-3">
                    <div class="flex-none w-2/3 max-w-full px-3">
                        <div>
                        <p class="mb-0 font-sans text-sm font-semibold leading-normal uppercase">Total Check-in</p>
                        <h5 class="mb-2 font-semibold text-xl">200</h5>
                        </div>
                    </div>
                    <div class="px-3 text-right basis-1/3">
                        <div class="inline-flex items-center justify-center w-12 h-12 rounded-circle  border-2 border-[#976033]">
                            <span class="material-symbols-rounded text-primary-500">event_available</span>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
        </div>

        <!-- cards row 2 -->
        <div class="flex flex-wrap mt-6 -mx-3">
            <div class="w-full px-3 lg:w-5/12 lg:flex-none">
                <div slider class="bg-white w-full h-full overflow-hidden rounded-2xl shadow-xl">
                    <div class="p-6 flex flex-col gap-5">
                        <h6>Ketersediaan Kamar</h6>
                        <div class="flex items-center gap-2 w-full">
                            <div class="w- h-10 relative bg-primary-700"></div>
                            {{-- <div class="w- h-10 relative bg-primary-700"></div> --}}
                            {{-- <div class="w-2/7 h-10 relative bg-primary-700"></div> --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full max-w-full px-3 mt-0 lg:w-7/12 lg:flex-none">
                <div class="border-black/12.5 shadow-xl relative z-20 flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border">
                <div class="border-black/12.5 mb-0 rounded-t-2xl border-b-0 border-solid p-6 pt-4 pb-0">
                    <h6 class="capitalize">Total Pendapatan</h6>
                    <p class="mb-0 text-sm leading-normal">
                    <i class="fa fa-arrow-up text-emerald-500"></i>
                    <span class="font-semibold">4% more</span> in 2021
                    </p>
                </div>
                <div class="flex-auto p-4">
                    <div>
                    <canvas id="chart-line" height="300"></canvas>
                    </div>
                </div>
                </div>
            </div>

        </div>

        <!-- cards row 3 -->

        <div class="flex flex-wrap mt-6 -mx-3">
            <div class="w-full max-w-full px-3 mt-0 mb-6 lg:mb-0 lg:w-7/12 lg:flex-none">
                <div class="relative flex flex-col min-w-0 break-words bg-white border-0 border-solid shadow-xl border-black-125 rounded-2xl bg-clip-border">
                <div class="p-4 pb-0 mb-0 rounded-t-4">
                    <div class="flex justify-between">
                    <h6 class="mb-2">Reservasi</h6>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="items-center w-full mb-4 align-top border-collapse border-gray-200">
                    <tbody>
                        <tr>
                        <td class="p-2 align-middle bg-transparent border-b w-3/10 whitespace-nowrap">
                            <div class="flex items-center px-2 py-1">
                            <div>
                                <img src="/assets/img/icons/flags/US.png" alt="Country flag" />
                            </div>
                            <div class="ml-6">
                                <p class="mb-0 text-xs font-semibold leading-tight">Country:</p>
                                <h6 class="mb-0 text-sm leading-normal">United States</h6>
                            </div>
                            </div>
                        </td>
                        <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap">
                            <div class="text-center">
                            <p class="mb-0 text-xs font-semibold leading-tight">Sales:</p>
                            <h6 class="mb-0 text-sm leading-normal">2500</h6>
                            </div>
                        </td>
                        <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap">
                            <div class="text-center">
                            <p class="mb-0 text-xs font-semibold leading-tight">Value:</p>
                            <h6 class="mb-0 text-sm leading-normal">$230,900</h6>
                            </div>
                        </td>
                        <td class="p-2 text-sm leading-normal align-middle bg-transparent border-b whitespace-nowrap">
                            <div class="flex-1 text-center">
                            <p class="mb-0 text-xs font-semibold leading-tight">Bounce:</p>
                            <h6 class="mb-0 text-sm leading-normal">29.9%</h6>
                            </div>
                        </td>
                        </tr>
                        <tr>
                        <td class="p-2 align-middle bg-transparent border-b w-3/10 whitespace-nowrap">
                            <div class="flex items-center px-2 py-1">
                            <div>
                                <img src="/assets/img/icons/flags/DE.png" alt="Country flag" />
                            </div>
                            <div class="ml-6">
                                <p class="mb-0 text-xs font-semibold leading-tight">Country:</p>
                                <h6 class="mb-0 text-sm leading-normal">Germany</h6>
                            </div>
                            </div>
                        </td>
                        <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap">
                            <div class="text-center">
                            <p class="mb-0 text-xs font-semibold leading-tight">Sales:</p>
                            <h6 class="mb-0 text-sm leading-normal">3.900</h6>
                            </div>
                        </td>
                        <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap">
                            <div class="text-center">
                            <p class="mb-0 text-xs font-semibold leading-tight">Value:</p>
                            <h6 class="mb-0 text-sm leading-normal">$440,000</h6>
                            </div>
                        </td>
                        <td class="p-2 text-sm leading-normal align-middle bg-transparent border-b whitespace-nowrap">
                            <div class="flex-1 text-center">
                            <p class="mb-0 text-xs font-semibold leading-tight">Bounce:</p>
                            <h6 class="mb-0 text-sm leading-normal">40.22%</h6>
                            </div>
                        </td>
                        </tr>
                        <tr>
                        <td class="p-2 align-middle bg-transparent border-b w-3/10 whitespace-nowrap">
                            <div class="flex items-center px-2 py-1">
                            <div>
                                <img src="/assets/img/icons/flags/GB.png" alt="Country flag" />
                            </div>
                            <div class="ml-6">
                                <p class="mb-0 text-xs font-semibold leading-tight">Country:</p>
                                <h6 class="mb-0 text-sm leading-normal">Great Britain</h6>
                            </div>
                            </div>
                        </td>
                        <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap">
                            <div class="text-center">
                            <p class="mb-0 text-xs font-semibold leading-tight">Sales:</p>
                            <h6 class="mb-0 text-sm leading-normal">1.400</h6>
                            </div>
                        </td>
                        <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap">
                            <div class="text-center">
                            <p class="mb-0 text-xs font-semibold leading-tight">Value:</p>
                            <h6 class="mb-0 text-sm leading-normal">$190,700</h6>
                            </div>
                        </td>
                        <td class="p-2 text-sm leading-normal align-middle bg-transparent border-b whitespace-nowrap">
                            <div class="flex-1 text-center">
                            <p class="mb-0 text-xs font-semibold leading-tight">Bounce:</p>
                            <h6 class="mb-0 text-sm leading-normal">23.44%</h6>
                            </div>
                        </td>
                        </tr>
                        <tr>
                        <td class="p-2 align-middle bg-transparent border-0 w-3/10 whitespace-nowrap">
                            <div class="flex items-center px-2 py-1">
                            <div>
                                <img src="/assets/img/icons/flags/BR.png" alt="Country flag" />
                            </div>
                            <div class="ml-6">
                                <p class="mb-0 text-xs font-semibold leading-tight">Country:</p>
                                <h6 class="mb-0 text-sm leading-normal">Brasil</h6>
                            </div>
                            </div>
                        </td>
                        <td class="p-2 align-middle bg-transparent border-0 whitespace-nowrap">
                            <div class="text-center">
                            <p class="mb-0 text-xs font-semibold leading-tight">Sales:</p>
                            <h6 class="mb-0 text-sm leading-normal">562</h6>
                            </div>
                        </td>
                        <td class="p-2 align-middle bg-transparent border-0 whitespace-nowrap">
                            <div class="text-center">
                            <p class="mb-0 text-xs font-semibold leading-tight">Value:</p>
                            <h6 class="mb-0 text-sm leading-normal">$143,960</h6>
                            </div>
                        </td>
                        <td class="p-2 text-sm leading-normal align-middle bg-transparent border-0 whitespace-nowrap">
                            <div class="flex-1 text-center">
                            <p class="mb-0 text-xs font-semibold leading-tight">Bounce:</p>
                            <h6 class="mb-0 text-sm leading-normal">32.14%</h6>
                            </div>
                        </td>
                        </tr>
                    </tbody>
                    </table>
                </div>
                </div>
            </div>
            <div class="w-full max-w-full px-3 mt-0 lg:w-5/12 lg:flex-none">
                <div class="border-black/12.5 shadow-xl relative flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border">
                <div class="p-4 pb-0 rounded-t-4">
                    <h6 class="mb-0">Keseluruhan Rating</h6>
                </div>
                <div class="flex-auto p-4">
                    <ul class="flex flex-col pl-0 mb-0 rounded-lg">
                    <li class="relative flex justify-between py-2 pr-4 mb-2 border-0 rounded-t-lg rounded-xl text-inherit">
                        <div class="flex items-center">
                        <div class="inline-block w-8 h-8 mr-4 text-center text-black bg-center shadow-sm fill-current stroke-none bg-gradient-to-tl from-zinc-800 to-zinc-700 rounded-xl">
                            <i class="text-white ni ni-mobile-button relative top-0.75 text-xxs"></i>
                        </div>
                        <div class="flex flex-col">
                            <h6 class="mb-1 text-sm leading-normal text-slate-700">Devices</h6>
                            <span class="text-xs leading-tight">250 in stock, <span class="font-semibold">346+ sold</span></span>
                        </div>
                        </div>
                        <div class="flex">
                        <button class="group ease-in leading-pro text-xs rounded-3.5xl p-1.2 h-6.5 w-6.5 mx-0 my-auto inline-block cursor-pointer border-0 bg-transparent text-center align-middle font-bold text-slate-700 shadow-none transition-all"><i class="ni ease-bounce text-2xs group-hover:translate-x-1.25 ni-bold-right transition-all duration-200" aria-hidden="true"></i></button>
                        </div>
                    </li>
                    <li class="relative flex justify-between py-2 pr-4 mb-2 border-0 rounded-xl text-inherit">
                        <div class="flex items-center">
                        <div class="inline-block w-8 h-8 mr-4 text-center text-black bg-center shadow-sm fill-current stroke-none bg-gradient-to-tl from-zinc-800 to-zinc-700 rounded-xl">
                            <i class="text-white ni ni-tag relative top-0.75 text-xxs"></i>
                        </div>
                        <div class="flex flex-col">
                            <h6 class="mb-1 text-sm leading-normal text-slate-700">Tickets</h6>
                            <span class="text-xs leading-tight">123 closed, <span class="font-semibold">15 open</span></span>
                        </div>
                        </div>
                        <div class="flex">
                        <button class="group ease-in leading-pro text-xs rounded-3.5xl p-1.2 h-6.5 w-6.5 mx-0 my-auto inline-block cursor-pointer border-0 bg-transparent text-center align-middle font-bold text-slate-700 shadow-none transition-all"><i class="ni ease-bounce text-2xs group-hover:translate-x-1.25 ni-bold-right transition-all duration-200" aria-hidden="true"></i></button>
                        </div>
                    </li>
                    <li class="relative flex justify-between py-2 pr-4 mb-2 border-0 rounded-b-lg rounded-xl text-inherit">
                        <div class="flex items-center">
                        <div class="inline-block w-8 h-8 mr-4 text-center text-black bg-center shadow-sm fill-current stroke-none bg-gradient-to-tl from-zinc-800 to-zinc-700 rounded-xl">
                            <i class="text-white ni ni-box-2 relative top-0.75 text-xxs"></i>
                        </div>
                        <div class="flex flex-col">
                            <h6 class="mb-1 text-sm leading-normal text-slate-700">Error logs</h6>
                            <span class="text-xs leading-tight">1 is active, <span class="font-semibold">40 closed</span></span>
                        </div>
                        </div>
                        <div class="flex">
                        <button class="group ease-in leading-pro text-xs rounded-3.5xl p-1.2 h-6.5 w-6.5 mx-0 my-auto inline-block cursor-pointer border-0 bg-transparent text-center align-middle font-bold text-slate-700 shadow-none transition-all"><i class="ni ease-bounce text-2xs group-hover:translate-x-1.25 ni-bold-right transition-all duration-200" aria-hidden="true"></i></button>
                        </div>
                    </li>
                    <li class="relative flex justify-between py-2 pr-4 border-0 rounded-b-lg rounded-xl text-inherit">
                        <div class="flex items-center">
                        <div class="inline-block w-8 h-8 mr-4 text-center text-black bg-center shadow-sm fill-current stroke-none bg-gradient-to-tl from-zinc-800 to-zinc-700 rounded-xl">
                            <i class="text-white ni ni-satisfied relative top-0.75 text-xxs"></i>
                        </div>
                        <div class="flex flex-col">
                            <h6 class="mb-1 text-sm leading-normal text-slate-700">Happy users</h6>
                            <span class="text-xs leading-tight"><span class="font-semibold">+ 430 </span></span>
                        </div>
                        </div>
                        <div class="flex">
                        <button class="group ease-in leading-pro text-xs rounded-3.5xl p-1.2 h-6.5 w-6.5 mx-0 my-auto inline-block cursor-pointer border-0 bg-transparent text-center align-middle font-bold text-slate-700 shadow-none transition-all"><i class="ni ease-bounce text-2xs group-hover:translate-x-1.25 ni-bold-right transition-all duration-200" aria-hidden="true"></i></button>
                        </div>
                    </li>
                    </ul>
                </div>
                </div>
            </div>
        </div>

        {{-- Card Row #4 --}}
        <div class="flex flex-wrap mt-6 -mx-3">
            <div class="w-full px-3 mt-0 mb-6 lg:mb-0">
                <div class="relative flex flex-col min-w-0 break-words bg-white border-0 border-solid shadow-xl border-black-125 rounded-2xl bg-clip-border p-6">
                    {{-- <table id="selection-table" class="">
                        <thead>
                            <tr>
                                <th>
                                    <span class="flex items-center">
                                        No
                                        <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                                        </svg>
                                    </span>
                                </th>
                                <th>
                                    <span class="flex items-center">
                                        image
                                        <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                                        </svg>
                                    </span>
                                </th>
                                <th>
                                    <span class="flex items-center">
                                        Name
                                        <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                                        </svg>
                                    </span>
                                </th>
                                <th class="flex items-center">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                                <tr class="cursor-pointer">
                                    <td class="font-medium text-gray-900 whitespace-nowrap"></td>
                                    <td class="">
                                        <img src="" alt="" class=" w-10 object-cover object-top transition duration-500 mb-2">
                                    </td>
                                    <td class="font-medium text-gray-900 whitespace-nowrap">/td>
                                    <td class="flex items-center">
                                        <div class="mr-2">
                                            <a href="" class="py-2 px-2 border-2 rounded-md border-primary-600 text-primary-500 text-center transition-all hover:bg-primary-500 hover:text-white">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                        </div>
                                        <form action="" class="" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button tyoe="submit" class="py-1 px-2 border-2 rounded-md border-red-600 text-red-600 text-center transition-all hover:bg-red-600 hover:text-white">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                        </tbody>
                    </table> --}}
                </div>                    
            </div>
        </div>
        @endrole

        @role('user')
        {{-- #1 Row for USer --}}
        <div class="grid lg:grid-cols-2 gap-5">
            <div class="bg-white rounded-2xl shadow-xl p-5">
                <h3 class="text-xl text-primary-600 font-medium">My Wallet</h3>
                <div class="grid lg:grid-cols-2 gap-5 mt-5">
                    <div class="bg-primary-100 p-5 border border-primary-700 text-primary-700 flex items-center gap-5 rounded-lg">
                        <span class="material-symbols-rounded scale-150">toll</span>
                        <div class="flex flex-col">
                            <p class="text-sm">Point Terkumpul</p>
                            <p class="font-medium text-lg">200</p>
                        </div>
                    </div>
                    <div class="bg-primary-100 p-5 border border-primary-700 text-primary-700 flex items-center gap-5 rounded-lg">
                        <span class="material-symbols-rounded scale-150">wallet</span>
                        <div class="flex flex-col">
                            <p class="text-sm">Saldoku</p>
                            <p class="font-medium text-lg">IDR 200.000</p>
                        </div>
                    </div>

                
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-xl p-5">
                <h3 class="font-medium text-lg text-primary-700">Reservasi Berikutnya</h3>
                <a href="{{route('dashboard.user.bookings.detail', $transaction->invoice)}}" class="flex gap-5 mt-5">
                    <img src="https://images.unsplash.com/photo-1522771739844-6a9f6d5f14af?q=80&w=2071&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="" class="h-24 rounded-lg">
                    <div class="flex flex-col gap-1">
                        @php
                            $nights = date_diff(date_create($transaction->check_in), date_create($transaction->check_out))->format("%a");
                        @endphp
                        <p class="text-sm text-primary-500">Order ID: {{$transaction->invoice}}</p>
                        <p class="font-medium text-primary-700 text-base">{{$transaction->room->name}} ({{$nights}} Malam)</p>
                        <div class="flex items-center gap-3">
                            <div class="flex items-center gap-0.5 text-sm">
                                <span class="material-symbols-rounded scale-75">event</span>
                                <p>{{Carbon\Carbon::parse($transaction->check_in)->isoFormat('dddd, D MMM YYYY')}} - {{Carbon\Carbon::parse($transaction->check_out)->isoFormat('dddd, D MMM YYYY')}}</p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        @endrole
    </div>
@endsection

@push('addon-script')
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@9.0.3"></script>
<script>
    if (document.getElementById("selection-table") && typeof simpleDatatables.DataTable !== 'undefined') {
        let multiSelect = true;
        let rowNavigation = false;
        let table = null;

        const resetTable = function() {
            if (table) {
                table.destroy();
            }

            const options = {
                rowRender: (row, tr, _index) => {
                    if (!tr.attributes) {
                        tr.attributes = {};
                    }
                    if (!tr.attributes.class) {
                        tr.attributes.class = "";
                    }
                    if (row.selected) {
                        tr.attributes.class += " selected";
                    } else {
                        tr.attributes.class = tr.attributes.class.replace(" selected", "");
                    }
                    return tr;
                }
            };
            if (rowNavigation) {
                options.rowNavigation = true;
                options.tabIndex = 1;
            }

            table = new simpleDatatables.DataTable("#selection-table", options);

            // Mark all rows as unselected
            table.data.data.forEach(data => {
                data.selected = false;
            });

            table.on("datatable.selectrow", (rowIndex, event) => {
                event.preventDefault();
                const row = table.data.data[rowIndex];
                if (row.selected) {
                    row.selected = false;
                } else {
                    if (!multiSelect) {
                        table.data.data.forEach(data => {
                            data.selected = false;
                        });
                    }
                    row.selected = true;
                }
                table.update();
            });
        };

        // Row navigation makes no sense on mobile, so we deactivate it and hide the checkbox.
        const isMobile = window.matchMedia("(any-pointer:coarse)").matches;
        if (isMobile) {
            rowNavigation = false;
        }

        resetTable();
    }
</script>
@endpush