@extends('layouts.dahboard_layout')

@section('title', 'Detail Booking')
@push('addon-style')
<style>
    .rating-container {
        margin-bottom: 20px;
    }
    .rating {
        display: inline-flex;
        flex-direction: row;
        gap: 5px;
        padding: 20px 0;
    }
    .star {
        cursor: pointer;
        font-size: 30px;
        color: #ddd;
        transition: color 0.2s;
    }
    .star.active,
    .star.hover {
        color: #5b3a1f;
    }
    .preview-images {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        margin-top: 10px;
    }
    .preview-images img {
        width: 100px;
        height: 100px;
        object-fit: cover;
    }

    /* Added styles for better form layout */
    .container {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
    }
    .form-group {
        margin-bottom: 20px;
    }
    /* .form-control {
        width: 100%;
        padding: 8px;
        border: 1px solid #ddd;
        border-radius: 4px;
    } */
    .alert-danger {
        background-color: #f8d7da;
        border-color: #f5c6cb;
        color: #721c24;
        padding: 10px;
        border-radius: 4px;
        margin-bottom: 20px;
    }
    .alert-danger ul {
        margin: 0;
        padding-left: 20px;
    }
    
</style>
@endpush
{{-- @section('breadcrumb')
    <ol class="flex flex-wrap pt-1 mr-12 bg-transparent rounded-lg sm:mr-16">
            <li class="text-sm leading-normal">
            <a class="text-white opacity-90" href="javascript:;">Dashboard</a>
            </li>
            <li class="text-sm pl-2 text-white capitalize leading-normal  before:float-left before:pr-2 before: before:content-['/']" aria-current="page">Kamar Facilities</li>
        </ol>
    <h6 class="mb-0 font-bold text-white capitalize">Data Fasilitas Kamar</h6>
@endsection --}}

@section('content')
    <main class="h-full overflow-y-auto">
        <div class="container mx-auto">
            <div class="flex w-full gap-5 mx-auto justify-between items-center">
                <div class="flex flex-col gap-5 w-full p-6">
                    <div class="flex items-center gap-1 bg-primary-100 p-2 text-primary-700 rounded-lg w-fit text-sm">
                        <a href="{{route('dashboard.home')}}" class="flex items-center">
                            <span class="material-symbols-rounded scale-75">home</span>
                        </a>
                        <span class="material-symbols-rounded">chevron_right</span>
                        <a href="{{route('dashboard.user.bookings')}}" class="flex items-center underline">
                            Data Booking
                        </a>
                        <span class="material-symbols-rounded">chevron_right</span>
                        <p>Detail</p>
                    </div>
                    <h1 class="text-white text-4xl font-medium">
                        Informasi Booking
                    </h1>
                </div>
            </div>
        </div>       
        <section class="container mx-auto">
            <main class="col-span-12 md:pt-0">
                <div class="grid lg:grid-cols-3 gap-5">
                    {{-- Booking detail card --}}
                    <div class="p-7 mt-2 bg-white rounded-xl shadow-lg col-span-2">
                        {{-- Header card --}}
                        <div class="flex flex-col gap-3 mb-8">
                            @if($transaction->payment_status == 'PAID')
                            <p class="p-2 rounded-lg bg-green-100 border border-green-700 text-green-700 text-xs w-fit font-medium">{{$transaction->payment_status}}</p>
                            @elseif($transaction->payment_status == 'PENDING')
                            <p class="p-2 rounded-lg bg-yellow-100 border border-yellow-700 text-yellow-700 text-xs w-fit font-medium">{{$transaction->payment_status}}</p>
                            @endif
                            <h2 class="font-light text-primary-700 text-xl">Booking ID: <span class="font-medium">{{$transaction->invoice}}</span></h2>
                            <p class="flex items-center text-sm gap-1"><span class="material-symbols-rounded">schedule</span> {{$transaction->created_at->isoFormat('dddd, d MMMM YYYY, H:m')}}</p>
                        </div>

                        {{-- Body card --}}
                        <div class="grid lg:grid-cols-3 gap-6 text-sm">
                            <div class="flex flex-col gap-1">
                                <p>Tipe Kamar</p>
                                <p class="font-medium text-primary-700">{{$transaction->room->name}}</p>
                            </div>

                            <div class="flex flex-col gap-1">
                                <p>Nomor Kamar</p>
                                <p class="font-medium text-primary-700">{{$transaction->room_number}}</p>
                            </div>

                            <div class="flex flex-col gap-1">
                                <p>Harga per Malam</p>
                                <p class="font-medium text-primary-700">Rp. {{number_format($transaction->room->price,0,',','.')}}</p>
                            </div>

                            <div class="flex flex-col gap-1">
                                <p>Check-in</p>
                                <p class="font-medium text-primary-700">{{Carbon\Carbon::parse($transaction->check_in)->isoFormat('dddd, D MMM YYYY')}}</p>
                                {{-- <p>09:00</p> --}}
                            </div>

                            <div class="flex flex-col gap-1">
                                <p>Check-out</p>
                                <p class="font-medium text-primary-700">{{Carbon\Carbon::parse($transaction->check_out)->isoFormat('dddd, D MMM YYYY')}}</p>
                                {{-- <p>07:30</p> --}}
                            </div>

                            <div class="flex flex-col gap-1">
                                <p>Durasi</p>
                                @php
                                    $nights = date_diff(date_create($transaction->check_in), date_create($transaction->check_out))->format("%a")
                                @endphp
                                <p class="font-medium text-primary-700">{{$nights}} Malam</p>
                            </div>

                            <div class="flex flex-col gap-1">
                                <p>Status Check-in</p>
                                <p class="font-medium text-primary-700">{{$transaction->checkin_status}} Check-in</p>
                            </div>

                            {{-- <div class="flex flex-col gap-1">
                                <p>Harga per Malam</p>
                                <p class="font-medium text-primary-700">Rp. {{number_format($transaction->room->price,0,',','.')}}</p>
                            </div> --}}

                            {{-- <div class="flex flex-col gap-1 col-span-3">
                                <p>Catatan</p>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsam quae odio adipisci aperiam dolorem odit facilis quo esse blanditiis, illum vel, voluptates earum labore? Maiores, tempore. </p>
                            </div> --}}
                        </div>
    
                        <hr class="h-0.5 my-8 bg-gray-700 border-0">
                        {{-- Footer card --}}
                        <div class="grid lg:grid-cols-3 gap-6 text-sm">
                            <div class="flex flex-col gap-1">
                                <p>Fasilitas Kamar</p>
                                <ul class="flex flex-col gap-1">
                                    @foreach ($transaction->room->room_facility as $room_facility)
                                    <li class="flex items-center gap-1 text-primary-700"><span class="material-icons-round scale-75">{{$room_facility->icon}}</span>{{$room_facility->name}}</li>
                                    @endforeach
                                    {{-- <li class="flex items-center gap-1 text-primary-700"><span class="material-symbols-rounded scale-75">wifi</span>TV Kabel</li>
                                    <li class="flex items-center gap-1 text-primary-700"><span class="material-symbols-rounded scale-75">wifi</span>Air Hangat</li> --}}
                                </ul>
                            </div>

                            <div class="flex flex-col gap-1">
                                <p>Tambahan</p>
                                <ul class="flex flex-col gap-1">
                                    @foreach ($transaction->accomodation_plans as $accomodation_plan)                                        
                                    <li class="flex items-center gap-1 text-primary-700">{{$accomodation_plan->name}} (Rp. {{number_format($accomodation_plan->price,0,',','.')}})</li>
                                    @endforeach
                                </ul>
                            </div>
                            @php
                                $discount_amount = 0;
                                foreach($transaction->promos as $promo) {
                                    $discount_amount += $promo->amount;
                                }
                                $discount_amount = $discount_amount / 100;
                                $discounted_price = $discount_amount * ($transaction->room->price * $nights);
                            @endphp
                            <div class="flex flex-col gap-1">
                                <p>Promo yang Dipakai</p>
                                <ul class="flex flex-col gap-1">
                                    @foreach ($transaction->promos as $promo)                                        
                                    <li class="flex items-center gap-1 text-primary-700">{{$promo->name}} ({{$promo->amount}}%)</li>
                                    <li class="flex items-center gap-1 text-red-700 text-sm font-medium">-Rp. {{number_format(($promo->amount / 100) * ($transaction->room->price * $nights),0,',','.')}}</li>
                                    @endforeach
                                </ul>
                            </div>

                            {{-- <div class="flex flex-col gap-1">
                                <p>Poin yang Didapatkan</p>
                                <ul class="flex flex-col gap-1">
                                    <li class="flex items-center gap-1 text-primary-700"><span class="material-symbols-rounded scale-75">toll</span>100 Poin</li>
                                </ul>
                            </div> --}}
                        </div>
                        @if($transaction->checkin_status == 'Belum')
                        <button class="p-3 rounded-lg text-white bg-red-700 mt-5">Batalkan pesanan</button>
                        @elseif($transaction->checkin_status == 'Sudah' && !$room_review)
                        <h3 class="text-lg text-primary-700 font-medium my-5">Berikan ulasan untuk "{{$transaction->room->name}}"</h3>
                        <form action="{{route('dashboard.user.room-review.store')}}" method="POST" enctype="multipart/form-data" class="flex flex-col gap-5">
                            @csrf
                            @method('POST')
                            <div class="rating-container flex flex-col gap-1">
                                <span class="rating-label">Berikan bintang</span>
                                <div class="rating">
                                    <input type="hidden" name="rating" id="selected-rating" value="">
                                    <input type="hidden" name="rating_text" id="rating-text-input" value="">
                                    <input type="hidden" name="room_id" value="{{$transaction->room->id}}">
                                    <input type="hidden" name="transaction_id" value="{{$transaction->id}}">
                                    <div id="stars-container">
                                        <!-- Stars will be added by JavaScript -->
                                    </div>
                                </div>
                                <span id="rating-text" style="display: block; margin-top: 5px; color: #666;"></span>
                            </div>
                
                            <div class="flex flex-col gap-3">
                                <label for="title">Judul</label>
                                <input type="text" name="title" class="rounded-lg ">
                            </div>

                            <div class="flex flex-col gap-3">
                                <label for="description">Ulasan Anda</label>
                                <textarea name="description" id="description" class="form-control" rows="4"></textarea>
                            </div>
                
                            {{-- <div class="flex flex-col gap-3">
                                <label for="images">Upload Images:</label>
                                <input type="file" name="images[]" id="images" multiple accept="image/*" onchange="previewImages(this)">
                                <div class="preview-images"></div>
                            </div> --}}
                
                            <button type="submit" class="bg-primary-700 w-fit text-white px-5 py-3 rounded-lg">Submit Review</button>
                        </form>
                        @elseif ($transaction->checkin_status == 'Sudah' && $room_review)
                        <h3 class="text-lg text-primary-700 font-medium my-5">Ubah ulasan untuk "{{$transaction->room->name}}"</h3>
                        <form action="{{route('dashboard.user.room-review.store')}}" method="POST" enctype="multipart/form-data" class="flex flex-col gap-5">
                            @csrf
                            @method('POST')
                            <div class="rating-container flex flex-col gap-1">
                                <span class="rating-label">Berikan bintang</span>
                                <div class="rating">
                                    <input type="hidden" name="rating" id="selected-rating" value="">
                                    <input type="hidden" name="rating_text" id="rating-text-input" value="">
                                    <input type="hidden" name="room_id" value="{{$transaction->room->id}}">
                                    <input type="hidden" name="transaction_id" value="{{$transaction->id}}">
                                    <div id="stars-container">
                                        <!-- Stars will be added by JavaScript -->
                                    </div>
                                </div>
                                <span id="rating-text" style="display: block; margin-top: 5px; color: #666;"></span>
                            </div>
                
                            <div class="flex flex-col gap-3">
                                <label for="title">Judul</label>
                                <input type="text" name="title" class="rounded-lg " value="{{$room_review->title}}">
                            </div>

                            <div class="flex flex-col gap-3">
                                <label for="description">Ulasan Anda</label>
                                <textarea name="description" id="description" class="form-control" rows="4">{!!$room_review->description!!}</textarea>
                            </div>
                
                            {{-- <div class="flex flex-col gap-3">
                                <label for="images">Upload Images:</label>
                                <input type="file" name="images[]" id="images" multiple accept="image/*" onchange="previewImages(this)">
                                <div class="preview-images"></div>
                            </div> --}}
                
                            <button type="submit" class="bg-primary-700 w-fit text-white px-5 py-3 rounded-lg">Submit Review</button>
                        </form>
                        @endif

                    </div>

                    {{-- Room detail card --}}
                    <div class="p-7 mt-2 bg-white rounded-xl shadow-lg col-span-1">
                        <div class="flex flex-col gap-5">
                            <div class="flex items-center justify-between">
                                <p class="text-primary-700 text-lg font-medium">{{$transaction->room->name}}</p>
                                <a href="{{route('frontpage.rooms.detail', $transaction->room->slug)}}" class="text-sm underline">Detail</a>
                            </div>
                            <img src="{{url($transaction->room->cover)}}" alt="" class="rounded-lg">

                        </div>
                        <hr class="h-0.5 my-8 bg-gray-700 border-0">
                        <div class="flex flex-col gap-5">
                            <div class="flex items-center gap-3">
                                <h3 class="text-xl text-primary-700 ">Ringkasan Tagihan</h3>
                                @if($transaction->payment_status == 'PAID')
                                <p class="p-2 rounded-lg bg-green-100 border border-green-700 text-green-700 text-xs w-fit font-medium">{{$transaction->payment_status}}</p>
                                @elseif($transaction->payment_status == 'PENDING')
                                <p class="p-2 rounded-lg bg-yellow-100 border border-yellow-700 text-yellow-700 text-xs w-fit font-medium">{{$transaction->payment_status}}</p>
                                @endif                            </div>
                            <div class="flex flex-col gap-3 text-sm">
                                <div class="flex items-center justify-between">
                                    <p>Biaya kamar</p>
                                    <p class="text-primary-700">Rp. {{number_format($transaction->room->price,0,',','.')}}</p>
                                </div>
                                @php
                                    $accomodation_plan_amount = 0;
                                    foreach ($transaction->accomodation_plans as $accomodation_plan) {
                                        $accomodation_plan_amount += $accomodation_plan->price;
                                    }
                                @endphp
                                <div class="flex items-center justify-between">
                                    <p>Biaya tambahan</p>
                                    <p class="text-primary-700">Rp. {{number_format($accomodation_plan_amount,0,',','.')}}</p>
                                </div>
                                
                                <div class="flex items-center justify-between">
                                    <p>Potongan harga</p>
                                    <p class="text-red-700">-Rp. {{number_format($discounted_price,0,',','.')}}</p>
                                </div>
                                <div class="flex items-center justify-between ">
                                    <p class="text-gray-800">Total harga</p>
                                    <p class="bg-primary-100 text-primary-700 font-semibold">Rp. {{number_format($transaction->total_price,0,',','.')}}</p>
                                </div>
                                <div class="flex items-center justify-between">
                                    <p>Metode pembayaran</p>
                                    <p class="">{{$transaction->payment_method}}</p>
                                </div>
                                @if($transaction->checkin_status == 'Belum')
                                <a href="#" class="px-5 py-2 rounded-lg text-white bg-primary-700 text-center">Check-in</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </section>    
    </main>
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
     <!-- Panggil CKEditor versi 5 -->
     <script src="https://cdn.ckeditor.com/ckeditor5/39.0.0/classic/ckeditor.js"></script>
     <script>
         ClassicEditor
             .create(document.querySelector('#description'))
             .catch(error => {
                 console.error(error);
             });
     </script>
     <script>
        // Function to preview images
        function previewImages(input) {
            const preview = document.querySelector('.preview-images');
            preview.innerHTML = '';

            if (input.files) {
                Array.from(input.files).forEach(file => {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const img = document.createElement('img');
                        img.src = e.target.result;
                        preview.appendChild(img);
                    }
                    reader.readAsDataURL(file);
                });
            }
        }

        const starsContainer = document.getElementById('stars-container');
        const ratingInput = document.getElementById('selected-rating');
        const ratingText = document.getElementById('rating-text');
        const ratingTextInput = document.getElementById('rating-text-input');
        let selectedRating = 0;

        // Create 5 stars
        for (let i = 1; i <= 5; i++) {
            const star = document.createElement('span');
            star.innerHTML = '★';
            star.className = 'star';
            star.dataset.value = i;
            starsContainer.appendChild(star);
        }

        const stars = document.querySelectorAll('.star');

        // Rating descriptions
        const ratingDescriptions = {
            1: 'Buruk',
            2: 'Lumayan',
            3: 'Bagus',
            4: 'Sangat Bagus',
            5: 'Sempurna'
        };

        // Handle mouse enter
        stars.forEach(star => {
            star.addEventListener('mouseenter', () => {
                const value = parseInt(star.dataset.value);
                highlightStars(value, 'hover');
            });
        });

        // Handle mouse leave
        starsContainer.addEventListener('mouseleave', () => {
            highlightStars(selectedRating, 'active');
        });

        // Handle click
        stars.forEach(star => {
            star.addEventListener('click', () => {
                selectedRating = parseInt(star.dataset.value);
                ratingInput.value = selectedRating;
                highlightStars(selectedRating, 'active');
                updateRatingText(selectedRating);
            });
        });

        function highlightStars(count, className) {
            stars.forEach(star => {
                star.classList.remove('hover', 'active');
            });
            
            stars.forEach(star => {
                if (parseInt(star.dataset.value) <= count) {
                    star.classList.add(className);
                }
            });
        }

        function updateRatingText(rating) {
            const text = ratingDescriptions[rating] || '';
            ratingText.textContent = text;
            ratingTextInput.value = text; // Update hidden input with rating text
        }

    </script>
@endpush