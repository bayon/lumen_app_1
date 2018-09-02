<?php

namespace App\Http\Controllers;
use App\Teacher;
use App\Course;

use Illuminate\Http\Request;

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
    
    public function store(Request $request, $teacher_id){

        $teacher = Teacher::find($teacher_id);
        if($teacher)
        {
            // $this->validateRequest($request);
            // print_r($request);
            //die($request->get('title'));
            // THE POSTMAN header content type was throwing off the POST request.
            //$method = $request->method();
            //$title = $request->input('title');
           
            $course  = Course::create(
                [
                    'title' => $request->get('title'),
                    'description' => $request->get('description'),
                    'value' => $request->get('value'),
                    'teacher_id' => $teacher->id
                ]
            );
            return $this->createSuccessResponse("The course with the id {$course->id} has been created with the teacher id {$teacher->id}.",201);

        }
        return $this->createErrorMessage("The teacher with id {$teacher_id} does not exist.",404);
       

        // return __METHOD__;

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

    public function validateRequest($request)
    {
        $rules = [
            'title' => 'required',
            'description' => 'required',
            'value' => 'required|numeric' 
        ];
       
        $this -> validate($request, $rules);
    }
  //
}
