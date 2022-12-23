<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'name' => 'Producto 1',
            'description' => 'Producto 1',
            'price' => 123.45,
            'vat' => 5
        ]);

        Product::create([
            'name' => 'Producto 2',
            'description' => 'Producto 2',
            'price' => 45.65,
            'vat' => 15
        ]);

        Product::create([
            'name' => 'Producto 3',
            'description' => 'Producto 3',
            'price' => 39.73,
            'vat' => 12
        ]);

        Product::create([
            'name' => 'Producto 4',
            'description' => 'Producto 4',
            'price' => 250.00,
            'vat' => 8
        ]);

        Product::create([
            'name' => 'Producto 5',
            'description' => 'Producto 5',
            'price' => 59.35,
            'vat' => 10
        ]);
    }
}
