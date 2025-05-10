<x-guest-layout>
    <x-slot:title>
        {{ __("Contact") }}
    </x-slot:title>

    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-lg">
            <h1 class="text-3xl font-semibold font-serif tracking-tight text-stone-900">
                {{ __('Contact') }}
            </h1>
            <p class="mt-2 text-sm/6">
                {{ __('You can always contact us with any questions, we will get back to you as fast as possible.') }}
            </p>

            <x-auth-session-status class="my-4" :status="session('status')" />

            <form method="POST" action="{{ route('contact.store') }}" class="mt-10">
                @csrf

                <div>
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="name" class="block mt-1 w-full" name="name" :value="old('name')" required autofocus />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-input-label for="message" :value="__('Message')" />
                    <textarea id="message" name="message" rows="8" class="mt-1 block w-full border-stone-300 focus:border-stone-500 focus:ring-stone-500 rounded-md shadow-sm" required>{{ old('message') }}</textarea>
                    <x-input-error class="mt-2" :messages="$errors->get('message')" />
                </div>

                <x-text-input type="hidden" name="honeypot" value="" />

                <div class="flex items-center justify-end mt-4">
                    <x-primary-button class="ms-3">
                        {{ __('Submit') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
