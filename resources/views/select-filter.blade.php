
    <select
        wire:model="{{ $component->getTableName() }}.filters.{{ $filter->getKey() }}"
        class="w-full p-0 text-sm border-gray-100 rounded-sm"
    >
        <option value=""></option>
        @foreach($filter->getOptions() as $key => $value)
            <option value="{{ $key }}">{{ $value }}</option>
        @endforeach
    </select>
