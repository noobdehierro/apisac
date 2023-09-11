<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">

            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Editar Deuda') }}
            </h2>
            <form action="{{ route('debts.destroy', $debts->id) }}" method="POST">
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

                    <form action="{{ route('debts.update', $debts->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        {{-- <div>
                            <x-input-label for="client_id" :value="__('Cliente')" />
                            <select name="client_id" id="client_id" class="block mt-1 w-full">
                                <option value="">Seleccione un cliente</option>
                                @foreach ($clients as $client)
                                    <option value="old('client_id', {{ $client->id }})">{{ $client->name }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('client_id')" class="mt-2" />
                        </div> --}}


                        <div>
                            <x-input-label for="debt_amount" :value="__('Monto deuda')" />
                            <x-text-input id="debt_amount" class="block mt-1 w-full" type="text" name="debt_amount"
                                :value="old('debt_amount', $debts->debt_amount)" autofocus autocomplete="debt_amount" />
                            <x-input-error :messages="$errors->get('debt_amount')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="payment_reference" :value="__('Referencia de pago')" />
                            <x-text-input id="payment_reference" class="block mt-1 w-full" type="text"
                                name="payment_reference" :value="old('payment_reference', $debts->payment_reference)" autofocus autocomplete="payment_reference" />
                            <x-input-error :messages="$errors->get('payment_reference')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="interbank_code" :value="__('Clabe interbancaria')" />
                            <x-text-input id="interbank_code" class="block mt-1 w-full" type="text"
                                name="interbank_code" :value="old('interbank_code', $debts->interbank_code)" autofocus autocomplete="interbank_code" />
                            <x-input-error :messages="$errors->get('interbank_code')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="payment_bank" :value="__('Banco a pagar')" />
                            <x-text-input id="payment_bank" class="block mt-1 w-full" type="text" name="payment_bank"
                                :value="old('payment_bank', $debts->payment_bank)" autofocus autocomplete="payment_bank" />
                            <x-input-error :messages="$errors->get('payment_bank')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="next_payment_date" :value="__('Proximo pago')" />

                            <input type="date" name="next_payment_date" id="next_payment_date"
                                class="block mt-1 w-full" :value="old('next_payment_date')" autofocus
                                autocomplete="next_payment_date" />
                            <x-input-error :messages="$errors->get('next_payment_date')" class="mt-2" />

                        </div>

                        <div>
                            <x-input-label for="remaining_debt_amount" :value="__('Monto de la deuda restante')" />
                            <x-text-input id="remaining_debt_amount" class="block mt-1 w-full" type="text"
                                name="remaining_debt_amount" :value="old('remaining_debt_amount', $debts->remaining_debt_amount)" autofocus
                                autocomplete="remaining_debt_amount" />
                            <x-input-error :messages="$errors->get('remaining_debt_amount')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button>
                                {{ __('Guardar') }}
                            </x-primary-button>
                            <a href="{{ route('debts.index') }}"
                                class="ml-4 inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">Regresar</a>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
