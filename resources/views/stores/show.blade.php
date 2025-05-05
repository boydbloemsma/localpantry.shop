<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-6">
            <div>
                <h1 class="text-3xl font-semibold font-serif tracking-tight text-stone-900">
                    {{ $store->name }}
                </h1>

                <p class="pt-4 text-sm/6">
                    {{ $store->description }}
                </p>
            </div>

            <a href="https://{{ $store->domain }}" target="_blank" rel="noopener noreferrer" class="gap-2 inline-flex items-center text-sm/6 text-neutral-600 hover:text-neutral-800">
                https://{{ $store->domain }}
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5">
                    <path fill-rule="evenodd" d="M4.25 5.5a.75.75 0 0 0-.75.75v8.5c0 .414.336.75.75.75h8.5a.75.75 0 0 0 .75-.75v-4a.75.75 0 0 1 1.5 0v4A2.25 2.25 0 0 1 12.75 17h-8.5A2.25 2.25 0 0 1 2 14.75v-8.5A2.25 2.25 0 0 1 4.25 4h5a.75.75 0 0 1 0 1.5h-5Z" clip-rule="evenodd" />
                    <path fill-rule="evenodd" d="M6.194 12.753a.75.75 0 0 0 1.06.053L16.5 4.44v2.81a.75.75 0 0 0 1.5 0v-4.5a.75.75 0 0 0-.75-.75h-4.5a.75.75 0 0 0 0 1.5h2.553l-9.056 8.194a.75.75 0 0 0-.053 1.06Z" clip-rule="evenodd" />
                </svg>
            </a>
        </div>
    </x-slot>

    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-6">
        <h2 class="mt-2 text-pretty text-2xl text-stone-900 font-semibold font-serif sm:text-2xl lg:text-balance">
            {{ __('Products') }}
        </h2>

        <a href="{{ route('products.create', $store) }}" class="gap-2 inline-flex items-center text-sm/6 ">
            {{ __('Add Product') }}
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5">
                <path d="M10.75 4.75a.75.75 0 0 0-1.5 0v4.5h-4.5a.75.75 0 0 0 0 1.5h4.5v4.5a.75.75 0 0 0 1.5 0v-4.5h4.5a.75.75 0 0 0 0-1.5h-4.5v-4.5Z" />
            </svg>
        </a>
    </div>

    <div class="mt-6 grid grid-cols-1 gap-x-8 gap-y-8 sm:grid-cols-2 sm:gap-y-10 lg:grid-cols-4">
        @forelse($store->products as $product)
            <div class="group relative">
                <div class="relative">
                    <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="aspect-[4/3] w-full rounded-lg bg-gray-100 object-cover">
                </div>
                <div class="mt-4 text-base font-medium text-stone-900">
                    <h3>
                        <a href="{{ route('products.edit', compact('store', 'product')) }}">
                            <span aria-hidden="true" class="absolute inset-0"></span>
                            {{ $product->name }}
                        </a>
                    </h3>
                </div>
                <p class="mt-1 text-sm">
                    {{ $product->formatted_price }}
                </p>
                <p class="mt-1 text-sm">
                    {{ $product->description }}
                </p>
            </div>
        @empty
            <p>
                {{ __('No stores yet. Get started now by clicking the link in the top right.') }}
            </p>
        @endforelse
    </div>
</x-app-layout>
