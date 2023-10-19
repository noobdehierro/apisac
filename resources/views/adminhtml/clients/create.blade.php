<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Nuevo Cliente') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <form action="{{ route('clients.store') }}" method="POST">
                        @csrf

                        <div>
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                                :value="old('name')" autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="access_code" :value="__('Access Code')" />
                            <x-text-input id="access_code" class="block mt-1 w-full" type="text" name="access_code"
                                :value="old('access_code')" autofocus autocomplete="access_code" />
                            <x-input-error :messages="$errors->get('access_code')" class="mt-2" />
                        </div>



                        <div>
                            <select name="status" class="block mt-1 w-full">
                                <option value="">Seleccione un estado</option>
                                <option value="inactivo">Inactivo</option>
                                <option value="activo">Activo</option>
                                <option value="pagando">Pagando</option>

                            </select>
                            <x-input-error :messages="$errors->get('status')" class="mt-2" />

                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button>
                                {{ __('Guardar') }}
                            </x-primary-button>
                            <a href="{{ route('clients.index') }}"
                                class="ml-4 inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">Regresar</a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
