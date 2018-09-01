<?php

namespace App\Http\Controllers;
use App\Course;

class CourseStudentController extends Controller
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

    public function index($id){

        $course = Course::find($id);
        if($course)
        {
            $students = $course->students;
            return $this->createSuccessResponse($students,200);
        }
        return $this->createErrorMessage("The course with the id {$id} does not exist",404);
        //return __METHOD__;

    }
    
    public function store(){

        return __METHOD__;

    }

     public function show(){

        return __METHOD__;

    }
  
    public function update(){

        return __METHOD__;

    }
    public function destroy(){

        return __METHOD__;

    }
    

    //
}
