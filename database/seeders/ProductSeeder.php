<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{

    /**
     * Configure the model factory.
     *
     * @return $this
     */

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Product::create([
            'name' => 'Aspirin',
            'description' => 'Aspirin',
            'price' => 5,
            'quantity_unit' => '100g',
            'user_id' => User::where('userable_type', '=', 'App\Models\Company')->get()->pluck('id')->random(),
        ]);
        Product::create([
            'name' => 'Carrot',
            'description' => 'Carrot',
            'price' => 4,
            'quantity_unit' => '100g',
            'user_id' => User::where('userable_type', '=', 'App\Models\Company')->get()->pluck('id')->random(),
        ]);

        Product::create([
            'name' => 'Apple',
            'description' => 'Apple!',
            'price' => 3,
            'quantity_unit' => '100g',
            'user_id' => User::where('userable_type', '=', 'App\Models\Company')->get()->pluck('id')->random(),
        ]);

        $products = Product::all();
        foreach ($products as $product) {
            $url = 'https://source.unsplash.com/random/600x600';
            $product
                ->addMediaFromUrl($url)
                ->toMediaCollection();
        }

    }
}
