<?php

namespace App\Http\Controllers;

use App\Student;

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
    
    public function store(){

        return __METHOD__;

    }

    public function show($id){

        $student = Student::find($id);
        if($student)
        {
            return $this->createSuccessResponse($student,200);
        }

        return $this->createErrorMessage("The student with id {$id}, does not exist",404);

    }
  
    public function update(){

        return __METHOD__;

    }
    public function destroy(){

        return __METHOD__;

    }
    

    //
}
