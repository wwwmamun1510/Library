@extends('layouts.starlight')
@section('authority')
active
@endsection

@section('title')
Edit authority
@endsection
@section('content')
<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
<nav class="breadcrumb sl-breadcrumb">
<a class="breadcrumb-item" href="{{url('/home')}}">Library Management System</a>
<a class="breadcrumb-item" href="{{url('/authority ')}}">Library Authority </a>
</nav>
  <div class="sl-pagebody">
<div class="">
            <div class="row">
                <div class="col-lg-6 m-auto">
                    <div class="card">
                        <div class="card-header">
                            <h2 class="card-title text-center" >Edit Authority Details</h2>
                        </div>
                        @if (session('success'))
                            <div class="alert alert-success mt-1 ">{{session('success')}}</div>
                        @endif
                        <div class="card-body">
                            <form action="{{url('/authority/update')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="" class="form-label">Librarian</label>
                                    <input type="hidden" name="librarian_id" value="{{$edit->id}}">
                                    
                                    <input type="text" class="form-control" name="librarian" value="{{$edit->librarian}}">
                                    
                                    @error('librarian')
                                        <strong class="text-danger">{{$message}}</strong>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="" class="form-label">Asst.Librarian</label>
                                    <input type="hidden" name="asst_librarian_id" value="{{$edit->id}}">
                                    
                                    <input type="text" class="form-control" name="asst_librarian" value="{{$edit->asst_librarian}}">
                                    
                                    @error('asst_librarian')
                                        <strong class="text-danger">{{$message}}</strong>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="" class="form-label">Peon</label>
                                    <input type="hidden" name="peon_id" value="{{$edit->id}}">
                                    
                                    <input type="text" class="form-control" name="peon" value="{{$edit->peon}}">
                                    
                                    @error('peon')
                                        <strong class="text-danger">{{$message}}</strong>
                                    @enderror
                                </div>
                                 <div class="form-group pt-2 text-center">
                                    <button type="submit" class="btn btn-primary">Update Authority</button>
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