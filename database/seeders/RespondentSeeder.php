<?php

namespace Database\Seeders;

use App\Models\Respondent;
use Illuminate\Database\Seeder;

class RespondentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Respondent::factory()
            ->count(10)
            ->create();
    }
}
