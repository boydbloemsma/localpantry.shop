<x-guest-layout>
    <x-slot:title>
        {{ __("Terms of Use") }}
    </x-slot:title>

    <div class="container mx-auto py-10 px-4">
        <h1 class="text-3xl font-bold mb-6">{{ __('Terms of Use') }}</h1>

        <p class="mb-4">{{ __('Effective Date: :date', ['date' => 'May 10, 2025']) }}</p>

        <h2 class="text-xl font-semibold mt-6 mb-2">{{ __('1. Description of Service') }}</h2>
        <p class="mb-4">{{ __('localpantry.shop provides local artisans with a platform to create simple online storefronts. We do not facilitate direct sales. Visitors may view products and contact artisans independently.') }}</p>

        <h2 class="text-xl font-semibold mt-6 mb-2">{{ __('2. Account Requirements') }}</h2>
        <p class="mb-4">{{ __('To register, you must be at least 18 years old and provide accurate name and email information. You are responsible for any content you publish on your store.') }}</p>

        <h2 class="text-xl font-semibold mt-6 mb-2">{{ __('3. Content Guidelines') }}</h2>
        <p class="mb-4">{{ __('You agree not to upload content that is illegal, fraudulent, misleading, infringes intellectual property rights, or contains hate speech or offensive material.') }}</p>

        <h2 class="text-xl font-semibold mt-6 mb-2">{{ __('4. Platform Limitations') }}</h2>
        <p class="mb-4">{{ __('We do not guarantee sales, traffic, or visibility and may update or discontinue features at any time.') }}</p>

        <h2 class="text-xl font-semibold mt-6 mb-2">{{ __('5. Third-Party Links') }}</h2>
        <p class="mb-4">{{ __('Your store may include links (e.g., to Instagram or email). We are not responsible for the content or security of third-party sites.') }}</p>

        <h2 class="text-xl font-semibold mt-6 mb-2">{{ __('6. Disclaimer') }}</h2>
        <p class="mb-4">{{ __('localpantry.shop is not responsible for issues arising from communication or transactions between artisans and visitors, or for data loss and downtime.') }}</p>

        <h2 class="text-xl font-semibold mt-6 mb-2">{{ __('7. Termination') }}</h2>
        <p class="mb-4">{{ __('We may suspend or remove accounts that violate these terms without prior notice.') }}</p>

        <h2 class="text-xl font-semibold mt-6 mb-2">{{ __('8. Contact') }}</h2>
        <p class="mb-4">{{ __('For questions, contact us at :contact', ['contact' => route('contact.create')]) }}</p>
    </div>
</x-guest-layout>
