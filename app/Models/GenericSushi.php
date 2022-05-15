<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Sushi\Sushi;

class GenericSushi extends Model
{
    use HasFactory;
    use Sushi;

    public function getRows()
    {
        return app('sushi_rows')->rows;
    }

    protected function sushiShouldCache()
    {
        return true;
    }
}
