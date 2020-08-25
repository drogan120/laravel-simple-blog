@extends('templates.master')
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
        <div class="card-body">
            <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control">
                </div>
                <div class="form-group">
                    <label for="category">Category</label>
                    <select name="category" class="form-control">
                        @foreach ($categories as $category )
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="tags">Tags</label>
                    <select name="tags[]" multiple class="form-control select2">
                        @foreach ($tags as $tag )
                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea name="content" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label for="thumbnail">Thumbnail</label>
                    <input type="file" name="thumbnail" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
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
