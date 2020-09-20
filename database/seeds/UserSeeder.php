<?php

use App\User;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Factory::create();
        DB::table('users')->truncate();


        User::create([
            'name' => 'Mohamed Abdelhady Elshamy',
            'email' => 'admin@admin.com',
            'user_name' => 'HADY',
            'gender' => 'male',
            'bio' => $faker->text(100),
            'website' => $faker->url,
            'phone_number' => $faker->phoneNumber,
            'email_verified_at' => now(),
            'password' => Hash::make('123123123'),
            'remember_token' => Str::random(),
        ]);
        User::create([
            'name' => 'Youssef elbeheiry',
            'email' => 'admin@gmail.com',
            'user_name' => 'Beheiry',
            'gender' => 'male',
            'bio' => $faker->text(100),
            'website' => $faker->url,
            'phone_number' => $faker->phoneNumber,
            'email_verified_at' => now(),
            'password' => Hash::make('123123123'),
            'remember_token' => Str::random(),
        ]);
    }
}
