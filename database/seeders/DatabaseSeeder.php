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
        File::delete(File::glob(storage_path('framework/cache/*.sqlite')));
        $cachedSushi = GeneralLedger::all();
    }
}
