<button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center justify-center font-medium rounded-lg px-4 py-2 text-sm transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 bg-stone-700 text-white hover:bg-stone-800 focus:ring-stone-800']) }}>
    {{ $slot }}
</button>
