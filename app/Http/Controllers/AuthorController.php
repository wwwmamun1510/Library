<?php

namespace App\Http\Controllers;
use App\Models\Author;
use Illuminate\Http\Request;
use Carbon\Carbon;


class AuthorController extends Controller
{
    function author(){
           $authors = Author::all();
            return view('admin.Author.index',[
            'authors'=> $authors,

           ]);
       }
       public function insert(Request $request){  
           
        $request->validate([
             'author_name'=>'required|unique:authors',
           
          
        ],[
            'author_name.required'=>'Author Name is Not Exist',
            'author_name.unique'=>'Author Name is Already Exist',

        ]);

        Author::insert([
              'author_name'=>$request->author_name,
              'created_at'=>Carbon::now(),


          ]);
      return back()->with('success', ' Author Added Successfully!');
    }
    function delete($author_id){
        Author::find($author_id)->delete();
     return back()->with('delete', 'Author Delected Successfully!');
   }
   function edit($author_id){
    $edit = Author::find($author_id);
    return view('admin.author.edit',[
        'edit'=>$edit,
    ]);
}
function update (Request $request){
    Author::where('id',$request->author_id)->update([
        'author_name'=>$request->author_name,
        'updated_at'=>Carbon::now(),
    ]);
    return back()-> with('success','Author Updated Successfully!');
  }
 
}
