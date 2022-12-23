<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Shop') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <x-alert></x-alert>

                    <div class="w-full overflow-x-auto relative shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left">
                            <thead class="uppercase">
                                <tr>
                                    <th scope="col" class="py-3 px-6">
                                        Name
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        Description
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        Price
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($products as $product)
                                <tr class="border-b">
                                    <th scope="row" class="py-4 px-6 font-medium whitespace-nowrap">
                                        {{ $product->name }}
                                    </th>
                                    <td class="py-4 px-6 font-medium whitespace-nowrap">
                                        {{ $product->description }}
                                    </td>
                                    <td class="py-4 px-6 font-medium whitespace-nowrap">
                                        {{ $product->formattedPrice }}
                                    </td>
                                    <td class="py-4 px-6 font-medium whitespace-nowrap">
                                        <div class="flex items-center gap-4">
                                            <form action="{{ route('shop.create', [$product]) }}" method="POST">
                                                @csrf
                                                <x-button>Shop</x-button>
                                            </form>
                                        </div>
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

                </div>
            </div>
        </div>
    </div>
</x-app-layout>