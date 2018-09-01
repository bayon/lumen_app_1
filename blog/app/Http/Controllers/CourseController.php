<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;
class CourseController extends Controller
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

        $courses = Course::all();
        //use base controller method
        return $this -> createSuccessResponse($courses, 200);
        //return __METHOD__;

    }
    /*
    public function store(){

        
        return __METHOD__;

    }
    */

     public function show($id){

        $course = Course::find($id);
        if($course)
        {
            return $this->createSuccessResponse($course,200);
        }

        return $this->createErrorMessage("The course with id {$id}, does not exist",404);
        //return __METHOD__;

    }
  /*
    public function update(){

        return __METHOD__;

    }
    public function destroy(){

        return __METHOD__;

    }
    */

    //
}
