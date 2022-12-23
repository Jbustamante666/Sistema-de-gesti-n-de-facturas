<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Update Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <x-alert></x-alert>

                    <form action="{{ route('products.update', [$product]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="grid gap-6 mb-6 md:grid-cols-2">
                            <div>
                                <label for="name" class="block mb-2 text-sm font-medium @error('name') text-red-700 @enderror">Name</label>
                                <input type="text" id="name" name="name" class="border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('name') border-red-500 @enderror" required value="{{ $product->name }}">
                                @error('name')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="price" class="block mb-2 text-sm font-medium @error('price') text-red-700 @enderror">Price</label>
                                <input type="number" step="0.01" id="price" name="price" class="border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('price') border-red-500 @enderror" required value="{{ $product->price }}">
                                @error('price')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="description" class="block mb-2 text-sm font-medium @error('description') text-red-700 @enderror">Description</label>
                                <textarea id="description" name="description" rows="4" class="border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('description') border-red-500 @enderror" required>{{ $product->description }}</textarea>
                                @error('description')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="vat" class="block mb-2 text-sm font-medium @error('vat') text-red-700 @enderror">VAT</label>
                                <input type="number" id="vat" name="vat" class="border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('vat') border-red-500 @enderror" required value="{{ $product->vat }}">
                                @error('vat')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <x-button>Submit</x-button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>