@extends('layouts.starlight')
@section('student')
active
@endsection

@section('title')
student
@endsection
@section('content')
<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
<nav class="breadcrumb sl-breadcrumb">
<a class="breadcrumb-item" href="{{url('/home')}}">Library Management System</a>
<a class="breadcrumb-item" href="{{url('/contact')}}">Contact</a>
<a class="breadcrumb-item" href="{{url('/about')}}">About</a>
<a class="breadcrumb-item" href="{{url('/authority')}}">Library Authority</a>
<a class="breadcrumb-item" href="{{url('/category')}}">Category</a>
<a class="breadcrumb-item" href="{{url('/author')}}">Author</a>
<a class="breadcrumb-item" href="{{url('/book')}}">Book</a>
<a class="breadcrumb-item" href="{{url('/publisher')}}">Publisher</a>
<a class="breadcrumb-item" href="{{url('/issue')}}">Book Issue</a>
</nav>
<div class="sl-pagebody">
<section>
<div class="row">
       <div class="col-lg-6 m-auto">
           <div class="card">
           <div class="card-header">
                    <h3>Add Student Information</h3>
                  </div>
                  @if(session('success'))
                     <div class="alert alert-success mt-1 ">{{session('success')}}</div>
                  @endif
                  <div class="card-body">
                  <form action="{{url('/student/insert')}}" method="POST">
                     @csrf
                    <div class="form-group">
                       <label for="" class="form-label">Student Name</label>
                       <input type="text" class="form-control" name="student_name">
                       @error('student_name')
                           <strong class="text-danger pt-2">{{$message}}</strong>
                       @enderror
                     </div>
                     <div class="form-group">
                       <label for="" class="form-label">Gender</label>
                       <input type="text" class="form-control" name="gender">
                       @error('gender')
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
                       <label for="" class="form-label">Address</label>
                       <input type="text" class="form-control" name="address">
                       @error('address')
                           <strong class="text-danger pt-2">{{$message}}</strong>
                       @enderror
                     </div>
                     <div class="form-group">
                       <label for="" class="form-label">Institution</label>
                       <input type="text" class="form-control" name="institution">
                       @error('institution')
                           <strong class="text-danger pt-2">{{$message}}</strong>
                       @enderror
                     </div>
                     <div class="form-group mt-3 text-center">
                        <button type="submit" class="btn btn-primary">Add Student List</button>
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
                <h3 class="text-center">Student Information Details</h3>
            </div>
           @if(session('delete'))
               <div class="alert alert-success mt-1 ">{{session('delete')}}</div>
           @endif
           <div class="card-body">
             <table class="table table-bordered">
                <tr>
                  <th>SL</th>
                  <th>Student Name</th>
                  <th>Gender</th>
                  <th>Phone </th>
                  <th>Email</th>
                  <th>Address</th>
                  <th>Institution</th>
                  <th>Created At</th>
                  <th>Action</th>
                 </tr>
                 @foreach ($students as $stu)
                 <tr>
                   <td>{{$loop->index+1}}</td>
                   <td>{{$stu->student_name}}</td>
                   <td>{{$stu->gender}}</td>
                   <td>{{$stu->phone}}</td>
                   <td>{{$stu->email}}</td>
                   <td>{{$stu->address}}</td>
                   <td>{{$stu->institution}}</td>
                   <td>{{($stu->created_at->diffforHumans() > 24)?$stu->created_at->format('d/m/y h:i:s A')
                   :$stu->created_at->diffforHumans()}}</td>
                   <td>
                       <a href="{{url('/student/edit')}}/{{$stu->id}}" class="btn btn-success">Edit</a>
                       <a href="{{url('/student/delete')}}/{{$stu->id}}" class="btn btn-danger">Delete</a>
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