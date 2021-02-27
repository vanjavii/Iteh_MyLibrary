<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Writers;

class WritersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Writers::factory()->count(5)->create();
    }
}
