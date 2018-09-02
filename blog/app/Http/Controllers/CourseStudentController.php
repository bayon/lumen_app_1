<?php

namespace App\Http\Controllers;
use App\Course;
use App\Student;

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
    
    public function store($course_id, $student_id)
    {
        $course = Course::find($course_id);

        if($course)
        {
            $student = Student::find($student_id);

            if($student)
            { 
                //many to many 
                //check that student doesn't already exist in the course.
                if($course->students()->find($student_id))
                {
                    return $this->createErrorMessage("The student with id {$student_id} already exists in this course.",409);
                }
                //success
                $course->students()->attach($student_id);
                $this->createSuccessResponse("The student with id {$student_id} has been added to the course.",201);

            }
            return $this->createErrorMessage("The student with id {$student_id}, does not exist",404);

        }
        return $this->createErrorMessage("The course with id {$course_id}, does not exist",404);
        //return __METHOD__;

    }

     public function show()
     {

        return __METHOD__;

    }
  
    public function update(){

        return __METHOD__;

    }
    public function destroy($course_id, $student_id){

            //code from store ...unchanged as of now. 6:26pm
            //now has been altered. 6:29pm
        $course = Course::find($course_id);

        if($course)
        {
            $student = Student::find($student_id);

            if($student)
            { 
                //many to many 
                //check that student doesn't already exist in the course.
                if(!$course->students()->find($student_id))
                {
                    return $this->createErrorMessage("The student with id {$student_id} does not exist in this course.",404);
                }
                //success
                $course->students()->detach($student_id);
                return $this->createSuccessResponse("The student with id {$student_id} was removed from the course.",200);

            }
            return $this->createErrorMessage("The student with id {$student_id}, does not exist",404);

        }
        return $this->createErrorMessage("The course with id {$course_id}, does not exist",404);
        //return __METHOD__;

    }
    

    //
}
