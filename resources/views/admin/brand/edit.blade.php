@extends('admin.master')

@section('title', 'Edit Brand')

@section('body')

    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Brand Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Brand</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Brand</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->
    <div class="container-fluid px-4 py-4">
        <div class="row g-4">
            <div class="col-md-10 offset-md-1">
                <div class="card">
                    <div class="card-header border-bottom">
                        <h3 class="card-title">Edit Brand Form</h3>
                    </div>
                    <div class="card-body">
                        <span class="text-center">@include('notify')</span>
                        <form action="{{ route('brand.update', $brand->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label class="form-label">Brand Name</label>
                                <input type="text" class="form-control" name="name" value="{{ $brand->name }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Brand Description</label>
                                <textarea name="description" class="form-control" rows="3">{{ $brand->description }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Brand Image</label>
                                <input type="file" class="form-control" name="image" id="imgInp">
                                <img src="{{ asset($brand->image) }}" id="categoryImage" alt="" class="mt-3" height="70" width="70">
                                <span class="text-danger">{{ $errors->has('image') ? $errors->first('image') : '' }}</span>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Publication Status</label>
                                <label><input type="radio" value="1" {{ $brand->status == 1 ? 'checked' : '' }}
                                        name="status"><span>Published</span></label>
                                <label><input type="radio" value="0" {{ $brand->status == 0 ? 'checked' : '' }}
                                        name="status"><span>Unpublished</span></label>
                            </div>
                            <button type="submit" class="btn btn-primary rounded-0 float-end">Update Brand</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
