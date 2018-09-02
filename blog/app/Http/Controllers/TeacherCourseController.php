<?php

namespace App\Http\Controllers;
use App\Teacher;
class TeacherCourseController extends Controller
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

    public function index($teacher_id){

        $teacher = Teacher::find($teacher_id);
        if($teacher)
        {
            $courses = $teacher->courses;
            return $this->createSuccessResponse($courses,200);
        }
        return $this->createErrorMessage("The teacher with this id does not exist",404);
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
