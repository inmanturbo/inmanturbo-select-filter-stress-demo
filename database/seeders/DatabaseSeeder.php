<?php

namespace Database\Seeders;

use App\Models\GeneralLedger;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        if(in_array(Sushi::class, class_uses_recursive(GeneralLedger::class), true)){

            File::delete(File::glob(storage_path('framework/cache/*.sqlite')));
        }
        $factory = (new GeneralLedger)->getRows();
    }
}
