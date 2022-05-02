<div>
    <div class="md:flex md:justify-between mb-4 px-4 md:p-0">
        <div class="w-full mb-4 md:mb-0 md:w-2/4 md:flex space-y-4 md:space-y-0 md:space-x-2">

            <input
                class="block border-gray-300 rounded-md shadow-sm transition duration-150 ease-in-out sm:text-sm sm:leading-5 dark:bg-gray-700 dark:text-white dark:border-gray-600"
                type="text" wire:model='state.search' />

                <div>
                    <select
                        wire:model='state.perPage'
                        id="perPage"
                        class="block w-full border-gray-300 rounded-md shadow-sm transition duration-150 ease-in-out sm:text-sm sm:leading-5 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:text-white dark:border-gray-600"
                    >
            
                        <option>10</option>
                        <option>100</option>
                        <option>500</option>
                        <option>1000</option>
                    </select>
                </div>
        </div>
    </div>

    <table class="w-full">
        <tr>
            @foreach($state['columns'] as $column)
            @php
                $columnData = new \App\ColumnData($column['name'], $column['label']);
            @endphp
            <th class="{{ $column['headerClass']}} whitespace-nowrap">
                {{ $columnData->label }}
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