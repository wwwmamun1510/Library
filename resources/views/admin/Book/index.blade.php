@extends('layouts.starlight')
@section('book')
active
@endsection

@section('title')
book
@endsection
@section('content')
<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
<nav class="breadcrumb sl-breadcrumb">
<a class="breadcrumb-item" href="{{url('/home')}}">Library Management System</a>
<a class="breadcrumb-item" href="{{url('/contact')}}">Contact</a>
<a class="breadcrumb-item" href="{{url('/about')}}">About</a>
<a class="breadcrumb-item" href="{{url('/book')}}">Book</a>
<a class="breadcrumb-item" href="{{url('/author')}}">Author</a>
<a class="breadcrumb-item" href="{{url('/authority')}}">Library Authority</a>
<a class="breadcrumb-item" href="{{url('/issue')}}">Book Issue</a>
<a class="breadcrumb-item" href="{{url('/category')}}">Category</a>
<a class="breadcrumb-item" href="{{url('/authority')}}">Library Authority</a>
<a class="breadcrumb-item" href="{{url('/publisher')}}">Publisher</a>
<a class="breadcrumb-item" href="{{url('/student')}}">Student</a>
</nav>
<div class="sl-pagebody">
<section>
<div class="row">
       <div class="col-lg-6 m-auto">
           <div class="card">
              <div class="card-header">
                    <h3>Add Book Information</h3>
                  </div>
                  @if(session('success'))
                     <div class="alert alert-success mt-1 ">{{session('success')}}</div>
                  @endif
                  <div class="card-body">
                  <form action="{{url('/book/status')}}" method="POST">
                     @csrf
                    <div class="form-group mt-3">
                       <label for="" class="form-label">Book Name</label>
                       <input type="text" class="form-control" name="book_name">
                       @error('book_name')
                           <strong class="text-danger pt-2">{{$message}}</strong>
                       @enderror
                     </div>
                     <div class="form-group mt-3">
                       <label for="" class="form-label">Category Name</label>
                       <input type="text" class="form-control" name="category_name">
                       @error('category_name')
                           <strong class="text-danger pt-2">{{$message}}</strong>
                       @enderror
                     </div>
                     <div class="form-group mt-3">
                       <label for="" class="form-label">Author Name</label>
                       <input type="text" class="form-control" name="author_name">
                       @error('author_name')
                           <strong class="text-danger pt-2">{{$message}}</strong>
                       @enderror
                     </div>
                     <div class="form-group mt-3">
                       <label for="" class="form-label">Publisher Name</label>
                       <input type="text" class="form-control" name="publisher_name">
                       @error('publisher_name')
                           <strong class="text-danger pt-2">{{$message}}</strong>
                       @enderror
                     </div>
                     <div class="form-group mt-3">
                                <select class="form-control" name="status" id="">
                                        <option value="">--Select Status--</option>
                                        <option value="1">Available</option>
                                        <option value="2">Issued</option>
                                        <option value="3">Non Issued</option>
                              </select>
                      </div>
                     <div class="form-group mt-3 text-center">
                        <button type="submit" class="btn btn-primary">Add Book</button>
                     </div>
                    </form>
                </div>
             </div>
          </div>
      </div>
  </div>
  <div class="col-lg-12">
      <div class="card">
          <div class="card-header">
                <h3 class="text-center">Book Information Details</h3>
          </div>
         @if(session('delete'))
               <div class="alert alert-success mt-1 ">{{session('delete')}}</div>
           @endif
           <div class="card-body">
             <table class="table table-bordered">
                <tr>
                  <th>SL</th>
                  <th>Book Name</th>
                  <th>Category Name</th>
                  <th>Author Name</th>
                  <th>Publisher Name</th>
                  <th>Role</th>
                  <th>Action</th>
                 </tr>
                 @foreach ($books as $booki)
                 <tr>
                   <td>{{$loop->index+1}}</td>
                   <td>{{$booki->book_name}}</td>
                   <td>{{$booki->category_name}}</td>
                   <td>{{$booki->author_name}}</td>
                   <td>{{$booki->publisher_name}}</td>
                   <td> @php
                              if($booki->status == 1){
                                   echo 'Available';
                               }
                               else if($booki->status ==2) {
                                 echo 'Issued';
                               }
                               else if($booki->status ==3) {
                                 echo 'Non Issued';
                               }
                               else {
                                 echo 'Not Available';
                                }
                       @endphp
                   </td>
              
                   <td>
                   <a href="{{url('/book/edit')}}/{{$booki->id}}" class="btn btn-success">Edit</a>
                   <a href="{{url('/book/delete')}}/{{$booki->id}}" class="btn btn-danger">Delete</a>
                  </td>
                 </tr>
                 @endforeach
                </table>
               </div>
            </div>
        </div>
</section>
</div><!-- sl-pagebody -->
</div><!-- sl-mainpanel -->
<!-- ########## END: MAIN PANEL ########## -->
@endsection