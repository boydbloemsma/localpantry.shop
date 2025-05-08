<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-6">
            <h1 class="text-3xl font-semibold font-serif tracking-tight text-stone-900">
                {{ __('Edit Product') }}
            </h1>

            <a href="{{ route('stores.show', $store) }}" class="gap-2 inline-flex items-center text-sm/6 ">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5">
                    <path fill-rule="evenodd" d="M17 10a.75.75 0 0 1-.75.75H5.612l4.158 3.96a.75.75 0 1 1-1.04 1.08l-5.5-5.25a.75.75 0 0 1 0-1.08l5.5-5.25a.75.75 0 1 1 1.04 1.08L5.612 9.25H16.25A.75.75 0 0 1 17 10Z" clip-rule="evenodd" />
                </svg>
                {{ __('Return') }}
            </a>
        </div>
    </x-slot>

    <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
        <div class="max-w-xl">
            <section>
                <h2 class="text-lg font-medium text-stone-900">
                    {{ __('Product Information') }}
                </h2>

                <form method="post" action="{{ route('products.update', compact('store', 'product')) }}" enctype="multipart/form-data" class="mt-6 space-y-6">
                    @csrf
                    @method('patch')

                    <div>
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $product->name)" required autofocus />
                        <x-input-error class="mt-2" :messages="$errors->get('name')" />
                    </div>

                    <div>
                        <x-input-label for="description" :value="__('Description')" />
                        <textarea id="description" name="description" class="mt-1 block w-full border-stone-300 focus:border-stone-500 focus:ring-stone-500 rounded-md shadow-sm" required>{{ old('description', $product->description) }}</textarea>
                        <x-input-error class="mt-2" :messages="$errors->get('description')" />
                    </div>

                    <div>
                        <x-input-label for="price" :value="__('Price')" />
                        <x-text-input id="price" name="price" type="number" class="mt-1 block w-full" :value="old('price', $product->price)" required />
                        <x-input-error class="mt-2" :messages="$errors->get('price')" />
                    </div>

                    <div>
                        <x-input-label for="image" :value="__('Image')" />
                        <x-text-input id="image" name="image" type="file" class="mt-1 block w-full" :value="old('image')" />
                        <x-input-error class="mt-2" :messages="$errors->get('image')" />
                    </div>

                    <div class="flex items-center gap-4">
                        <x-primary-button>{{ __('Save') }}</x-primary-button>
                    </div>
                </form>

                <div class="mt-10 border-t pt-6">
                    <form
                        method="post"
                        action="{{ route('products.destroy', ['store' => $store, 'product' => $product]) }}"
                        class="mt-6"
                        x-data="{ confirming: false }"
                        @submit.prevent="if (confirming) $el.submit(); else confirming = true"
                        @click.outside="confirming = false"
                    >
                        @csrf
                        @method('delete')

                        <x-secondary-button type="submit">
                            <template x-if="!confirming">
                                <span>{{ __('Delete Product') }}</span>
                            </template>
                            <template x-if="confirming">
                                <span>{{ __('Are you sure? Click again') }}</span>
                            </template>
                        </x-secondary-button>
                    </form>
                </div>
            </section>
        </div>
    </div>
</x-app-layout>
