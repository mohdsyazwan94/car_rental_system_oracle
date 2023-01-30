<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Reservation;
use Carbon\Carbon;

class ReservationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Reservation::create(array(
            'customer_id'  => 3,
            //'staff_id'  => 1,
            'room_id'  => 1,
            'check_in'  => Carbon::parse('2022-07-03'),
            'check_out'  => Carbon::parse('2022-07-10'),
            'reservation_status_id'  => 2,
            'reservation_type'  => 'online'
        ));

        Reservation::create(array(
            'customer_id'  => 4,
            'staff_id'  => 2,
            'room_id'  => 2,
            'check_in'  => Carbon::parse('2022-07-06'),
            'check_out'  => Carbon::parse('2022-07-13'),
            'reservation_status_id'  => 3,
            'reservation_type'  => 'walk-in'
        ));

    }
}
