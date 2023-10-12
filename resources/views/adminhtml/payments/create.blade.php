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

                    <form action="{{ route('payments.store') }}" method="POST">
                        @csrf

                        <div>
                            <x-input-label for="debtor_id" :value="__('Deuda')" />
                            <select name="debtor_id" id="debtor_id" class="block mt-1 w-full">
                                <option value="">Seleccione el cliente deudor</option>
                                @foreach ($dataDebts as $dataDebt)
                                    <option value="{{ $dataDebt->id }}">{{ $dataDebt->full_name }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('debtor_id')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="payment_date" :value="__('Fecha de pago')" />
                            <input type="date" name="payment_date" id="payment_date" class="block mt-1 w-full"
                                :value="old('payment_date')" autofocus autocomplete="payment_date" />
                            <x-input-error :messages="$errors->get('payment_date')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="paid_amount" :value="__('Monto pagado')" />
                            <x-text-input id="paid_amount" class="block mt-1 w-full" type="text" name="paid_amount"
                                :value="old('paid_amount')" autofocus autocomplete="paid_amount" />
                            <x-input-error :messages="$errors->get('paid_amount')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="status" :value="__('Estado')" />
                            <select name="status" class="block mt-1 w-full">
                                <option value="">Seleccione un estado</option>
                                <option value="pagado" selected>Pagado</option>
                                <option value="pendiente">Pendiente</option>
                            </select>
                            <x-input-error :messages="$errors->get('status')" class="mt-2" />

                        </div>


                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button>
                                {{ __('Guardar') }}
                            </x-primary-button>
                            <a href="{{ route('payments.index') }}"
                                class="ml-4 inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">Regresar</a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
