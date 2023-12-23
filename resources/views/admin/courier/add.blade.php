@extends('admin.master')

@section('title', 'Add Courier')

@section('body')

    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Courier Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Courier</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add Courier</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->
    <div class="container-fluid px-4 py-4">
        <div class="row g-4">
            <div class="col-md-10 offset-md-1">
                <div class="card">
                    <div class="card-header border-bottom">
                        <h3 class="card-title">Add Courier Form</h3>
                    </div>
                    <div class="card-body">
                        <span class="text-center">@include('notify')</span>
                        <form action="{{ route('courier.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Courier Name</label>
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                                <span class="text-danger">{{ $errors->has('name') ? $errors->first('name') : '' }}</span>

                            </div>
                            <div class="mb-3">
                                <label class="form-label">Courier Email</label>
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                                <span class="text-danger">{{ $errors->has('email') ? $errors->first('email') : '' }}</span>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Courier Mobile</label>
                                <input type="number" class="form-control" name="mobile" value="{{ old('mobile') }}">
                                <span class="text-danger">{{ $errors->has('mobile') ? $errors->first('mobile') : '' }}</span>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Courier Address</label>
                                <textarea name="address" class="form-control" rows="3"></textarea>
                                <span class="text-danger">{{ $errors->has('address') ? $errors->first('address') : '' }}</span>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Shipping Cost</label>
                                <input type="number" class="form-control" name="shipping_cost" value="{{ old('shipping_cost') }}">
                                <span class="text-danger">{{ $errors->has('shipping_cost') ? $errors->first('shipping_cost') : '' }}</span>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Status</label>
                                <label><input type="radio" value="1" checked
                                        name="status"><span>Available</span></label>
                                <label><input type="radio" value="0"  name="status"><span>Unavailable</span></label>
                            </div>
                            <button type="submit" class="btn btn-primary rounded-0 float-end">Create New Courier</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
