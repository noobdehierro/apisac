<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('mapa') }}
            </h2>

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
                                        Cliente deudor
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Ayuda
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        aclaración
                                    </th>

                                    <th scope="col" class="px-6 py-3">
                                        No soy yo
                                    </th>

                                    <th scope="col" class="px-6 py-3">
                                        Sola exhibición
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Cuotas
                                    </th>

                                </tr>
                            </thead>
                            <tbody>

                                @if ($maps->count() > 0)
                                    @foreach ($maps as $map)
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ $map->debtor->full_name }}
                                            </th>

                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ $map->help == 1 ? 'Entro' : 'No' }}
                                            </th>

                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ $map->clarification == 1 ? 'Entro' : 'No' }}
                                            </th>

                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ $map->imNot == 1 ? 'Entro' : 'No' }}
                                            </th>

                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ $map->exhibition == 1 ? 'Entro' : 'No' }}
                                            </th>

                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ $map->Installments == 1 ? 'Entro' : 'No' }}
                                            </th>

                                        </tr>
                                    @endforeach
                                @endif


                            </tbody>
                        </table>
                    </div>
                    {{ $maps->links() }}


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
