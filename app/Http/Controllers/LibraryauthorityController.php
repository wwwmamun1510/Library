<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Libraryauthority;
use Carbon\Carbon;

class LibraryauthorityController extends Controller
{
    function management(){
        $authorities =Libraryauthority::all();
        return view('admin.Libraryauthority.index',[
            'authorities'=>  $authorities,
            

        ]);
    }
    public function insert(Request $request){  
           
        $request->validate([
             'librarian'=>'required|unique:libraryauthorities',
             'asst_librarian'=>'required|unique:libraryauthorities',
             'peon'=>'required|unique:libraryauthorities',
            
           
          
        ],[
            'librarian.required'=>'Librarian Name is Not Exist',
            'librarian.unique'=>'Librarian Name is Already Exist',
            'asst_librarian.required'=>'Asistant Librarian Name is Not Exist',
            'asst_librarian.unique'=>'Asistant Librarian Name is Already Exist',
            'peon.required'=>'Peon Name is Not Exist',
            'peon.unique'=>'Peon Name is Already Exist',
            

        ]);


        Libraryauthority::insert([
              'librarian'=>$request->librarian,
              'asst_librarian'=>$request->asst_librarian,
              'peon'=>$request->peon,
              'created_at'=>Carbon::now(),


          ]);
        return back()->with('success', 'Authority Added Successfully!');
       }
       function delete($authority_id){
        Libraryauthority::find($authority_id)->delete();
       return back()->with('delete', 'Authority Delected Successfully!');
      }
      function edit($authority_id){
        $edit = Libraryauthority::find($authority_id);
        return view('admin.Libraryauthority.edit',[
        'edit'=>$edit,
    ]);
   }
   function update (Request $request){
    Libraryauthority::where('id',$request->authority_id)->update([
        'librarian'=>$request->librarian,
        'asst_librarian'=>$request->asst_librarian,
        'peon'=>$request->peon,
        'updated_at'=>Carbon::now(),
    ]);
    return back()-> with('success','Authority Updated Successfully!');
  }
  
}