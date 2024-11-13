@extends('layouts.dahboard_layout')

@section('title', 'Pengaturan Situs')

@section('content')
    <main class="h-full overflow-y-auto">
        <div class="container mx-auto">
            <div class="flex flex-col gap-5 w-full p-6">
                <div class="flex items-center gap-1 bg-primary-100 p-2 text-primary-700 rounded-lg w-fit text-sm">
                    <a href="{{route('dashboard.home')}}" class="flex items-center">
                        <span class="material-symbols-rounded scale-75">home</span>
                    </a>
                    <span class="material-symbols-rounded">chevron_right</span>
                    <p>Pengaturan Situs</p>
                </div>
                <h1 class="text-white text-4xl font-medium">
                    Pengaturan Situs
                </h1>
            </div>
        </div>
        <section class="container px-6 mx-auto">
            <section class="container px-6 mx-auto">
                <main class="col-span-12 md:pt-0">
                    <div class="p-10 mt-2 bg-white rounded-xl shadow-lg">
                        <h1 class="text-xl font-medium text-primary-700">Pengaturan Dasar</h1>
                        <form action="{{route('dashboard.site.settings.update', $site_setting->id)}}" method="POST">
                            @csrf
                        @method('PUT')
                            <div class="grid lg:grid-cols-2 gap-5 my-5">
                                <div class="flex flex-col gap-5">
                                    <h2>Tagline Situs</h2>
                                <textarea name="tagline" id="tagline" cols="30" rows="10">{!!$site_setting->tagline!!}</textarea>
                                </div>
                                <div class="flex flex-col gap-5">
                                    <h2>Deskripsi Situs</h2>
                                    <textarea name="description" id="description" cols="30" rows="10">{!!$site_setting->description!!}</textarea>
                                </div>
                                <div class="flex flex-col gap-5">
                                    <label for="phone">Nomor Telepon</label>
                                    <input type="number" name="phone" class="rounded-lg" value="{{$site_setting->phone}}">
                                </div>
                                <div class="flex flex-col gap-5">
                                    <label for="phone">Teks Nomor Telepon</label>
                                    <input type="text" name="phone_text" value="{{$site_setting->phone_text}}" class="rounded-lg">
                                </div>
                            </div>
                            <div class="flex flex-col gap-5">
                                <h1 class="text-xl font-medium text-primary-700">Alamat</h1>
                                <label for="">Tautan Google Maps</label>
                                <div class="flex flex-col gap-5">
                                    <input type="text" name="maps_link" value="{{$site_setting->maps_link}}" class="rounded-lg">
                                </div>
                                <div class="flex flex-col gap-5">
                                    <label for="">Alamat Lengkap</label>
                                    <textarea name="address" id="address" cols="30" rows="10">{!!$site_setting->address!!}</textarea>
                                </div>
                            </div>
                            {{-- <button type="submit" class="btn btn-primary">Kirim</button> --}}
                            <button type="submit" class="mt-5 px-5 py-3 rounded-lg bg-primary-500 text-white transition-all hover:bg-primary-700">Perbarui data</button>
                        </form>
                    </div>

                    <div class="p-10 mt-5 bg-white rounded-xl shadow-lg">
                        <div class="mb-5 flex items-center justify-between">
                            <h1 class="text-xl font-medium text-primary-700">Partner Kami</h1>
                            <button id="createItemButton" class="bg-primary-100 text-primary-700 px-5 py-2 rounded-lg border-2 border-primary-700">Tambah baru</button>
                        </div>
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
                                            Logo
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
                                    <th>
                                        <span class="flex items-center">
                                            Tautan
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
                                @forelse ($partners as $key => $partner)
                                    <tr class="cursor-pointer">
                                        <td scope="row" class="px-4 pe-0 py-4 font-medium text-gray-900 whitespace-nowrap">
                                            <input type="checkbox" name="partner_ids[]" class="cursor-pointer child-checkbox w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600" value="{{ $partner->id }}">
                                        </td>
                                        <td class="font-medium text-gray-900 whitespace-nowrap">{{$key + 1}}</td>
                                        <td class="">
                                            <img src="{{url($partner->logo)}}" alt="" class=" w-10 object-cover object-top transition duration-500 mb-2">
                                        </td>
                                        <td class="font-medium text-gray-900 whitespace-nowrap">{{$partner->name}}</td>
                                        <td class="font-medium text-gray-900 whitespace-nowrap">{{$partner->link}}</td>
                                        <td class="flex items-center">
                                            <div class="mr-2">
                                                <button id="" class="editItemButton py-2 px-2 border-2 rounded-md border-primary-600 text-primary-500 text-center transition-all hover:bg-primary-500 hover:text-white" data-id="{{ $partner->id }}" data-name="{{ $partner->name }}" data-link="{{$partner->link}}" data-logo="{{$partner->logo}}">
                                                    <i class="bi bi-pencil-square"></i>
                                                </button>
                                                
                                            </div>
                                            <button class="deleteItemButton p-2 border-2 rounded-md border-red-600 text-red-600 text-center transition-all hover:bg-red-600 hover:text-white" data-id="{{ $partner->id }}" data-name="{{ $partner->name }}" data-link="{{$partner->link}}" data-logo="{{$partner->logo}}">
                                                
                                        <i class="bi bi-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @empty
                                    
                                @endforelse
                            </tbody>
                        </table>
                        <!-- Modal for Create/Edit Item -->
                        <div id="itemModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 flex hidden z-10 justify-center items-center">
                            <div class="bg-white rounded-lg p-6 w-96">
                                <h2 class="text-xl font-medium text-primary-700 mb-4" id="modalTitle">Create Item</h2>
                                <form id="itemForm">
                                    @csrf
                                    <input type="hidden" name="_method" id="method" value="POST">
                                    <input type="hidden" name="item_id" id="item_id">
                                    <div class="mb-4">
                                        <label for="logo" class="block mb-3 font-medium text-gray-700 text-md">Logo</label>
                                        <input placeholder="" type="file" name="logo" id="logo" autocomplete="off" class="block border  w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-primary-500 focus:border-primary-500 sm:text-sm">

                                        @if ($errors->has('logo'))
                                            <p class="text-red-500 mb-3 text-sm">{{$errors->first('logo')}}</p>
                                        @endif
                                    </div>
                                    <div class="mb-4">
                                        <label for="name" class="block text-gray-700">Nama</label>
                                        <input type="text" name="name" id="name" class="border rounded-lg w-full px-3 py-2" required>
                                    </div>
                                    <div class="mb-4">
                                        <label for="link" class="block text-gray-700">Tautan</label>
                                        <input name="link" id="link" class="border rounded-lg w-full px-3 py-2" type="text">
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <button type="button" id="closeModal" class="bg-primary-100 border border-primary-700 text-primary-700 px-4 py-2 rounded-lg">Batal</button>
                                        <button type="submit" class="bg-primary-700 text-white px-4 py-2 rounded-lg">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </section>
    </main>
@endsection
@push('addon-script')
    <script>
        $(document).ready(function() {
            $('#regency_id').select2();
        })
    </script>
    <!-- Panggil CKEditor versi 5 -->
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#tagline'))
            .catch(error => {
                console.error(error);
            });
        ClassicEditor
            .create(document.querySelector('#description'))
            .catch(error => {
                console.error(error);
            });
        ClassicEditor
            .create(document.querySelector('#address'))
            .catch(error => {
                console.error(error);
            });
    </script>
    <script>
        $(document).ready(function() {
            $('#icon').iconpicker();
            
            $('#iconPickerBtn').on('click', function() {
                $('#icon').iconpicker('show');
            });
        });
    </script>
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
            const actionUrl = "{{ route('dashboard.room.bulkDelete') }}";

            deleteButton.addEventListener('click', function () {
                const roomIds = Array.from(document.querySelectorAll('input[name="room_ids[]"]:checked'))
                    .map(checkbox => checkbox.value);

                if (roomIds.length === 0) {
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
                    body: JSON.stringify({ room_ids: roomIds })
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

    {{-- JS buat CRUD Partners --}}
    <script>
        $(document).ready(function() {
            const csrfToken = "{{ csrf_token() }}";
    
            // Show modal for creating a new item
            $('#createItemButton').click(function() {
                $('#itemForm')[0].reset();
                $('#modalTitle').text('Create Item');
                $('#method').val('POST');
                $('#item_id').val('');
                $('#itemModal').removeClass('hidden');
            });
    
            // Show modal for editing an item
            $('.editItemButton').click(function() {
                const id = $(this).data('id');
                const name = $(this).data('name');
                const link = $(this).data('link');
                const logo = $(this).data('logo');
    
                $('#item_id').val(id);
                $('#name').val(name);
                $('#link').val(link);
                $('#modalTitle').text('Edit Partner');
                $('#method').val('PUT');
                $('#itemModal').removeClass('hidden');
            });
    
            $('#itemForm').submit(function(e) {
                e.preventDefault(); // Prevent the default form submission

                const formData = new FormData(this);
                const method = $('#method').val(); // POST or PUT
                const itemId = $('#item_id').val();
                const url = itemId ? `partners/${itemId}` : 'partners'; // Adjust the URL based on itemId

                $.ajax({
                    type: method,
                    url: url,
                    data: formData,
                    contentType: false, // Important for file uploads
                    processData: false, // Important for file uploads
                    headers: {
                        'X-CSRF-TOKEN': csrfToken // Include CSRF token
                    },
                    success: function(response) {
                        location.reload(); // Reload the page to see changes
                    },
                    error: function(xhr) {
                        console.error(xhr.responseText);
                        const errors = xhr.responseJSON.errors;
                        if (errors) {
                            // Display validation errors
                            for (let field in errors) {
                                alert(`${field}: ${errors[field].join(', ')}`);
                            }
                        } else {
                            alert('An error occurred while saving the item.');
                        }
                    }
                });
            });
    
            // Handle item deletion
            $('.deleteItemButton').click(function() {
                const id = $(this).data('id');
                if (confirm('Are you sure you want to delete this item?')) {
                    $.ajax({
                        type: 'DELETE',
                        url: `partners/${id}`,
                        headers: {
                            'X-CSRF-TOKEN': csrfToken
                        },
                        success: function(response) {
                            location.reload(); // Reload the page to see the changes
                        },
                        error: function(xhr) {
                            console.error(xhr.responseText);
                        }
                    });
                }
            });
    
            // Close modal
            $('#closeModal').click(function() {
                $('#itemModal').addClass('hidden');
            });
        });
    </script>
@endpush