<?php

namespace App\Http\Controllers;

use App\Student;

use Illuminate\Http\Request;


class StudentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function index(){

        $students = Student::all();
        //use base controller method
        return $this -> createSuccessResponse($students, 200);

    }
    
    public function store(Request $request){

        $rules = [
            'name' => 'required',
            'phone' => 'required|numeric',
            'address' => 'required',
            'career' => 'required|in:engineering,math,physics'
        ];
        $this -> validate($request, $rules);
        $student = Student::create($request->all());
        return $this->createSuccessResponse("The student with the id {$student->id} has been created.",201);
        //return __METHOD__;

    }

    public function show($id){

        $student = Student::find($id);
        if($student)
        {
            return $this->createSuccessResponse($student,200);
        }

        return $this->createErrorMessage("The student with id {$id}, does not exist",404);

    }
  
    public function update(Request $request, $student_id){

        return __METHOD__;

    }
    public function destroy(){

        return __METHOD__;

    }
    

    //
}
