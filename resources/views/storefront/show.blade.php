@extends('layouts.store')

@section('content')
    <div class="bg-white p-6 rounded-lg shadow-lg max-w-2xl mx-auto">
        <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="rounded w-full h-64 object-cover mb-6">

        <h1 class="text-3xl font-bold mb-2">{{ $product->name }}</h1>
        <p class="text-gray-600 text-xl mb-4">{{ number_format($product->price, 2) }} &euro;</p>

        <p class="text-gray-700 leading-relaxed mb-6">
            {{ $product->description }}
        </p>

        <div class="flex items-center justify-between">
            <span class="text-sm text-gray-500">Pickup Only</span>

            <a href="#" class="px-6 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700 transition">
                Reserve Product
            </a>
        </div>
    </div>
@endsection
