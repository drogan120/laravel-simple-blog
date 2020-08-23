@extends('templates.master')
@section('title','Category')
@section('head')
<link rel="stylesheet" href="{{ asset('sufee-admin\plugin\sweetalert2-theme-bootstrap-4\bootstrap-4.min.css') }}">
@endsection
@section('breadcrumbs')
<div class="breadcrumbs ">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h5 class="text-secondary">Category</h5>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li class="active">Category</li>
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
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#ModalCategory">
                New
            </button>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($category as $cat)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $cat->name }}</td>
                        <td>{{ $cat->slug }}</td>
                        <td>
                            <div class="d-inline">
                                <a href="{{ url('/category'.'/'.$cat->id) }}" class="btn btn-info">Update</a>
                                <a href="#" class="btn btn-danger">Delete</a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $category->links() }}
        </div>
    </div>
</div>

<!-- Modal Category-->
<div class="modal fade" id="ModalCategory" tabindex="-1" role="dialog" aria-labelledby="ModalCategoryLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalCategoryLabel">New Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('category.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="reset" class="btn btn-danger">Reset</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
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
