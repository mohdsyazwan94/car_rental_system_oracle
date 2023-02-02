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
            'name'         => 'MOHD SYAZWAN SYAFIQ BIN ABD RASHID',
            'email'        => 'mohd.syazwan@outlook.com',
            'password'     => \Hash::make('admin1234'),
            'phone'        => '0149060823'
        ));

        User::create(array(
            'name'         => 'MUHAMMAD ZULFADZLI BIN KHAIRUL ANWAR',
            'email'        => 'admin@gmail.com',
            'password'     => \Hash::make('admin1234'),
            'phone'        => '0123456789'
        ));

        

        User::create(array(
            'name'         => 'MOHAMMAD ARIFF BIN MOHAMMAD ALI',
            'email'        => 'customer1@gmail.com',
            'password'     => \Hash::make('customer1234'),
            'phone'        => '0123456789',
        ));

        User::create(array(
            'name'         => 'FATIN AMALINA BINTI MAT JURI',
            'email'        => 'customer2@gmail.com',
            'password'     => \Hash::make('customer1234'),
            'phone'        => '0123216987'
        ));

    }
}
