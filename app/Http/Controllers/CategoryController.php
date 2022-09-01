<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Category;
use Carbon\Carbon;

class CategoryController extends Controller
{
    function category(){
        $categories = Category::all();
        return view('admin.category.index',[
            'categories'=> $categories,
            

        ]);
    }
    public function insert(Request $request){  
           
        $request->validate([
             'category_name'=>'required|unique:categories',
           
          
        ],[
            'category_name.required'=>'Category Name is Not Exist',
            'category_name.unique'=>'Category Name is Already Exist',

        ]);

       Category::insert([
              'category_name'=>$request->category_name,
              'created_at'=>Carbon::now(),


          ]);
      return back()->with('success', 'Category Added Successfully!');
    }
    function delete($category_id){
        Category::find($category_id)->delete();
     return back()->with('delete', 'category Delected Successfully!');
   }
   function edit($category_id){
    $edit = Category::find($category_id);
    return view('admin.category.edit',[
        'edit'=>$edit,
    ]);
}
function update (Request $request){
    Category::where('id',$request->category_id)->update([
        'category_name'=>$request->category_name,
        'updated_at'=>Carbon::now(),
    ]);
    return back()-> with('success','Category Updated Successfully!');
  }
  
}
