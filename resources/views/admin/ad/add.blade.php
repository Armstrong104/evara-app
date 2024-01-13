@extends('admin.master')

@section('title', 'Add Ad')

@section('body')

    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Ad Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Ad</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add Ad</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->
    <div class="container-fluid px-4 py-4">
        <div class="row g-4">
            <div class="col-md-10 offset-md-1">
                <div class="card">
                    <div class="card-header border-bottom">
                        <h3 class="card-title">Add Ad Form</h3>
                    </div>
                    <div class="card-body">
                        <span class="text-center">@include('notify')</span>
                        <form action="{{ route('ad.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Product Name</label>
                                <select name="product_id" class="form-control">
                                    <option value="" disabled selected>-- Select Product --</option>
                                    @foreach ($products as $product)
                                        <option value="{{$product->id}}">{{$product->name}}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger">{{$errors->has('product_id') ? $errors->first('product_id') : ''}}</span>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Ad Title</label>
                                <input type="text" class="form-control" name="title" value="{{old('title')}}">
                                <span class="text-danger">{{ $errors->has('title') ? $errors->first('title') : '' }}</span>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Ad Sub Title</label>
                                <input type="text" class="form-control" name="sub_title" value="{{old('sub_title')}}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Ad Position</label>
                                <input type="number" class="form-control" name="position" value="{{old('position')}}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Ad Offer Price</label>
                                <input type="number" class="form-control" name="offer_price" value="{{old('offer_price')}}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Ad Discount</label>
                                <input type="number" class="form-control" name="discount" value="{{old('discount')}}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Ad Image</label>
                                <input type="file" class="form-control" name="image" id="imgInp">
                                <img src="" class="mt-3" id="categoryImage" alt="">
                                <span class="text-danger">{{ $errors->has('image') ? $errors->first('image') : '' }}</span>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Publication Status</label>
                                <label><input type="radio" value="1" checked name="status"><span>Published</span></label>
                                <label><input type="radio" value="0"  name="status"><span>Unpublished</span></label>
                            </div>
                            <button type="submit" class="btn btn-primary rounded-0 float-end">Create New Ad</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
