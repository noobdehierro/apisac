<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">

            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Editar pago') }}
            </h2>
            <form action="{{ route('payments.destroy', $payments->id) }}" method="POST">
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

                    <form action="{{ route('payments.update', $payments->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div>
                            <x-input-label for="payment_date" :value="__('Fecha de pago')" />
                            <input type="date" id="payment_date" name="payment_date" class="block mt-1 w-full"
                                class="form-control" value="{{ old('payment_date', $payments->payment_date ?? '') }}">

                            <x-input-error :messages="$errors->get('payment_date')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="paid_amount" :value="__('Monto pagado')" />
                            <x-text-input id="paid_amount" class="block mt-1 w-full" type="text" name="paid_amount"
                                :value="old('paid_amount', $payments->paid_amount)" autofocus autocomplete="paid_amount" />
                            <x-input-error :messages="$errors->get('paid_amount')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="status" :value="__('Estado')" />
                            <select name="status" class="block mt-1 w-full" id="status">
                                <option value="">Seleccione un estado</option>
                                <option value="pagado" @if ($payments->status == 'pagado') selected @endif>Pagado</option>

                                <option value="pendiente" @if ($payments->status == 'pendiente') selected @endif>Pendiente
                                </option>
                            </select>
                            <x-input-error :messages="$errors->get('status')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button>
                                {{ __('Guardar') }}
                            </x-primary-button>
                            <a href="{{ route('payments.show', $payments->debtor_id) }}"
                                class="ml-4 inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">Regresar</a>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
