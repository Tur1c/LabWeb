<?php

namespace Database\Seeders;

use App\Models\Office;
use Illuminate\Database\Seeder;

class OfficeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Office::create([
            'image' => 'office-images/office-1.jpg',
            'office_name' => 'Office 1',
            'office_address' => '123 Main St',
            'contact_name' => 'John Doe',
            'contact_information' => '123-456-7890',
        ]);

        Office::create([
            'image' => 'office-images/office-2.jpg',
            'office_name' => 'Office 2',
            'office_address' => '123 Main St',
            'contact_name' => 'John Doe',
            'contact_information' => '123-456-7890',
        ]);

        Office::create([
            'image' => 'office-images/office-3.jpg',
            'office_name' => 'Office 3',
            'office_address' => '123 Main St',
            'contact_name' => 'John Doe',
            'contact_information' => '123-456-7890',
        ]);

        Office::create([
            'image' => 'office-images/office-4.jpg',
            'office_name' => 'Office 4',
            'office_address' => '123 Main St',
            'contact_name' => 'John Doe',
            'contact_information' => '123-456-7890',
        ]);

        Office::create([
            'image' => 'office-images/office-5.jpg',
            'office_name' => 'Office 5',
            'office_address' => '123 Main St',
            'contact_name' => 'John Doe',
            'contact_information' => '123-456-7890',
        ]);

        Office::create([
            'image' => 'office-images/office-6.jpg',
            'office_name' => 'Office 6',
            'office_address' => '123 Main St',
            'contact_name' => 'John Doe',
            'contact_information' => '123-456-7890',
        ]);

        Office::create([
            'image' => 'office-images/office-7.jpg',
            'office_name' => 'Office 7',
            'office_address' => '123 Main St',
            'contact_name' => 'John Doe',
            'contact_information' => '123-456-7890',
        ]);

        Office::create([
            'image' => 'office-images/office-8.jpg',
            'office_name' => 'Office 8',
            'office_address' => '123 Main St',
            'contact_name' => 'John Doe',
            'contact_information' => '123-456-7890',
        ]);
    }
}
