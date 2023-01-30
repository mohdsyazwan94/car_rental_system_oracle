<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Room;
use App\Models\RoomStatus;
use App\Models\RoomType;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;

class RoomController extends Controller
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
        $rooms = Room::all();

        return view('admins.rooms.index', compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $room = new Room();
        $room_status = RoomStatus::all();
        $room_type = RoomType::all();

        return view('admins.rooms.create', compact('room', 'room_status', 'room_type'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $room = Room::create([
            'room_number'         => $request->room_number,
            'room_status_id'      => $request->room_status,
            'room_type_id'        => $request->room_type
        ]);

        return redirect()->route('rooms.index')->with('success', 'Room created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $room = Room::findOrFail($id);
        $room_status = RoomStatus::all();
        $room_type = RoomType::all();

        return view('admins.rooms.edit', compact('room', 'room_status', 'room_type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = [
            'room_number'           => $request->room_number,
            'room_status_id'           => $request->room_status,
            'room_type_id'        => $request->room_type
        ];

        $room = Room::where('id', $id)->update($data);

        return redirect()->route('rooms.index')->with('success', 'Room updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $room = Room::withTrashed()->where('id', $id)->firstOrFail();
        $room->delete();

        return redirect()->route('rooms.index')->with('success', 'Room deleted!');
    }
}
