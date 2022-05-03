<div>
    <div class="px-4 mb-4 md:flex md:justify-between md:p-0">
        <div class="w-full mb-4 space-y-4 md:mb-0 md:w-2/4 md:flex md:space-y-0 md:space-x-2">

            <input
                placeholder="Search"
                class="block transition duration-150 ease-in-out border-gray-300 rounded-md shadow-sm sm:text-sm sm:leading-5 dark:bg-gray-700 dark:text-white dark:border-gray-600"
                type="text" wire:model='state.search' />

                <div class="inline-flex flex-row items-center justify-between space-x-1 text-xs sm:col-span-4">

                   <label for="dateFrom">Date From:</label>   
                    <input class="block transition duration-150 ease-in-out border-gray-300 rounded-md shadow-sm sm:text-sm sm:leading-5 dark:bg-gray-700 dark:text-white dark:border-gray-600" wire:model="state.dateFrom" id="dateFrom" type="date">
                    
                </div>

                <div class="inline-flex flex-row items-center justify-between space-x-1 text-xs sm:col-span-4">

                   <label for="dateTo">Date To:</label>   
                    <input class="block transition duration-150 ease-in-out border-gray-300 rounded-md shadow-sm sm:text-sm sm:leading-5 dark:bg-gray-700 dark:text-white dark:border-gray-600" wire:model="state.dateTo" id="dateTo" type="date">
                    
                </div>

                <div class="inline-flex flex-row items-center justify-between space-x-1 text-xs sm:col-span-4">

                    <label class="whitespace-nowrap" for="perPage">Per Page:</label>  

                    <select
                        wire:model='state.perPage'
                        id="perPage"
                        class="block w-full transition duration-150 ease-in-out border-gray-300 rounded-md shadow-sm sm:text-sm sm:leading-5 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:text-white dark:border-gray-600"
                    >
                    @foreach ($state['perPageOptions'] as $option)
                        <option value="{{ $option }}">{{ $option }}</option>
                    @endforeach
                    </select>
                </div>

                @if($state['dateFrom'] || $state['dateTo'])
                <button wire:click="$set('state.dateFrom', '');$set('state.dateTo', '');" class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition bg-gray-800 border border-transparent rounded-md hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25">
                    Clear Dates
                </button>
                @endif

                @if(count($state['filters']) > 0 || $state['search'])
                <button wire:click="$set('state.filters', []);" class="inline-flex items-center px-4 py-1 text-xs font-semibold tracking-widest text-white uppercase transition bg-gray-800 border border-transparent rounded-md hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                      </svg>
                    refresh
                </button>
                @endif
        </div>
    </div>

    <table class="{{ $state['class'] ?? ''}}">
        <tr>
            @foreach($state['columns'] as $column)
            @php
                $columnData = \App\ColumnData::from($column);
            @endphp
            <th class="{{ $column['headerClass']}} whitespace-nowrap">
                {{ $columnData->label}}
            </th>
            @endforeach

        </tr>

        @if(in_array(needle: true,haystack: array_column(array: $state['columns'],column_key: 'hasSecondaryHeader')))
        <tr>
            @foreach($state['columns'] as $column)
            <th class="{{ $column['secondaryHeaderClass'] }} whitespace-nowrap">
                @if($column['hasSecondaryHeaderView'])
                @include($column['secondaryHeaderView'], ['column' => $column, 'options' => $column['options']])
                @else
                <span>
                    &nbsp;
                </span>
                @endif
            </th>
            @endforeach
        </tr>
        @endif

        <tbody>
            @foreach($state['rows']['data'] as $rowKey => $rowData)
            @php
                $rowData = (array) $rowData;
            @endphp
            <tr class="{{ $rowKey % 2 == 0 ? 'bg-gray-50' : 'bg-gray-100' }}">
                @foreach($state['columns'] as $column)
                <td class="{{ $column['class'] }} whitespace-nowrap">
                    @if($column['hasView'])
                    @include($column['view'], ['row' => $rowData])
                    @else
                    {{ $rowData[$column['name']] }}
                    @endif
                </td>
                @endforeach
            </tr>
            @endforeach

        </tbody>
    </table>
    {{ $paginator->links() }}
</div>