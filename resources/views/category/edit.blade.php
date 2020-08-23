@extends('templates.master')
@section('content')
<div class="container"></div>
<div class="card">
    <div class="card-body">
        <form action="{{ url('category'.'/'.$category->id) }}" method="POST">
            @csrf
            @method('patch')
            <div class="form-group">
                <label for="name">Category Name</label>
                <input type="hidden" name="id" value="{{$category->id}}">
                <input type="text" class="form-control" name="name" value="{{$category->name}}">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
</div>
@endsection
