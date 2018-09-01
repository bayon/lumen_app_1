<?php

namespace App\Http\Controllers;

use App\Teacher;
use Illuminate\Http\Request;
class TeacherController extends Controller
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

        $teachers = teacher::all();
        //use base controller method
        return $this -> createSuccessResponse($teachers, 200);

    }
    
    public function store(Request $request){


        $this -> validateRequest();
        $teacher = Teacher::create($request->all());
        return $this->createSuccessResponse("The teacher with the id {$teacher->id} has been created.",201);
        //return __METHOD__;

    }

    public function show($id){

        $teacher = Teacher::find($id);
        if($teacher)
        {
            return $this->createSuccessResponse($teacher,200);
        }

        return $this->createErrorMessage("The teacher with id {$id}, does not exist",404);

    }
  
     
    public function update(Request $request, $teacher_id){

            $teacher = teacher::find($teacher_id);
           
            
            if($teacher)
            {
                $this->validateRequest($request);
                $teacher->name      = $request->get('name');
                $teacher->phone     = $request->get('phone');
                $teacher->address   = $request->get('address');
                $teacher->profession    = $request->get('profession');
    
                $teacher->save();
    
                return $this->createSuccessResponse("The teacher with the id {$teacher_id} was updated successfully.",200);
    
            }
            return $this->createErrorMessage("The teacher with id {$teacher_id} does not exist",404);
            //return __METHOD__;
    
        }
    public function destroy(){

        return __METHOD__;

    }
    public function validateRequest($request)
    {
        $rules = [
            'name' => 'required',
            'phone' => 'required|numeric',
            'address' => 'required',
            'profession' => 'required|in:engineering,math,physics'
        ];
        $this -> validate($request, $rules);
    }
    

    //
}
