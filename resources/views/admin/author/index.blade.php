@extends('layouts.admin.master')
@section('content')
@section('breadcumb')
<div class="col-sm-6">
  <h1 class="m-0 text-dark">{{ $title }}</h1>
</div>
<div class="col-sm-6">
  <ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Author Lists</li>
  </ol>
</div><!-- /.col -->


@endsection
 <div class="row">

        <div class="col-md-12">
            <div class="card">
              <!-- /.card-header -->
              <div class=" card-body p-0">
                <table class="table">
                  <thead>
                    <tr>
                      <th style="width: 10px">Serial</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Actions</th>
                   </tr>
                  </thead>
                  <tbody>
                    @foreach($authors as $author)
                    <tr>
                      <td>{{ $serial++ }}</td>
                      <td>{{ $author->name }}</td>
                      <td>{{ $author->email }}</td>
                      <td>{{ $author->status }}</td>
                      <td>
                         <a href="{{ route('author.edit',$author->id) }}" class="btn btn-primary btn-sm">Edit</a>
                         <form action="{{route('author.destroy',$author->id)}}" method="post" accept-charset="utf-8">
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
                {{$authors->render()}}
          </div>

        </div>

@endsection