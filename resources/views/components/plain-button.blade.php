@if (isset($attributes['href']))
    <a {{ $attributes->merge(['class' => 'inline-flex items-center justify-center font-medium rounded-lg px-4 py-2 text-sm transition-colors focus:outline-none bg-transparent hover:bg-stone-200']) }}>
        {{ $slot }}
    </a>
@else
    <button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center justify-center font-medium rounded-lg px-4 py-2 text-sm transition-colors focus:outline-none bg-transparent hover:bg-stone-200']) }}>
        {{ $slot }}
    </button>
@endif
