<?php

use App\User;
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
        // DB::table('users')->truncate();
        // User::create([
        //     'name' => 'Mohamed Abdelhady Elshamy',
        //     'email' => 'admin@admin.com',
        //     'email_verified_at' => now(),
        //     'password' => Hash::make('123123123'),
        //     'remember_token' => Str::random(),
        // ]);
    }
}
