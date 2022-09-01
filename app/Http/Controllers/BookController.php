<?php

namespace App\Http\Controllers;
use App\Models\Book;
use Illuminate\Http\Request;
use Carbon\Carbon;

class BookController extends Controller
{
    function book(){

            $books = Book::all();
            return view('admin.Book.index',[
                'books'=> $books,
    
           ]);
        }
        public function insert(Request $request){  
           
            $request->validate([
                 'book_name'=>'required|unique:books',
                 'category_name'=>'required|unique:books',
                 'author_name'=>'required|unique:books',
                 'publisher_name'=>'required|unique:books',
                  
            ],[
                'book_name.required'=>'Book Name is Not Exist',
                'book_name.unique'=>'Book Name is Already Exist',
                'category_name.required'=>'Category Name is Not Exist',
                'category_name.unique'=>'Category Name is Already Exist',
                'author_name.required'=>'Author Name is Not Exist',
                'author_name.unique'=>'Author Name is Already Exist',
                'publisher_name.required'=>'Publisher Name is Not Exist',
                'publisher_name.unique'=>'Publisher Name is Already Exist',
    
            ]);
    
            Book::insert([
                  'book_name'=>$request->book_name,
                  'category_name'=>$request->category_name,
                  'publisher_name'=>$request->publisher_name,
                  'author_name'=>$request->author_name,
                  'created_at'=>Carbon::now(),
    
    
              ]);
          return back()->with('success', 'Book Added Successfully!');
        }
        function delete($book_id){
            Book::find($book_id)->delete();
         return back()->with('delete', 'Book Delected Successfully!');
       }
       function edit($book_id){
        $edit = Book::find($book_id);
        return view('admin.Book.edit',[
            'edit'=>$edit,
        ]);
    }
    function update (Request $request){
        Book::where('id',$request->book_id)->update([
            'book_name'=>$request->book_name,
            'publisher_name'=>$request->publisher_name,
            'category_name'=>$request->category_name,
            'author_name'=>$request->author_name,
            'updated_at'=>Carbon::now(),
        ]);
        return back()-> with('success','Book Updated Successfully!');
      }
      function book_status(Request $request){
        Book::insert([
            'book_name'=>$request->book_name,
            'publisher_name'=>$request->publisher_name,
            'category_name'=>$request->category_name,
            'author_name'=>$request->author_name,
            'status'=> $request->status,
            'created_at'=> Carbon::now(),
        ]);
        return back();
    }
     
}
