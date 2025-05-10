<x-storefront-layout>
    <x-slot:meta>
        <title>{{ $store->name }} - {{ $product->name }}</title>
        <meta name="description" content="{{ $product->description ?? __('Discover local artisans on localpantry.shop') }}">

        <meta property="og:type" content="website">
        <meta property="og:title" content="{{ $store->name }} - {{ $product->name }}">
        <meta property="og:description" content="{{ $product->description ?? __('Discover local artisans on localpantry.shop') }}">
        <meta property="og:url" content="{{ url()->current() }}">
        @if($product->image_url)
            <meta property="og:image" content="{{ $product->image_url }}">
        @endif

        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="{{ $store->name }} - {{ $product->name }}">
        <meta name="twitter:description" content="{{ $product->description ?? __('Discover local artisans on localpantry.shop') }}">
        @if($product->image_url)
            <meta name="twitter:image" content="{{ $product->image_url }}">
        @endif
    </x-slot:meta>

    <x-slot:logo>
        <a href="{{ route('storefront.index', $store) }}" class="text-xl">
            {{ $store->name }}
        </a>
    </x-slot:logo>

    <section>
        <div class="relative px-8 py-24 mx-auto md:px-12 lg:px-24 max-w-7xl">
            <div class="items-center mt-8 grid grid-cols-1 lg:grid-cols-3 gap-8">
                <img
                    src="{{ $product->image_url }}"
                    class="size-full aspect-[4/3] object-cover object-center rounded-2xl lg:col-span-2"
                    alt="Product image"
                />
                <div>
                    <p class="text-4xl sm:text-4xl md:text-5xl lg:text-6xl">
                        {{ $product->formattedPrice }}
                    </p>
                    <h1 class="text-xl md:text-2xl lg:text-3xl mt-12 font-semibold font-serif">
                        {{ $product->name }}
                    </h1>
                    <p class="text-base mt-4 text-base-500 lg:text-balance">
                        {{ $product->description }}
                    </p>
                </div>
            </div>
        </div>
    </section>
</x-storefront-layout>
