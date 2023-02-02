<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Staff;
use App\Models\Student;
use App\Models\Vehicle;
use App\Models\Booking;
use App\Models\Payment;

class StaffTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Staff::create(array(
            'staff_id' => 1,
            'date_joined' => '01/08/2022',
            'designation' => 'Manager',
            'salary'     => '2500'
        ));

        Staff::create(array(
            'staff_id' => 2,
            'date_joined' => '02/02/2022',
            'designation' => 'Staff',
            'salary'     => '2500',
            'manager_id'        => 1
        ));

        Student::create(array(
            'student_id' => 3,
            'student_no' => '2222115555',
            'course_name' => 'Computer Science'
        ));

        Student::create(array(
            'student_id' => 4,
            'student_no' => '2233985245',
            'course_name' => 'Accounting'
        ));

        Vehicle::create(array(
            'vehicle_type' => 'Proton Saga',
            'vehicle_color' => 'White',
            'vehicle_registration' => 'CFV2100',
            'vehicle_rate' => '10'
        ));

        Vehicle::create(array(
            'vehicle_type' => 'Proton Saga',
            'vehicle_color' => 'Red',
            'vehicle_registration' => 'RS5589',
            'vehicle_rate' => '10'
        ));

        Vehicle::create(array(
            'vehicle_type' => 'Perodua Axia',
            'vehicle_color' => 'Yellow',
            'vehicle_registration' => 'PRK5220',
            'vehicle_rate' => '8'
        ));

        Vehicle::create(array(
            'vehicle_type' => 'Perodua Axia',
            'vehicle_color' => 'Grey',
            'vehicle_registration' => 'VVS2311',
            'vehicle_rate' => '8'
        ));

        Vehicle::create(array(
            'vehicle_type' => 'Perodua Myvi',
            'vehicle_color' => 'Yellow',
            'vehicle_registration' => 'WKS7711',
            'vehicle_rate' => '12'
        ));

        Vehicle::create(array(
            'vehicle_type' => 'Toyota Vios',
            'vehicle_color' => 'Silver',
            'vehicle_registration' => 'CCD9885',
            'vehicle_rate' => '20'
        ));

        Vehicle::create(array(
            'vehicle_type' => 'Perodua Myvi',
            'vehicle_color' => 'Black',
            'vehicle_registration' => 'RS4465',
            'vehicle_rate' => '12'
        ));

        Vehicle::create(array(
            'vehicle_type' => 'Honda City',
            'vehicle_color' => 'White',
            'vehicle_registration' => 'CEW8811',
            'vehicle_rate' => '20'
        ));

        Booking::create(array(
            'booking_id' => 1,
            'vehicle_id' => 1,
            'user_id' => 4,
            'approved_by' => 2,
            'booking_start_date' => '02/01/2023 16:00:00',
            'booking_end_date' => '02/01/2023 18:00:00',
            'booking_total' => '20',
            'booking_status' => 'Returned'
        ));

        Booking::create(array(
            'booking_id' => 2,
            'vehicle_id' => 5,
            'user_id' => 3,
            'approved_by' => 2,
            'booking_start_date' => '01/01/2023 08:00:00',
            'booking_end_date' => '01/01/2023 12:00:00',
            'booking_total' => '48',
            'booking_status' => 'Returned'
        ));

        Booking::create(array(
            'booking_id' => 3,
            'vehicle_id' => 8,
            'user_id' => 3,
            'approved_by' => 1,
            'booking_start_date' => '02/03/2023 08:00:00',
            'booking_end_date' => '02/03/2023 12:00:00',
            'booking_total' => '80',
            'booking_status' => 'Booked'
        ));

        Booking::create(array(
            'booking_id' => 4,
            'vehicle_id' => 6,
            'user_id' => 3,
            'approved_by' => 1,
            'booking_start_date' => '02/02/2023 18:00:00',
            'booking_end_date' => '02/02/2023 22:00:00',
            'booking_total' => '80',
            'booking_status' => 'Pending Return'
        ));

        Payment::create(array(
            'payment_id' => 1,
            'booking_id' => 1,
            'payment_date' => '02/02/2023 11:00:00',
            'payment_total' => '25',
        ));

        Payment::create(array(
            'payment_id' => 2,
            'booking_id' => 2,
            'payment_date' => '02/02/2023 11:00:00',
            'payment_total' => '25',
        ));

        Payment::create(array(
            'payment_id' => 3,
            'booking_id' => 3,
            'payment_total' => '80',
        ));

        Payment::create(array(
            'payment_id' => 4,
            'booking_id' => 4,
            'payment_date' => '02/02/2023 11:00:00',
            'payment_total' => '25',
        ));

    }
}
