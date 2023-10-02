<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Nueva deuda') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <form action="{{ route('agreements.store') }}" method="POST">
                        @csrf

                        <div>
                            <x-input-label for="client_id" :value="__('Cliente')" />
                            <select name="client_id" id="client_id" class="block mt-1 w-full">
                                <option value="">Seleccione un cliente</option>
                                @foreach ($clients as $client)
                                    <option value="{{ $client->id }}">{{ $client->name }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('client_id')" class="mt-2" />
                        </div>
                        <div>
                            <x-input-label for="status" :value="__('Estado')" />
                            <select name="status" class="block mt-1 w-full" id="status">
                                <option value="">Seleccione un estado</option>
                                <option value="inactivo">Inactivo</option>
                                <option value="activo">Activo</option>
                            </select>
                            <x-input-error :messages="$errors->get('status')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="agreement_type" :value="__('Tipo de acuerdo')" />
                            <select name="agreement_type" class="block mt-1 w-full" id="agreement_type">
                                <option value="">Seleccione un tipo de acuerdo</option>
                                <option value="contado">Contado</option>
                                <option value="credito">Credito</option>
                            </select>
                            <x-input-error :messages="$errors->get('agreement_type')" class="mt-2" />
                        </div>
                        <div>
                            <x-input-label for="number_installments" :value="__('Numero de cuotas')" />
                            <x-text-input id="number_installments" class="block mt-1 w-full" type="text"
                                name="number_installments" :value="old('number_installments')" autofocus
                                autocomplete="number_installments" />
                            <x-input-error :messages="$errors->get('number_installments')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="unit_time" :value="__('Unidad de tiempo')" />
                            <select name="unit_time" class="block mt-1 w-full" id="unit_time">
                                <option value="">Seleccione una unidad de tiempo</option>
                                <option value="contado">Contado</option>
                                <option value="semanal">Semanal</option>
                                <option value="quincenal">Quincenal</option>
                                <option value="mensual">Mensual</option>
                            </select>
                            <x-input-error :messages="$errors->get('unit_time')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="amount_per_installment" :value="__('Monto por cuota')" />
                            <x-text-input id="amount_per_installment" class="block mt-1 w-full" type="text"
                                name="amount_per_installment" :value="old('amount_per_installment')" autofocus
                                autocomplete="amount_per_installment" />
                            <x-input-error :messages="$errors->get('amount_per_installment')" class="mt-2" />

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
