<div>
    <x-jet-secondary-button wire:click="$emit('setFilter', 'date_from', '{{ now()->startOfYear()->format('Y-m-d') }}')" class="block w-full transition duration-150 ease-in-out border-gray-300 rounded-md shadow-sm sm:text-sm sm:leading-5 dark:bg-gray-700 dark:text-white dark:border-gray-600">
        {{ __('Year to Date') }}
    </x-jet-secondary-button>
</div>