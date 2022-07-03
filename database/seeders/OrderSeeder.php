<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Nette\Utils\Random;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Order::factory()->count(10)->create()->each(function ($order) {

            $randomProducts = Product::all()->random(rand(1, Product::all()->count()))->pluck('id');
            foreach ($randomProducts as $product) {
                $order->products()->attach($product, [
                    'quantity' => rand(1, 10),
                    'price' => rand(1, 10),
                ]);
            }
        });
    }
}
