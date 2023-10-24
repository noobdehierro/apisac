<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">

            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Editar Cliente Deudor') }}
            </h2>
            <form action="{{ route('debtors.destroy', $debtor->id) }}" method="POST">
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

                    <form action="{{ route('debtors.update', $debtor->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div>
                            <x-input-label for="full_name" :value="__('Nombre')" />
                            <x-text-input id="full_name" class="block mt-1 w-full" type="text" name="full_name"
                                :value="old('full_name', $debtor->full_name)" />
                            <x-input-error :messages="$errors->get('full_name')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="access_code" :value="__('Codigo de acceso')" />
                            <x-text-input id="access_code" class="block mt-1 w-full" type="text" name="access_code"
                                :value="old('access_code', $debtor->access_code)" />
                            <x-input-error :messages="$errors->get('access_code')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="credit_number" :value="__('Numero de credito')" />
                            <x-text-input id="credit_number" class="block mt-1 w-full" type="text"
                                name="credit_number" :value="old('credit_number', $debtor->credit_number)" />
                            <x-input-error :messages="$errors->get('credit_number')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="remainingDebt" :value="__('Monto deuda restante')" />
                            <x-text-input id="remainingDebt" class="block mt-1 w-full" type="text"
                                name="remainingDebt" :value="old('remainingDebt', $debtor->remainingDebt)" />
                            <x-input-error :messages="$errors->get('remainingDebt')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="status" :value="__('Estado')" />
                            <select name="status" class="block mt-1 w-full">
                                <option value="">Seleccione un estado</option>
                                <option value="inactivo" @if ($debtor->status == 'inactivo') selected @endif>Inactivo
                                </option>
                                <option value="activo" @if ($debtor->status == 'activo') selected @endif>Activo</option>
                                {{-- <option value="pendiente" @if ($debtor->status == 'pendiente') selected @endif>Pendiente
                                </option> --}}
                                <option value="convenio" @if ($debtor->status == 'convenio') selected @endif>Convenio
                                </option>

                            </select>
                            <x-input-error :messages="$errors->get('status')" class="mt-2" />

                        </div>

                        <div>
                            <x-input-label for="nextPayday" :value="__('Proximo pago')" />
                            <input type="date" id="nextPayday" name="nextPayday" class="block mt-1 w-full"
                                class="form-control" value="{{ old('nextPayday', $debtor->nextPayday ?? '') }}">

                            <x-input-error :messages="$errors->get('nextPayday')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="capital" :value="__('Capital')" />
                            <x-text-input id="capital" class="block mt-1 w-full" type="text" name="capital"
                                :value="old('capital', $debtor->capital)" />
                            <x-input-error :messages="$errors->get('capital')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="sce" :value="__('SCE')" />
                            <x-text-input id="sce" class="block mt-1 w-full" type="text" name="sce"
                                :value="old('sce', $debtor->sce)" />
                            <x-input-error :messages="$errors->get('sce')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="minimum_to_collect" :value="__('Monto a cobrar')" />
                            <x-text-input id="minimum_to_collect" class="block mt-1 w-full" type="text"
                                name="minimum_to_collect" :value="old('minimum_to_collect', $debtor->minimum_to_collect)" />
                            <x-input-error :messages="$errors->get('minimum_to_collect')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="cash" :value="__('De contado')" />
                            <x-text-input id="cash" class="block mt-1 w-full" type="text" name="cash"
                                :value="old('cash', $debtor->cash)" />
                            <x-input-error :messages="$errors->get('cash')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="nameInCash" :value="__('Nombre de contado')" />
                            <x-text-input id="nameInCash" class="block mt-1 w-full" type="text" name="nameInCash"
                                :value="old('nameInCash', $debtor->nameInCash)" />
                            <x-input-error :messages="$errors->get('nameInCash')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="one_three_months" :value="__('Monto 1-3 meses')" />
                            <x-text-input id="one_three_months" class="block mt-1 w-full" type="text"
                                name="one_three_months" :value="old('one_three_months', $debtor->one_three_months)" />
                            <x-input-error :messages="$errors->get('one_three_months')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="nameInOne_threeMonths" :value="__('Nombre 1-3 meses')" />
                            <x-text-input id="nameInOne_threeMonths" class="block mt-1 w-full" type="text"
                                name="nameInOne_threeMonths" :value="old('nameInOne_threeMonths', $debtor->nameInOne_threeMonths)" />
                            <x-input-error :messages="$errors->get('nameInOne_threeMonths')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="four_six_months" :value="__('Monto 4-6 meses')" />
                            <x-text-input id="four_six_months" class="block mt-1 w-full" type="text"
                                name="four_six_months" :value="old('four_six_months', $debtor->four_six_months)" />
                            <x-input-error :messages="$errors->get('four_six_months')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="nameInFour_sixMonths" :value="__('Nombre 4-6 meses')" />
                            <x-text-input id="nameInFour_sixMonths" class="block mt-1 w-full" type="text"
                                name="nameInFour_sixMonths" :value="old('nameInFour_sixMonths', $debtor->nameInFour_sixMonths)" />
                            <x-input-error :messages="$errors->get('nameInFour_sixMonths')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="seven_twelve_months" :value="__('Monto 7-12 meses')" />
                            <x-text-input id="seven_twelve_months" class="block mt-1 w-full" type="text"
                                name="seven_twelve_months" :value="old('seven_twelve_months', $debtor->seven_twelve_months)" />
                            <x-input-error :messages="$errors->get('seven_twelve_months')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="nameInSeven_twelveMonths" :value="__('Nombre 7-12 meses')" />
                            <x-text-input id="nameInSeven_twelveMonths" class="block mt-1 w-full" type="text"
                                name="nameInSeven_twelveMonths" :value="old('nameInSeven_twelveMonths', $debtor->nameInSeven_twelveMonths)" />
                            <x-input-error :messages="$errors->get('nameInSeven_twelveMonths')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="thirteen_eighteen_months" :value="__('Monto 13-18 meses')" />
                            <x-text-input id="thirteen_eighteen_months" class="block mt-1 w-full" type="text"
                                name="thirteen_eighteen_months" :value="old('thirteen_eighteen_months', $debtor->thirteen_eighteen_months)" />
                            <x-input-error :messages="$errors->get('thirteen_eighteen_months')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="nameInThirteen_eighteenMonths" :value="__('Nombre 13-18 meses')" />
                            <x-text-input id="nameInThirteen_eighteenMonths" class="block mt-1 w-full" type="text"
                                name="nameInThirteen_eighteenMonths" :value="old('nameInThirteen_eighteenMonths', $debtor->nameInThirteen_eighteenMonths)" />
                            <x-input-error :messages="$errors->get('nameInThirteen_eighteenMonths')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="nineteen_twentyfour_months" :value="__('Monto 19-24 meses')" />
                            <x-text-input id="nineteen_twentyfour_months" class="block mt-1 w-full" type="text"
                                name="nineteen_twentyfour_months" :value="old('nineteen_twentyfour_months', $debtor->nineteen_twentyfour_months)" />
                            <x-input-error :messages="$errors->get('nineteen_twentyfour_months')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="nameInNineteen_twentyfourMonths" :value="__('Nombre 19-24 meses')" />
                            <x-text-input id="nameInNineteen_twentyfourMonths" class="block mt-1 w-full"
                                type="text" name="nameInNineteen_twentyfourMonths" :value="old(
                                    'nameInNineteen_twentyfourMonths',
                                    $debtor->nameInNineteen_twentyfourMonths,
                                )" />
                            <x-input-error :messages="$errors->get('nameInNineteen_twentyfourMonths')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="payment_reference" :value="__('Referencia de pago')" />
                            <x-text-input id="payment_reference" class="block mt-1 w-full" type="text"
                                name="payment_reference" :value="old('payment_reference', $debtor->payment_reference)" />
                            <x-input-error :messages="$errors->get('payment_reference')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="agreement" :value="__('Numero de contrato')" />
                            <x-text-input id="agreement" class="block mt-1 w-full" type="text" name="agreement"
                                :value="old('agreement', $debtor->agreement)" />
                            <x-input-error :messages="$errors->get('agreement')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="payment_bank" :value="__('Banco a pagar')" />
                            <x-text-input id="payment_bank" class="block mt-1 w-full" type="text"
                                name="payment_bank" :value="old('payment_bank', $debtor->payment_bank)" />
                            <x-input-error :messages="$errors->get('payment_bank')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="interbank_key" :value="__('Clave interbancaria')" />
                            <x-text-input id="interbank_key" class="block mt-1 w-full" type="text"
                                name="interbank_key" :value="old('interbank_key', $debtor->interbank_key)" />
                            <x-input-error :messages="$errors->get('interbank_key')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="product" :value="__('Nombre del producto')" />
                            <x-text-input id="product" class="block mt-1 w-full" type="text" name="product"
                                :value="old('product', $debtor->product)" />
                            <x-input-error :messages="$errors->get('product')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="phone" :value="__('Telefono')" />
                            <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone"
                                :value="old('phone', $debtor->phone)" />
                            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" class="block mt-1 w-full" type="text" name="email"
                                :value="old('email', $debtor->email)" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="portfolio" :value="__('Cartera')" />
                            <x-text-input id="portfolio" class="block mt-1 w-full" type="text" name="portfolio"
                                :value="old('portfolio', $debtor->portfolio)" />
                            <x-input-error :messages="$errors->get('portfolio')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="phone_1" :value="__('Celular')" />
                            <x-text-input id="phone_1" class="block mt-1 w-full" type="text" name="phone_1"
                                :value="old('phone_1', $debtor->phone_1)" />
                            <x-input-error :messages="$errors->get('phone_1')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="phone_2" :value="__('Celular 2')" />
                            <x-text-input id="phone_2" class="block mt-1 w-full" type="text" name="phone_2"
                                :value="old('phone_2', $debtor->phone_2)" />
                            <x-input-error :messages="$errors->get('phone_2')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button>
                                {{ __('Guardar') }}
                            </x-primary-button>
                            <a href="{{ route('debtors.index') }}"
                                class="ml-4 inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">Regresar</a>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
