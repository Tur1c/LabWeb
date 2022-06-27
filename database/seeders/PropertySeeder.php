<?php

namespace Database\Seeders;

use App\Models\Property;
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
        Property::create([
            'image' => 'real-estate-images/apartment-1.jpg',
            'price' => '1000000',
            'address' => '123 Main St',
            'category_id' => '2',
            'building_id' => '2'
        ]);

        Property::create([
            'image' => 'real-estate-images/apartment-2.jpg',
            'price' => '1000000',
            'address' => '123 Main St',
            'category_id' => '2',
            'building_id' => '2'
        ]);

        Property::create([
            'image' => 'real-estate-images/apartment-3.jpg',
            'price' => '1000000',
            'address' => '123 Main St',
            'category_id' => '2',
            'building_id' => '2'
        ]);

        Property::create([
            'image' => 'real-estate-images/apartment-4.jpg',
            'price' => '1000000',
            'address' => '123 Main St',
            'category_id' => '2',
            'building_id' => '2'
        ]);

        Property::create([
            'image' => 'real-estate-images/house-1.jpeg',
            'price' => '1000000',
            'address' => '123 Main St',
            'category_id' => '2',
            'building_id' => '1'
        ]);

        Property::create([
            'image' => 'real-estate-images/house-2.jpg',
            'price' => '1000000',
            'address' => '123 Main St',
            'category_id' => '2',
            'building_id' => '1'
        ]);

        Property::create([
            'image' => 'real-estate-images/house-3.jpg',
            'price' => '1000000',
            'address' => '123 Main St',
            'category_id' => '2',
            'building_id' => '1'
        ]);

        Property::create([
            'image' => 'real-estate-images/apartment-5.jpg',
            'price' => '1000000',
            'address' => '123 Main St',
            'category_id' => '1',
            'building_id' => '1'
        ]);
    }
}
