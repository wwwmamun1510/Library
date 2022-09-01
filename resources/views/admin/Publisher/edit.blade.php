@extends('layouts.starlight')
@section('publisher')
active
@endsection

@section('title')
Edit publisher
@endsection
@section('content')
<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
<nav class="breadcrumb sl-breadcrumb">
<a class="breadcrumb-item" href="{{url('/home')}}">Library Management System</a>
<a class="breadcrumb-item" href="{{url('/publisher')}}">Publisher</a>
</nav>
  <div class="sl-pagebody">
      <div class="">
            <div class="row">
                <div class="col-lg-6 m-auto">
                    <div class="card">
                        <div class="card-header">
                            <h2 class="card-title text-center" >Edit Publisher Details</h2>
                        </div>
                        @if (session('success'))
                            <div class="alert alert-success mt-1 ">{{session('success')}}</div>
                        @endif
                        <div class="card-body">
                            <form action="{{url('/publisher/update')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="" class="form-label">Publisher Name</label>
                                    <input type="hidden" name="publisher_id" value="{{$edit->id}}">
                                    
                                    <input type="text" class="form-control" name="publisher_name" value="{{$edit->publisher_name}}">
                                    
                                    @error('publisher_name')
                                        <strong class="text-danger">{{$message}}</strong>
                                    @enderror
                                </div>
                                <div class="form-group pt-2 text-center">
                                    <button type="submit" class="btn btn-primary">Update Publisher</button>
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