@extends('admin.master')

@section('title', 'Edit Feature')

@section('body')

    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Feature Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Feature</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Feature</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->
    <div class="container-fluid px-4 py-4">
        <div class="row g-4">
            <div class="col-md-10 offset-md-1">
                <div class="card">
                    <div class="card-header border-bottom">
                        <h3 class="card-title">Edit Feature Form</h3>
                    </div>
                    <div class="card-body">
                        <span class="text-center">@include('notify')</span>
                        <form action="{{ route('feature.update', $feature->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label class="form-label">Feature Name</label>
                                <input type="text" class="form-control" name="name" value="{{ $feature->name }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Feature Image</label>
                                <input type="file" class="form-control" name="image" id="imgInp">
                                <img src="{{ asset($feature->image) }}" id="categoryImage" alt="" class="mt-3" height="70" width="70">
                                <span class="text-danger">{{ $errors->has('image') ? $errors->first('image') : '' }}</span>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Publication Status</label>
                                <label><input type="radio" value="1" {{ $feature->status == 1 ? 'checked' : '' }}
                                        name="status"><span>Published</span></label>
                                <label><input type="radio" value="0" {{ $feature->status == 0 ? 'checked' : '' }}
                                        name="status"><span>Unpublished</span></label>
                            </div>
                            <button type="submit" class="btn btn-primary rounded-0 float-end">Update Feature</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
