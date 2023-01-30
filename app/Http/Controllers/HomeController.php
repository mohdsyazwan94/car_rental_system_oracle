<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Reservation;
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
        $today_reservation = Reservation::where('reservation_status_id', 2)->whereDate('created_at', $today)->get();
        $today_reservation = count($today_reservation);

        //customer check-in today
        $customer_check_in = Reservation::where('reservation_status_id', 3)->whereDate('check_out', '>', $today)->get();
        $customer_check_in = count($customer_check_in);

        //available rooms
        $customer_check_out = Reservation::where('reservation_status_id', 4)->whereDate('updated_at', '=', $today)->get();
        $customer_check_out = count($customer_check_out);

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

        //check reservation for room that has been booked
        $reservations = Reservation::whereBetween('check_in', [$start_date, $end_date])->orWhereBetween('check_out', [$start_date, $end_date])->get();
        $reservations = $reservations->where('reservation_status_id', '!=', 5)->pluck('room_id');

        //available room
        $rooms = Room::all()->whereNotIn('id', $reservations->toArray())->where('room_status_id', 1)->groupBy('room_type_id');

        // $test = [];

        // $rooms = 

        return view('reservation', compact('date_range', 'start_date', 'end_date', 'rooms'));
        //->with('success', 'Room deleted!')
    }

    public function confirmReservation(Request $request)
    {
        
        $room = Room::findOrFail($request->room_id);
        $today_date = Carbon::now()->format('d/m/Y');
        $start_date = Carbon::parse($request->start_date);
        $end_date = Carbon::parse($request->end_date);

        $number_of_night = $end_date->diffInDays($start_date);

        $start_date = $start_date->format('d/m/Y');
        $end_date = $end_date->format('d/m/Y');
            
        //dd($room->room_number);
        return view('confirmation', compact('room','today_date','start_date','end_date','number_of_night'));
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

            $user->roles()->sync(1);
        }

        //create reservation
        $reservation = Reservation::create([
            'customer_id'  => $user->id,
            'room_id'  => $request->room_id,
            'check_in'  => Carbon::createFromFormat('d/m/Y',  $request->start_date),
            'check_out'  => Carbon::createFromFormat('d/m/Y',  $request->end_date),
            'reservation_status_id'  => 2,
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
