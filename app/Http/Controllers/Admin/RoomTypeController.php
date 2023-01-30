<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RoomType;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;

class RoomTypeController extends Controller
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
        $roomTypes = RoomType::all();

        return view('admins.roomTypes.index', compact('roomTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roomType = new RoomType();

        return view('admins.roomTypes.create', compact('roomType'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->hasFile('image')) {
            $request->image->store('rooms', 'public');

            $roomType = RoomType::create([
                'type_name'           => $request->type_name,
                'description'           => $request->description,
                'rate'        => $request->rate,
                'image'             => $request->image->hashName()
            ]);
        }else{
            $roomType = RoomType::create([
                'type_name'           => $request->type_name,
                'description'           => $request->description,
                'rate'        => $request->rate
            ]);
        }

        

        return redirect()->route('roomTypes.index')->with('success', 'Room type created!');
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
        $roomType = RoomType::findOrFail($id);

        return view('admins.roomTypes.edit', compact('roomType'));
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
        if ($request->hasFile('image')) {
            $request->image->store('rooms', 'public');

            $data = [
                'type_name'           => $request->type_name,
                'description'           => $request->description,
                'rate'        => $request->rate,
                'image'             => $request->image->hashName()
            ];
        }else{
            $data = [
                'type_name'           => $request->type_name,
                'description'           => $request->description,
                'rate'        => $request->rate,
            ];
        }

        $roomType = RoomType::where('id', $id)->update($data);

        return redirect()->route('roomTypes.index')->with('success', 'Room type updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $roomType = RoomType::withTrashed()->where('id', $id)->firstOrFail();
        $roomType->delete();

        return redirect()->route('roomTypes.index')->with('success', 'Room type deleted!');
    }
}
