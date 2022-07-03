<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\User;
use Database\Factories\AddressFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(User::all() as $user) {
            AddressFactory::new()->create([
                'user_id' => $user->id,
            ]);
        }
    }
}
