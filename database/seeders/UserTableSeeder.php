<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(array(
            'full_name'         => 'MOHD SYAZWAN',
            'email'        => 'syazwan@gmail.com',
            'password'     => \Hash::make('admin1234'),
            'phone'        => '0149060823'
        ));

        User::create(array(
            'full_name'         => 'MUHAMMAD ZULFADZLI',
            'email'        => 'admin@gmail.com',
            'password'     => \Hash::make('admin1234'),
            'phone'        => '0123456789'
        ));

        User::create(array(
            'full_name'         => 'MOHAMMAD ARIFF',
            'email'        => 'customer1@gmail.com',
            'password'     => \Hash::make('customer1234'),
            'phone'        => '0123456789',
        ));

        User::create(array(
            'full_name'         => 'FATIN AMALINA',
            'email'        => 'customer2@gmail.com',
            'password'     => \Hash::make('customer1234'),
            'phone'        => '0123216987'
        ));

    }
}
