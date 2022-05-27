@aware($component->configMeta)
@php
    $config = \App\DatatableConfig::from($component->configMeta);
@endphp

@foreach($config->getToolBarLeftEndItems() as $item)
    @include($item )
@endforeach