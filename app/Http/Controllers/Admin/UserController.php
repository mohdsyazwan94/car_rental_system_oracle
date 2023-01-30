<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Book;
use App\Models\BookStatus;
use App\Models\Borrow;
use App\Models\Returned;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class UserController extends Controller
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
        $users = User::whereHas(
            'roles', function($q){
                $q->where('name', 'admin');
            }
        )->withTrashed()->get();

        return view('admins.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = new User();
        return view('admins.users.create', compact('user'));
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
            'name'     => 'required|string|max:100',
            'email'    => ['required', 'string', 'email', 'max:150', 'unique:users'],
            'phone'    => ['required', 'digits_between:8,14'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'phone'    => $request->phone,
            'password' => Hash::make($request->password),
        ]);

        $user->roles()->sync(2);  //If one or more role is selected associate user to roles 

        return redirect()->route('users.index')->with('success', 'User created!');
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
        $user = User::findOrFail($id);
        return view('admins.users.edit', compact('user'));
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
            'name'     => 'required|string|max:100',
            'email'    => ['required', 'string', 'email', 'max:150', 'unique:users,id,'.$id],
            'phone'    => ['required', 'digits_between:8,14'],
            'password' => ['nullable', 'confirmed', Rules\Password::defaults()],
        ]);

		$data = [
            'name'     => $request->name,
            'email'    => $request->email,
            'phone'    => $request->phone,
        ];

		if($request->password)
            $data['password'] = Hash::make($request->password);
		
        $user = User::where('id', $id)->update($data);

        return redirect()->route('users.index')->with('success', 'User updated!');
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
			$user = User::withTrashed()->where('id', $id)->firstOrFail();
			if($user && $user->id != auth()->user()->id)
				$user->forceDelete();
			else
				return redirect()
			   ->route('users.index')
			   ->with('error', 'You cannot delete yourself!');
		} 
		catch(\Illuminate\Database\QueryException $ex) {
		   if($ex->getCode() === '23000') {
			   return redirect()
			   ->route('users.index')
			   ->with('error', 'Unable to delete User. Selected User currently in use!');
		   } 
		}

        return redirect()->route('users.index')->with('success', 'User deleted!');
    }

    public function activate(Request $request, $id)
    {
        User::withTrashed()->findOrFail($id)->restore();

        return back()->with('success', 'Customer activated!');
    }
	
    public function deactivate(Request $request, $id)
    {
        User::findOrFail($id)->delete();

        return back()->with('success', 'Customer deactivated!');
    }
}
