@extends('layouts.starlight')
@section('authority')
active
@endsection

@section('title')
authority
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
<a class="breadcrumb-item" href="{{url('/publisher')}}">Publisher</a>
<a class="breadcrumb-item" href="{{url('/student')}}">Student</a>
</nav>
<div class="sl-pagebody">
<section>
<div class="row">
       <div class="col-lg-6 m-auto">
           <div class="card">
           <div class="card-header">
                    <h3>Add Authority Information</h3>
                  </div>
                  @if(session('success'))
                     <div class="alert alert-success mt-1 ">{{session('success')}}</div>
                  @endif
                  <div class="card-body">
                  <form action="{{url('/authority/insert')}}" method="POST">
                     @csrf
                    <div class="form-group">
                       <label for="" class="form-label">Librarian</label>
                       <input type="text" class="form-control" name="librarian">
                       @error('librarian')
                           <strong class="text-danger pt-2">{{$message}}</strong>
                       @enderror
                     </div>
                     <div class="form-group">
                       <label for="" class="form-label">Asst.Librarian</label>
                       <input type="text" class="form-control" name="asst_librarian">
                       @error('asst_librarian')
                           <strong class="text-danger pt-2">{{$message}}</strong>
                       @enderror
                     </div>
                     <div class="form-group">
                       <label for="" class="form-label">Peon</label>
                       <input type="text" class="form-control" name="peon">
                       @error('peon')
                           <strong class="text-danger pt-2">{{$message}}</strong>
                       @enderror
                     </div>
                     <div class="form-group mt-3 text-center">
                        <button type="submit" class="btn btn-primary">Add Authority</button>
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
                <h3 class="text-center">Authority Information Details</h3>
            </div>
           @if(session('delete'))
               <div class="alert alert-success mt-1 ">{{session('delete')}}</div>
           @endif
           <div class="card-body">
             <table class="table table-bordered">
                <tr>
                  <th>SL</th>
                  <th>Librarian</th>
                  <th>Asst.Librarian</th>
                  <th>Peon</th>
                  <th>Created At</th>
                  <th>Action</th>
                 </tr>
                 @foreach ($authorities as $authority)
                 <tr>
                   <td>{{$loop->index+1}}</td>
                   <td>{{$authority->librarian}}</td>
                   <td>{{$authority->asst_librarian}}</td>
                   <td>{{$authority->peon}}</td>
                   <td>{{($authority->created_at->diffforHumans() > 24)?$authority->created_at->format('d/m/y h:i:s A')
                   :$authority->created_at->diffforHumans()}}</td>
                   <td>
                       <a href="{{url('/authority/edit')}}/{{$authority->id}}" class="btn btn-success">Edit</a>
                       <a href="{{url('/authority/delete')}}/{{$authority->id}}" class="btn btn-danger">Delete</a>
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