<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\RoomStatus;

class RoomStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RoomStatus::create(array(
            'name'  => 'Available'
        ));

        RoomStatus::create(array(
            'name'  => 'Not Available'
        ));

    }
}
