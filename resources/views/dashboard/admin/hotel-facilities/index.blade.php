@extends('layouts.dahboard_layout')

@section('title', 'My Hotel Facilities')

{{-- @section('breadcrumb')
    <ol class="flex flex-wrap pt-1 mr-12 bg-transparent rounded-lg sm:mr-16">
            <li class="text-sm leading-normal">
            <a class="text-white opacity-90" href="javascript:;">Dashboard</a>
            </li>
            <li class="text-sm pl-2 text-white capitalize leading-normal  before:float-left before:pr-2 before: before:content-['/']" aria-current="page">Hotel Facilities</li>
        </ol>
    <h6 class="mb-0 font-bold text-white capitalize">Data Fasilitas Hotel</h6>
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
                        <p>Data Fasilitas Hotel</p>
                    </div>
                    <h1 class="text-white text-4xl font-medium">
                        Data Fasilitas Hotel
                    </h1>
                </div>
                <a href="{{route('dashboard.hotel_facilities.create')}}"  class="flex items-center gap-2 mt-10 px-5 py-2 border-2 rounded-md bg-primary-100 p-2 text-primary-700 hover:bg-white transition-all duration-75 hover:text-[#976033] text-base text-center">
                    <i class="bi bi-plus-square mr-2"></i>
                    <p>Tambah</p>
                </a>
            </div>
        </div>       
        <section class="container mx-auto">
            <main class="col-span-12 md:pt-0">
                <div class="p-10 mt-2 bg-white rounded-xl shadow-lg">
                    <form action="" id="bulk-delete-form">
                        <button type="button" id="bulk-delete"  class="hidden mb-5 px-5 py-2 rounded-lg bg-red-500 text-white transition-all hover:bg-red-700">Delete Selected</button>
                        <table id="selection-table" class="">
                            <thead>
                                <tr>
                                    <th><input type="checkbox" id="toggle-checkbox"></th>
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
                                            icon
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
                                @forelse ($hotel_facilities as $key => $hotel_facility)
                                    <tr class="cursor-pointer">
                                        <td><input type="checkbox" class="hotel-facilities-checkbox" value="{{ $hotel_facility->id }}"></td>
                                        <td class="font-medium text-gray-900 whitespace-nowrap">{{$key+1}}</td>
                                        <td class="">
                                            <span class="material-icons-round">{{$hotel_facility->icon}}</span>
                                        </td>
                                        <td class="font-medium text-gray-900 whitespace-nowrap">{{$hotel_facility->name}}</td>
                                        <td class="flex items-center">
                                            <div class="mr-2">
                                                <a href="{{route('dashboard.hotel_facilities.edit', $hotel_facility)}}" class="py-2 px-2 border-2 rounded-md border-primary-600 text-primary-500 text-center transition-all hover:bg-primary-500 hover:text-white">
                                                    <i class="bi bi-pencil-square"></i>
                                                </a>
                                            </div>
                                            <form action="{{route('dashboard.hotel_facilities.destroy', $hotel_facility)}}" class="" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button tyoe="submit" class="py-1 px-2 border-2 rounded-md border-red-600 text-red-600 text-center transition-all hover:bg-red-600 hover:text-white">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    
                                @endforelse
                            </tbody>
                        </table>
                    </form>
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            let isChecked = false;  // Track toggle state
            
            // Toggle functionality
            $('#toggle-checkbox').click(function() {
                isChecked = !isChecked;  // Toggle the state
                $('.hotel-facilities-checkbox').prop('checked', isChecked);  // Apply to all checkboxes
                $("#bulk-delete").toggleClass("hidden");
            });
            
            $('.hotel-facilities-checkbox').click(function() {
                $("#bulk-delete").toggleClass("hidden");
            });

            // Bulk Delete functionality
            $('#bulk-delete').click(function() {
                if(confirm('Are you sure you want to delete selected records?')) {
                    var ids = [];
                    
                    $('.hotel-facilities-checkbox:checked').each(function() {
                        ids.push($(this).val());
                    });

                    if(ids.length === 0) {
                        alert('Please select at least one record');
                        return;
                    }

                    $.ajax({
                        url: '{{ route("dashboard.hotel-facilities.bulkDelete") }}',
                        type: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: { ids: ids },
                        success: function(response) {
                            alert(response.message);
                            location.reload();
                        },
                        error: function(error) {
                            alert('Error deleting records');
                            console.log(error);
                        }
                    });
                }
            });
        });
    </script>
@endpush