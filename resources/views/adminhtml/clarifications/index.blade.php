<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('declaraciones') }}
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
                                        debtor_id
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        cel
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        telephone
                                    </th>

                                    <th scope="col" class="px-6 py-3">
                                        email
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        ver
                                    </th>
                                </tr>
                            </thead>
                            <tbody>

                                @if ($clarifications->count() > 0)
                                    @foreach ($clarifications as $clarification)
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ $clarification->debtor->full_name }}
                                            </th>
                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ $clarification->cel }}
                                            </th>
                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ $clarification->telephone }}
                                            </th>

                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ $clarification->email }}
                                            </th>
                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                <a href="{{ route('clarification.show', $clarification->id) }}"
                                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Ver</a>
                                            </th>
                                        </tr>
                                    @endforeach
                                @endif

                                {{-- @if ($maps->count() > 0)
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
                                                {{ $map->interested == 1 ? 'Entro' : 'No' }}
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
                                @endif --}}


                            </tbody>
                        </table>
                    </div>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
