@extends('layouts.admin.master')
@section('content')
@section('breadcumb')
<div class="col-sm-6">
  <h1 class="m-0 text-dark">{{ $title }}</h1>
</div>
<div class="col-sm-6">
  <ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">All Users Lists</li>
  </ol>
</div><!-- /.col -->


@endsection
 <div class="row">

        <div class="col-md-12">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table">
                  <thead>
                    <tr>
                      <th style="width: 10px">Serial</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Phone</th>
                      <th>Actions</th>
                   </tr>
                  </thead>
                  <tbody>
                    @foreach($users as $user)
                    <tr>
                      <td>{{ $user->id }}</td>
                      <td>{{ $user->name }}</td>
                      <td>{{ $user->email }}</td>
                      <td>{{ $user->phone }}</td>
                      <td>
                         <a href="{{ route('user.edit',$user->id) }}" class="btn btn-primary btn-sm">Edit</a>
                         <form action="{{route('user.destroy',$user->id)}}" method="post" accept-charset="utf-8">
                          @csrf
                          @method('delete')
                          <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                         </form>
                      </td>
                      
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
                {{$users->render()}}
          </div>

        </div>

@endsection