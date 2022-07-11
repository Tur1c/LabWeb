<?php

namespace Database\Seeders;

use App\Models\Building;
use App\Models\Category;
use App\Models\Property;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class PropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = Category::all();
        $buildings = Building::all();

        Property::create([
            'id' => Str::uuid(),
            'image' => 'real-estate-images/apartment-1.jpg',
            'price' => '1000000',
            'address' => '123 Main St',
            'category_id' => $categories[1]->id,
            'building_id' => $buildings[1]->id
        ]);

        Property::create([
            'id' => Str::uuid(),
            'image' => 'real-estate-images/apartment-2.jpg',
            'price' => '1000000',
            'address' => '123 Main St',
            'category_id' => $categories[1]->id,
            'building_id' => $buildings[1]->id
        ]);

        Property::create([
            'id' => Str::uuid(),
            'image' => 'real-estate-images/apartment-3.jpg',
            'price' => '1000000',
            'address' => '123 Main St',
            'category_id' => $categories[1]->id,
            'building_id' => $buildings[1]->id
        ]);

        Property::create([
            'id' => Str::uuid(),
            'image' => 'real-estate-images/apartment-4.jpg',
            'price' => '1000000',
            'address' => '123 Main St',
            'category_id' => $categories[1]->id,
            'building_id' => $buildings[1]->id
        ]);

        Property::create([
            'id' => Str::uuid(),
            'image' => 'real-estate-images/house-1.jpeg',
            'price' => '1000000',
            'address' => '123 Main St',
            'category_id' => $categories[1]->id,
            'building_id' => $buildings[0]->id
        ]);

        Property::create([
            'id' => Str::uuid(),
            'image' => 'real-estate-images/house-2.jpg',
            'price' => '1000000',
            'address' => '123 Main St',
            'category_id' => $categories[1]->id,
            'building_id' => $buildings[0]->id
        ]);

        Property::create([
            'id' => Str::uuid(),
            'image' => 'real-estate-images/house-3.jpg',
            'price' => '1000000',
            'address' => '123 Main St',
            'category_id' => $categories[1]->id,
            'building_id' => $buildings[0]->id
        ]);

        Property::create([
            'id' => Str::uuid(),
            'image' => 'real-estate-images/apartment-5.jpg',
            'price' => '1000000',
            'address' => '123 Main St',
            'category_id' => $categories[0]->id,
            'building_id' => $buildings[0]->id
        ]);
    }
}
