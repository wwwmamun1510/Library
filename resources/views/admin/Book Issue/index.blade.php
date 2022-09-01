@extends('layouts.starlight')
@section('issue')
active
@endsection

@section('title')
issue
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
                    <h3>Add Book Issue Information</h3>
                  </div>
                  @if(session('success'))
                     <div class="alert alert-success mt-1 ">{{session('success')}}</div>
                  @endif
                  <div class="card-body">
                  <form action="{{url('/issue/insert')}}" method="POST">
                     @csrf
                    <div class="form-group">
                       <label for="" class="form-label">Student Name</label>
                       <input type="text" class="form-control" name="student_name">
                       @error('student_name')
                           <strong class="text-danger pt-2">{{$message}}</strong>
                       @enderror
                     </div>
                     <div class="form-group">
                       <label for="" class="form-label">Book Name</label>
                       <input type="text" class="form-control" name="book_name">
                       @error('book_name')
                           <strong class="text-danger pt-2">{{$message}}</strong>
                       @enderror
                     </div>
                     <div class="form-group">
                       <label for="" class="form-label">Phone</label>
                       <input type="text" class="form-control" name="phone">
                       @error('phone')
                           <strong class="text-danger pt-2">{{$message}}</strong>
                       @enderror
                     </div>
                     <div class="form-group">
                       <label for="" class="form-label">Email</label>
                       <input type="text" class="form-control" name="email">
                       @error('email')
                           <strong class="text-danger pt-2">{{$message}}</strong>
                       @enderror
                     </div>
                     <div class="form-group">
                       <label for="" class="form-label">Issue Date</label>
                       <input type="date" class="form-control" name="issue_date">
                       @error('issue_date')
                           <strong class="text-danger pt-2">{{$message}}</strong>
                       @enderror
                     </div>
                     <div class="form-group">
                       <label for="" class="form-label">Return Date</label>
                       <input type="date" class="form-control" name="return_date">
                       @error('return_date')
                           <strong class="text-danger pt-2">{{$message}}</strong>
                       @enderror
                     </div>
                     <div class="form-group mt-3 text-center">
                        <button type="submit" class="btn btn-primary">Add Book-Issue List</button>
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
                <h3 class="text-center">Book-Issue Information Details</h3>
            </div>
           @if(session('delete'))
               <div class="alert alert-success mt-1 ">{{session('delete')}}</div>
           @endif
           <div class="card-body">
             <table class="table table-bordered">
                <tr>
                  <th>SL</th>
                  <th>Student Name</th>
                  <th>Book Name</th>
                  <th>Phone </th>
                  <th>Email</th>
                  <th>Issue Date</th>
                  <th>Return Date</th>
                  <th>Created At</th>
                  <th>Action</th>
                 </tr>
                 @foreach ($issues as $issu)
                 <tr>
                   <td>{{$loop->index+1}}</td>
                   <td>{{$issu->student_name}}</td>
                   <td>{{$issu->book_name}}</td>
                   <td>{{$issu->phone}}</td>
                   <td>{{$issu->email}}</td>
                   <td>{{$issu->issue_date}}</td>
                   <td>{{$issu->return_date}}</td>
                   <td>{{($issu->created_at->diffforHumans() > 24)?$issu->created_at->format('d/m/y h:i:s A')
                   :$issu->created_at->diffforHumans()}}</td>
                   <td>
                       <a href="{{url('/issue/edit')}}/{{$issu->id}}" class="btn btn-success">Edit</a>
                       <a href="{{url('/issue/delete')}}/{{$issu->id}}" class="btn btn-danger">Delete</a>
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