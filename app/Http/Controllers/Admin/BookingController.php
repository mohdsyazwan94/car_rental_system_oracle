<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;

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
        $booking_status = '';
        //$booking_status = BookingStatus::all();

        return view('admins.bookings.create', compact('booking', 'booking_status'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $booking = Booking::create([
            'booking_number'         => $request->booking_number,
            'booking_status_id'      => $request->booking_status,
            'booking_type_id'        => $request->booking_type
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
        $booking->booking_status_id = 4;
        $booking->update();

        return back()->with('success', 'Car has been returned!');
    }
}
