@extends('admin.master')

@section('title', 'Edit Color')

@section('body')

    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Color Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Color</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Color</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->
    <div class="container-fluid px-4 py-4">
        <div class="row g-4">
            <div class="col-md-10 offset-md-1">
                <div class="card">
                    <div class="card-header border-bottom">
                        <h3 class="card-title">Edit Color Form</h3>
                    </div>
                    <div class="card-body">
                        <span class="text-center">@include('notify')</span>
                        <form action="{{ route('color.update',$color->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label class="form-label">Unit Name</label>
                                <input type="text" class="form-control" name="name" value="{{$color->name}}"/>
                                <span class="text-danger">{{ $errors->has('name') ? $errors->first('name') : '' }}</span>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Unit Code</label>
                                <input type="color" class="form-control" name="code" value="{{$color->code}}"/>
                                <span class="text-danger">{{ $errors->has('code') ? $errors->first('code') : '' }}</span>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Unit Description</label>
                                <textarea name="description" class="form-control" rows="3">{{$color->description}}</textarea>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Publication Status</label>
                                <label><input type="radio" value="1" {{$color->status == 1 ? 'checked' : ''}} name="status"/><span>Published</span></label>
                                <label><input type="radio" value="0" {{$color->status == 0 ? 'checked' : ''}} name="status"/><span>Unpublished</span></label>
                            </div>
                            <button type="submit" class="btn btn-primary rounded-0 float-end">Update Color</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
