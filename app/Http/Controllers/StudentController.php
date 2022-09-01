<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Student;
use Carbon\Carbon;

class StudentController extends Controller
{
    function student(){

        $students = Student::all();
        return view('admin.Student.index',[
            'students'=> $students,

       ]);
    }
    public function insert(Request $request){  
           
        $request->validate([
             'student_name'=>'required|unique:students',
             'gender'=>'required|unique:students',
             'phone'=>'required|unique:students',
             'email'=>'required|unique:students',
             'address'=>'required|unique:students',
             'institution'=>'required|unique:students',
           
          
        ],[
            'student_name.required'=>'Student Name is Not Exist',
            'student_name.unique'=>'Student Name is Already Exist',
            'gender.required'=>'Student Name is Not Exist',
            'gender.unique'=>'Student Name is Already Exist',
            'phone.required'=>'Student Name is Not Exist',
            'phone.unique'=>'Student Name is Already Exist',
            'email.required'=>'Student Name is Not Exist',
            'email.unique'=>'Student Name is Already Exist',
            'address.required'=>'Student Name is Not Exist',
            'address.unique'=>'Student Name is Already Exist',
            'institution.required'=>'Student Name is Not Exist',
            'institution.unique'=>'Student Name is Already Exist',

        ]);

        Student::insert([
              'student_name'=>$request->student_name,
              'gender'=>$request->gender,
              'phone'=>$request->phone,
              'email'=>$request->email,
              'address'=>$request->email,
              'institution'=>$request->email,
              'created_at'=>Carbon::now(),


          ]);
      return back()->with('success', 'Student List Added Successfully!');
    }
     function delete($student_id){
        Student::find($student_id)->delete();
     return back()->with('delete', 'Student List Delected Successfully!');
    }
    function edit($student_id){
    $edit = Student::find($student_id);
    return view('admin.Student.edit',[
        'edit'=>$edit,
    ]);
  }
  function update (Request $request){
    Student::where('id',$request->student_id)->update([
        'student_name'=>$request->student_name,
        'gender'=>$request->gender,
        'phone'=>$request->phone,
        'email'=>$request->email,
        'address'=>$request->address,
        'institution'=>$request->institution,
        'updated_at'=>Carbon::now(),
    ]);
    return back()-> with('success','Student List Updated Successfully!');
  }
  
}
