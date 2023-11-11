@extends('admin.master')

@section('title', 'Add Product')

@section('body')

    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Product Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Product</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add Product</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->
    <div class="container-fluid px-4 py-4">
        <div class="row g-4">
            <div class="col-md-10 offset-md-1">
                <div class="card">
                    <div class="card-header border-bottom">
                        <h3 class="card-title">Add Product Form</h3>
                    </div>
                    <div class="card-body">
                        @include('admin.notify')
                        <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Category Name</label>
                                <select name="category_id" class="form-control" onchange="setSubCategory(this.value)" required>
                                    <option value="" disabled selected>-- Select Category --</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                <span
                                    class="text-danger">{{ $errors->has('category_id') ? $errors->first('category_id') : '' }}</span>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Sub Category Name</label>
                                <select name="sub_category_id" class="form-control" id="subCategoryId" required>
                                    <option value="" disabled selected>-- Select Sub Category --</option>
                                    @foreach ($sub_categories as $sub_category)
                                        <option value="{{ $sub_category->id }}">{{ $sub_category->name }}</option>
                                    @endforeach
                                </select>
                                <span
                                    class="text-danger">{{ $errors->has('sub_category_id') ? $errors->first('sub_category_id') : '' }}</span>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Brand Name</label>
                                <select name="brand_id" class="form-control">
                                    <option value="" disabled selected>-- Select Brand --</option>
                                    @foreach ($brands as $brand)
                                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                    @endforeach
                                </select>
                                <span
                                    class="text-danger">{{ $errors->has('brand_id') ? $errors->first('brand_id') : '' }}</span>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Unit Name</label>
                                <select name="unit_id" class="form-control">
                                    <option value="" disabled selected>-- Select Unit --</option>
                                    @foreach ($units as $unit)
                                        <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                                    @endforeach
                                </select>
                                <span
                                    class="text-danger">{{ $errors->has('unit_id') ? $errors->first('unit_id') : '' }}</span>
                            </div>
                            <div class="mb-3">
                                <div class="form-group">
                                    <label class="form-label">Color Name</label>
                                    <select multiple name="colors[]" class="form-control select2-show-search form-select"
                                        data-placeholder="-- Select Product Color --" required>
                                        @foreach ($colors as $color)
                                            <option value="{{ $color->id }}">{{ $color->name }}</option>
                                        @endforeach
                                    </select>
                                    <span
                                        class="text-danger">{{ $errors->has('color_id') ? $errors->first('color_id') : '' }}</span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="form-group">
                                    <label class="form-label">Size Name</label>
                                    <select multiple name="sizes[]" class="form-control  select2-show-search form-select"
                                        data-placeholder="-- Select Product Size --" required>
                                        @foreach ($sizes as $size)
                                            <option value="{{ $size->id }}">{{ $size->name }}</option>
                                        @endforeach
                                    </select>
                                    <span
                                        class="text-danger">{{ $errors->has('size_id') ? $errors->first('size_id') : '' }}</span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Product Name</label>
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                                <span class="text-danger">{{ $errors->has('name') ? $errors->first('name') : '' }}</span>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Product Code</label>
                                <input type="text" class="form-control" name="code" value="{{ old('code') }}">
                                <span class="text-danger">{{ $errors->has('name') ? $errors->first('name') : '' }}</span>
                            </div>
                            <div class="mb-3">
                                <label  class="form-label">Short Description</label>
                                <textarea name="short_description" class="form-control" rows="3" ></textarea>
                            </div>
                            <div class="mb-3">
                                <label  for="summernote" class="form-label">Long Description</label>
                                <textarea name="long_description" id="summernote" class="form-control" rows="3"></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Product Image</label>
                                <input type="file" class="dropify" data-height="200" name="image" />
                                <span class="text-danger">{{ $errors->has('image') ? $errors->first('image') : '' }}</span>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Product Other Image</label>
                                <input class="form-control" type="file" name="other_image[]" accept=" image/jpeg, image/png, text/html, application/zip, text/css, text/js" multiple />
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Product Price</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" name="regular_price"
                                        placeholder="Regular Price" />
                                    <input type="number" class="form-control" name="selling_price"
                                        placeholder="Selling Price" />
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Stock Amount</label>
                                <input type="number" class="form-control" name="stock_amount"
                                    value="{{ old('stock_amount') }}">
                                <span
                                    class="text-danger">{{ $errors->has('stock_amount') ? $errors->first('stock_amount') : '' }}</span>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Publication Status</label>
                                <label><input type="radio" value="1" checked
                                        name="status"><span>Published</span></label>
                                <label><input type="radio" value="0"
                                        name="status"><span>Unpublished</span></label>
                            </div>
                            <button type="submit" class="btn btn-primary rounded-0 float-end">Create New Product</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
