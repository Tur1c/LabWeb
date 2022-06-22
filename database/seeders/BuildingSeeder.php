<?php

namespace Database\Seeders;

use App\Models\Building;
use Illuminate\Database\Seeder;

class BuildingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Building::create([
            "name" => "House"
        ]);

        Building::create([
            "name" => "Apartment"
        ]);
    }
}
