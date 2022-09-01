<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bookissue;
use Carbon\Carbon;

class BookissueController extends Controller
{
    function issue(){

        $issues = Bookissue::all();
        return view('admin.Book Issue.index',[
            'issues'=> $issues,

       ]);
    }
    public function insert(Request $request){  
           
        $request->validate([
             'student_name'=>'required|unique:bookissues',
             'book_name'=>'required|unique:bookissues',
             'phone'=>'required|unique:bookissues',
             'email'=>'required|unique:bookissues',
             'issue_date'=>'required|unique:bookissues',
             'return_date'=>'required|unique:bookissues',
           
          
        ],[
            'student_name.required'=>'Student Name is Not Exist',
            'student_name.unique'=>'Student Name is Already Exist',
            'book_name.required'=>'Book Name is Not Exist',
            'book_name.unique'=>'Book Name is Already Exist',
            'phone.required'=>'Phone Number is Not Exist',
            'phone.unique'=>'Phone Number is Already Exist',
            'email.required'=>'Email Address is Not Exist',
            'email.unique'=>'Email Address is Already Exist',
            'issue_date.required'=>'Issue Date is Not Exist',
            'issue_date.unique'=>'Issue Date is Already Exist',
            'return_date.required'=>'Return Date is Not Exist',
            'return_date.unique'=>'Return Date is Already Exist',

        ]);

        Bookissue::insert([
              'student_name'=>$request->student_name,
              'book_name'=>$request->book_name,
              'phone'=>$request->phone,
              'email'=>$request->email,
              'issue_date'=>$request->issue_date,
              'return_date'=>$request->return_date,
              'created_at'=>Carbon::now(),


          ]);
      return back()->with('success', 'Book Item Added Successfully!');
    }

    function update (Request $request){
        Bookissue::where('id',$request->issue_id)->update([
            'student_name'=>$request->student_name,
            'book_name'=>$request->book_name,
            'phone'=>$request->phone,
            'email'=>$request->email,
            'issue_date'=>$request->issue_date,
            'return_date'=>$request->return_date,
            'updated_at'=>Carbon::now(),
        ]);
        return back()-> with('success','Book Item Updated Successfully!');
      }
   
     function delete($issue_id){
        Bookissue::find($issue_id)->delete();
     return back()->with('delete', 'Book Item Delected Successfully!');
   }
    function edit($issue_id){
    $edit = Bookissue::find($issue_id);
    return view('admin.Book Issue.edit',[
        'edit'=>$edit,
    ]);
  }

}