<html
    x-cloak
    x-data="{darkMode: localStorage.getItem('dark') === 'true'}"
    x-init="$watch('darkMode', val => localStorage.setItem('dark', val))"
    x-bind:class="{'dark': darkMode}"
>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tailwind 2 Tables</title>

    <link rel="stylesheet" href="https://rsms.me/inter/inter.css" />
    <link rel="stylesheet" href="{{ mix('css/app.css') }}" />
    <livewire:styles />

    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>
<body class="dark:bg-gray-900 dark:text-white">

    <div class="mb-8 text-center">
        <button x-cloak x-on:click="darkMode = !darkMode;">
            <span x-show="!darkMode" class="w-8 h-8 p-2 ml-3 text-gray-700 transition bg-gray-100 rounded-md cursor-pointer hover:bg-gray-200">Dark</span>
            <span x-show="darkMode" class="w-8 h-8 p-2 ml-3 text-gray-100 transition bg-gray-700 rounded-md cursor-pointer dark:hover:bg-gray-600">Light</span>
        </button>
    </div>

    <div>
        <livewire:general-ledger-table />
        <livewire:general-ledger-table-two />
    </div>

    <livewire:scripts />
{{--    <script src="https://cdn.jsdelivr.net/gh/livewire/sortable@v0.x.x/dist/livewire-sortable.js"></script>--}}
    <script src="https://unpkg.com/@nextapps-be/livewire-sortablejs@0.1.1/dist/livewire-sortable.js"></script>
</body>
</html>
