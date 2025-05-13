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
                    <div class="flex items-center justify-between">
                        <p class="text-4xl sm:text-4xl md:text-5xl lg:text-6xl">
                            {{ $product->formattedPrice }}
                        </p>
                        @if ($product->isNew)
                            <span class="rounded bg-amber-50 px-3 py-1 text-sm font-medium text-stone-900 shadow-sm ring-1 ring-stone-400/30">
                                {{ __('New') }}
                            </span>
                        @endif
                    </div>
                    <h1 class="text-xl md:text-2xl lg:text-3xl mt-12 font-semibold font-serif">
                        {{ $product->name }}
                    </h1>
                    <p class="text-base mt-4 text-base-500 lg:text-balance">
                        {{ $product->description }}
                    </p>
                    <div class="mt-8 pt-8 border-t border-gray-200">
                        <p class="text-sm text-gray-500">
                            {{ __('Added') }}: {{ $product->created_at->diffForHumans() }}
                        </p>
                    </div>
                    <div class="mt-8">
                        <h2 class="text-lg font-semibold font-serif">{{ __('About the store') }}</h2>
                        <p class="mt-2 text-base text-base-500">
                            {{ $store->description }}
                        </p>

                        <div class="mt-6">
                            <!-- Contact and share buttons removed as requested -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @if($related_products->count() > 0)
    <section>
        <div class="relative px-8 py-24 mx-auto md:px-12 lg:px-24 max-w-7xl">
            <h2 class="text-2xl md:text-3xl font-semibold font-serif mb-8">
                {{ __('More products from this store') }}
            </h2>
            <div class="grid grid-cols-1 gap-x-8 gap-y-8 sm:grid-cols-2 sm:gap-y-10 lg:grid-cols-4">
                @foreach ($related_products as $related_product)
                    <div class="group relative">
                        <div class="relative">
                            <img src="{{ $related_product->image_url }}" alt="{{ $related_product->name }}" class="aspect-[4/3] w-full rounded-lg bg-gray-100 object-cover">
                            @if ($related_product->isNew)
                                <span class="absolute top-2 right-2 rounded bg-amber-50 px-3 py-1 text-sm font-medium text-stone-900 shadow-sm ring-1 ring-stone-400/30">
                                {{ __('New') }}
                            </span>
                            @endif
                        </div>
                        <div class="mt-4 text-base font-semibold tracking-wide font-serif text-stone-900">
                            <h3>
                                <a href="{{ route('storefront.products.show', ['store' => $store, 'product' => $related_product]) }}">
                                    <span aria-hidden="true" class="absolute inset-0"></span>
                                    {{ $related_product->name }}
                                </a>
                            </h3>
                        </div>
                        <p class="mt-1">
                            {{ $related_product->formattedPrice }}
                        </p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif
</x-storefront-layout>
