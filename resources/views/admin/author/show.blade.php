@extends('layouts.admin.master')
@section('breadcumb')
<div class="col-sm-6">
  <h1 class="m-0 text-dark">{{ $title }}</h1>
</div>
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
      <li class="breadcrumb-item"><a href="{{route('author.index')}}">Author</a></li>
      <li class="breadcrumb-item active">Edit Author</li>
    </ol>
  </div><!-- /.col -->


@endsection
@section('content')

      <div class="row">
        <div class="offset-3 col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
                
            </div>
            <!-- /.card -->

        </div>
        <!--/.col (left) -->
    </div>


@endsection