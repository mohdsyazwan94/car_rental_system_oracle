<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use App\Models\ReservationStatus;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;

class ReservationController extends Controller
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
        $reservations = Reservation::all();

        return view('admins.reservations.index', compact('reservations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $reservation = new Reservation();
        $reservation_status = ReservationStatus::all();

        return view('admins.reservations.create', compact('reservation', 'reservation_status'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $reservation = Reservation::create([
            'reservation_number'         => $request->reservation_number,
            'reservation_status_id'      => $request->reservation_status,
            'reservation_type_id'        => $request->reservation_type
        ]);

        return redirect()->route('reservations.index')->with('success', 'Reservation created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation_status = ReservationStatus::all();
        $reservation_type = ReservationType::all();

        return view('admins.reservations.edit', compact('reservation', 'reservation_status', 'reservation_type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = [
            'reservation_number'           => $request->reservation_number,
            'reservation_status_id'           => $request->reservation_status,
            'reservation_type_id'        => $request->reservation_type
        ];

        $reservation = Reservation::where('id', $id)->update($data);

        return redirect()->route('reservations.index')->with('success', 'Reservation updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reservation = Reservation::withTrashed()->where('id', $id)->firstOrFail();
        $reservation->delete();

        return redirect()->route('reservations.index')->with('success', 'Reservation deleted!');
    }

    public function checkin(Request $request, $id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->reservation_status_id = 3;
        $reservation->update();

        return back()->with('success', 'Guest check-in!');
    }
	
    public function checkout(Request $request, $id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->reservation_status_id = 4;
        $reservation->update();

        return back()->with('success', 'Guest check-out!');
    }
}
