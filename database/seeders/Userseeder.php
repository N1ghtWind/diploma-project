<?php

namespace Database\Seeders;

use App\Models\Carrier;
use App\Models\Company;
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


        //Create company
        $user2 = User::create([
            'name' => 'Maxi',
            'email' => 'maxi@test.com',
            'password' => '$2y$10$oXVToK0z419qfEcf9dJzAOZxX/jghOp9dw6eswqt3Kyu1Vsui5uum',
            'created_at' => now(),
            'updated_at' => now(),
            'email_verified_at' => now(),
        ]);

        $company = Company::create([
            'name' => 'Maxi',
            'company_logo' => 'unknown.jpg',

        ]);
        $company->user()->save($user2);


        $user3 = User::create([
            'name' => 'Terezsák',
            'email' => 'carrier@test.com',
            'password' => '$2y$10$oXVToK0z419qfEcf9dJzAOZxX/jghOp9dw6eswqt3Kyu1Vsui5uum',
            'created_at' => now(),
            'updated_at' => now(),
            'email_verified_at' => now(),
        ]);

        $carrier = Carrier::create([
            'success_deliveries' => 0,
            'is_online' => true,
            'location' => 'Budapest',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $carrier->user()->save($user3);


        //Create Address for user1
        $user->addresses()->create([
            'phone' => '06435435',
            'full_name' => 'Józsi Test',
            'address' => 'Test utca 1.',
            'city' => 'Subotica',
            'zip' => '12345',
            'user_id' => $user->id,
        ]);

    }
}
