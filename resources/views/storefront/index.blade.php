@extends('layouts.store')

@section('content')
    <main>
        <div class="py-24 sm:py-32">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="mx-auto max-w-2xl lg:mx-0">
                    <h1 class="text-5xl text-stone-900 font-semibold font-serif sm:text-7xl">
                        {{ __("About") }} {{ $store->name }}
                    </h1>
                    <p class="mt-8 text-pretty text-lg sm:text-xl/8">
                        {{ $store->description }}
                    </p>
                </div>
            </div>
        </div>

        <div class="mx-auto max-w-7xl lg:px-8">
            <div class="grid grid-cols-1 gap-x-8 gap-y-8 sm:grid-cols-2 sm:gap-y-10 lg:grid-cols-4">
                @foreach ($store->products as $product)
                    <div class="group relative">
                        <div class="relative">
                            <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="aspect-[4/3] w-full rounded-lg bg-gray-100 object-cover">
                            @if ($product->is_new)
                                <span class="absolute top-2 right-2 rounded bg-amber-50 px-3 py-1 text-sm font-medium text-stone-900 shadow-sm ring-1 ring-stone-400/30">
                                    {{ __('New') }}
                                </span>
                            @endif
                        </div>
                        <div class="mt-4 text-base font-semibold tracking-wide font-serif text-stone-900">
                            <h3>
                                <a href="#">
                                    <span aria-hidden="true" class="absolute inset-0"></span>
                                    {{ $product->name }}
                                </a>
                            </h3>
                        </div>
                        <p class="mt-1">
                            {{ $product->formatted_price }}
                        </p>
                        <p class="mt-1 text-pretty">
                            {{ $product->description }}
                        </p>
                    </div>
                @endforeach
            </div>
        </div>
    </main>
@endsection
