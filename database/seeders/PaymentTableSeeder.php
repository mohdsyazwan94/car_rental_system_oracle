<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Payment;
use Carbon\Carbon;

class PaymentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Payment::create(array(
            'reservation_id'  => 1,
            'payment_type'  => 'cash',
            'payment_status'  => 'paid',
            'total_payment'  => 259.00,
            'payment_date'  => Carbon::parse('2022-07-12')
        ));

        Payment::create(array(
            'reservation_id'  => 2,
            'payment_type'  => 'debit_card',
            'payment_status'  => 'paid',
            'total_payment'  => 159.00,
            'payment_date' => Carbon::parse('2022-06-30')
        ));

    }
}
