<x-app-layout>
    <x-slot name="header">
        <h1 class="text-3xl font-semibold font-serif tracking-tight text-stone-900">
            {{ __('Your Stores') }}
        </h1>
    </x-slot>

    <div class="mt-6 grid grid-cols-1 gap-x-8 gap-y-8 sm:grid-cols-2 sm:gap-y-10 lg:grid-cols-4">
        @foreach($stores as $store)
            <div class="group relative">
                <div class="relative">
                    <div class="aspect-[4/3] w-full rounded-lg bg-amber-200 flex items-center justify-center text-4xl font-semibold">
                        {{ collect(explode(' ', $store->name))->map(fn($word) => strtoupper(substr($word, 0, 1)))->implode('') }}
                    </div>
                    <div class="absolute inset-0 flex items-end p-4 opacity-0 group-hover:opacity-100" aria-hidden="true">
                        <div class="w-full rounded-md bg-white/75 px-4 py-2 text-center text-sm font-medium text-gray-900 backdrop-blur backdrop-filter">
                            {{ __('Manage Store') }}
                        </div>
                    </div>
                </div>
                <div class="mt-4 text-base font-medium text-stone-900">
                    <h3>
                        <a href="{{ route('stores.show', $store) }}">
                            <span aria-hidden="true" class="absolute inset-0"></span>
                            {{ $store->name }}
                        </a>
                    </h3>
                </div>
                <p class="mt-1 text-sm">
                    {{ $store->description }}
                </p>
            </div>
        @endforeach

        <div class="group relative">
            <div class="relative">
                <div class="aspect-[4/3] w-full rounded-lg bg-stone-200/50 flex items-center justify-center text-4xl font-semibold text-stone-900">
                    <x-heroicon-o-plus class="w-12 h-12" />
                    <a href="{{ route('stores.create') }}" class="absolute inset-0 z-10"><span class="sr-only">{{ __('Add Store') }}</span></a>
                </div>
                <div class="absolute inset-0 flex items-end p-4 opacity-0 group-hover:opacity-100 transition-opacity duration-200 pointer-events-none" aria-hidden="true">
                    <div class="w-full rounded-md bg-white/75 px-4 py-2 text-center text-sm font-medium text-gray-900 backdrop-blur backdrop-filter">
                        {{ __('Add Store') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
