@extends('admin.master')

@section('title', 'Edit Size')

@section('body')

    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Size Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Size</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Size</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->
    <div class="container-fluid px-4 py-4">
        <div class="row g-4">
            <div class="col-md-10 offset-md-1">
                <div class="card">
                    <div class="card-header border-bottom">
                        <h3 class="card-title">Edit Size Form</h3>
                    </div>
                    <div class="card-body">
                        <span class="text-center">@include('notify')</span>
                        <form action="{{ route('size.update',$size->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label class="form-label">Size Name</label>
                                <input type="text" class="form-control" name="name" value="{{$size->name}}"/>
                                <span class="text-danger">{{ $errors->has('name') ? $errors->first('name') : '' }}</span>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Size Code</label>
                                <input type="text" class="form-control" name="code" value="{{$size->code}}">
                                <span class="text-danger">{{ $errors->has('code') ? $errors->first('code') : '' }}</span>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Size Description</label>
                                <textarea name="description" class="form-control" rows="3">{{$size->description}}</textarea>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Publication Status</label>
                                <label><input type="radio" value="1" {{$size->status == 1 ? 'checked' : ''}} name="status"><span>Published</span></label>
                                <label><input type="radio" value="0" {{$size->status == 0 ? 'checked' : ''}} name="status"><span>Unpublished</span></label>
                            </div>
                            <button type="submit" class="btn btn-primary rounded-0 float-end">Update Size</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
