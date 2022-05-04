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
                <button wire:click="clearDates" class="inline-flex items-center px-2 py-1 text-xs font-semibold tracking-widest text-white uppercase transition bg-gray-800 border border-transparent rounded-md hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25">
                    Clear Dates
                </button>
                @endif

                @if(count($state['filters']) > 0 || $state['search'])
                <button wire:click="clearAll" class="inline-flex items-center px-2 py-1 text-xs font-semibold tracking-widest text-white uppercase transition bg-gray-800 border border-transparent rounded-md hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25">
                    Clear All
                </button>
                @endif
        </div>
    </div>

    <table class="{{ $state['class'] ?? ''}}">
        <tr>
            @foreach($columns as $column)
            <th class="{{ $column->getHeaderClass() }} whitespace-nowrap">
                {{ $column->getLabel() }}
            </th>
            @endforeach

        </tr>

        @if(in_array(needle: true,haystack: array_column(array: $state['columns'],column_key: 'hasSecondaryHeader')))
        <tr>
            @foreach($columns as $column)
            <th class="{{ $column->getSecondaryHeaderClass() }} whitespace-nowrap">
                @if($column->hasSecondaryHeaderView())
                @include($column->getSecondaryHeaderView(), ['column' => $column])
                @else
                    {{ $column->renderSecondaryHeader() }}
                @endif
            </th>
            @endforeach
        </tr>
        @endif

        <tbody>
            @foreach($state['rows'] as $rowKey => $rowData)
            <tr class="{{ $rowKey % 2 == 0 ? 'bg-gray-50' : 'bg-gray-100' }}">
                @foreach($columns as $column)
                <td class="{{ $column->getClass() }} whitespace-nowrap">
                    {!! $column->render($rowData, $state['rows']) !!}
                </td>
                @endforeach
            </tr>
            @endforeach

        </tbody>
        <tfoot>
            <tr>
                @foreach($columns as $column)
                <td class="{{ $column->getFooterClass() }} whitespace-nowrap">
                    @if($column->hasFooterView)
                    @include($column->footerView, ['column' => $column])
                    @else
                    {{ $column->renderFooter() }}
                    @endif
                </td>
                @endforeach
            </tr>
    </table>
    {{ $state['rows']->links() }}
</div>