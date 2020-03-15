@extends('layouts.admin.master')
@section('breadcrumb')
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('post.index') }}">Posts</a></li>
            <li class="breadcrumb-item active">Post Details</li>
        </ol>
    </div><!-- /.col -->
@endsection
@section('content')
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Post Details</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-md-3">
                            <table class="table table-bordered">
                                <tr>
                                    <td>Status</td>
                                    <td>{{ $post->status }}</td>
                                </tr>
                                <tr>
                                    <td>Is Featured</td>
                                    <td>{{ $post->is_featured==1?'Yes':'No' }}</td>
                                </tr>
                                
                                <tr>
                                    <td>Category</td>
                                    <td>{{ $post->category->name }}</td>
                                </tr>
                                <tr>
                                    <td>Author</td>
                                    <td>{{ $post->author->name }}</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-9">
                            <h1>{{ $post->title }}</h1>
                            <img src="{{ asset($post->image) }}" alt="" width="100%">
                            <p>{{ $post->details }}</p>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <!-- /.card -->
        </div>
        <!--/.col (left) -->
    </div>
@endsection