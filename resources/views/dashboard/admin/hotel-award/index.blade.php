@extends('layouts.dahboard_layout')

@section('title', 'Penghargaan Hotel')

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
    <div id="bulkDeleteContainer">
        <main class="h-full overflow-y-auto">
            <div class="container mx-auto">
                <div class="flex w-full gap-5 mx-auto justify-between items-center">
                    <div class="flex flex-col gap-5 w-full p-6">
                        <div class="flex items-center gap-1 bg-primary-100 p-2 text-primary-700 rounded-lg w-fit text-sm">
                            <a href="{{route('dashboard.home')}}" class="flex items-center">
                                <span class="material-symbols-rounded scale-75">home</span>
                            </a>
                            <span class="material-symbols-rounded">chevron_right</span>
                            <p>Data Penghargaan Hotel</p>
                        </div>
                        <h1 class="text-white text-4xl font-medium">
                            Data Penghargaan Hotel
                        </h1>
                    </div>
                    <button
                        type="button"
                        id="quickActionButton"
                        class="flex hidden items-center mt-10 px-5 py-2 ring-2 ring-red-500 rounded-md bg-primary-100 p-2 text-red-500 hover:bg-white transition-all duration-75 hover:text-red-500 text-base text-center"
                        data-dialog-target="image-dialog4"
                    >
                        <i class="bi bi-trash mr-2"></i>
                        <p class="whitespace-nowrap">Hapus Terpilih</p>
                    </button>
                </div>
            </div>
            <section class="container mx-auto">
                <main class="col-span-12 md:pt-0">
                    <div class="p-10 mt-2 bg-white rounded-xl shadow-lg">
                        <h3 class="text-xl text-primary-600">Tambah Data Baru</h3>
                        <form action="{{route('dashboard.hotel_awards.store')}}" enctype="multipart/form-data" method="POST" >
                            @csrf
                            @method('POST')
                            <div class="grid lg:grid-cols-2 gap-5 my-5">
                                <div class="flex flex-col gap-3">
                                    <label for="name">Nama Penghargaan</label>
                                    <input type="text" name="name" class="p-2 rounded-md bg-primary-100 border border-primary-600">
                                </div>
                                <div class="flex flex-col gap-3">
                                    <label for="badge">Gambar Penghargaan</label>
                                    <input type="file" name="badge" >
                                </div>
                            </div>
                            <button type="submit" class="px-5 py-3 rounded-lg bg-primary-600 text-white">Tambah data</button>
                        </form>
                    </div>

                    <div class="p-10 mt-2 bg-white rounded-xl shadow-lg">
                        <table id="selection-table" class="">
                            <thead>
                                <tr>
                                    <th scope="col" class="px-4 py-3">
                                        <input type="checkbox" id="masterCheckbox" class="cursor-pointer w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600">
                                    </th>
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
                                            Badge
                                            <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                                            </svg>
                                        </span>
                                    </th>
                                    <th>
                                        <span class="flex items-center">
                                            Nama
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
                                @forelse ($hotel_awards as $key => $hotel_award)
                                    <tr class="cursor-pointer">
                                        <td scope="row" class="px-4 pe-0 py-4 font-medium text-gray-900 whitespace-nowrap">
                                            <input type="checkbox" name="awards_ids[]" class="cursor-pointer child-checkbox w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600" value="{{ $hotel_award->id }}">
                                        </td>
                                        <td class="font-medium text-gray-900 whitespace-nowrap">{{$key+1}}</td>
                                        <td class="">
                                           <img src="{{url($hotel_award->badge)}}" alt="" class="w-16">
                                        </td>
                                        <td class="font-medium text-gray-900 whitespace-nowrap">{{$hotel_award->name}}</td>
                                        <td class="flex items-center">
                                            <div class="mr-2">
                                                <a href="{{route('dashboard.hotel_awards.edit', $hotel_award)}}" class="py-2 px-2 border-2 rounded-md border-primary-600 text-primary-500 text-center transition-all hover:bg-primary-500 hover:text-white">
                                                    <i class="bi bi-pencil-square"></i>
                                                </a>
                                            </div>
                                            <form action="{{route('dashboard.hotel_awards.destroy', $hotel_award)}}" class="" method="POST">
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
                    </div>
                </main>
            </section>
        </main>
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

                // Initialize DataTable first
                table = new simpleDatatables.DataTable("#selection-table", {
                    perPage: 10,
                    perPageSelect: [10, 25, 50],
                    searchable: true,
                    sortable: true,
                    fixedHeight: false,
                    columns: [
                        { select: 0, sortable: false }, // Checkbox column
                        { select: [1,2,3], sortable: true },
                        { select: 4, sortable: false } // Action column
                    ]
                });

                // Function to handle master checkbox state
                const updateMasterCheckboxState = () => {
                    const masterCheckbox = document.querySelector('thead input[type="checkbox"]');
                    const childCheckboxes = document.querySelectorAll('tbody input[type="checkbox"]');

                    if (masterCheckbox && childCheckboxes.length > 0) {
                        const checkedCount = Array.from(childCheckboxes).filter(cb => cb.checked).length;
                        masterCheckbox.checked = checkedCount === childCheckboxes.length;
                        masterCheckbox.indeterminate = checkedCount > 0 && checkedCount < childCheckboxes.length;
                    }
                };

                // Function to handle master checkbox click
                const handleMasterCheckboxClick = (e) => {
                    const childCheckboxes = document.querySelectorAll('tbody input[type="checkbox"]');
                    childCheckboxes.forEach(checkbox => {
                        checkbox.checked = e.target.checked;
                    });
                };

                // Function to attach event listeners
                const attachEventListeners = () => {
                    // Master checkbox
                    const masterCheckbox = document.querySelector('thead input[type="checkbox"]');
                    if (masterCheckbox) {
                        masterCheckbox.addEventListener('click', handleMasterCheckboxClick);
                    }

                    // Child checkboxes
                    const childCheckboxes = document.querySelectorAll('tbody input[type="checkbox"]');
                    childCheckboxes.forEach(checkbox => {
                        checkbox.addEventListener('change', updateMasterCheckboxState);
                    });
                };

                // Attach event listeners after table is initialized and after any table update
                table.on('datatable.init', attachEventListeners);
                table.on('datatable.page', attachEventListeners);
                table.on('datatable.sort', attachEventListeners);
                table.on('datatable.search', attachEventListeners);

                // Initial attachment of event listeners
                setTimeout(attachEventListeners, 100);
            };

            resetTable();
        }

        // Add styles to handle selected rows
        const style = document.createElement('style');
        style.textContent = `
            .dataTable-table tbody tr.selected {
                background-color: rgba(var(--primary-rgb), 0.1);
            }
            .dataTable-table input[type="checkbox"] {
                cursor: pointer;
            }
        `;
        document.head.appendChild(style);

        // Function to toggle quick action button visibility
        const toggleQuickActionButton = () => {
            const quickActionButton = document.getElementById('quickActionButton');
            const masterCheckbox = document.getElementById('masterCheckbox');
            const childCheckboxes = document.querySelectorAll('.child-checkbox');

            // Check if any checkbox is selected (either master or any child)
            const isAnyCheckboxSelected = masterCheckbox.checked ||
                Array.from(childCheckboxes).some(checkbox => checkbox.checked);

            // Show/hide quick action button based on selection
            if (isAnyCheckboxSelected) {
                quickActionButton.style.display = 'flex';
            } else {
                quickActionButton.style.display = 'none';
            }
        };

        // Add event listeners to master checkbox
        document.getElementById('masterCheckbox').addEventListener('change', toggleQuickActionButton);

        // Add event listeners to all child checkboxes
        document.querySelectorAll('.child-checkbox').forEach(checkbox => {
            checkbox.addEventListener('change', toggleQuickActionButton);
        });

        // Initially hide the quick action button
        document.getElementById('quickActionButton').style.display = 'none';

        document.addEventListener('DOMContentLoaded', function () {
            const deleteButton = document.getElementById('quickActionButton');
            const actionUrl = "{{ route('dashboard.hotel-awards.bulkDelete') }}";

            deleteButton.addEventListener('click', function () {
                const awardsIds = Array.from(document.querySelectorAll('input[name="awards_ids[]"]:checked'))
                    .map(checkbox => checkbox.value);

                if (awardsIds.length === 0) {
                    Swal.fire({
                        icon: "error",
                        title: "Tidak ada data yang dipilih",
                        toast: true,
                        position: "top-end",
                        timer: 3000,
                        showConfirmButton: false,
                        timerProgressBar: true
                    });
                    return;
                }

                // CSRF token
                const csrfToken = "{{ csrf_token() }}";

                fetch(actionUrl, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken
                    },
                    body: JSON.stringify({ awards_ids: awardsIds })
                })
                .then(response => response.json())
                .then(data => {
                    Swal.fire({
                        icon: data.success ? "success" : "error",
                        title: data.message,
                        toast: true,
                        position: "top-end",
                        timer: 3000,
                        showConfirmButton: false,
                        timerProgressBar: true
                    });

                    // Reload the page if the operation was successful
                    if (data.success) {
                        location.reload();
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    Swal.fire('Error', 'Terjadi kesalahan saat menghapus data.', 'error');
                });
            });
        });
    </script>
@endpush