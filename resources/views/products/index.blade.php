<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Product list') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <x-alert></x-alert>
                    
                    <x-button href="{{ route('products.create') }}" typeButton="anchor_tag" class="float-right mb-6">Add Product</x-button>

                    <div class="w-full overflow-x-auto relative shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left">
                            <thead class="uppercase">
                                <tr>
                                    <th scope="col" class="py-3 px-6">
                                        #ID
                                    </th>
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
                                        Vat
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
                                        {{ $product->id }}
                                    </th>
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
                                        {{ $product->vat }}%
                                    </td>
                                    <td class="py-4 px-6 font-medium whitespace-nowrap">
                                        <div class="flex items-center gap-4">
                                            <a href="{{ route('products.edit', [$product]) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                            <form action="{{ route('products.destroy', [$product]) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <x-button><svg width="12" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                                        <!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                                                        <path fill="white" d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z" />
                                                    </svg></x-button>
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