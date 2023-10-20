<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Pagos') }}
            </h2>
            <a href="{{ route('payments.create') }}" class="bg-green-500 text-white py-2 px-4 rounded hover:bg-green-600">
                Crear nueva pago
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">


                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        ID Deuda
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Nombre del cliente
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        numero de pago
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Fecha de pago
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Monto a pagar
                                    </th>

                                    <th scope="col" class="px-6 py-3">
                                        Estatus
                                    </th>

                                    <th scope="col" class="px-6 py-3">
                                        Acciones
                                    </th>
                                </tr>
                            </thead>
                            <tbody>

                                @if ($payments->count() > 0)
                                    @foreach ($payments as $payment)
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ $payment->debtor_id }}
                                            </th>
                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ $payment->debtor->full_name }}
                                            </th>

                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ $payment->quota_number }}
                                            </th>

                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ $payment->payment_date }}
                                            </th>

                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ $payment->paid_amount }}
                                            </th>

                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ $payment->status }}
                                            </th>


                                            <td class="px-6 py-4">
                                                <a href="{{ route('payments.edit', $payment->id) }}"
                                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Ver</a>
                                            </td>

                                        </tr>
                                    @endforeach

                                @endif
                            </tbody>
                        </table>
                    </div>
                    {{ $payments->links() }}


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
