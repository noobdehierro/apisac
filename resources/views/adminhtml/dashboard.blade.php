<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="p-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
                            <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5">
                                <div class="flex justify-center mb-6">
                                    <div>
                                        <div class="text-center mb-1">
                                            <div class="text-2xl font-semibold">{{ $countDebtors }}</div>
                                        </div>
                                        <div class="text-sm font-medium text-gray-400">Usuarios deudores</div>
                                    </div>

                                </div>

                                <a href="/debtors" class="text-[#f84525] font-medium text-sm hover:text-red-800">Ver
                                    más</a>
                            </div>
                            <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5">
                                <div class="flex justify-center mb-4">
                                    <div>
                                        <div class="text-center mb-1">
                                            <div class="text-2xl font-semibold">{{ $countAgreements }}</div>
                                            {{-- <div
                                                class="p-1 rounded bg-emerald-500/10 text-emerald-500 text-[12px] font-semibold leading-none ml-2">
                                                +30%</div> --}}
                                        </div>
                                        <div class="text-sm font-medium text-gray-400">Numero de contratos</div>
                                    </div>

                                </div>
                                <a href="/agreements" class="text-[#f84525] font-medium text-sm hover:text-red-800">Ver
                                    más</a>
                            </div>
                            <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5">
                                <div class="flex justify-around text-center mb-6">
                                    <div>
                                        <div class="text-2xl font-semibold mb-1">{{ $contado }}</div>
                                        <div class="text-sm font-medium text-gray-400">Pagos de contado</div>
                                    </div>
                                    <div>
                                        <div class="text-2xl font-semibold mb-1">{{ $credito }}</div>
                                        <div class="text-sm font-medium text-gray-400">Pagos de credito</div>
                                    </div>

                                </div>
                                <a href="/agreements"
                                    class="text-[#f84525] font-medium text-sm hover:text-red-800">View</a>
                            </div>
                        </div>
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
                            {{-- <div
                                class="p-6 relative flex flex-col min-w-0 mb-4 lg:mb-0 break-words bg-gray-50 dark:bg-gray-800 w-full shadow-lg rounded">
                                <div class="rounded-t mb-0 px-0 border-0">
                                    <div class="flex flex-wrap items-center px-4 py-2">
                                        <div class="relative w-full max-w-full flex-grow flex-1">
                                            <h3 class="font-semibold text-base text-gray-900 dark:text-gray-50">Users
                                            </h3>
                                        </div>
                                    </div>
                                    <div class="block w-full overflow-x-auto">
                                        <table class="items-center w-full bg-transparent border-collapse">
                                            <thead>
                                                <tr>
                                                    <th
                                                        class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                                        Role</th>
                                                    <th
                                                        class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                                        Amount</th>
                                                    <th
                                                        class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px">
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="text-gray-700 dark:text-gray-100">
                                                    <th
                                                        class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left">
                                                        Administrator</th>
                                                    <td
                                                        class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                                        1</td>
                                                    <td
                                                        class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                                        <div class="flex items-center">
                                                            <span class="mr-2">70%</span>
                                                            <div class="relative w-full">
                                                                <div
                                                                    class="overflow-hidden h-2 text-xs flex rounded bg-blue-200">
                                                                    <div style="width: 70%"
                                                                        class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-blue-600">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr class="text-gray-700 dark:text-gray-100">
                                                    <th
                                                        class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left">
                                                        User</th>
                                                    <td
                                                        class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                                        6</td>
                                                    <td
                                                        class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                                        <div class="flex items-center">
                                                            <span class="mr-2">40%</span>
                                                            <div class="relative w-full">
                                                                <div
                                                                    class="overflow-hidden h-2 text-xs flex rounded bg-blue-200">
                                                                    <div style="width: 40%"
                                                                        class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-blue-500">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr class="text-gray-700 dark:text-gray-100">
                                                    <th
                                                        class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left">
                                                        User</th>
                                                    <td
                                                        class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                                        5</td>
                                                    <td
                                                        class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                                        <div class="flex items-center">
                                                            <span class="mr-2">45%</span>
                                                            <div class="relative w-full">
                                                                <div
                                                                    class="overflow-hidden h-2 text-xs flex rounded bg-pink-200">
                                                                    <div style="width: 45%"
                                                                        class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-pink-500">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr class="text-gray-700 dark:text-gray-100">
                                                    <th
                                                        class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left">
                                                        User</th>
                                                    <td
                                                        class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                                        4</td>
                                                    <td
                                                        class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                                        <div class="flex items-center">
                                                            <span class="mr-2">60%</span>
                                                            <div class="relative w-full">
                                                                <div
                                                                    class="overflow-hidden h-2 text-xs flex rounded bg-red-200">
                                                                    <div style="width: 60%"
                                                                        class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-red-500">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div> --}}
                            {{-- <div class="bg-white border border-gray-100 shadow-md shadow-black/5 p-6 rounded-md">
                                <div class="flex justify-between mb-4 items-start">
                                    <div class="font-medium">Activities</div>
                                    <div class="dropdown">
                                        <button type="button"
                                            class="dropdown-toggle text-gray-400 hover:text-gray-600"><i
                                                class="ri-more-fill"></i></button>
                                        <ul
                                            class="dropdown-menu shadow-md shadow-black/5 z-30 hidden py-1.5 rounded-md bg-white border border-gray-100 w-full max-w-[140px]">
                                            <li>
                                                <a href="#"
                                                    class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Profile</a>
                                            </li>
                                            <li>
                                                <a href="#"
                                                    class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Settings</a>
                                            </li>
                                            <li>
                                                <a href="#"
                                                    class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Logout</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="overflow-hidden">
                                    <table class="w-full min-w-[540px]">
                                        <tbody>
                                            <tr>
                                                <td class="py-2 px-4 border-b border-b-gray-50">
                                                    <div class="flex items-center">
                                                        <a href="#"
                                                            class="text-gray-600 text-sm font-medium hover:text-blue-500 ml-2 truncate">Lorem
                                                            Ipsum</a>
                                                    </div>
                                                </td>
                                                <td class="py-2 px-4 border-b border-b-gray-50">
                                                    <span
                                                        class="text-[13px] font-medium text-gray-400">02-02-2024</span>
                                                </td>
                                                <td class="py-2 px-4 border-b border-b-gray-50">
                                                    <span class="text-[13px] font-medium text-gray-400">17.45</span>
                                                </td>
                                                <td class="py-2 px-4 border-b border-b-gray-50">
                                                    <div class="dropdown">
                                                        <button type="button"
                                                            class="dropdown-toggle text-gray-400 hover:text-gray-600 text-sm w-6 h-6 rounded flex items-center justify-center bg-gray-50"><i
                                                                class="ri-more-2-fill"></i></button>
                                                        <ul
                                                            class="dropdown-menu shadow-md shadow-black/5 z-30 hidden py-1.5 rounded-md bg-white border border-gray-100 w-full max-w-[140px]">
                                                            <li>
                                                                <a href="#"
                                                                    class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Profile</a>
                                                            </li>
                                                            <li>
                                                                <a href="#"
                                                                    class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Settings</a>
                                                            </li>
                                                            <li>
                                                                <a href="#"
                                                                    class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Logout</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="py-2 px-4 border-b border-b-gray-50">
                                                    <div class="flex items-center">
                                                        <a href="#"
                                                            class="text-gray-600 text-sm font-medium hover:text-blue-500 ml-2 truncate">Lorem
                                                            Ipsum</a>
                                                    </div>
                                                </td>
                                                <td class="py-2 px-4 border-b border-b-gray-50">
                                                    <span
                                                        class="text-[13px] font-medium text-gray-400">02-02-2024</span>
                                                </td>
                                                <td class="py-2 px-4 border-b border-b-gray-50">
                                                    <span class="text-[13px] font-medium text-gray-400">17.45</span>
                                                </td>
                                                <td class="py-2 px-4 border-b border-b-gray-50">
                                                    <div class="dropdown">
                                                        <button type="button"
                                                            class="dropdown-toggle text-gray-400 hover:text-gray-600 text-sm w-6 h-6 rounded flex items-center justify-center bg-gray-50"><i
                                                                class="ri-more-2-fill"></i></button>
                                                        <ul
                                                            class="dropdown-menu shadow-md shadow-black/5 z-30 hidden py-1.5 rounded-md bg-white border border-gray-100 w-full max-w-[140px]">
                                                            <li>
                                                                <a href="#"
                                                                    class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Profile</a>
                                                            </li>
                                                            <li>
                                                                <a href="#"
                                                                    class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Settings</a>
                                                            </li>
                                                            <li>
                                                                <a href="#"
                                                                    class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Logout</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div> --}}
                            {{-- <div class="py-12">
                                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                                        <div class="p-6 text-gray-900">
                                            <canvas id="myChart" width="400" height="200"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
                            {{-- <div
                                class="bg-white border border-gray-100 shadow-md shadow-black/5 p-6 rounded-md lg:col-span-2">
                                <div class="py-12">
                                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                                            <div class="p-6 text-gray-900">
                                                <div id="chart"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                            {{-- <div class="bg-white border border-gray-100 shadow-md shadow-black/5 p-6 rounded-md">
                                <div class="flex justify-between mb-4 items-start">
                                    <div class="font-medium">Earnings</div>
                                    <div class="dropdown">
                                        <button type="button"
                                            class="dropdown-toggle text-gray-400 hover:text-gray-600"><i
                                                class="ri-more-fill"></i></button>
                                        <ul
                                            class="dropdown-menu shadow-md shadow-black/5 z-30 hidden py-1.5 rounded-md bg-white border border-gray-100 w-full max-w-[140px]">
                                            <li>
                                                <a href="#"
                                                    class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Profile</a>
                                            </li>
                                            <li>
                                                <a href="#"
                                                    class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Settings</a>
                                            </li>
                                            <li>
                                                <a href="#"
                                                    class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Logout</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="overflow-x-auto">
                                    <table class="w-full min-w-[460px]">
                                        <thead>
                                            <tr>
                                                <th
                                                    class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 bg-gray-50 text-left rounded-tl-md rounded-bl-md">
                                                    Service</th>
                                                <th
                                                    class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 bg-gray-50 text-left">
                                                    Earning</th>
                                                <th
                                                    class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 bg-gray-50 text-left rounded-tr-md rounded-br-md">
                                                    Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="py-2 px-4 border-b border-b-gray-50">
                                                    <div class="flex items-center">
                                                        <img src="https://placehold.co/32x32" alt=""
                                                            class="w-8 h-8 rounded object-cover block">
                                                        <a href="#"
                                                            class="text-gray-600 text-sm font-medium hover:text-blue-500 ml-2 truncate">Create
                                                            landing page</a>
                                                    </div>
                                                </td>
                                                <td class="py-2 px-4 border-b border-b-gray-50">
                                                    <span class="text-[13px] font-medium text-emerald-500">+$235</span>
                                                </td>
                                                <td class="py-2 px-4 border-b border-b-gray-50">
                                                    <span
                                                        class="inline-block p-1 rounded bg-emerald-500/10 text-emerald-500 font-medium text-[12px] leading-none">Pending</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="py-2 px-4 border-b border-b-gray-50">
                                                    <div class="flex items-center">
                                                        <img src="https://placehold.co/32x32" alt=""
                                                            class="w-8 h-8 rounded object-cover block">
                                                        <a href="#"
                                                            class="text-gray-600 text-sm font-medium hover:text-blue-500 ml-2 truncate">Create
                                                            landing page</a>
                                                    </div>
                                                </td>
                                                <td class="py-2 px-4 border-b border-b-gray-50">
                                                    <span class="text-[13px] font-medium text-rose-500">-$235</span>
                                                </td>
                                                <td class="py-2 px-4 border-b border-b-gray-50">
                                                    <span
                                                        class="inline-block p-1 rounded bg-rose-500/10 text-rose-500 font-medium text-[12px] leading-none">Withdrawn</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="py-2 px-4 border-b border-b-gray-50">
                                                    <div class="flex items-center">
                                                        <img src="https://placehold.co/32x32" alt=""
                                                            class="w-8 h-8 rounded object-cover block">
                                                        <a href="#"
                                                            class="text-gray-600 text-sm font-medium hover:text-blue-500 ml-2 truncate">Create
                                                            landing page</a>
                                                    </div>
                                                </td>
                                                <td class="py-2 px-4 border-b border-b-gray-50">
                                                    <span class="text-[13px] font-medium text-emerald-500">+$235</span>
                                                </td>
                                                <td class="py-2 px-4 border-b border-b-gray-50">
                                                    <span
                                                        class="inline-block p-1 rounded bg-emerald-500/10 text-emerald-500 font-medium text-[12px] leading-none">Pending</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="py-2 px-4 border-b border-b-gray-50">
                                                    <div class="flex items-center">
                                                        <img src="https://placehold.co/32x32" alt=""
                                                            class="w-8 h-8 rounded object-cover block">
                                                        <a href="#"
                                                            class="text-gray-600 text-sm font-medium hover:text-blue-500 ml-2 truncate">Create
                                                            landing page</a>
                                                    </div>
                                                </td>
                                                <td class="py-2 px-4 border-b border-b-gray-50">
                                                    <span class="text-[13px] font-medium text-rose-500">-$235</span>
                                                </td>
                                                <td class="py-2 px-4 border-b border-b-gray-50">
                                                    <span
                                                        class="inline-block p-1 rounded bg-rose-500/10 text-rose-500 font-medium text-[12px] leading-none">Withdrawn</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="py-2 px-4 border-b border-b-gray-50">
                                                    <div class="flex items-center">
                                                        <img src="https://placehold.co/32x32" alt=""
                                                            class="w-8 h-8 rounded object-cover block">
                                                        <a href="#"
                                                            class="text-gray-600 text-sm font-medium hover:text-blue-500 ml-2 truncate">Create
                                                            landing page</a>
                                                    </div>
                                                </td>
                                                <td class="py-2 px-4 border-b border-b-gray-50">
                                                    <span class="text-[13px] font-medium text-emerald-500">+$235</span>
                                                </td>
                                                <td class="py-2 px-4 border-b border-b-gray-50">
                                                    <span
                                                        class="inline-block p-1 rounded bg-emerald-500/10 text-emerald-500 font-medium text-[12px] leading-none">Pending</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="py-2 px-4 border-b border-b-gray-50">
                                                    <div class="flex items-center">
                                                        <img src="https://placehold.co/32x32" alt=""
                                                            class="w-8 h-8 rounded object-cover block">
                                                        <a href="#"
                                                            class="text-gray-600 text-sm font-medium hover:text-blue-500 ml-2 truncate">Create
                                                            landing page</a>
                                                    </div>
                                                </td>
                                                <td class="py-2 px-4 border-b border-b-gray-50">
                                                    <span class="text-[13px] font-medium text-rose-500">-$235</span>
                                                </td>
                                                <td class="py-2 px-4 border-b border-b-gray-50">
                                                    <span
                                                        class="inline-block p-1 rounded bg-rose-500/10 text-rose-500 font-medium text-[12px] leading-none">Withdrawn</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="py-2 px-4 border-b border-b-gray-50">
                                                    <div class="flex items-center">
                                                        <img src="https://placehold.co/32x32" alt=""
                                                            class="w-8 h-8 rounded object-cover block">
                                                        <a href="#"
                                                            class="text-gray-600 text-sm font-medium hover:text-blue-500 ml-2 truncate">Create
                                                            landing page</a>
                                                    </div>
                                                </td>
                                                <td class="py-2 px-4 border-b border-b-gray-50">
                                                    <span class="text-[13px] font-medium text-emerald-500">+$235</span>
                                                </td>
                                                <td class="py-2 px-4 border-b border-b-gray-50">
                                                    <span
                                                        class="inline-block p-1 rounded bg-emerald-500/10 text-emerald-500 font-medium text-[12px] leading-none">Pending</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="py-2 px-4 border-b border-b-gray-50">
                                                    <div class="flex items-center">
                                                        <img src="https://placehold.co/32x32" alt=""
                                                            class="w-8 h-8 rounded object-cover block">
                                                        <a href="#"
                                                            class="text-gray-600 text-sm font-medium hover:text-blue-500 ml-2 truncate">Create
                                                            landing page</a>
                                                    </div>
                                                </td>
                                                <td class="py-2 px-4 border-b border-b-gray-50">
                                                    <span class="text-[13px] font-medium text-rose-500">-$235</span>
                                                </td>
                                                <td class="py-2 px-4 border-b border-b-gray-50">
                                                    <span
                                                        class="inline-block p-1 rounded bg-rose-500/10 text-rose-500 font-medium text-[12px] leading-none">Withdrawn</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="py-2 px-4 border-b border-b-gray-50">
                                                    <div class="flex items-center">
                                                        <img src="https://placehold.co/32x32" alt=""
                                                            class="w-8 h-8 rounded object-cover block">
                                                        <a href="#"
                                                            class="text-gray-600 text-sm font-medium hover:text-blue-500 ml-2 truncate">Create
                                                            landing page</a>
                                                    </div>
                                                </td>
                                                <td class="py-2 px-4 border-b border-b-gray-50">
                                                    <span class="text-[13px] font-medium text-emerald-500">+$235</span>
                                                </td>
                                                <td class="py-2 px-4 border-b border-b-gray-50">
                                                    <span
                                                        class="inline-block p-1 rounded bg-emerald-500/10 text-emerald-500 font-medium text-[12px] leading-none">Pending</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="py-2 px-4 border-b border-b-gray-50">
                                                    <div class="flex items-center">
                                                        <img src="https://placehold.co/32x32" alt=""
                                                            class="w-8 h-8 rounded object-cover block">
                                                        <a href="#"
                                                            class="text-gray-600 text-sm font-medium hover:text-blue-500 ml-2 truncate">Create
                                                            landing page</a>
                                                    </div>
                                                </td>
                                                <td class="py-2 px-4 border-b border-b-gray-50">
                                                    <span class="text-[13px] font-medium text-rose-500">-$235</span>
                                                </td>
                                                <td class="py-2 px-4 border-b border-b-gray-50">
                                                    <span
                                                        class="inline-block p-1 rounded bg-rose-500/10 text-rose-500 font-medium text-[12px] leading-none">Withdrawn</span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                datasets: [{
                    label: '# of Votes',
                    data: [12, 19, 3, 5, 2, 3],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        var options = {
            chart: {
                type: 'line',
                height: 350
            },
            series: [{
                name: 'sales',
                data: [30, 40, 35, 50, 49, 60, 70, 91, 125]
            }],
            xaxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep']
            }
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();


        var options = {
            chart: {
                type: 'pie',
                height: 350
            },
            series: [44, 55, 41, 17, 15],
            labels: ['A', 'B', 'C', 'D', 'E'],
        };

        var pieChart = new ApexCharts(document.querySelector("#pieChart"), options);
        pieChart.render();
    </script>
</x-app-layout>
