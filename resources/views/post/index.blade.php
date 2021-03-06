@extends('templates.master')
@section('title','Post')
@section('head')
<link rel="stylesheet" href="{{ asset('sufee-admin\plugin\sweetalert2-theme-bootstrap-4\bootstrap-4.min.css') }}">
@endsection
@section('breadcrumbs')

<div class="breadcrumbs ">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h5 class="text-secondary">Post</h5>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li class="active">Post</li>
                </ol>
            </div>
        </div>
    </div>
</div>

@endsection
@section('content')
<div class="container">
    <div class="card mt-3">
        <div class="d-inline mt-3 ml-3">
            <a href="{{ route('post.create') }}" class="btn btn-success">
                New
            </a>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Title</th>
                        <th>Slug</th>
                        <th>Category</th>
                        <th>Thumbnail</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($posts as $post)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->slug }}</td>
                        <td>{{ $post->category->name }}</td>
                        <td><img src="{{ asset($post->thumbnail) }}" alt="{{$post->thumbnail}}" class="img-fluid"
                                width="100" height="100"></td>
                        <td>
                            <div class="d-inline">
                                <a href="{{ url('/post'.'/'.$post->id) }}" class="btn btn-info">Update</a>
                                <form action="{{ url ('post'.'/'.$post->id) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@section('foot')
<script src="{{ asset('sufee-admin\plugin\sweetalert2\sweetalert2.min.js') }}"></script>
<script src="{{ asset('sufee-admin\plugin\toastr\toastr.min.js') }}"></script>
<script>
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
});
</script>
@if (session()->has('success'))
<script>
    Swal.fire('Success !','{{session('success')}}','success');
</script>
@endif
@endsection
