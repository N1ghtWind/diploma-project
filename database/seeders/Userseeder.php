<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Userseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $user = User::create([
            'name' => 'Jozsi',
            'email' => 'terezsak@gmail.com',
            'password' => '$2y$10$B8QZ4s4kwazwKbryjwD.LOvX6aE2EPYFbAqVE5IEcOM4i7xnpJjcq',
            'created_at' => now(),
            'updated_at' => now(),
            'email_verified_at' => now(),
        ]);
    }
}
