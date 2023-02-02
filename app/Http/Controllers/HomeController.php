<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicle;
use App\Models\Booking;
use App\Models\Payment;
use App\Models\User;
use Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //total_reservations
        $today = Carbon::now();
        //$today_reservation = Booking::where('booking_status', 'reserved')->whereDate('created_at', $today)->get();
        $today_reservation = 0;

        //customer check-in today
        //$customer_check_in = Booking::where('booking_status', 'reserved')->whereDate('booking_end_date', '>', $today)->get();
        $customer_check_in = 0;

        //available vehicles
        //$customer_check_out = Booking::where('booking_status', 'reserved')->whereDate('updated_at', '=', $today)->get();
        $customer_check_out = 0;

        return view('index', compact('today_reservation','customer_check_in','customer_check_out'));
    }
    
    public function checkReservation(Request $request)
    {
        if(isset($request->date_range)){     
            $date_range = $request->date_range;
        }else{
            $date_range = Carbon::now()->format('d/m/Y');
        }

        $dates = explode(' - ' ,$date_range);
        $start_date = Carbon::createFromFormat('d/m/Y H:i:s',  $dates[0].'00:00:00');
        
        if(count($dates) > 1){
            $end_date = Carbon::createFromFormat('d/m/Y H:i:s',  $dates[1].'00:00:00');
        }else{
            $end_date =Carbon::createFromFormat('d/m/Y H:i:s',  $dates[0].'00:00:00')->addDay();
        }

        //check reservation for vehicle that has been booked
        $reservations = Booking::whereBetween('booking_start_date', [$start_date, $end_date])->orWhereBetween('booking_end_date', [$start_date, $end_date])->get();
        $reservations = $reservations->where('booking_status', '!=', 'reserved')->pluck('vehicle_id');

        //available room
        $vehicles = Vehicle::all()->whereNotIn('id', $reservations->toArray())->where('vehicle_id', 1)->groupBy('vehicle_type');

        return view('reservation', compact('date_range', 'start_date', 'end_date', 'vehicles'));
        //->with('success', 'Vehicle deleted!')
    }

    public function confirmReservation(Request $request)
    {
        
        $vehicle = Vehicle::findOrFail($request->vehicle_id);
        $today_date = Carbon::now()->format('d/m/Y');
        $start_date = Carbon::parse($request->start_date);
        $end_date = Carbon::parse($request->end_date);

        $number_of_night = $end_date->diffInDays($start_date);

        $start_date = $start_date->format('d/m/Y');
        $end_date = $end_date->format('d/m/Y');
            
        return view('confirmation', compact('vehicle','today_date','start_date','end_date','number_of_night'));
    }

    public function createReservation(Request $request)
    {
        //check if user exist
        $user = User::where('email', $request->email)->get()->first();

        if(!isset($user)){
            //create user if not exist
            $user = User::create([
                'name'           => $request->name,
                'email'          => $request->email,
                'password'       => Hash::make('customer1234'),
                'phone'          => $request->phone
            ]);

            //$user->roles()->sync(1);
        }

        //create reservation
        $reservation = Booking::create([
            'customer_id'  => $user->id,
            'vehicle_id'  => $request->vehicle_id,
            'check_in'  => Carbon::createFromFormat('d/m/Y',  $request->start_date),
            'check_out'  => Carbon::createFromFormat('d/m/Y',  $request->end_date),
            'booking_status'  => 2,
            'reservation_type'  => 'online'
        ]);

        //create payment
        $payment = Payment::create([
            'reservation_id'  => $reservation->id,
            'payment_type'  => $request->payment_method,
            'payment_status'  => 'paid',
            'total_payment'  => number_format((int)$request->amount, 2),
            'payment_date' => Carbon::now()
        ]);

        $number_of_night = $request->number_of_night;
        $today_date = Carbon::now()->format('d/m/Y');

        return view('reservationCompleted', compact('user','reservation','payment','today_date','number_of_night'));
    }

    

}
