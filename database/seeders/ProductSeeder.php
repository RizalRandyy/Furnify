<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            'Walnut Dining Chair' => [
                'image' => 'diningChairProduct.jpeg',
                'description' => 'Comfortable wooden chair',
                'price' => 550000,
                'stock' => 50,
                'category_id' => 1,
            ],
            'Oslon Comfort Sofa' => [
                'image' => 'sleeperSofaProduct.jpeg',
                'description' => 'Luxury sleeper sofa',
                'price' => 5000000,
                'stock' => 70,
                'category_id' => 2,
            ],
            'Silvia Sofa' => [
                'image' => 'silviaSofa.png',
                'description' => 'Luxury blue sofa',
                'price' => 5000000,
                'stock' => 70,
                'category_id' => 2,
            ],
            'Seymour Sofa' => [
                'image' => 'SeymourSofa.jpeg',
                'description' => 'Luxury walnut sofa',
                'price' => 5500000,
                'stock' => 70,
                'category_id' => 2,
            ],
            'Velvet Blue Sofa' => [
                'image' => 'VelvetBlueSofa.jpeg',
                'description' => 'Luxury velvet blue sofa',
                'price' => 3000000,
                'stock' => 70,
                'category_id' => 2,
            ],
            'Cara Coffee Table' => [
                'image' => 'coffeeTableProduct.jpeg',
                'description' => 'Stylish coffee table',
                'price' => 300000,
                'stock' => 20,
                'category_id' => 3,
            ],
            'Opulent Modern Sideboard' => [
                'image' => 'sideboardProduct.jpeg',
                'description' => 'Modern sideboard',
                'price' => 1200000,
                'stock' => 30,
                'category_id' => 4,
            ],
            'Caima Bed' => [
                'image' => 'bedProduct.jpeg',
                'description' => 'King size bed',
                'price' => 2500000,
                'stock' => 80,
                'category_id' => 5,
            ],
            'Faux Rabbit Fur Pillow' => [
                'image' => 'pillowRabbitProduct.jpeg',
                'description' => 'Soft and comfortable pillow',
                'price' => 50000,
                'stock' => 100,
                'category_id' => 6,
            ],
        ];
        
        foreach ($products as $name => $details) {
            $image = $details['image'];
            $description = $details['description'];
            $price = $details['price'];
            $stock = $details['stock'];
            $category_id = $details['category_id'];
            
            $sourcePath = base_path('storage/app/public/images/products/' . $image);
        
            if (file_exists($sourcePath)) {
                Storage::disk('public')->put('images/products/' . $image, file_get_contents($sourcePath));
        
                DB::table('products')->insert([
                    'name' => $name,
                    'category_id' => $category_id,
                    'description' => $description,
                    'price' => $price,
                    'stock' => $stock,
                    'path' => 'images/products/' . $image,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            } else {
                echo "File does not exist: $sourcePath\n";
            }
        }
    }
}
