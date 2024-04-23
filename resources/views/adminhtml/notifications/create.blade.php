<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">

            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Nueva notificaciones') }}
            </h2>
        </div>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('statusNotifications.store') }}" enctype="multipart/form-data">
                        @csrf
                        
                        <x-input-label for="file_upload" :value="__('Subir Archivo')" />
                        <input type="file" name="file_upload" id="file_upload" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
                        <x-input-error :messages="$errors->get('file_upload')" class="mt-2" />

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button>
                                {{ __('Guardar') }}
                            </x-primary-button>
                            <a href="{{ route('statusNotifications.index') }}"
                                class="ml-4 inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">Regresar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
