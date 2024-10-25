@extends('layouts.dahboard_layout')

@section('title', 'My Account')

@section('breadcrumb')
    <ol class="flex flex-wrap pt-1 mr-12 bg-transparent rounded-lg sm:mr-16">
            <li class="text-sm leading-normal">
            <a class="text-white opacity-90" href="javascript:;">Dashboard</a>
            </li>
            <li class="text-sm pl-2 text-white capitalize leading-normal  before:float-left before:pr-2 before: before:content-['/']" aria-current="page">Profile</li>
        </ol>
    <h6 class="mb-0 font-bold text-white capitalize">My Account</h6>
@endsection

@section('content')
    <main class="h-full overflow-y-auto">
        <div class="container mx-auto">
            <div class="grid w-full gap-5 px-10 mx-auto md:grid-cols-12">
                <div class="col-span-12">
                    <h2 class="mt-8 mb-1 text-2xl font-semibold text-white">
                        Edit My Profile
                    </h2>
                    <p class="text-sm text-white">
                        Enter your data Correctly & Properly
                    </p>
                </div>
            </div>
        </div>       
        <section class="container px-6 mx-auto mt-5">
            <main class="col-span-12 md:pt-0">
                <div class="p-10 mt-2 bg-white rounded-xl">
                    <table id="selection-table" class="">
                        <thead>
                            <tr>
                                <th>
                                    <span class="flex items-center">
                                        Name
                                        <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                                        </svg>
                                    </span>
                                </th>
                                <th data-type="date" data-format="YYYY/DD/MM">
                                    <span class="flex items-center">
                                        Release Date
                                        <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                                        </svg>
                                    </span>
                                </th>
                                <th>
                                    <span class="flex items-center">
                                        NPM Downloads
                                        <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                                        </svg>
                                    </span>
                                </th>
                                <th>
                                    <span class="flex items-center">
                                        Growth
                                        <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                                        </svg>
                                    </span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class=" cursor-pointer">
                                <td class="font-medium text-gray-900 whitespace-nowrap">Flowbite</td>
                                <td>2021/25/09</td>
                                <td>269000</td>
                                <td>49%</td>
                            </tr>
                            <tr class=" cursor-pointer">
                                <td class="font-medium text-gray-900 whitespace-nowrap">React</td>
                                <td>2013/24/05</td>
                                <td>4500000</td>
                                <td>24%</td>
                            </tr>
                            <tr class=" cursor-pointer">
                                <td class="font-medium text-gray-900 whitespace-nowrap">Angular</td>
                                <td>2010/20/09</td>
                                <td>2800000</td>
                                <td>17%</td>
                            </tr>
                            <tr class=" cursor-pointer">
                                <td class="font-medium text-gray-900 whitespace-nowrap">Vue</td>
                                <td>2014/12/02</td>
                                <td>3600000</td>
                                <td>30%</td>
                            </tr>
                            <tr class=" cursor-pointer">
                                <td class="font-medium text-gray-900 whitespace-nowrap">Svelte</td>
                                <td>2016/26/11</td>
                                <td>1200000</td>
                                <td>57%</td>
                            </tr>
                            <tr class=" cursor-pointer">
                                <td class="font-medium text-gray-900 whitespace-nowrap">Ember</td>
                                <td>2011/08/12</td>
                                <td>500000</td>
                                <td>44%</td>
                            </tr>
                            <tr class=" cursor-pointer">
                                <td class="font-medium text-gray-900 whitespace-nowrap">Backbone</td>
                                <td>2010/13/10</td>
                                <td>300000</td>
                                <td>9%</td>
                            </tr>
                            <tr class=" cursor-pointer">
                                <td class="font-medium text-gray-900 whitespace-nowrap">jQuery</td>
                                <td>2006/28/01</td>
                                <td>6000000</td>
                                <td>5%</td>
                            </tr>
                            <tr class=" cursor-pointer">
                                <td class="font-medium text-gray-900 whitespace-nowrap">Bootstrap</td>
                                <td>2011/19/08</td>
                                <td>1800000</td>
                                <td>12%</td>
                            </tr>
                            <tr class=" cursor-pointer">
                                <td class="font-medium text-gray-900 whitespace-nowrap">Foundation</td>
                                <td>2011/23/09</td>
                                <td>700000</td>
                                <td>8%</td>
                            </tr>
                            <tr class=" cursor-pointer">
                                <td class="font-medium text-gray-900 whitespace-nowrap">Bulma</td>
                                <td>2016/24/10</td>
                                <td>500000</td>
                                <td>7%</td>
                            </tr>
                            <tr class=" cursor-pointer">
                                <td class="font-medium text-gray-900 whitespace-nowrap">Next.js</td>
                                <td>2016/25/10</td>
                                <td>2300000</td>
                                <td>45%</td>
                            </tr>
                            <tr class=" cursor-pointer">
                                <td class="font-medium text-gray-900 whitespace-nowrap">Nuxt.js</td>
                                <td>2016/16/10</td>
                                <td>900000</td>
                                <td>50%</td>
                            </tr>
                            <tr class=" cursor-pointer">
                                <td class="font-medium text-gray-900 whitespace-nowrap">Meteor</td>
                                <td>2012/17/01</td>
                                <td>1000000</td>
                                <td>10%</td>
                            </tr>
                            <tr class=" cursor-pointer">
                                <td class="font-medium text-gray-900 whitespace-nowrap">Aurelia</td>
                                <td>2015/08/07</td>
                                <td>200000</td>
                                <td>20%</td>
                            </tr>
                            <tr class=" cursor-pointer">
                                <td class="font-medium text-gray-900 whitespace-nowrap">Inferno</td>
                                <td>2016/27/09</td>
                                <td>100000</td>
                                <td>35%</td>
                            </tr>
                            <tr class=" cursor-pointer">
                                <td class="font-medium text-gray-900 whitespace-nowrap">Preact</td>
                                <td>2015/16/08</td>
                                <td>600000</td>
                                <td>28%</td>
                            </tr>
                            <tr class=" cursor-pointer">
                                <td class="font-medium text-gray-900 whitespace-nowrap">Lit</td>
                                <td>2018/28/05</td>
                                <td>400000</td>
                                <td>60%</td>
                            </tr>
                            <tr class=" cursor-pointer">
                                <td class="font-medium text-gray-900 whitespace-nowrap">Alpine.js</td>
                                <td>2019/02/11</td>
                                <td>300000</td>
                                <td>70%</td>
                            </tr>
                            <tr class=" cursor-pointer">
                                <td class="font-medium text-gray-900 whitespace-nowrap">Stimulus</td>
                                <td>2018/06/03</td>
                                <td>150000</td>
                                <td>25%</td>
                            </tr>
                            <tr class=" cursor-pointer">
                                <td class="font-medium text-gray-900 whitespace-nowrap">Solid</td>
                                <td>2021/05/07</td>
                                <td>250000</td>
                                <td>80%</td>
                            </tr>
                        </tbody>
                </table>
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
@endpush