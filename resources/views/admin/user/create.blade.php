
@extends('layouts.admin.master')
@section('content')

      <div class="row">
        <div class="offset-3 col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Add new User</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" action="{{ route('user.store') }}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" value="{{ old('name') }}" name="name" class="form-control" id="name" placeholder="Enter user name">
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" value="{{ old('email') }}" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                            @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" value="{{ old('phone') }}" name="phone" class="form-control" id="phone" placeholder="Enter phone number">
                            @error('phone')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                            @error('password')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="confirm_password">Confirm Password</label>
                            <input type="password" name="password_confirmation" class="form-control" id="exampleInputPassword1" placeholder="Confirm Password">
                        </div>
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