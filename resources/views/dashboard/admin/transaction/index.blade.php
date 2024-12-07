@extends('layouts.dahboard_layout')

@section('title', 'Daftar Transaksi')

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
                            <p>Daftar Transaksi</p>
                        </div>
                        <h1 class="text-white text-4xl font-medium">
                            Daftar Transaksi
                        </h1>
                    </div>
                    <a href="#image-modal" id="quickActionButton" class="flex hidden items-center mt-10 px-5 py-[0.73rem] ring-2 ring-red-500 rounded-md bg-primary-100 p-2 text-red-500 hover:bg-white transition-all duration-75 hover:text-red-500 text-base text-center">
                        <p class="whitespace-nowrap">Ubah Status Pembayaran</p>
                    </a>
                    <a href="#image-modal2" id="quickActionButton2" class="flex hidden items-center mt-10 px-5 py-[0.73rem] ring-2 ring-red-500 rounded-md bg-primary-100 p-2 text-red-500 hover:bg-white transition-all duration-75 hover:text-red-500 text-base text-center">
                        <p class="whitespace-nowrap">Ubah Status Checkin</p>
                    </a>
                </div>
            </div>       
            <section class="container mx-auto">
                <main class="col-span-12 md:pt-0">
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
                                            Nama
                                            <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                                            </svg>
                                        </span>
                                    </th>
                                    <th>
                                        <span class="flex items-center">
                                            Jenis
                                            <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                                            </svg>
                                        </span>
                                    </th>
                                    <th>
                                        <span class="flex items-center">
                                            Status Checkin
                                            <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                                            </svg>
                                        </span>
                                    </th>
                                    <th>
                                        <span class="flex items-center">
                                            Nomor Invoice
                                            <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                                            </svg>
                                        </span>
                                    </th>
                                    <th>
                                        <span class="flex items-center">
                                            Total Biaya
                                            <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                                            </svg>
                                        </span>
                                    </th>
                                    <th>
                                        <span class="flex items-center">
                                            Status Pembayaran
                                            <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                                            </svg>
                                        </span>
                                    </th>
                                    <th>
                                        <span class="flex items-center">
                                            Metode Pambayaran
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
                                @forelse ($transactions as $key => $transaction)
                                    <tr class="cursor-pointer">
                                        <td scope="row" class="px-4 pe-0 py-4 font-medium text-gray-900 whitespace-nowrap">
                                         <input type="checkbox" name="selected_transactions[]" class="cursor-pointer child-checkbox w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600" value="{{ $transaction->id }}">
                                        </td>
                                        <td class="font-medium text-gray-900 whitespace-nowrap">{{$key + 1}}</td>
                                        <td class="font-medium text-gray-900 whitespace-nowrap">{{$transaction->name}}</td>
                                        <td class="font-medium text-gray-900 whitespace-nowrap">Kamar Hotel</td>
                                        @if($transaction->checkin_status == 'Sudah Checkin')
                                        <td>
                                            <p class="p-2 rounded-lg bg-green-100 border border-green-700 text-green-700 text-sm w-fit">{{$transaction->checkin_status}}</p>
                                        </td>
                                        @elseif($transaction->checkin_status == 'Sudah Checkout')
                                        <td>
                                            <p class="p-2 rounded-lg bg-green-100 border border-green-700 text-green-700 text-sm w-fit">{{$transaction->checkin_status}}</p>
                                        </td>
                                        @elseif($transaction->checkin_status == 'Belum')
                                        <td>
                                            <p class="p-2 rounded-lg bg-yellow-100 border border-yellow-700 text-yellow-700 text-sm w-fit">{{$transaction->checkin_status}}</p>
                                        </td>
                                        @elseif($transaction->checkin_status == 'Dibatalkan')
                                        <td>
                                            <p class="p-2 rounded-lg bg-red-100 border border-red-700 text-red-700 text-sm w-fit">{{$transaction->checkin_status}}</p>
                                        </td>
                                        @endif
                                        <td class="font-medium text-gray-900 whitespace-nowrap">{{$transaction->invoice}}</td>
                                        <td class="font-medium text-gray-900 whitespace-nowrap">Rp. {{number_format($transaction->total_price,0,',','.')}}</td>
                                        @if($transaction->payment_status == 'PAID')
                                        <td>
                                            <p class="p-2 rounded-lg bg-green-100 border border-green-700 text-green-700 text-sm w-fit">Lunas</p>
                                        </td>
                                        @elseif($transaction->payment_status == 'PENDING')
                                        <td>
                                            <p class="p-2 rounded-lg bg-yellow-100 border border-yellow-700 text-yellow-700 text-sm w-fit">Tertunda</p>
                                        </td>
                                        @elseif($transaction->payment_status == 'CANCELLED')
                                        <td>
                                            <p class="p-2 rounded-lg bg-red-100 border border-red-700 text-red-700 text-sm w-fit">Dibatalkan</p>
                                        </td>
                                        @endif
                                        <td class="font-medium text-gray-900 whitespace-nowrap">{{$transaction->payment_method}}</td>
                                        <td class="flex items-center justify-center">
                                            <div class="mr-2">
                                                <a href="{{route('dashboard.transaction.show', $transaction)}}" class="py-2 px-2 border-2 rounded-md border-primary-600 text-primary-500 text-center transition-all hover:bg-primary-500 hover:text-white">
                                                    <i class="bi bi-eye"></i>
                                                </a>
                                            </div>
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
        <div id="image-modal" class="fixed inset-0 z-50 bg-black bg-opacity-60 backdrop-blur-sm opacity-0 pointer-events-none transition-opacity duration-300 target:opacity-100 target:pointer-events-auto">
            <div class="fixed inset-0 flex items-center justify-center p-4">
                <!-- Modal content -->
                <div class="relative max-w-3xl mx-auto bg-white rounded-lg" onclick="event.stopPropagation()">
                    <!-- Close button -->
                    <a href="#" class="absolute right-4 top-4 text-gray-500 hover:text-gray-700">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </a>
                    
                    <!-- Modal content -->
                    <div class="p-16">
                        <form id="updateStatusForm" action="{{ route('dashboard.transactions.updateStatus') }}" method="POST" class="mb-4">
                            @csrf
                            <div class="mb-4">
                                <input type="hidden" name="transaction_ids[]" value="" id="selectedTransactionIds">
                                <label for="newStatus" class="block mb-2">
                                    Pilih Status:
                                    <br>
                                    <small class="text-red-700">Silakan pilih peran (role) baru yang ingin Anda terapkan. Pilihan peran ini akan menentukan hak akses dan tanggung jawab pengguna di dalam sistem.</small>
                                </label>
                                <select name="payment_status" id="newStatus" class="block w-full px-4 py-2 border rounded" required>
                                    <option value="">--Pilih Status Pembayaran--</option>
                                    <option value="PAID">PAID</option>
                                    <option value="CANCELLED">CANCELLED</option>
                                </select>
                            </div>
                            <div>
                                <button type="submit" class="inline-flex justify-center px-4 py-2 w-full text-sm font-medium text-white bg-primary-500 border border-transparent rounded-lg shadow-sm hover:bg-primary-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500" onclick="return confirm('are you want to submit this data?')">
                                    Ubah Status
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div id="image-modal2" class="fixed inset-0 z-50 bg-black bg-opacity-60 backdrop-blur-sm opacity-0 pointer-events-none transition-opacity duration-300 target:opacity-100 target:pointer-events-auto">
            <div class="fixed inset-0 flex items-center justify-center p-4">
                <!-- Modal content -->
                <div class="relative max-w-3xl mx-auto bg-white rounded-lg" onclick="event.stopPropagation()">
                    <!-- Close button -->
                    <a href="#" class="absolute right-4 top-4 text-gray-500 hover:text-gray-700">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </a>
                    
                    <!-- Modal content -->
                    <div class="p-16">
                        <form id="updateStatusForm" action="{{ route('dashboard.transactions.updateStatusCheckin') }}" method="POST" class="mb-4">
                            @csrf
                            <div class="mb-4">
                                <input type="hidden" name="transaction_ids[]" value="" id="selectedTransactionIds2">
                                <label for="newStatus" class="block mb-2">
                                    Pilih Status:
                                    <br>
                                    {{-- <small class="text-red-700">Silakan pilih peran (role) baru yang ingin Anda terapkan. Pilihan peran ini akan menentukan hak akses dan tanggung jawab pengguna di dalam sistem.</small> --}}
                                </label>
                                <select name="checkin_status" id="newStatus" class="block w-full px-4 py-2 border rounded" required>
                                    <option value="">--Pilih Status Checkin--</option>
                                    <option value="Belum">Belum</option>
                                    <option value="Sudah">Sudah Checkin</option>
                                    <option value="Sudah">Sudah Checkout</option>
                                    <option value="Dibatalkan">Dibatalkan</option>
                                </select>
                            </div>
                            <div>
                                <button type="submit" class="inline-flex justify-center px-4 py-2 w-full text-sm font-medium text-white bg-primary-500 border border-transparent rounded-lg shadow-sm hover:bg-primary-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500" onclick="return confirm('are you want to submit this data?')">
                                    Ubah Status
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
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

        const toggleQuickActionButton2 = () => {
            const quickActionButton2 = document.getElementById('quickActionButton2');
            const masterCheckbox = document.getElementById('masterCheckbox');
            const childCheckboxes = document.querySelectorAll('.child-checkbox');
            
            // Check if any checkbox is selected (either master or any child)
            const isAnyCheckboxSelected = masterCheckbox.checked || 
                Array.from(childCheckboxes).some(checkbox => checkbox.checked);
            
            // Show/hide quick action button based on selection
            if (isAnyCheckboxSelected) {
                quickActionButton2.style.display = 'flex';
            } else {
                quickActionButton2.style.display = 'none';
            }
        };

        // Add event listeners to master checkbox
        document.getElementById('masterCheckbox').addEventListener('change', toggleQuickActionButton2);

        // Add event listeners to all child checkboxes
        document.querySelectorAll('.child-checkbox').forEach(checkbox => {
            checkbox.addEventListener('change', toggleQuickActionButton2);
        });

        document.addEventListener('DOMContentLoaded', function () {
            // Ambil semua checkbox dan hidden input
            const checkboxes = document.querySelectorAll('input[name="selected_transactions[]"]');
            const hiddenInput = document.getElementById('selectedTransactionIds');

            // Function untuk update hidden input
            function updateHiddenInput() {
                // Ambil semua checkbox yang tercentang dan ambil valuenya
                const selectedValues = Array.from(checkboxes)
                    .filter(checkbox => checkbox.checked)
                    .map(checkbox => checkbox.value);
                
                // Update value hidden input dengan value checkbox yang tercentang
                hiddenInput.value = selectedValues.join(',');
                
                // Debug log
                console.log('Selected transactions:', hiddenInput.value);
            }
            // Pasang event listener ke setiap checkbox
            checkboxes.forEach(checkbox => {
                checkbox.addEventListener('change', updateHiddenInput);
            });

            // Jalankan updateHiddenInput saat halaman dimuat
            updateHiddenInput();
        });

        document.addEventListener('DOMContentLoaded', function () {
            // Ambil semua checkbox dan hidden input
            const checkboxes = document.querySelectorAll('input[name="selected_transactions[]"]');
            const hiddenInput = document.getElementById('selectedTransactionIds2');

            // Function untuk update hidden input
            function updateHiddenInput2() {
                // Ambil semua checkbox yang tercentang dan ambil valuenya
                const selectedValues = Array.from(checkboxes)
                    .filter(checkbox => checkbox.checked)
                    .map(checkbox => checkbox.value);
                
                // Update value hidden input dengan value checkbox yang tercentang
                hiddenInput.value = selectedValues.join(',');
                
                // Debug log
                console.log('Selected transactions:', hiddenInput.value);
            }

            // Pasang event listener ke setiap checkbox
            checkboxes.forEach(checkbox => {
                checkbox.addEventListener('change', updateHiddenInput2);
            });

            // Jalankan updateHiddenInput saat halaman dimuat
            updateHiddenInput2();
        });
    </script>
@endpush