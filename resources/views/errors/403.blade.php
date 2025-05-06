<x-guest-layout>
    <main class="mx-auto flex w-full max-w-7xl flex-auto flex-col justify-center py-24 sm:py-32">
        <p class="text-base/8 font-semibold text-amber-600">
            403
        </p>
        <h1 class="text-5xl text-stone-900 font-semibold font-serif sm:text-7xl">
            {{ __('Access denied') }}
        </h1>
        <p class="mt-8 text-pretty text-lg sm:text-xl/8">
            {{ __('You do not have permission to access this page.') }}
        </p>
        <div class="mt-10">
            <a href="{{ route('welcome') }}" class="text-sm/7 font-semibold text-amber-600 hover:text-amber-700"><span aria-hidden="true">&larr;</span> {{ __('Back to home') }}</a>
        </div>
    </main>
</x-guest-layout>
