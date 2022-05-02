<div>

    <input type="text" wire:model='state.search'/>

    <table class="w-full">
        <tr>
            @foreach($state['columns'] as $column)
            <th class="{{ $column['headerClass']}} whitespace-nowrap">
                    {{ $column['label'] }}
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