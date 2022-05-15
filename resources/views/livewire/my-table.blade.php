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
                    @foreach ($config['perPageOptions'] as $option)
                        <option value="{{ $option }}">{{ $option }}</option>
                    @endforeach
                    </select>
                </div>

                @if($state['dateFrom'] || $state['dateTo'])
                <button wire:click="clearDates" class="inline-flex items-center px-2 py-1 text-xs font-semibold tracking-widest text-white uppercase transition bg-gray-800 border border-transparent rounded-md whitespace-nowrap hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25">
                    Clear Dates
                </button>
                @endif



                @if(isset($state['filters']) && count($state['filters']) > 0 || isset($state['search']) && strlen($state['search']) > 0)
                <button wire:click="clearAll" class="inline-flex items-center px-2 py-1 text-xs font-semibold tracking-widest text-white uppercase transition bg-gray-800 border border-transparent rounded-md whitespace-nowrap hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25">
                    Clear All
                </button>
                @endif
        </div>
    </div>

    <table class="{{ $config['class'] ?? ''}}">
        <tr>
            @foreach($columns as $column)
            <th class="{{ $column->getHeaderClass() }}">
                @if($column->isSortable())
                    <button wire:click="sortBy('{{ $column->getName() }}')" class="flex items-center">
                        {{ $column->getLabel() }}
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M5 12a1 1 0 102 0V6.414l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L5 6.414V12zM15 8a1 1 0 10-2 0v5.586l-1.293-1.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L15 13.586V8z" />
                          </svg>
                    </button>
                @else
                <span>
                    {{ $column->getLabel() }}
                </span>
                @endif
            </th>
            @endforeach

        </tr>

        @if(in_array(needle: true,haystack: array_column(array: $columnData ,column_key: 'hasSecondaryHeader')))
        <tr>
            @foreach($columns as $column)
            <th class="{{ $column->getSecondaryHeaderClass() }}">
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
            @foreach($data['rows'] as $rowKey => $rowData)
            <tr class="{{ $row->getClass(index: $rowKey, rowData: $rowData) }}">
                @foreach($columns as $column)
                <td class="{{ $column->getClass() }}">
                    {!! $column->render($rowData, $data['rows']) !!}
                </td>
                @endforeach
            </tr>
            @endforeach

        </tbody>
        <tfoot>
            <tr>
                @foreach($columns as $column)
                <td class="{{ $column->getFooterClass() }}">
                    @if($column->hasFooterView)
                    @include($column->footerView, ['column' => $column])
                    @else
                    {{ $column->renderFooter() }}
                    @endif
                </td>
                @endforeach
            </tr>
    </table>
        {{ $data['rows']->links() }}
</div>