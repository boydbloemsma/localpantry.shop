<x-app-layout>
    <div class="p-8">
        @if (!$store)
            <div class="text-center">
                <h1 class="text-2xl font-bold mb-4">Welcome to Local Pantry!</h1>
                <p class="mb-6">You don't have a store yet.</p>
                <a href="{{ route('store.create') }}" class="inline-block bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                    Create Your Store
                </a>
            </div>
        @else
            <div>
                <h1 class="text-2xl font-bold mb-4">
                    Your Store: {{ $store->name }}
                </h1>

                <a href="{{ route('product.create') }}" class="inline-block mb-6 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                    Add New Product
                </a>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    @foreach ($store->products as $product)
                        <div class="p-4 border rounded shadow">
                            <h2 class="font-semibold text-lg">{{ $product->name }}</h2>
                            <p class="text-gray-600">{{ $product->description }}</p>
                            <p class="font-bold mt-2">{{ number_format($product->price / 100, 2) }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
</x-app-layout>
