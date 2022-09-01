@extends('layouts.starlight')
@section('publisher')
active
@endsection

@section('title')
publisher
@endsection
@section('content')
<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
<nav class="breadcrumb sl-breadcrumb">
<a class="breadcrumb-item" href="{{url('/home')}}">Library Management System</a>
<a class="breadcrumb-item" href="{{url('/contact')}}">Contact</a>
<a class="breadcrumb-item" href="{{url('/about')}}">About</a>
<a class="breadcrumb-item" href="{{url('/book')}}">Book</a>
<a class="breadcrumb-item" href="{{url('/authority')}}">Library Authority</a>
<a class="breadcrumb-item" href="{{url('/category')}}">Category</a>
<a class="breadcrumb-item" href="{{url('/author')}}">Author</a>
<a class="breadcrumb-item" href="{{url('/issue')}}">Book Issue</a>
<a class="breadcrumb-item" href="{{url('/student')}}">Student</a>
</nav>
<div class="sl-pagebody">
    <section>
      <div class="container">
        <div class="row">
           <div class="col-lg-8">
           <div class="card">
               <div class="card-header">
                <h3 class="text-center">Publisher Information Details</h3>
            </div>
           @if(session('delete'))
               <div class="alert alert-success mt-1 ">{{session('delete')}}</div>
           @endif
           <div class="card-body">
             <table class="table table-bordered">
                <tr>
                  <th>SL</th>
                  <th>Publisher Name</th>
                  <th>Created At</th>
                  <th>Action</th>
                 </tr>
                 @foreach ($publishers as $publishing)
                 <tr>
                   <td>{{$loop->index+1}}</td>
                   <td>{{$publishing->publisher_name}}</td>
                   <td>{{($publishing->created_at->diffforHumans() > 24)?$publishing->created_at->format('d/m/y h:i:s A')
                   :$publishing->created_at->diffforHumans()}}</td>
                   <td>
                       <a href="{{url('/publisher/edit')}}/{{$publishing->id}}" class="btn btn-success">Edit</a>
                       <a href="{{url('/publisher/delete')}}/{{$publishing->id}}" class="btn btn-danger">Delete</a>
                  </td>
                 </tr>
                 @endforeach
                </table>
               </div>
              </div>
            </div>
        <div class="col-lg-4">
           <div class="card">
             <div class="card-header">
                    <h3>Add Publisher Information</h3>
                  </div>
                  @if(session('success'))
                     <div class="alert alert-success mt-1 ">{{session('success')}}</div>
                  @endif
                  <div class="card-body">
                  <form action="{{url('/publisher/insert')}}" method="POST">
                     @csrf
                    <div class="form-group">
                       <label for="" class="form-label">Publisher Name</label>
                       <input type="text" class="form-control" name="publisher_name">
                       @error('Publisher_name')
                           <strong class="text-danger pt-2">{{$message}}</strong>
                       @enderror
                     </div>
                     <div class="form-group mt-3 text-center">
                        <button type="submit" class="btn btn-primary">Add Publisher</button>
                     </div>
                    </form>
                </div>
               </div>
            </div>
         </div>
     </div>
</section>
</div><!-- sl-pagebody -->
</div><!-- sl-mainpanel -->
<!-- ########## END: MAIN PANEL ########## -->
@endsection