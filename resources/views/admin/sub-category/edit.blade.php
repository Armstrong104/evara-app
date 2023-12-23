@extends('admin.master')

@section('title', 'Edit Sub Category')

@section('body')

    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Sub Category Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Sub Category</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Sub Category</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->
    <div class="container-fluid px-4 py-4">
        <div class="row g-4">
            <div class="col-md-10 offset-md-1">
                <div class="card">
                    <div class="card-header border-bottom">
                        <h3 class="card-title">Edit Sub Category Form</h3>
                    </div>
                    <div class="card-body">
                        <span class="text-center">@include('notify')</span>
                        <form action="{{ route('sub-category.update', $sub_category->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label class="form-label">Category Name</label>
                                <select name="category_id" class="form-control">
                                    <option value="" disabled selected>-- Select Category --</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{$sub_category->category_id == $category->id ? 'selected' : ''}}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger">{{ $errors->has('category_id') ? $errors->first('category_id') : '' }}</span>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Sub Category Name</label>
                                <input type="text" class="form-control" name="name" value="{{ $sub_category->name }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Sub Category Description</label>
                                <textarea name="description" class="form-control" rows="3">{{ $sub_category->description }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Sub Category Image</label>
                                <input type="file" class="form-control" name="image" id="imgInp">
                                <img src="{{ asset($sub_category->image) }}" class="mt-3" id="categoryImage" alt="" height="70" width="70">
                                <span class="text-danger">{{ $errors->has('image') ? $errors->first('image') : '' }}</span>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Publication Status</label>
                                <label><input type="radio" value="1" {{ $sub_category->status == 1 ? 'checked' : '' }}
                                        name="status"><span>Published</span></label>
                                <label><input type="radio" value="0" {{ $sub_category->status == 0 ? 'checked' : '' }}
                                        name="status"><span>Unpublished</span></label>
                            </div>
                            <button type="submit" class="btn btn-primary rounded-0 float-end">Update Sub
                                Category</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
