@extends('templates.master')
@section('title','New User')
@section('breadcrumbs')

<div class="breadcrumbs ">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h5 class="text-secondary">User</h5>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li class="active">User</li>
                </ol>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <form action="{{ route('user.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" placeholder="Name" name="name">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" placeholder="YourEmail" name="email">
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection
