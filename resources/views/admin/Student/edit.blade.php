@extends('layouts.starlight')
@section('student')
active
@endsection

@section('title')
Edit student
@endsection
@section('content')
<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
<nav class="breadcrumb sl-breadcrumb">
<a class="breadcrumb-item" href="{{url('/home')}}">Library Management System</a>
<a class="breadcrumb-item" href="{{url('/student')}}">Student</a>
</nav>
  <div class="sl-pagebody">
      <div class="">
            <div class="row">
                <div class="col-lg-6 m-auto">
                    <div class="card">
                        <div class="card-header">
                            <h2 class="card-title text-center" >Edit  Student List Details</h2>
                        </div>
                        @if (session('success'))
                            <div class="alert alert-success mt-1 ">{{session('success')}}</div>
                        @endif
                        <div class="card-body">
                            <form action="{{url('/student/update')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="" class="form-label">Student Name</label>
                                    <input type="hidden" name="student_id" value="{{$edit->id}}">
                                    
                                    <input type="text" class="form-control" name="student_name" value="{{$edit->student_name}}">
                                    
                                    @error('student_name')
                                        <strong class="text-danger">{{$message}}</strong>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="" class="form-label">Gender</label>
                                    <input type="hidden" name="gender" value="{{$edit->id}}">
                                    
                                    <input type="text" class="form-control" name="gender" value="{{$edit->gender}}">
                                    
                                    @error('gender')
                                        <strong class="text-danger">{{$message}}</strong>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="" class="form-label">Phone</label>
                                    <input type="hidden" name="phone" value="{{$edit->id}}">
                                    
                                    <input type="text" class="form-control" name="phone" value="{{$edit->phone}}">
                                    
                                    @error('phone')
                                        <strong class="text-danger">{{$message}}</strong>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="" class="form-label">Email</label>
                                    <input type="hidden" name="email" value="{{$edit->id}}">
                                    
                                    <input type="text" class="form-control" name="email" value="{{$edit->email}}">
                                    
                                    @error('email')
                                        <strong class="text-danger">{{$message}}</strong>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="" class="form-label">Address</label>
                                    <input type="hidden" name="address" value="{{$edit->id}}">
                                    
                                    <input type="text" class="form-control" name="address" value="{{$edit->address}}">
                                    
                                    @error('address')
                                        <strong class="text-danger">{{$message}}</strong>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="" class="form-label">Institution</label>
                                    <input type="hidden" name="institution" value="{{$edit->id}}">
                                    
                                    <input type="text" class="form-control" name="institution" value="{{$edit->institution}}">
                                    
                                    @error('institution')
                                        <strong class="text-danger">{{$message}}</strong>
                                    @enderror
                                </div>
                                <div class="form-group pt-2 text-center">
                                    <button type="submit" class="btn btn-primary">Update Student List</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div><!-- sl-pagebody -->
</div><!-- sl-mainpanel -->
<!-- ########## END: MAIN PANEL ########## -->   
@endsection