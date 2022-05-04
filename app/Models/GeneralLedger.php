<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Sushi\Sushi;

class GeneralLedger extends Model
{
    use HasFactory;
    // use Sushi;


    public function getRows()
    {
        $faker = \Faker\Factory::create();
        $rows = [];

        $rowLimit = 13000;

        $selectOptionLimit = 2000;

        for ($i = 1; $i <= $rowLimit; $i++) {
            $date = $faker->dateTimeThisDecade();
            $rows[] = $row = [
                'year' => $date->format('Y'),
                'month' => $date->format('M'),
                'date' => $date->format('Y-m-d'),
                'department' => $faker->randomElement(['Payables', 'General Ledger']),
                'account_holder' => $faker->company,
                'status' => $faker->randomElement(['Paid', 'Unpaid']),
                'transaction_type' => $faker->randomElement(['Check', 'Cash', 'Credit Card']),
                'check_number' => $faker->randomNumber(3),
                'payee' => $faker->company,
                'transaction_id' => $faker->randomNumber(3),
                'credit' => $i % 3 == 0 ? $faker->randomElement(['100', '2000', '10', '20', '20.00', '20.10']): null,
                'debit' => $i % 3 != 0 ? $faker->randomFloat(2, 0, 1000): null,
                'project' => $faker->randomElement(['Project 1', 'Project 2', 'Project 3']),
                'reference_number' => $faker->randomNumber(3),
                'division' => $faker->randomElement(['Division 1', 'Division 2', 'Division 3']),
                'account' => $faker->randomElement(['Account 1', 'Account 2', 'Account 3']),
                'memo' => $faker->sentence,
            ];
            if (!in_array(Sushi::class, class_uses_recursive(get_class($this)), true)) {
                $this->create($row);
            }
        }
        foreach (array_keys($rows[0]) as $key) {
            touch(app()->bootstrapPath('cache/' . $key . '.php'));
            Storage::disk('bootstrap-cache')
            ->put(
                $key . '.php',
                '<?php return ' .
                var_export(
                    collect(
                        collect($rows)
                        ->unique($key)
                        ->pluck($key, $key)
                        ->take($selectOptionLimit)
                        ->toArray()
                    )
                        ->sort()
                        ->toArray(),
                    true
                ) .
                        ';'
            );
        }

        return $rows;
    }

    protected function sushiShouldCache()
    {
        return true;
    }
}
