<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Room;
use Carbon\Carbon;

class RoomTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Room::create(array(
            'room_number'        => '100',
            'room_status_id'     => 1,
            'room_type_id'       => 1
        ));

        Room::create(array(
            'room_number'        => '101',
            'room_status_id'     => 1,
            'room_type_id'       => 1
        ));

        Room::create(array(
            'room_number'        => '102',
            'room_status_id'     => 1,
            'room_type_id'       => 1
        ));

        Room::create(array(
            'room_number'        => '103',
            'room_status_id'     => 2,
            'room_type_id'       => 1
        ));

        Room::create(array(
            'room_number'        => '104',
            'room_status_id'     => 1,
            'room_type_id'       => 1
        ));

        Room::create(array(
            'room_number'        => '105',
            'room_status_id'     => 1,
            'room_type_id'       => 2
        ));

        Room::create(array(
            'room_number'        => '106',
            'room_status_id'     => 1,
            'room_type_id'       => 2
        ));

        Room::create(array(
            'room_number'        => '107',
            'room_status_id'     => 1,
            'room_type_id'       => 2
        ));

        Room::create(array(
            'room_number'        => '201',
            'room_status_id'     => 1,
            'room_type_id'       => 3
        ));

        Room::create(array(
            'room_number'        => '202',
            'room_status_id'     => 1,
            'room_type_id'       => 3
        ));

        Room::create(array(
            'room_number'        => '203',
            'room_status_id'     => 1,
            'room_type_id'       => 4
        ));

        Room::create(array(
            'room_number'        => '204',
            'room_status_id'     => 1,
            'room_type_id'       => 4
        ));

        Room::create(array(
            'room_number'        => '205',
            'room_status_id'     => 1,
            'room_type_id'       => 5
        ));

        Room::create(array(
            'room_number'        => '206',
            'room_status_id'     => 2,
            'room_type_id'       => 5
        ));

    }
}
