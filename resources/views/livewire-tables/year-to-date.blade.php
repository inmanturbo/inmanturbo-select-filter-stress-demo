<div>
    <button wire:click="$emit('setFilter', 'date_from', '{{ now()->startOfYear()->format('Y-m-d') }}')" class="inline-flex justify-center items-center py-2 px-1 text-sm text-[#0000FF] bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:text-white dark:border-gray-600 dark:hover:bg-gray-600">
        {{ __('Year to Date') }}
    </button>
</div>