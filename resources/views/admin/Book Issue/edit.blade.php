@extends('layouts.starlight')
@section('issue')
active
@endsection

@section('title')
Edit issue
@endsection
@section('content')
<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
<nav class="breadcrumb sl-breadcrumb">
<a class="breadcrumb-item" href="{{url('/home')}}">Library Management System</a>
<a class="breadcrumb-item" href="{{url('/issue')}}">Book Issue</a>
</nav>
  <div class="sl-pagebody">
<div class="">
            <div class="row">
                <div class="col-lg-6 m-auto">
                    <div class="card">
                        <div class="card-header">
                            <h2 class="card-title text-center" >Edit Book-Issue  Details</h2>
                        </div>
                        @if (session('success'))
                            <div class="alert alert-success mt-1 ">{{session('success')}}</div>
                        @endif
                        <div class="card-body">
                            <form action="{{url('/issue/update')}}" method="POST">
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
                                    <label for="" class="form-label">Book Name</label>
                                    <input type="hidden" name="book_id" value="{{$edit->id}}">
                                    
                                <input type="text" class="form-control" name="book_name" value="{{$edit->book_name}}">
                                    
                                    @error('book_name')
                                        <strong class="text-danger">{{$message}}</strong>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="" class="form-label">Phone</label>
                                    <input type="hidden" name="phone_id" value="{{$edit->id}}">
                                    
                                <input type="text" class="form-control" name="Phone" value="{{$edit->Phone}}">
                                    
                                    @error('Phone')
                                        <strong class="text-danger">{{$message}}</strong>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="" class="form-label">Email</label>
                                    <input type="hidden" name="email_id" value="{{$edit->id}}">
                                    
                                <input type="text" class="form-control" name="email" value="{{$edit->email}}">
                                    
                                    @error('email')
                                        <strong class="text-danger">{{$message}}</strong>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="" class="form-label">Issue Date</label>
                                    <input type="hidden" name="issue_date_id" value="{{$edit->id}}">
                                    
                                <input type="date" class="form-control" name="issue_date" value="{{$edit->issue_date}}">
                                    
                                    @error('issue_date')
                                        <strong class="text-danger">{{$message}}</strong>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="" class="form-label">Return Date</label>
                                    <input type="hidden" name="return_date_id" value="{{$edit->id}}">
                                    
                              <input type="date" class="form-control" name="return_date" value="{{$edit->return_date}}">
                                    
                                    @error('return_date')
                                        <strong class="text-danger">{{$message}}</strong>
                                    @enderror
                                </div>
                                <div class="form-group pt-2 text-center">
                                    <button type="submit" class="btn btn-primary">Update Book-Issue</button>
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