<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Acuerdos') }}
            </h2>
            <a href="{{ route('agreements.create') }}"
                class="bg-green-500 text-white py-2 px-4 rounded hover:bg-green-600">
                Crear nuevo acuerdo
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">


                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Cliente
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Status
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Tipo de acuerdo
                                    </th>

                                    <th scope="col" class="px-6 py-3">
                                        Numero de cuotas
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Unidad de Tiempo
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Monto por cuota
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Acciones
                                    </th>
                                </tr>
                            </thead>
                            <tbody>

                                @if ($agreements->count() > 0)
                                    @foreach ($agreements as $agreement)
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ $agreement->client->name }}
                                            </th>
                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ $agreement->status }}
                                            </th>

                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ $agreement->agreement_type }}
                                            </th>
                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ $agreement->number_installments }}
                                            </th>
                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ $agreement->unit_time }}
                                            </th>
                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ $agreement->amount_per_installment }}
                                            </th>


                                            <td class="px-6 py-4">
                                                <a href="{{ route('agreements.edit', $agreement->id) }}"
                                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Ver</a>
                                            </td>

                                        </tr>
                                    @endforeach

                                @endif
                            </tbody>
                        </table>
                    </div>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
