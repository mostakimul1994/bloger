@extends('layouts.admin.master')
@section('breadcumb')
<div class="col-sm-6">
  <h1 class="m-0 text-dark">{{ $title }}</h1>
</div>
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
      <li class="breadcrumb-item"><a href="{{route('category.index')}}">Category</a></li>
      <li class="breadcrumb-item active">Add Category</li>
    </ol>
  </div><!-- /.col -->


@endsection
@section('content')

      <div class="row">
        <div class="offset-3 col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Add new Category</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" action="{{ route('category.update',$category->id) }}" method="post">
                  @csrf
                  @method('put')
                    <div class="card-body">
                        @include('admin.category._form')
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
            <!-- /.card -->

        </div>
        <!--/.col (left) -->
    </div>


@endsection