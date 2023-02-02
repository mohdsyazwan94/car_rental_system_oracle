<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Student;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class StudentController extends Controller
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
        $students = Student::all();
        
        return view('admins.students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $student = new Student();
        return view('admins.students.create', compact('student'));
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
            'phone'          => 'required|digits_between:8,14',
            'student_no'           => 'required|string|max:255',
            'course_name'           => 'required|string|max:255',
            'password'       => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $student = User::create([
            'name'           => $request->name,
            'email'          => $request->email,
            'password'       => Hash::make($request->password),
            'phone'          => $request->phone,
            'student_no'         => $request->student_no,
            'course_name'         => $request->course_name,
        ]);

        //$student->roles()->sync(1);  //If one or more role is selected associate user to roles 

        return redirect()->route('students.index')->with('success', 'Student created!');
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
        $student = Student::findOrFail($id);
        return view('admins.students.edit', compact('student'));
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
            'phone'          => 'required|digits_between:8,14',
            'student_no'           => 'required|string|max:255',
            'course_name'           => 'required|string|max:255',
            'password'       => ['nullable', 'confirmed', Rules\Password::defaults()],
        ]);

        $data = [
            'name'           => $request->name,
            'email'          => $request->email,
            'phone'          => $request->phone,
            'student_no'         => $request->student_no,
            'course_name'         => $request->course_name
        ];

        if($request->password)
            $data['password'] = Hash::make($request->password);
        
        $student = Student::where('id', $id)->update($data);

        return redirect()->route('students.index')->with('success', 'Student updated!');
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
			$student = User::withTrashed()->where('id', $id)->firstOrFail()->forceDelete();
		} 
		catch(\Illuminate\Database\QueryException $ex) {
		   if($ex->getCode() === '23000') {
			   return redirect()
			   ->route('students.index')
			   ->with('error', 'Unable to delete student. Selected student currently in use!');
		   } 
		}

        return redirect()->route('students.index')->with('success', 'student deleted!');
    }

    public function activate(Request $request, $id)
    {
        $student = User::withTrashed()->findOrFail($id)->restore();

        return back()->with('success', 'student activated!');
    }
	
    public function deactivate(Request $request, $id)
    {
        $student = User::findOrFail($id)->delete();

        return back()->with('success', 'student deactivated!');
    }
}
