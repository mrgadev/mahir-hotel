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
        @php
            $total_rooms = App\Models\Room::count();
            $total_reservations = App\Models\Transaction::count();
            $total_check_in = App\Models\Transaction::whereIn('checkin_status', ['Sudah'])->count();
            $total_revenue = App\Models\Transaction::where('payment_status', 'PAID')->sum('total_price');
        @endphp
        <!-- row 1 -->
        <div class="grid lg:grid-cols-4 gap-6 -mx-3">
            <!-- card1 -->
            <div class="w-full max-w-full px-3">
                <div class="relative flex flex-col min-w-0 break-words bg-white shadow-xl rounded-2xl bg-clip-border">
                <div class="flex-auto p-4">
                    <div class="flex flex-row -mx-3">
                    <div class="flex-none w-2/3 max-w-full px-3">
                        <div>
                        <p class="mb-0 font-sans text-sm font-semibold leading-normal uppercase">Jumlah Kamar</p>
                        <h5 class="mb-2 font-semibold text-xl">{{$total_rooms}}</h5>
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
            <div class="w-full max-w-full px-3">
                <div class="relative flex flex-col min-w-0 break-words bg-white shadow-xl rounded-2xl bg-clip-border">
                <div class="flex-auto p-4">
                    <div class="flex flex-row -mx-3">
                    <div class="flex-none w-2/3 max-w-full px-3">
                        <div>
                        <p class="mb-0 font-sans text-sm font-semibold leading-normal uppercase">Jumlah Reservasi</p>
                        <h5 class="mb-2 font-semibold text-xl">{{$total_reservations}}</h5>
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
            <div class="w-full max-w-full px-3">
                <div class="relative flex flex-col min-w-0 break-words bg-white shadow-xl rounded-2xl bg-clip-border">
                <div class="flex-auto p-4">
                    <div class="flex flex-row -mx-3">
                    <div class="flex-none w-2/3 max-w-full px-3">
                        <div>
                        <p class="mb-0 font-sans text-sm font-semibold leading-normal uppercase">Total Pendapatan</p>
                        <h5 class="mb-2 font-semibold text-xl">Rp. {{number_format($total_revenue,0,',','.')}}</h5>
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
            <div class="w-full max-w-full px-3">
                <div class="relative flex flex-col min-w-0 break-words bg-white shadow-xl rounded-2xl bg-clip-border">
                <div class="flex-auto p-4">
                    <div class="flex flex-row -mx-3">
                    <div class="flex-none w-2/3 max-w-full px-3">
                        <div>
                        <p class="mb-0 font-sans text-sm font-semibold leading-normal uppercase">Total Check-in</p>
                        <h5 class="mb-2 font-semibold text-xl">{{$total_check_in}}</h5>
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
        <div class="grid lg:grid-cols-2 mt-6 gap-6 -mx-3">
            <div class="px-3 ">
                <div slider class="bg-white w-full h-full overflow-hidden rounded-2xl shadow-xl">
                    <div class="p-6 flex flex-col gap-5">
                        <h6>Ketersediaan Kamar</h6>
                        <div class="flex items-center justify-center gap-2 w-full">
                            <canvas id="roomChart" style="max-height: 300px;"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="lg:col-span-1 px-3 mt-0 w-full max-w-full">
                @php
                    $total_reviews = App\Models\RoomReview::all();
                    if($total_reviews->count()) {
                        $total_rating = 0;
                        foreach($total_reviews as $review) {
                            $total_rating += $review->rating;
                        }
                        $average_rating = $total_rating / $total_reviews->count();
                    }
                @endphp
                
                <div class="p-5 border-black/12.5 shadow-xl relative flex min-w-0 flex-col gap-5 break-words rounded-2xl border-0 border-solid bg-white bg-clip-border">
                    <div class="flex items-center justify-between">
                        <h6 class="mb-0">Keseluruhan Rating</h6>
                        <a href="{{route('dashboard.room-review.index')}}" class="bg-primary-100 border border-primary-700 text-primary-700 px-4 py-2 rounded-lg">Lihat semua</a>
                    </div>
                    
                    <div class="flex items-center gap-5">
                        <p class="text-2xl p-5 rounded-lg bg-primary-100 text-primary-700 font-medium">{{$average_rating}}</p>
                        <div class="flex flex-col">
                            <p class="text-primary-700">Sempurna</p>
                            <p class="text-sm">dari {{$total_reviews->count()}} Pelanggan</p>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>

        <!-- cards row 3 -->

        <div class="mt-6 -mx-3">
            {{-- <div class="mt-0 lg:flex-none">
                <div class="border-black/12.5 shadow-xl relative z-20 flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border">
                <div class="border-black/12.5 mb-0 rounded-t-2xl border-b-0 border-solid p-6 pt-4 pb-0">
                    <h6 class="capitalize">Total Pendapatan</h6>
                    <p class="mb-0 text-sm leading-normal">
                    <i class="fa fa-arrow-up text-emerald-500"></i>
                    <span class="font-semibold">4% more</span> in 2021
                    </p>
                </div>
                <div class="revenue-section">
                    <select id="yearSelect" class="p-2 border rounded mb-4"></select>
                    <div id="revenueChart" style="width: 100%; height: 400px;"></div>
                </div>
   
            </div> --}}
            <div class=" px-3 mt-0 mb-6 w-full max-w-full lg:flex-none">
                <div class="relative flex flex-col min-w-0 break-words bg-white border-0 border-solid shadow-xl border-black-125 rounded-2xl bg-clip-border">
                    <div class="py-4 px-6 pb-0 mb-0 rounded-t-4">
                        <div class="flex justify-between items-center">
                            <h6 class="">Reservasi Terbaru</h6>
                            <a href="{{route('dashboard.transaction.index')}}" class="flex items-center px-5 py-2 border-2 rounded-md bg-primary-100 p-2 text-primary-700  transition-all duration-75 hover:text-[#976033] border border-primary-700 text-base text-center">
                                <p>Lihat selengkapnya</p>
                            </a>
                        </div>
                    </div>
                    <div class="overflow-x-auto py-5 flex items-center justify-center">
                        <table class="text-center w-full whitespace-nowrap text-sm items-center font-normal">
                            <thead>
                                <tr class="font-semibold">
                                    <th scope="col" class="p-4 font-normal">Id</th>
                                    <th scope="col" class="p-4 font-normal">Nama</th>
                                    <th scope="col" class="p-4 font-normal">Status Pembayaran</th>
                                    <th scope="col" class="p-4 font-normal">Status Check in</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i=1 @endphp
                                @forelse ($transactions as $transaction)
                                    <tr>
                                        <td class="p-4 font-normal">{{$i++}}</td>
                                        <td class="p-4">
                                            <div class="flex flex-col gap-1">
                                                <h3 class="font-normal">{{$transaction->name}}</h3>
                                            </div>
                                        </td>
                                        <td class="p-4">
                                            <div class="flex flex-col gap-1">
                                                <h3 class="font-normal">{{$transaction->payment_status}}</h3>
                                            </div>
                                        </td>
                                        <td class="p-4">
                                            <div class="flex flex-col gap-1">
                                                <h3 class="font-normal">{{$transaction->checkin_status}}</h3>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="p-4 text-center">No data available</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        {{-- Card Row #4 --}}
        {{-- <div class="flex flex-wrap mt-6 -mx-3">
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
                    </table>
                </div>                    
            </div>
        </div> --}}
        @endrole

        @role('user')
        @php
            $latest_transaction = App\Models\Transaction::where('user_id', Auth::user()->id)->latest()->first();
            $wallet = App\Models\Saldo::where('user_id', Auth::user()->id)->latest()->first();
        @endphp
        {{-- #1 Row for USer --}}
        <div class="grid lg:grid-cols-3 gap-5">
            <div class="bg-white rounded-2xl shadow-xl col-span-1 p-5">
                <h3 class="text-xl text-primary-600 font-medium">My Wallet</h3>
                <div class="mt-5">

                    <div class="bg-primary-100 p-5 border border-primary-700 text-primary-700 flex items-center justify-between gap-5 rounded-lg">
                        <span class="material-symbols-rounded scale-150">wallet</span>
                        <div class="flex flex-col">
                            <p class="text-sm">Saldoku</p>
                            <p class="font-medium text-lg">IDR {{number_format($wallet->amount ?? 0,0,',','.')}}</p>
                        </div>
                        <a href="{{route('dashboard.saldo.index')}}" class="text-sm px-4 py-2 rounded-md bg-primary-700 text-white"><i class="bi bi-clock-history"></i> Lihat riwayat</a>
                    </div>

                
                </div>
            </div>

            @if (isset($latest_transaction))
                @if($latest_transaction->checkin_status == 'Belum')
                    <div class="bg-white rounded-2xl col-span-2 shadow-xl p-5">
                        <h3 class="font-medium text-lg text-primary-700">Reservasi Berikutnya</h3>
                        <a href="{{route('dashboard.user.bookings.detail', $latest_transaction->invoice)}}" class="flex gap-5 mt-5">
                            <img src="https://images.unsplash.com/photo-1522771739844-6a9f6d5f14af?q=80&w=2071&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="" class="h-24 rounded-lg">
                            <div class="flex flex-col gap-1">
                                @php
                                    $nights = date_diff(date_create($latest_transaction->check_in), date_create($latest_transaction->check_out))->format("%a");
                                @endphp
                                <p class="text-sm text-primary-500">Order ID: {{$latest_transaction->invoice}}</p>
                                <p class="font-medium text-primary-700 text-base">{{$latest_transaction->room->name}} ({{$nights}} Malam)</p>
                                <div class="flex items-center gap-3">
                                    <div class="flex items-center gap-0.5 text-sm">
                                        <span class="material-symbols-rounded scale-75">event</span>
                                        <p>{{Carbon\Carbon::parse($latest_transaction->check_in)->isoFormat('dddd, D MMM YYYY')}} - {{Carbon\Carbon::parse($latest_transaction->check_out)->isoFormat('dddd, D MMM YYYY')}}</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                        
                    </div>
                @else
                    <div class="bg-white rounded-2xl shadow-xl p-10">
                        <div class="flex gap-5">

                            <img src="{{asset('images/undraw_Quitting_time_re_1whp.png')}}" alt="" class="w-24">
                            <div class="flex flex-col gap-3">
                                <h3 class="font-medium text-xl text-primary-700">Tidak ada reservasi mendatang</h3>
                                <a href="{{route('dashboard.user.bookings')}}" class="px-5 py-3 rounded-lg bg-primary-700 text-white w-fit">Lihat riwayat</a>
                            </div>
                        </div>
                    </div>
                @endif
            @else
                <div class="bg-white rounded-2xl shadow-xl p-10">
                        <div class="flex gap-5">

                            <img src="{{asset('images/undraw_Quitting_time_re_1whp.png')}}" alt="" class="w-24">
                            <div class="flex flex-col gap-3">
                                <h3 class="font-medium text-xl text-primary-700">Tidak ada reservasi mendatang</h3>
                                <a href="{{route('dashboard.user.bookings')}}" class="px-5 py-3 rounded-lg bg-primary-700 text-white w-fit">Lihat riwayat</a>
                            </div>
                        </div>
                    </div>
            @endif
        </div>
        @endrole
    </div>
@endsection

@push('addon-script')
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@9.0.3"></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script> --}}
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

    const ctx = document.getElementById('roomChart').getContext('2d');
    new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['Kamar Terpesan', 'Kamar Tersedia'],
            datasets: [{
                data: [{{ $bookedRooms }}, {{ $availableRooms }}],
                backgroundColor: [
                    '#FF8042', // Warna untuk kamar terpesan
                    '#00C49F'  // Warna untuk kamar tersedia
                ]
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'bottom'
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            const total = {{ $bookedRooms + $availableRooms }};
                            const percentage = Math.round((context.raw / total) * 100);
                            return `${context.label}: ${context.raw} (${percentage}%)`;
                        }
                    }
                }
            }
        }
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/echarts@5.4.3/dist/echarts.min.js"></script>
<script>
// Initialize chart instance at global scope
let myChart = null;

function initRevenueChart(data) {
    // Get DOM element
    const chartDom = document.getElementById('revenueChart');
    
    // Dispose existing chart if it exists
    if (myChart != null && myChart.dispose) {
        myChart.dispose();
    }
    
    // Initialize new chart
    myChart = echarts.init(chartDom);

    // Configure chart options
    const option = {
        title: {
            text: `Monthly Revenue - ${data.selected_year}`,
            left: 'center'
        },
        tooltip: {
            trigger: 'axis',
            formatter: function(params) {
                const value = params[0].value;
                return `${params[0].name}: $${value.toLocaleString('en-US', {
                    minimumFractionDigits: 2,
                    maximumFractionDigits: 2
                })}`;
            }
        },
        grid: {
            left: '3%',
            right: '4%',
            bottom: '3%',
            containLabel: true
        },
        xAxis: {
            type: 'category',
            data: [
                'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 
                'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'
            ],
            boundaryGap: false
        },
        yAxis: {
            type: 'value',
            axisLabel: {
                formatter: (value) => `$${value.toLocaleString('en-US')}`
            }
        },
        series: [{
            name: 'Revenue',
            type: 'line',
            smooth: true,
            data: data.monthly_revenue,
            itemStyle: {
                color: '#3498db'
            },
            areaStyle: {
                color: new echarts.graphic.LinearGradient(0, 0, 0, 1, [
                    {
                        offset: 0,
                        color: 'rgba(52, 152, 219, 0.3)'
                    },
                    {
                        offset: 1,
                        color: 'rgba(52, 152, 219, 0.1)'
                    }
                ])
            }
        }]
    };

    // Set chart options
    myChart.setOption(option);

    // Handle resize
    window.addEventListener('resize', function() {
        myChart.resize();
    });
}

// Fetch and initialize chart
async function loadRevenueChart(year = null) {
    try {
        const url = year 
            ? `/dashboard/monthly-revenue?year=${year}` 
            : '/dashboard/monthly-revenue';
        
        const response = await fetch(url);
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        
        const data = await response.json();
        initRevenueChart(data);
        
        // Update year selector
        const yearSelect = document.getElementById('yearSelect');
        if (yearSelect && data.available_years.length > 0) {
            yearSelect.innerHTML = data.available_years
                .map(y => `<option value="${y}" ${y == data.selected_year ? 'selected' : ''}>${y}</option>`)
                .join('');
        }
    } catch (error) {
        console.error('Failed to load revenue data:', error);
    }
}

// Add event listeners when DOM is loaded
document.addEventListener('DOMContentLoaded', function() {
    // Year select change handler
    const yearSelect = document.getElementById('yearSelect');
    if (yearSelect) {
        yearSelect.addEventListener('change', (e) => {
            loadRevenueChart(e.target.value);
        });
    }

    // Initial load
    loadRevenueChart();
});
</script>

@endpush