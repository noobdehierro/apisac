<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Clientes') }}
            </h2>
            <a href="{{ route('clients.create') }}" class="bg-green-500 text-white py-2 px-4 rounded hover:bg-green-600">
                Crear nuevo cliente
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
                                        Nombre
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Codigo de acceso
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Estatus
                                    </th>

                                    <th scope="col" class="px-6 py-3">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>

                                @if ($clients->count() > 0)
                                    @foreach ($clients as $client)
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ $client->name }}
                                            </th>
                                            <td class="px-6 py-4">
                                                {{ $client->access_code }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $client->status }}
                                            </td>
                                            <td class="px-6 py-4">
                                                <a href="{{ route('clients.edit', $client->id) }}"
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
