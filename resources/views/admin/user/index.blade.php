@extends('layouts.admin.master')
@section('content')


 <div class="row">

        <div class="col-md-12">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
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
                          <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                         </form>
                      </td>
                      
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
                <div class="card-tools">
                  <ul class="pagination pagination-sm float-left">
                    <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                  </ul>
                </div>
          </div>

        </div>

@endsection