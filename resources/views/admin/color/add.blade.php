@extends('admin.master')

@section('title', 'Add Color')

@section('body')

    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Color Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Color</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add Color</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->
    <div class="container-fluid px-4 py-4">
        <div class="row g-4">
            <div class="col-md-10 offset-md-1">
                <div class="card">
                    <div class="card-header border-bottom">
                        <h3 class="card-title">Add Color Form</h3>
                    </div>
                    <div class="card-body">
                        @include('admin.notify')
                        <form action="{{ route('color.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Color Name</label>
                                <input type="text" class="form-control" name="name" value="{{old('name')}}"/>
                                <span class="text-danger">{{ $errors->has('name') ? $errors->first('name') : '' }}</span>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Color Code</label>
                                <input type="color" class="form-control" name="code"/>
                                <span class="text-danger">{{ $errors->has('code') ? $errors->first('code') : '' }}</span>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Color Description</label>
                                <textarea name="description" class="form-control" rows="3"></textarea>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Publication Status</label>
                                <label><input type="radio" value="1" checked name="status"/><span>Published</span></label>
                                <label><input type="radio" value="0" name="status"/><span>Unpublished</span></label>
                            </div>
                            <button type="submit" class="btn btn-primary rounded-0 float-end">Create New Color</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
