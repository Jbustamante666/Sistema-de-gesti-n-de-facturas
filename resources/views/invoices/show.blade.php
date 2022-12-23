<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Invoice') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div id="app" class="w-full">

                        <div class="row my-3">
                            <div class="col-10">
                                <h1 class="text-3xl">Corp. XXXX</h1>
                                <p>Av. XXXX</p>
                                <p>Site XXXX</p>
                                <p>local XXXX</p>
                            </div>
                        </div>

                        <div class="border-t-2 mb-4"></div>

                        <div class="w-full">
                            <div class="col-3">
                                <h5>Facturar a: {{ $invoice->user->name }}</h5>
                            </div>
                            <div class="col-3">
                                <h5>Enviar a: {{ $invoice->user->email }}</h5>
                            </div>
                            <div class="col-3">
                                <h5>N° de factura: #{{ $invoice->id }}</h5>
                                <h5>Fecha: {{ date_format($invoice->created_at, 'Y-m-d') }}</h5>
                            </div>
                        </div>

                        <div class="border-t-2 mt-4">
                            <table class="w-full text-sm text-left">
                                <thead>
                                    <tr>
                                        <th>Quantity</th>
                                        <th>Name</th>
                                        <th>Sub Total</th>
                                        <th>VAT</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($invoice->purchases as $purchase)
                                    <tr>
                                        <td>1</td>
                                        <td>{{ $purchase->product->name }}</td>
                                        <td>{{ $purchase->formatted_product_sub_total }}</td>
                                        <td>{{ $purchase->product_vat }}%</td>
                                        <td>{{ $purchase->formatted_product_total }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot class="border-t-2 text-right text-xl p-4">
                                    <tr>
                                        <th class="pt-4" colspan="5">Sub Total: {{ $invoice->formatted_sub_total}}</th>
                                    </tr>
                                    <tr>
                                        <th colspan="5">VAT: {{ $invoice->formatted_total_vat }}</th>
                                    </tr>
                                    <tr>
                                        <th colspan="5">Total: {{ $invoice->formatted_total }}</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>

                        <div class="cond row">
                            <div class="col-12 mt-3">
                                <h4>Payment terms and conditions</h4>
                                <p>Payment is due within 15 days.</p>
                                <p>
                                    Banc Banreserva
                                    <br />
                                    IBAN: DO XX 0075 XXXX XX XX XXXX XXXX
                                    <br />
                                    Code SWIFT: BPDODOSXXXX
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>