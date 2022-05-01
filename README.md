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

### Increasing/Reducing Stress

- The number of rows can be adjusted by increasing or decreasing the `$limit` variable in `app/Models/GeneralLedger.php` and rerunning `php artisan db:seed`
- Note: the options for the `select filters` are bootstrapped at the time of creation to eliminate database queries as a `stressor`

```php
//app/Models/GeneralLedger.php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Sushi\Sushi;

class GeneralLedger extends Model
{
    use HasFactory;
    use Sushi;


    public function getRows()
    {
        $faker = \Faker\Factory::create();
        $rows = [];

        $limit = 13000;

        for($i = 1; $i <= $limit; $i++) {
            $rows[] = [
                'year' => rand(2018, 2022),
                'month' => $faker->monthName(),
                'date' => $faker->date('m-d-Y'),
                'department' => $faker->randomElement(['Payables', 'General Ledger']),
                'account_holder' => $faker->company,
                'status' => $faker->randomElement(['Paid', 'Unpaid']),
                'transaction_type' => $faker->randomElement(['Check', 'Cash', 'Credit Card']),
                'check_number' => $faker->randomNumber(3),
                'payee' => $faker->company,
                'transaction_id' => $faker->randomNumber(3),
                'credit' => $i % 3 == 0 ? $faker->randomFloat(2, 0, 1000): null,
                'debit' => $i % 3 != 0 ? $faker->randomFloat(2, 0, 1000): null,
                'project' => $faker->randomElement(['Project 1', 'Project 2', 'Project 3']),
                'reference_number' => $faker->randomNumber(3),
                'division' => $faker->randomElement(['Division 1', 'Division 2', 'Division 3']),
                'account' => $faker->randomElement(['Account 1', 'Account 2', 'Account 3']),
                'memo' => $faker->sentence,
            ];
        }
        foreach(array_keys($rows[0]) as $key) {
            touch(app()->bootstrapPath('cache/' . $key . '.php'));
            Storage::disk('bootstrap-cache')
            ->put($key . '.php', '<?php return ' . var_export(collect($rows)->unique($key)->pluck($key,$key)->toArray(), true) . ';');
        }

        return $rows;
    }

    protected function sushiShouldCache()
    {
        return true;
    }
}
```

