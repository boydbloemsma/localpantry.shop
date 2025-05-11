<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-6">
            <h1 class="text-3xl font-semibold font-serif tracking-tight text-stone-900">
                {{ __('Edit Store') }}
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
                    {{ __('Store Information') }}
                </h2>

                <form method="post" action="{{ route('stores.update', $store) }}" class="mt-6 space-y-6">
                    @csrf
                    @method('patch')

                    <div>
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $store->name)" required autofocus />
                        <x-input-error class="mt-2" :messages="$errors->get('name')" />
                    </div>

                    <div>
                        <x-input-label for="description" :value="__('Description')" />
                        <textarea id="description" name="description" class="mt-1 block w-full border-stone-300 focus:border-stone-500 focus:ring-stone-500 rounded-md shadow-sm" required>{{ old('description', $store->description) }}</textarea>
                        <x-input-error class="mt-2" :messages="$errors->get('description')" />
                    </div>

                    <div>
                        <div class="flex justify-between">
                            <x-input-label class="text-sm/6" for="instagram" :value="__('Instagram handle')" />
                            <span class="text-sm/6 text-stone-500" id="instagram-optional">
                            {{ __('Optional') }}
                        </span>
                        </div>
                        <div class="mt-2">
                            <div class="flex">
                                <div class="flex shadow-sm shrink-0 items-center rounded-l-md px-3 text-base text-stone-500 outline outline-1 -outline-offset-1 outline-stone-300 sm:text-sm/6">
                                    instagram.com/
                                </div>
                                <x-text-input id="instagram" name="instagram" type="text" class="-ml-px block w-full grow rounded-r-md rounded-l-none" :value="old('instagram', $store->instagram)" />
                            </div>
                            <x-input-error class="mt-2" :messages="$errors->get('instagram')" />
                        </div>
                    </div>

                    <div>
                        <div class="flex justify-between">
                            <x-input-label class="text-sm/6" for="email" :value="__('Email')" />
                            <span class="text-sm/6 text-stone-500" id="email-optional">
                            {{ __('Optional') }}
                        </span>
                        </div>
                        <div class="mt-2">
                            <div class="grid grid-cols-1">
                                <x-text-input id="email" name="email" type="text" class="col-start-1 row-start-1 block w-full pl-10 pr-3" :value="old('email', $store->email)" />
                                <svg class="pointer-events-none col-start-1 row-start-1 ml-3 size-5 self-center text-gray-400 sm:size-4" viewBox="0 0 16 16" fill="currentColor" aria-hidden="true" data-slot="icon">
                                    <path d="M2.5 3A1.5 1.5 0 0 0 1 4.5v.793c.026.009.051.02.076.032L7.674 8.51c.206.1.446.1.652 0l6.598-3.185A.755.755 0 0 1 15 5.293V4.5A1.5 1.5 0 0 0 13.5 3h-11Z" />
                                    <path d="M15 6.954 8.978 9.86a2.25 2.25 0 0 1-1.956 0L1 6.954V11.5A1.5 1.5 0 0 0 2.5 13h11a1.5 1.5 0 0 0 1.5-1.5V6.954Z" />
                                </svg>
                            </div>
                            <x-input-error class="mt-2" :messages="$errors->get('email')" />
                        </div>
                    </div>

                    <div class="flex items-center gap-4">
                        <x-primary-button>{{ __('Update') }}</x-primary-button>
                    </div>
                </form>
            </section>
        </div>
    </div>
</x-app-layout>
