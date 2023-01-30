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
            'gender'       => 'male',
            'email'        => 'mohd.syazwan@outlook.com',
            'password'     => \Hash::make('admin1234'),
            'phone'        => '0149060823'
        ))->assignRole('admin');

        User::create(array(
            'name'         => 'MUHAMMAD ZULFADZLI BIN KHAIRUL ANWAR',
            'gender'       => 'male',
            'email'        => 'admin@gmail.com',
            'password'     => \Hash::make('admin1234'),
            'phone'        => '0123456789'
        ))->assignRole('admin');

        

        User::create(array(
            'name'         => 'MOHAMMAD ARIFF BIN MOHAMMAD ALI',
            'gender'       => 'male', // not required
            'email'        => 'customer1@gmail.com',
            'password'     => \Hash::make('customer1234'),
            'phone'        => '0123456789',
            'address1'     => 'A-02-01, Taman Melawati', // not required
            'address2'     => 'Selangor' // not required
        ))->assignRole('customer');

        User::create(array(
            'name'         => 'FATIN AMALINA BINTI MAT JURI',
            'gender'       => 'female', // not required
            'email'        => 'customer2@gmail.com',
            'password'     => \Hash::make('customer1234'),
            'phone'        => '0123216987',
            'address1'     => 'No 22, Jalan Bukit Bintang', // not required
            'address2'     => 'Kuala Lumpur' // not required
        ))->assignRole('customer');

    }
}
