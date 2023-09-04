<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">

            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Editar pago') }}
            </h2>
            <form action="{{ route('agreements.destroy', $agreements->id) }}" method="POST">
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

                    <form action="{{ route('agreements.update', $agreements->id) }}" method="POST">
                        @csrf
                        @method('PUT')


                        <div>
                            <x-input-label for="status" :value="__('Estado')" />
                            <x-text-input id="status" class="block mt-1 w-full" type="text" name="status"
                                :value="old('status', $agreements->status)" autofocus autocomplete="status" />
                            <x-input-error :messages="$errors->get('status')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="agreement_type" :value="__('Tipo de acuerdo')" />
                            <x-text-input id="agreement_type" class="block mt-1 w-full" type="text"
                                name="agreement_type" :value="old('agreement_type', $agreements->agreement_type)" autofocus autocomplete="agreement_type" />
                            <x-input-error :messages="$errors->get('agreement_type')" class="mt-2" />
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button>
                                {{ __('Guardar') }}
                            </x-primary-button>
                            <a href="{{ route('agreements.index') }}"
                                class="ml-4 inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">Regresar</a>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
