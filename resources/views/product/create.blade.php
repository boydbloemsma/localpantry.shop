<x-app-layout>
    <div class="max-w-xl mx-auto py-8">
        <h1 class="text-2xl font-bold mb-6">Create Your Product</h1>

        <form method="POST" enctype="multipart/form-data" action="{{ route('product.store') }}" class="space-y-6">
            @csrf

            <div>
                <label class="block font-medium">Product Name</label>
                <input type="text" name="name" required class="w-full border rounded p-2" value="{{ old('name') }}">
                @error('name') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block font-medium">Description</label>
                <textarea name="description" class="w-full border rounded p-2">{{ old('description') }}</textarea>
                @error('description') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block font-medium">Price</label>
                <input type="number" name="price" required min="1" step="1" class="w-full border rounded p-2" value="{{ old('price') }}">
                @error('price') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block font-medium">Image</label>
                <input type="file" name="image" required class="w-full border rounded p-2" value="{{ old('image') }}">
                @error('image') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <button type="submit" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded">
                    Create Product
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
