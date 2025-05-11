<x-storefront-layout>
    <x-slot:meta>
        <title>{{ $store->name }}</title>
        <meta name="description" content="{{ $store->description ?? __('Discover local artisans on localpantry.shop') }}">

        <meta property="og:type" content="website">
        <meta property="og:title" content="{{ $store->name }}">
        <meta property="og:description" content="{{ $store->description ?? __('Discover local artisans on localpantry.shop') }}">
        <meta property="og:url" content="{{ url()->current() }}">
        @if($store->products->first()?->image_url)
            <meta property="og:image" content="{{ $store->products->first()?->image_url }}">
        @endif

        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="{{ $store->name }}">
        <meta name="twitter:description" content="{{ $store->description ?? __('Discover local artisans on localpantry.shop') }}">
        @if($store->products->first()?->image_url)
            <meta name="twitter:image" content="{{ $store->products->first()?->image_url }}">
        @endif
    </x-slot:meta>

    <x-slot:logo>
        <a href="{{ route('storefront.index', $store) }}" class="text-xl">
            {{ $store->name }}
        </a>
    </x-slot:logo>

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
                                <a href="{{ route('storefront.products.show', ['store' => $store, 'product' => $product]) }}">
                                    <span aria-hidden="true" class="absolute inset-0"></span>
                                    {{ $product->name }}
                                </a>
                            </h3>
                        </div>
                        <p class="mt-1">
                            {{ $product->formatted_price }}
                        </p>
                    </div>
                @endforeach
            </div>
        </div>

        @if($store->instagram || $store->email)
            <div class="py-8 sm:py-16">
                <div class="mx-auto max-w-7xl px-6 lg:px-8">
                    <div class="grid grid-cols-1 gap-10 py-16 lg:grid-cols-3">
                        <div>
                            <h2 class="text-pretty text-4xl font-semibold font-serif text-gray-900">
                                {{ __('Get in touch') }}
                            </h2>
                            <p class="mt-4 text-base/7">
                                {{ __('You can get in touch with me using any of these.') }}
                            </p>
                        </div>
                        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:col-span-2 lg:gap-8">
                            @if($store->instagram)
                                <div class="rounded-2xl bg-stone-100 p-10">
                                    <h3 class="text-base/7 font-semibold text-gray-900">
                                        {{ __('Instagram') }}
                                    </h3>
                                    <dl class="mt-3 space-y-1 text-sm/6">
                                        <div>
                                            <dt class="sr-only">
                                                {{ __('Instagram') }}
                                            </dt>
                                            <dd>
                                                <a class="font-semibold text-amber-600" href="https://instagram.com/{{ ltrim($store->instagram, '@') }}" target="_blank" rel="noopener noreferrer">
                                                    {{ ltrim($store->instagram, '@') }}
                                                </a>
                                            </dd>
                                        </div>
                                    </dl>
                                </div>
                            @endif

                            @if($store->email)
                                <div class="rounded-2xl bg-stone-100 p-10">
                                    <h3 class="text-base/7 font-semibold text-gray-900">
                                        {{ __('Email') }}
                                    </h3>
                                    <dl class="mt-3 space-y-1 text-sm/6">
                                        <div>
                                            <dt class="sr-only">
                                                {{ __('Email') }}
                                            </dt>
                                            <dd>
                                                <a class="font-semibold text-amber-600" href="mailto:{{ $store->email }}">
                                                    {{ $store->email }}
                                                </a>
                                            </dd>
                                        </div>
                                    </dl>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endif

    </main>
</x-storefront-layout>
