<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Invoices') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <x-alert></x-alert>

                    <div class="float-right mb-6">
                        <form action="{{ route('invoice.generate') }}" method="POST">
                            @csrf
                            <x-button>Generate Invoice</x-button>
                        </form>
                    </div>

                    <div class="w-full overflow-x-auto relative shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left">
                            <thead class="uppercase">
                                <tr>
                                    <th scope="col" class="py-3 px-6">
                                        #ID
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        Email
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        Total
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($invoices as $invoice)
                                <tr class="border-b">
                                    <th scope="row" class="py-4 px-6 font-medium whitespace-nowrap">
                                        {{ $invoice->id }}
                                    </th>
                                    <th scope="row" class="py-4 px-6 font-medium whitespace-nowrap">
                                        {{ $invoice->user->email}}
                                    </th>
                                    <td class="py-4 px-6 font-medium whitespace-nowrap">
                                        {{ $invoice->formatted_total }}
                                    </td>
                                    <td class="py-4 px-6 font-medium whitespace-nowrap">
                                        <a href="{{ route('invoice.show', [$invoice]) }}" target="_blank" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Show</a>
                                    </td>
                                </tr>
                                @empty
                                <td class="py-4 px-6 font-medium whitespace-nowrap text-center text-xl" colspan="5">
                                    {{ __('No records') }}
                                </td>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <!-- <div class="clear-right"></div> -->

                </div>
            </div>
        </div>
    </div>
</x-app-layout>