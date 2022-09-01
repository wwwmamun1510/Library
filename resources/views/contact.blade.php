@extends('layouts.starlight')
@section('contact')
active
@endsection

@section('title')
contact
@endsection
@section('content')
<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
<nav class="breadcrumb sl-breadcrumb">
<a class="breadcrumb-item" href="{{url('/home')}}">Library Management System</a>
<a class="breadcrumb-item" href="{{url('/about')}}">About</a>
<a class="breadcrumb-item" href="{{url('/book')}}">Book</a>
<a class="breadcrumb-item" href="{{url('/issue')}}">Book Issue</a>
<a class="breadcrumb-item" href="{{url('/author')}}">Author</a>
<a class="breadcrumb-item" href="{{url('/category')}}">Category</a>
<a class="breadcrumb-item" href="{{url('/authority')}}">Library Authority</a>
<a class="breadcrumb-item" href="{{url('/publisher')}}">Publisher</a>
<a class="breadcrumb-item" href="{{url('/student')}}">Student</a>
</nav>
<div class="sl-pagebody">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card">
           <h1 class="text-center">Moinamoti Super Market-4th Floor,Cumilla Cantonment</h>
        </div>
      </div>
   </div>
  </div>
</div>
</div><!-- sl-pagebody -->
</div><!-- sl-mainpanel -->
<!-- ########## END: MAIN PANEL ########## -->
@endsection