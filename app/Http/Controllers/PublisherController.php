<?php

namespace App\Http\Controllers;
use App\Models\Publisher;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PublisherController extends Controller
{
    function publisher(){
            $publishers = Publisher::all();
            return view('admin.Publisher.index',[
                'publishers'=> $publishers,
    
            ]);
        }
        public function insert(Request $request){  
           
            $request->validate([
                 'publisher_name'=>'required|unique:publishers',
               
              
            ],[
                'publisher_name.required'=>'Publisher Name is Not Exist',
                'publisher_name.unique'=>'Publisher Name is Already Exist',
    
            ]);
    
    
            Publisher::insert([
                  'publisher_name'=>$request->publisher_name,
                  'created_at'=>Carbon::now(),
    
    
              ]);
            return back()->with('success', 'Publisher Added Successfully!');
        }
        function delete($publisher_id){
            Publisher::find($publisher_id)->delete();
         return back()->with('delete', 'Publisher Delected Successfully!');
       }
       function edit($publisher_id){
        $edit = Publisher::find($publisher_id);
        return view('admin.publisher.edit',[
            'edit'=>$edit,
        ]);
    }
    function update (Request $request){
        Publisher::where('id',$request->publisher_id)->update([
            'publisher_name'=>$request->publisher_name,
            'updated_at'=>Carbon::now(),
        ]);
        return back()-> with('success','Publisher Updated Successfully!');
      }
}
