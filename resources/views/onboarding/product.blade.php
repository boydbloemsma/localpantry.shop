<x-guest-layout>
    <div class="max-w-lg mx-auto">
        <section>
            <h2 class="text-lg font-medium text-stone-900">
                {{ __('Add your first product') }}
            </h2>

            <form method="post" action="{{ route('onboarding.product', $store) }}" enctype="multipart/form-data" class="mt-6 space-y-6">
                @csrf

                <div>
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name')" required autofocus />
                    <x-input-error class="mt-2" :messages="$errors->get('name')" />
                </div>

                <div>
                    <x-input-label for="description" :value="__('Description')" />
                    <textarea id="description" name="description" class="mt-1 block w-full border-stone-300 focus:border-stone-500 focus:ring-stone-500 rounded-md shadow-sm" required>{{ old('description') }}</textarea>
                    <x-input-error class="mt-2" :messages="$errors->get('description')" />
                </div>

                <div>
                    <x-input-label for="price" :value="__('Price')" />
                    <x-text-input id="price" name="price" type="number" class="mt-1 block w-full" :value="old('price')" required />
                    <x-input-error class="mt-2" :messages="$errors->get('price')" />
                </div>

                <div>
                    <x-input-label for="image" :value="__('Image')" />
                    <x-text-input id="image" name="image" type="file" class="mt-1 block w-full" :value="old('image')" required />

                    <x-input-error class="mt-2" :messages="$errors->get('image')" />
                </div>

                <div class="flex items-center justify-end">
                    <x-primary-button>{{ __('Save') }}</x-primary-button>
                </div>
            </form>
        </section>
    </div>
</x-guest-layout>
