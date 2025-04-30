<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-6">
            <h1 class="text-3xl font-semibold font-serif tracking-tight text-stone-900">
                {{ __('Your Stores') }}
            </h1>

            <a href="{{ route('stores.create') }}" class="gap-2 inline-flex items-center text-sm/6 ">
                {{ __('Add Store') }}
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5">
                    <path d="M10.75 4.75a.75.75 0 0 0-1.5 0v4.5h-4.5a.75.75 0 0 0 0 1.5h4.5v4.5a.75.75 0 0 0 1.5 0v-4.5h4.5a.75.75 0 0 0 0-1.5h-4.5v-4.5Z" />
                </svg>
            </a>
        </div>
    </x-slot>

    <div class="mt-6 grid grid-cols-1 gap-x-8 gap-y-8 sm:grid-cols-2 sm:gap-y-10 lg:grid-cols-4">
        @forelse($stores as $store)
            <div class="group relative">
                <div class="relative">
                    <div class="aspect-[4/2.5] w-full rounded-lg bg-amber-200 flex items-center justify-center text-4xl font-semibold">
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
        @empty
            <p>
                {{ __('No stores yet. Get started now by clicking the link in the top right.') }}
            </p>
        @endforelse
    </div>
</x-app-layout>
