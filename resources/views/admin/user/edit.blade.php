@extends('admin.master')

@section('title', 'Edit User')

@section('body')

    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">User Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">User</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit User</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->
    <div class="container-fluid px-4 py-4">
        <div class="row g-4">
            <div class="col-md-10 offset-md-1">
                <div class="card">
                    <div class="card-header border-bottom">
                        <h3 class="card-title">Edit User Info</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('user.update',$user->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="name" class="form-label">User Name</label>
                                <input type="text" id="name" class="form-control" name="name" value="{{ $user->name }}" placeholder="User Name">
                                <span class="text-danger">{{ $errors->has('name') ? $errors->first('name') : '' }}</span>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email Address</label>
                                <input type="email" id="email" class="form-control" name="email" value="{{ $user->email }}" placeholder="User Email">
                                <span class="text-danger">{{ $errors->has('email') ? $errors->first('email') : '' }}</span>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" id="password" class="form-control" name="password" value="" placeholder="User Password">
                                <span class="text-danger">{{ $errors->has('password') ? $errors->first('password') : '' }}</span>
                            </div>
                            <div class="mb-3">
                                <label for="mobile" class="form-label">Mobile Number</label>
                                <input type="number" id="mobile" class="form-control" name="mobile" value="{{ $user->mobile }}" placeholder="User Mobile">
                                <span class="text-danger">{{ $errors->has('mobile') ? $errors->first('mobile') : '' }}</span>
                            </div>
                            <div class="mb-3">
                                <label for="lastName" class="form-label">Select Role</label>
                                <select class="form-control" name="role" required>
                                    <option value="" disabled selected> -- Select Role -- </option>
                                    <option value="1" @selected($user->role == 1)>Admin</option>
                                    <option value="2" @selected($user->role == 2)>Manager</option>
                                    <option value="3" @selected($user->role == 3)>Executive</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">User Image</label>
                                <input type="file" class="form-control" name="image" id="imgInp">
                                <img src="{{ asset($user->profile_photo_path) }}" class="mt-3" id="categoryImage" height="70" width="70" alt="">
                                <span class="text-danger">{{ $errors->has('image') ? $errors->first('image') : '' }}</span>
                            </div>
                            <button type="submit" class="btn btn-primary rounded-0 float-end">Update User Info</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
