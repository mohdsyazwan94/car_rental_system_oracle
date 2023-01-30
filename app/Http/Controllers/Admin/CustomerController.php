<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class CustomerController extends Controller
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
        $customers = User::whereHas(
            'roles', function($q){
                $q->where('name', 'customer');
            }
        )->withTrashed()->get();

        return view('admins.customers.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customer = new User();
        return view('admins.customers.create', compact('customer'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'           => 'required|string|max:255',
            'email'          => 'required|string|email|max:255|unique:users',
            'gender'         => 'required|string|min:2|max:255',
            'phone'          => 'required|digits_between:8,14',
            'address_1'      => 'nullable|string|min:2|max:255',
            'address_2'      => 'nullable|string|min:2|max:255',
            'password'       => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $customer = User::create([
            'name'           => $request->name,
            'gender'         => $request->gender,
            'email'          => $request->email,
            'password'       => Hash::make($request->password),
            'phone'          => $request->phone,
            'address1'       => $request->address_1,
            'address2'       => $request->address_2,
        ]);

        $customer->roles()->sync(1);  //If one or more role is selected associate user to roles 

        return redirect()->route('customers.index')->with('success', 'Customer created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = User::findOrFail($id);
        return view('admins.customers.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'           => 'required|string|max:255',
            'email'          => ['required', 'string', 'email', 'max:150', 'unique:users,id,'.$id],
            'gender'         => 'required|string|min:2|max:255',
            'phone'          => 'required|digits_between:8,14',
            'address_1'      => 'nullable|string|min:2|max:255',
            'address_2'      => 'nullable|string|min:2|max:255',
            'password'       => ['nullable', 'confirmed', Rules\Password::defaults()],
        ]);

        $data = [
            'name'           => $request->name,
            'gender'         => $request->gender,
            'email'          => $request->email,
            'phone'          => $request->phone,
            'address1'       => $request->address_1,
            'address2'       => $request->address_2,
        ];

        if($request->password)
            $data['password'] = Hash::make($request->password);
        
        $customer = User::where('id', $id)->update($data);

        return redirect()->route('customers.index')->with('success', 'Customer updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
			$customer = User::withTrashed()->where('id', $id)->firstOrFail()->forceDelete();
		} 
		catch(\Illuminate\Database\QueryException $ex) {
		   if($ex->getCode() === '23000') {
			   return redirect()
			   ->route('customers.index')
			   ->with('error', 'Unable to delete Customer. Selected Customer currently in use!');
		   } 
		}

        return redirect()->route('customers.index')->with('success', 'Customer deleted!');
    }

    public function activate(Request $request, $id)
    {
        $customer = User::withTrashed()->findOrFail($id)->restore();

        return back()->with('success', 'Customer activated!');
    }
	
    public function deactivate(Request $request, $id)
    {
        $customer = User::findOrFail($id)->delete();

        return back()->with('success', 'Customer deactivated!');
    }
}
