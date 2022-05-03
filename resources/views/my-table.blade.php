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
    <nav class="relative flex flex-wrap items-center justify-between w-full py-3 mb-4 text-gray-500 bg-gray-100 shadow-lg hover:text-gray-700 focus:text-gray-700">
        <div class="flex flex-wrap items-center justify-between w-full px-6 container-fluid">
          <div class="container-fluid">
            <a class="text-xl text-black" href="#">Navbar</a>
          </div>
        </div>
    </nav>

    </div class="mt-6">
        @livewire('my-table', ['columns' => $columns, 'model' => $model, 'config' => ['dateColumn' => 'date']])
    </div>

    <livewire:scripts />
{{--    <script src="https://cdn.jsdelivr.net/gh/livewire/sortable@v0.x.x/dist/livewire-sortable.js"></script>--}}
    <script src="https://unpkg.com/@nextapps-be/livewire-sortablejs@0.1.1/dist/livewire-sortable.js"></script>
</body>
</html>
