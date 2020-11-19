<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //admin@123
        DB::table('users')->insert(
            [
                'name' => "Admin",
                'email' => "admin@admin",
                'password' => '$2y$10$Af0/Ib2OZU008sV0E53jPepGWtjRUuPiYXRPke2tWhj5j/mcQ4wru'
            ]
        );
    }
}
