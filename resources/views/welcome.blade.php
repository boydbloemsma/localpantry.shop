<x-guest-layout>
    <main>
        <div class="py-24 sm:py-32">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="mx-auto max-w-2xl lg:mx-0">
                    <h1 class="text-5xl text-stone-900 font-semibold font-serif sm:text-7xl">
                        Share your craft with the world.
                    </h1>
                    <p class="mt-8 text-pretty text-lg sm:text-xl/8">
                        Create a beautiful page for your local products — no tech skills needed.
                    </p>
                    <div class="mt-10">
                        <a
                            href="{{ route('register') }}"
                            class="inline-block px-5 py-1.5 border-stone-300 hover:border-stone-400 border rounded-sm text-sm leading-normal">
                            Get started
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="py-24 sm:py-32 bg-stone-100 rounded-xl">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="mx-auto max-w-2xl lg:text-center">
                    <h2 class="mt-2 text-pretty text-4xl text-stone-900 font-semibold font-serif sm:text-5xl lg:text-balance">
                        How it works
                    </h2>
                    <p class="mt-6 text-lg/8">
                        Get your own beautiful storefront in just a few simple steps.
                    </p>
                </div>
                <div class="mx-auto mt-16 max-w-2xl sm:mt-20 lg:mt-24 lg:max-w-none">
                    <dl class="grid max-w-xl grid-cols-1 gap-x-8 gap-y-16 lg:max-w-none lg:grid-cols-3">
                        <div class="flex flex-col">
                            <dt class="flex items-center gap-x-3 text-base/7 font-semibold">
                                <svg class="size-5 flex-none text-amber-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" data-slot="icon">
                                    <path d="M5.223 2.25c-.497 0-.974.198-1.325.55l-1.3 1.298A3.75 3.75 0 0 0 7.5 9.75c.627.47 1.406.75 2.25.75.844 0 1.624-.28 2.25-.75.626.47 1.406.75 2.25.75.844 0 1.623-.28 2.25-.75a3.75 3.75 0 0 0 4.902-5.652l-1.3-1.299a1.875 1.875 0 0 0-1.325-.549H5.223Z" />
                                    <path fill-rule="evenodd" d="M3 20.25v-8.755c1.42.674 3.08.673 4.5 0A5.234 5.234 0 0 0 9.75 12c.804 0 1.568-.182 2.25-.506a5.234 5.234 0 0 0 2.25.506c.804 0 1.567-.182 2.25-.506 1.42.674 3.08.675 4.5.001v8.755h.75a.75.75 0 0 1 0 1.5H2.25a.75.75 0 0 1 0-1.5H3Zm3-6a.75.75 0 0 1 .75-.75h3a.75.75 0 0 1 .75.75v3a.75.75 0 0 1-.75.75h-3a.75.75 0 0 1-.75-.75v-3Zm8.25-.75a.75.75 0 0 0-.75.75v5.25c0 .414.336.75.75.75h3a.75.75 0 0 0 .75-.75v-5.25a.75.75 0 0 0-.75-.75h-3Z" clip-rule="evenodd" />
                                </svg>
                                Create your shop
                            </dt>
                            <dd class="mt-4 flex flex-auto flex-col text-base/7">
                                <p class="flex-auto">
                                    Pick a name and get a unique link like <code>yourbrand.localpantry.shop</code>. No tech skills needed.
                                </p>
                            </dd>
                        </div>
                        <div class="flex flex-col">
                            <dt class="flex items-center gap-x-3 text-base/7 font-semibold">
                                <svg class="size-5 flex-none text-amber-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" data-slot="icon">
                                    <path d="M6 3a3 3 0 0 0-3 3v2.25a3 3 0 0 0 3 3h2.25a3 3 0 0 0 3-3V6a3 3 0 0 0-3-3H6ZM15.75 3a3 3 0 0 0-3 3v2.25a3 3 0 0 0 3 3H18a3 3 0 0 0 3-3V6a3 3 0 0 0-3-3h-2.25ZM6 12.75a3 3 0 0 0-3 3V18a3 3 0 0 0 3 3h2.25a3 3 0 0 0 3-3v-2.25a3 3 0 0 0-3-3H6ZM17.625 13.5a.75.75 0 0 0-1.5 0v2.625H13.5a.75.75 0 0 0 0 1.5h2.625v2.625a.75.75 0 0 0 1.5 0v-2.625h2.625a.75.75 0 0 0 0-1.5h-2.625V13.5Z" />
                                </svg>

                                Add your products
                            </dt>
                            <dd class="mt-4 flex flex-auto flex-col text-base/7">
                                <p class="flex-auto">
                                    Upload a photo, write a short description, and set prices. Show off what makes your product special.
                                </p>
                            </dd>
                        </div>
                        <div class="flex flex-col">
                            <dt class="flex items-center gap-x-3 text-base/7 font-semibold">
                                <svg class="size-5 flex-none text-amber-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" data-slot="icon">
                                    <path fill-rule="evenodd" d="M19.902 4.098a3.75 3.75 0 0 0-5.304 0l-4.5 4.5a3.75 3.75 0 0 0 1.035 6.037.75.75 0 0 1-.646 1.353 5.25 5.25 0 0 1-1.449-8.45l4.5-4.5a5.25 5.25 0 1 1 7.424 7.424l-1.757 1.757a.75.75 0 1 1-1.06-1.06l1.757-1.757a3.75 3.75 0 0 0 0-5.304Zm-7.389 4.267a.75.75 0 0 1 1-.353 5.25 5.25 0 0 1 1.449 8.45l-4.5 4.5a5.25 5.25 0 1 1-7.424-7.424l1.757-1.757a.75.75 0 1 1 1.06 1.06l-1.757 1.757a3.75 3.75 0 1 0 5.304 5.304l4.5-4.5a3.75 3.75 0 0 0-1.035-6.037.75.75 0 0 1-.354-1Z" clip-rule="evenodd" />
                                </svg>

                                Share your personalized link
                            </dt>
                            <dd class="mt-4 flex flex-auto flex-col text-base/7">
                                <p class="flex-auto">
                                    Share your shop with friends, family, or market visitors. Your page looks great on phones too.
                                </p>
                            </dd>
                        </div>
                    </dl>
                </div>
            </div>
        </div>
    </main>
</x-guest-layout>
