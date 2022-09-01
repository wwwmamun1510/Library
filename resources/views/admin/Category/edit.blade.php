@extends('layouts.starlight')
@section('category')
active
@endsection

@section('title')
Edit category
@endsection
@section('content')
<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
<nav class="breadcrumb sl-breadcrumb">
<a class="breadcrumb-item" href="{{url('/home')}}">Library Management System</a>
<a class="breadcrumb-item" href="{{url('/category')}}">Category</a>
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
                            <form action="{{url('/category/update')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="" class="form-label">Category Name</label>
                                    <input type="hidden" name="category_id" value="{{$edit->id}}">
                                    
                                    <input type="text" class="form-control" name="category_name" value="{{$edit->category_name}}">
                                    
                                    @error('category_name')
                                        <strong class="text-danger">{{$message}}</strong>
                                    @enderror
                                </div>
                                <div class="form-group pt-2 text-center">
                                    <button type="submit" class="btn btn-primary">Update Category</button>
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