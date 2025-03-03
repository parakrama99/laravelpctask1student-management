<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // dd("ssd"); will output `"ssd"` and immediately stop script execution. It is useful for debugging and checking if a function reaches a certain point.


        $students = Student::paginate(5);
        // return view('students.index', ['students' => $students]);
        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{

    // dd($request->all()); to check from frontend

    // Validate the incoming request data
    $request->validate([
        'name' => 'required|string|max:255',
        'phone' => 'required|digits:10', // Validates exactly 10 digits
        'email' => 'required|email|unique:students,email',
        'status' => 'required|in:0,1', // Validate status as either 0 or 1
    ]);

    // Create a new student instance and assign values
    $student = new Student();
    $student->name = $request->name;
    $student->phone = $request->phone;
    $student->email = $request->email;
    $student->status = $request->status;

    // Save the student to the database
    $student->save();

    // Redirect or respond with a success message
    return back()->with('msg', 'Student created successfully.');
    //  return redirect()->route('students.index')->with('success', 'Student created successfully.');
}


    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        // Pass the specific student data to the 'students.show' view
        return view('students.show', compact('student'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|digits:10',
            'email' => 'required|email|unique:students,email,' . $student->id, // Check unique email, but ignore current student's ID during update
            'status' => 'required|in:0,1',


        ]);

        // Update the student's attributes
        $student->name = $validated['name'];
        $student->phone = $validated['phone'];
        $student->email = $validated['email'];
        $student->status = $validated['status'];

        // Save the updated student to the database
        $student->save();

        // Redirect or return a response
        return redirect()->route('students.index')->with('msg', 'Student updated successfully.');
    }

/**
 * Remove the specified resource from storage.
 */
public function destroy(Student $student)
{
    // Delete student
    $student->delete();

    // Redirect with success message
    return redirect()->route('students.index')->with('msg', 'Student deleted successfully.');
}



}