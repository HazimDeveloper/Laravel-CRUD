<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    //
    public function index(){
        $students = Student::orderBy('id','desc')->paginate(5);
        return view('students.index',compact('students'));
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'address'=>'required',
        ]);

        Student::create($request->post());
        return redirect()->route('students.index')->with('success','Student has been created successfully');
    }

    public function show(Student $student){
        return view('students.show',compact('student'));
    }
    public function edit(Student $student){
        return view('students.edit',compact('student'));
    }

    public function update(Request $request, Student $student)
    {
$request->validate([
    'name' => 'required',
    'email' => 'required',
    'address'=> 'required',
]);

$student->fill($request->post())->save();
return redirect()->route('students.index')->with('success','Profile Student Update Successfully');

    }

    public function destroy(Student $student){
        $student->delete();
        return redirect()->route('students.index')->with('success','Student Has Been Deleted Successfully');
    }
}
