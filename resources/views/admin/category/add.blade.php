@extends('admin.master')

@section('title','Add Category')

@section('body')
<div class="container-fluid px-4 py-4">
    <div class="row g-4">
        <div class="col-12 col-sm-8 offset-sm-2">
            <h1 class="text-center">Add Category</h1>
            @if (Session::get('msg'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ Session::get('msg') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <form action="{{route('category.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control" name="name">
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control" rows="3"></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Image</label>
                    <input type="file" accept="image/*" class="form-control" name="image">
                    @error('image')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Add Category</button>
            </form>
        </div>
    </div>
</div>
@endsection
