<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">

            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Detalles') }}
            </h2>

        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <div>
                        <x-input-label for="nombre" :value="__('Nombre')" />
                        <x-text-input disabled id="nombre" class="block mt-1 w-full" type="text" name="nombre"
                            value="{{ $clarification->debtor->full_name }}" />
                    </div>

                    <div>
                        <x-input-label for="cel" :value="__('Celular')" />
                        <x-text-input disabled id="cel" class="block mt-1 w-full" type="text" name="cel"
                            value="{{ $clarification->cel }}" />
                    </div>

                    <div>
                        <x-input-label for="telefono" :value="__('Telefono')" />
                        <x-text-input disabled id="telefono" class="block mt-1 w-full" type="text" name="telefono"
                            value="{{ $clarification->telephone }}" />
                    </div>

                    <div>
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input disabled id="email" class="block mt-1 w-full" type="text" name="email"
                            value="{{ $clarification->email }}" />
                    </div>

                    <div>
                        <x-input-label for="ver" :value="__('Ver')" />
                        <textarea disabled id="ver" class="block mt-1 w-full" type="text" name="ver">{{ $clarification->clarification }}</textarea>

                    </div>


                    <div class="flex items-center justify-end mt-4">
                        <a href="{{ route('clarification.index') }}"
                            class="ml-4 inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">Regresar</a>
                    </div>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
