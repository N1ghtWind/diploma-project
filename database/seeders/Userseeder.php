<?php

namespace Database\Seeders;

use App\Models\Admin;
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

        $url = 'https://source.unsplash.com/random/600x600';
        $company->addMediaFromUrl($url)->toMediaCollection();

        //Create company #2

        $user2 = User::create([
            'name' => 'Roda',
            'email' => 'roda@test.com',
            'password' => '$2y$10$oXVToK0z419qfEcf9dJzAOZxX/jghOp9dw6eswqt3Kyu1Vsui5uum',
            'created_at' => now(),
            'updated_at' => now(),
            'email_verified_at' => now(),
        ]);

        $company = Company::create([
            'name' => 'Roda',
            'company_logo' => 'unknown.jpg',

        ]);

        $company->user()->save($user2);

        $url = 'https://source.unsplash.com/random/600x600';
        $company->addMediaFromUrl($url)->toMediaCollection();





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
            'location' => 'Subotica',
            'phone' => '063123456',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $carrier->user()->save($user3);
        $url = 'https://source.unsplash.com/random/600x600';
        $carrier->addMediaFromUrl($url)->toMediaCollection();

        $user3 = User::create([
            'name' => 'CarrierTest',
            'email' => 'carrier2@test.com',
            'password' => '$2y$10$oXVToK0z419qfEcf9dJzAOZxX/jghOp9dw6eswqt3Kyu1Vsui5uum',
            'created_at' => now(),
            'updated_at' => now(),
            'email_verified_at' => now(),
        ]);

        $carrier = Carrier::create([
            'success_deliveries' => 0,
            'is_online' => true,
            'location' => 'Backa Topola',
            'phone' => '0631243256',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $carrier->user()->save($user3);
        $url = 'https://source.unsplash.com/random/600x600';
        $carrier->addMediaFromUrl($url)->toMediaCollection();





        $user3 = User::create([
            'name' => 'CarrierRandom',
            'email' => 'carrier3@test.com',
            'password' => '$2y$10$oXVToK0z419qfEcf9dJzAOZxX/jghOp9dw6eswqt3Kyu1Vsui5uum',
            'created_at' => now(),
            'updated_at' => now(),
            'email_verified_at' => now(),
        ]);

        $carrier = Carrier::create([
            'success_deliveries' => 0,
            'is_online' => true,
            'location' => 'Novi Sad',
            'phone' => '06544323256',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $carrier->user()->save($user3);
        $url = 'https://source.unsplash.com/random/600x600';
        $carrier->addMediaFromUrl($url)->toMediaCollection();


        $user3 = User::create([
            'name' => 'CarrierRandom2',
            'email' => 'carrier32@test.com',
            'password' => '$2y$10$oXVToK0z419qfEcf9dJzAOZxX/jghOp9dw6eswqt3Kyu1Vsui5uum',
            'created_at' => now(),
            'updated_at' => now(),
            'email_verified_at' => now(),
        ]);

        $carrier = Carrier::create([
            'success_deliveries' => 0,
            'is_online' => true,
            'location' => 'Belgrade',
            'phone' => '06514323256',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $carrier->user()->save($user3);
        $url = 'https://source.unsplash.com/random/600x600';
        $carrier->addMediaFromUrl($url)->toMediaCollection();



         // Create admin

         $user4 = User::create([
            'name' => 'Admin',
            'email' => 'admin@test.com',
            'password' => '$2y$10$oXVToK0z419qfEcf9dJzAOZxX/jghOp9dw6eswqt3Kyu1Vsui5uum',
            'created_at' => now(),
            'updated_at' => now(),
            'email_verified_at' => now(),
        ]);

        $admin = Admin::create([
            'first_name' => 'Admin',
            'last_name' => 'Admin',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $admin->user()->save($user4);

        $url = 'https://source.unsplash.com/random/600x600';
        $admin->addMediaFromUrl($url)->toMediaCollection();
    }
}
