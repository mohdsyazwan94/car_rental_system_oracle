<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\RoomType;

class RoomTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RoomType::create(array(
            'type_name'  => 'Guest Room',
            'rate'  => 159.00
        ));

        RoomType::create(array(
            'type_name'  => 'Deluxe Room',
            'rate'  => 199.00
        ));

        RoomType::create(array(
            'type_name'  => 'Executive Room',
            'rate'  => 259.00
        ));

        RoomType::create(array(
            'type_name'  => 'Deluxe Suite',
            'rate'  => 339.00
        ));

        RoomType::create(array(
            'type_name'  => 'Executive Suite',
            'rate'  => 429.00
        ));

    }
}
