<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Chair' => 'chairCategory.jpeg',
            'Sofa'  => 'sofaCategory.jpeg',
            'Table' => 'tableCategory.jpeg',
            'Sideboard' => 'sideboardCategory.jpeg',
            'Bed' => 'bedCategory.jpeg',
            'Pillow' => 'pillowCategory.jpeg',
        ];

        foreach ($categories as $name => $image) {
            $sourcePath = base_path('storage/app/public/images/categories/' . $image);

            if (file_exists($sourcePath)) {
                Storage::disk('public')->put('images/categories/' . $image, file_get_contents($sourcePath));

                DB::table('categories')->insert([
                    'name' => $name, 
                    'path' => 'images/categories/' . $image,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            } else {
                echo "File does not exist: $sourcePath\n";
            }
        }
    }
}
