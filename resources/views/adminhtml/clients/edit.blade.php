<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">

            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Editar Cliente') }}
            </h2>
            <form action="{{ route('clients.destroy', $client->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                    Eliminar
                </button>
            </form>

        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <form action="{{ route('clients.update', $client->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div>
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full"
                                :value="old('name', $client->name)" autofocus autocomplete="name" />
                            <x-input-error class="mt-2" :messages="$errors->get('name')" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="access_code" :value="__('Codigo de acceso')" />
                            <x-text-input id="access_code" name="access_code" type="text" class="mt-1 block w-full"
                                :value="old('access_code', $client->access_code)" />
                            <x-input-error class="mt-2" :messages="$errors->get('access_code')" />
                        </div>



                        <div class="mt-4">
                            <select name="status" class="block mt-1 w-full">
                                <option value="">Seleccione un estado</option>
                                <option value="inactivo">Inactivo</option>
                                <option value="activo">Activo</option>
                                <option value="convenio">Convenio</option>
                            </select>
                            <x-input-error class="mt-2" :messages="$errors->get('status')" />
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
