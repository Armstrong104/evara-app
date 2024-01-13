@extends('admin.master')

@section('title', 'Manage User')

@section('body')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">User Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">User</a></li>
                <li class="breadcrumb-item active" aria-current="page">Manage User</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->
    <div class="row row-sm">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">All User Info</h3>
                </div>
                <div class="card-body">
                    <span class="text-center">@include('notify')</span>
                    <div class="table-responsive">
                        <table class="table table-bordered text-nowrap border-bottom" id="example3">
                            <thead>
                                <tr class="text-center">
                                    <th scope="col">Sl No</th>
                                    <th scope="col">User Name</th>
                                    <th scope="col">Email Address</th>
                                    <th scope="col">Mobile</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr class="text-center">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->mobile }}</td>
                                        <td><img src="{{ asset($user->profile_photo_path) }}" alt="" height="70"
                                                width="70">
                                        </td>
                                        <td>
                                            @if ($user->role == 1)
                                                Admin
                                            @elseif ($user->role == 2)
                                                Manager
                                            @elseif ($user->role == 3)
                                                Executive
                                            @endif
                                        </td>
                                        <td>
                                            <div class="d-flex gap-2 justify-content-center">
                                                <a href="{{ route('user.edit', $user->id) }}"
                                                    class="btn btn-sm btn-outline-success"><i class="fa fa-edit"></i></a>
                                                <form action="{{ route('user.destroy', $user->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-outline-danger"
                                                        onclick="return confirm('Are you sure?')"><i
                                                            class="fa fa-trash"></i></button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
