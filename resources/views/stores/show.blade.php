<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-6">
            <h1 class="text-3xl font-semibold font-serif tracking-tight text-stone-900">
                {{ $store->name }}
            </h1>

            <a href="{{ route('products.create') }}" class="gap-2 inline-flex items-center text-sm/6 ">
                {{ __('Add Product') }}
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5">
                    <path d="M10.75 4.75a.75.75 0 0 0-1.5 0v4.5h-4.5a.75.75 0 0 0 0 1.5h4.5v4.5a.75.75 0 0 0 1.5 0v-4.5h4.5a.75.75 0 0 0 0-1.5h-4.5v-4.5Z" />
                </svg>
            </a>
        </div>
    </x-slot>
</x-app-layout>
