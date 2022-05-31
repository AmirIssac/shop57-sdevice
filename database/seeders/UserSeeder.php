<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'dabbagh',
            'email' => 'dabbagh@dabbagh.com',
            'password' => Hash::make('adminshop57@'),
            'is_admin' => true,
        ]);
        User::create([
            'name' => 'customer',
            'email' => 'customer@dabbagh.com',
            'password' => Hash::make('customer012345'),
            'is_admin' => false,
        ]);
    }
}
