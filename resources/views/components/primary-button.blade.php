<button {{ $attributes->merge(['type' => 'submit', 'class' => 'bg-amber-600 text-white hover:bg-amber-700 focus:ring-amber-700 inline-flex items-center justify-center font-medium rounded-lg px-4 py-2 text-sm transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2']) }}>
    {{ $slot }}
</button>
