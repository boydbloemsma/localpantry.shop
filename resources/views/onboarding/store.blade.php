<x-guest-layout>
    <div class="max-w-lg mx-auto">
        <section>
            <h2 class="text-lg font-medium text-stone-900">
                {{ __('Create your store') }}
            </h2>

            <form method="post" action="{{ route('onboarding.store') }}" class="mt-6 space-y-6">
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
                            <x-text-input id="instagram" name="instagram" type="text" class="-ml-px block w-full grow rounded-r-md rounded-l-none" :value="old('instagram')" />
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
                            <x-text-input id="email" name="email" type="text" class="col-start-1 row-start-1 block w-full pl-10 pr-3" :value="old('email')" />
                            <svg class="pointer-events-none col-start-1 row-start-1 ml-3 size-5 self-center text-gray-400 sm:size-4" viewBox="0 0 16 16" fill="currentColor" aria-hidden="true" data-slot="icon">
                                <path d="M2.5 3A1.5 1.5 0 0 0 1 4.5v.793c.026.009.051.02.076.032L7.674 8.51c.206.1.446.1.652 0l6.598-3.185A.755.755 0 0 1 15 5.293V4.5A1.5 1.5 0 0 0 13.5 3h-11Z" />
                                <path d="M15 6.954 8.978 9.86a2.25 2.25 0 0 1-1.956 0L1 6.954V11.5A1.5 1.5 0 0 0 2.5 13h11a1.5 1.5 0 0 0 1.5-1.5V6.954Z" />
                            </svg>
                        </div>
                        <x-input-error class="mt-2" :messages="$errors->get('email')" />
                    </div>
                </div>

                <div class="flex items-center justify-end">
                    <x-primary-button>{{ __('Next') }}</x-primary-button>
                </div>
            </form>
        </section>
    </div>
</x-guest-layout>
