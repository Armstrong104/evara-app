@extends('admin.master')

@section('title', 'Add User')

@section('body')

    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">User Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">User</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add User</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->
    <div class="container-fluid px-4 py-4">
        <div class="row g-4">
            <div class="col-md-10 offset-md-1">
                <div class="card">
                    <div class="card-header border-bottom">
                        <h3 class="card-title">Add User Info</h3>
                    </div>
                    <div class="card-body">
                        <span class="text-center">@include('notify')</span>
                        <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">User Name</label>
                                <input type="text" id="name" class="form-control" name="name" placeholder="User Name">
                                <span class="text-danger">{{ $errors->has('name') ? $errors->first('name') : '' }}</span>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email Address</label>
                                <input type="email" id="email" class="form-control" name="email"  placeholder="User Email">
                                <span class="text-danger">{{ $errors->has('email') ? $errors->first('email') : '' }}</span>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" id="password" class="form-control" name="password" placeholder="User Password">
                                <span class="text-danger">{{ $errors->has('password') ? $errors->first('password') : '' }}</span>
                            </div>
                            <div class="mb-3">
                                <label for="mobile" class="form-label">Mobile Number</label>
                                <input type="number" id="mobile" class="form-control" name="mobile" placeholder="User Mobile">
                                <span class="text-danger">{{ $errors->has('mobile') ? $errors->first('mobile') : '' }}</span>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Select Role</label>
                                <select class="form-control" name="role" required>
                                    <option value="" disabled selected> -- Select Role -- </option>
                                    <option value="1">Admin</option>
                                    <option value="2">Manager</option>
                                    <option value="3">Executive</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">User Image</label>
                                <input type="file" class="form-control" name="image" id="imgInp">
                                <img src="" class="mt-3" id="categoryImage" alt="">
                                <span class="text-danger">{{ $errors->has('image') ? $errors->first('image') : '' }}</span>
                            </div>
                            <button type="submit" class="btn btn-primary rounded-0 float-end">Create New User</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
