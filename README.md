# Installation

```bash
composer install
```

```bash
cp .env.example .env
```

```bash
php artisan key:generate
```

```bash
yarn && yarn run dev
```

No migrations are needed, simply run

```bash
php artisan db:seed
```

## Usage

Serve the project and open it in your browser

```php
// routes/web.php
Route::get('/', function () {
    return view('tw');
});
```

Open the file `app/Http/Livewire/GeneralLedgerTable.php` in your editor

```php
<?php

namespace App\Http\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\GeneralLedger;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;

class GeneralLedgerTable extends DataTableComponent
{
    protected $model = GeneralLedger::class;

    public $columnsWithSelectFilter = [
        'year',
        // 'month',
        // 'date',
        // 'department',
        // 'account_holder',
        // 'status',
        // 'transaction_type',
        // 'check_number',
        // 'payee',
        // 'transaction_id',
        // 'project',
        // 'reference_number',
        // 'division',
        // 'account',
        // 'memo',
    ];
    ...
```

Uncomment columns one by one and refresh your browser and click `filters` to gauge performance of `filters` under `stress`
