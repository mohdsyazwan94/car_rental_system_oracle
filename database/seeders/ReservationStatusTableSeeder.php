<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ReservationStatus;

class ReservationStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ReservationStatus::create(array(
            'name'  => 'Pending'
        ));

        ReservationStatus::create(array(
            'name'  => 'Booked'
        ));

        ReservationStatus::create(array(
            'name'  => 'Check-in'
        ));

        ReservationStatus::create(array(
            'name'  => 'Check-out'
        ));

        ReservationStatus::create(array(
            'name'  => 'Cancelled'
        ));

    }
}
