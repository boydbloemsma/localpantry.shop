<header class="w-full text-sm mb-6 not-has-[nav]:hidden">
    <nav class="flex items-center justify-between">
        <a
            href="{{ route('register') }}"
            class="inline-block px-5 py-1.5 border-stone-300 hover:border-stone-400 border rounded-sm text-sm leading-normal"
        >
            Dashboard
        </a>

        <div class="flex items-center gap-4">
            <a
                href="{{ route('profile.edit') }}"
                class="inline-block px-5 py-1.5 border border-transparent hover:border-stone-300 rounded-sm text-sm leading-normal"
            >
                {{ __('Profile') }}
            </a>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <a
                    href="{{ route('logout') }}"
                    onclick="event.preventDefault(); this.closest('form').submit();"
                    class="inline-block px-5 py-1.5 border border-transparent hover:border-stone-300 rounded-sm text-sm leading-normal"
                >
                    {{ __('Log Out') }}
                </a>
            </form>
        </div>
    </nav>
</header>
