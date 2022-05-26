
    <select
        wire:model="{{ $component->getTableName() }}.filters.{{ $filter->getKey() }}"
        class="p-0 tracking-tighter border-gray-100 rounded-sm {{ $filter->getName() === 'Date' ? '[font-size:.55rem]' : '[font-size:.6rem]' }} [line-height:.75rem] @if($filter->getName() !== 'DetailMemo') w-full @endif"
    >
        <option value=""></option>
        @foreach($filter->getOptions() as $key => $value)
            <option value="{{ $key }}">{{ $value }}</option>
        @endforeach
    </select>
