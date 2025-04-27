@extends('layouts.store')

@section('content')
    <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
        @foreach($products as $product)
            <div class="bg-white p-4 rounded-lg shadow hover:shadow-lg transition">
                <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="rounded w-full h-32 object-cover mb-4">
                <h2 class="text-lg font-semibold">{{ $product->name }}</h2>
                <p class="text-gray-500">{{ $product->price }} &euro;</p>
                <a href="{{ route('product.show', [$store, $product]) }}" class="text-indigo-600 hover:underline text-sm mt-2 block">View Product</a>
            </div>
        @endforeach
    </div>
@endsection
