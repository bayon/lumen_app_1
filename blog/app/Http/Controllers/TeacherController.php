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

        $rules = [
            'name' => 'required',
            'phone' => 'required|numeric',
            'address' => 'required',
            'profession' => 'required|in:engineering,math,physics'
        ];
        $this -> validate($request, $rules);
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
  
    public function update(){

        return __METHOD__;

    }
    public function destroy(){

        return __METHOD__;

    }
    

    //
}
