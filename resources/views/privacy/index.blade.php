<x-guest-layout>
    <x-slot:title>
        {{ __("Privacy Policy") }}
    </x-slot:title>

    <div class="container mx-auto py-10 px-4">
        <h1 class="text-3xl font-bold mb-6">{{ __('Privacy Policy') }}</h1>

        <p class="mb-4">{{ __('Effective Date: :date', ['date' => 'May 10, 2025']) }}</p>

        <h2 class="text-xl font-semibold mt-6 mb-2">{{ __('1. Information We Collect') }}</h2>
        <p class="mb-4">{{ __('We collect name and email address when you register or contact us.') }}</p>

        <h2 class="text-xl font-semibold mt-6 mb-2">{{ __('2. How We Use Your Information') }}</h2>
        <p class="mb-4">{{ __('We use your data to create and manage your artisan store and contact you regarding your account or support queries. We do not sell or share your personal information with third parties for marketing.') }}</p>

        <h2 class="text-xl font-semibold mt-6 mb-2">{{ __('3. Third-Party Services') }}</h2>
        <p class="mb-4">{{ __('We use Fathom Analytics (no personal data collection) and Cloudflare for CDN and caching.') }}</p>

        <h2 class="text-xl font-semibold mt-6 mb-2">{{ __('4. User-Generated Content') }}</h2>
        <p class="mb-4">{{ __('You may submit content such as your store name, store description, product details, and images. You are responsible for ensuring this content does not violate any laws or rights.') }}</p>

        <h2 class="text-xl font-semibold mt-6 mb-2">{{ __('5. Contacting Artisans') }}</h2>
        <p class="mb-4">{{ __('Visitors can contact artisans via email or Instagram links if provided by the artisan. localpantry.shop is not responsible for communications between artisans and visitors.') }}</p>

        <h2 class="text-xl font-semibold mt-6 mb-2">{{ __('6. Cookies') }}</h2>
        <p class="mb-4">{{ __('We use only functional cookies necessary to operate the site. We do not use tracking or advertising cookies.') }}</p>

        <h2 class="text-xl font-semibold mt-6 mb-2">{{ __('7. Your Rights') }}</h2>
        <p class="mb-4">{{ __('You can request deletion of your account and associated data by contacting us at :contact', ['contact' => route('contact.create')]) }}</p>
    </div>
</x-guest-layout>
