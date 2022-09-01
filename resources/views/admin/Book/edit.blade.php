@extends('layouts.starlight')
@section('book')
active
@endsection

@section('title')
Edit book
@endsection
@section('content')
<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
<nav class="breadcrumb sl-breadcrumb">
<a class="breadcrumb-item" href="{{url('/home')}}">Library Management System</a>
<a class="breadcrumb-item" href="{{url('/book')}}">Book</a>
</nav>
  <div class="sl-pagebody">
      <div class="">
            <div class="row">
                <div class="col-lg-6 m-auto">
                    <div class="card">
                        <div class="card-header">
                            <h2 class="card-title text-center" >Edit Category Details</h2>
                        </div>
                        @if (session('success'))
                            <div class="alert alert-success mt-1 ">{{session('success')}}</div>
                        @endif
                        <div class="card-body">
                            <form action="{{url('/book/update')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="" class="form-label">Book Name</label>
                                    <input type="hidden" name="book_id" value="{{$edit->id}}">
                                    
                                    <input type="text" class="form-control" name="book_name" value="{{$edit->book_name}}">
                                    
                                    @error('book_name')
                                        <strong class="text-danger">{{$message}}</strong>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="" class="form-label">Category Name</label>
                                    <input type="hidden" name="category_id" value="{{$edit->id}}">
                                    
                                    <input type="text" class="form-control" name="category_name" value="{{$edit->category_name}}">
                                    
                                    @error('category_name')
                                        <strong class="text-danger">{{$message}}</strong>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="" class="form-label">Author Name</label>
                                    <input type="hidden" name="author_id" value="{{$edit->id}}">
                                    
                                    <input type="text" class="form-control" name="author_name" value="{{$edit->author_name}}">
                                    
                                    @error('author_name')
                                        <strong class="text-danger">{{$message}}</strong>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="" class="form-label">Publisher Name</label>
                                    <input type="hidden" name="publisher_id" value="{{$edit->id}}">
                                    
                                    <input type="text" class="form-control" name="publisher_name" value="{{$edit->category_name}}">
                                    
                                    @error('publisher_name')
                                        <strong class="text-danger">{{$message}}</strong>
                                    @enderror
                                </div>
                                <div class="form-group pt-2 text-center">
                                    <button type="submit" class="btn btn-primary">Update Book</button>
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