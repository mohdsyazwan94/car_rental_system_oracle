<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Payment;
use App\Models\Vehicle;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookings = Booking::all();

        return view('admins.bookings.index', compact('bookings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $booking = new Booking();
        $vehicles = Vehicle::all();
        $users = User::all();
        $vehicles = Vehicle::all();


        return view('admins.bookings.create', compact('booking', 'vehicles', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$user = User::findorFail($request->user_id);
        //$user = User::findorFail($request->user_id);
        //dd($request->user_id);
        $booking = Booking::create([
            'booking_start_date'         => $request->booking_start_date,
            'booking_end_date'      => $request->booking_end_date,
            'vehicle_id'        => $request->vehicle_id,
            'user_id'        => $request->user_id,
            'approved_by'        => Auth::user()->id,
            'booking_total'        => 30,
            'booking_status'        => 'Booked'
        ]);

        return redirect()->route('bookings.index')->with('success', 'Booking created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $booking = Booking::findOrFail($id);
        $booking_status = BookingStatus::all();
        $booking_type = BookingType::all();

        return view('admins.bookings.edit', compact('booking', 'booking_status', 'booking_type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = [
            'booking_number'           => $request->booking_number,
            'booking_status_id'           => $request->booking_status,
            'booking_type_id'        => $request->booking_type
        ];

        $booking = Booking::where('id', $id)->update($data);

        return redirect()->route('bookings.index')->with('success', 'Booking updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $booking = Booking::withTrashed()->where('id', $id)->firstOrFail();
        $booking->delete();

        return redirect()->route('bookings.index')->with('success', 'Booking deleted!');
    }

    public function checkin(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);
        $booking->booking_status = 'Pending Return';
        $booking->update();

        return back()->with('success', 'Booking has been approved!');
    }
	
    public function checkout(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);
        $booking->booking_status = 'Returned';
        $booking->update();

        $payment = Payment::create([
            'booking_id'         => $id,
            'payment_date'         => date('Y-m-d H:i:s'),
            'payment_total'         => 30,
        ]);

        // $payment = new Payment();
        // $payment->booking_id = $booking->booking_id;
        // //$payment->payment_date = date('Y-m-d H:i:s');
        // $payment->payment_total = 30;
        // $payment->save();


        return back()->with('success', 'Car has been returned!');
    }
}
