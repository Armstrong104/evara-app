@extends('admin.master')

@section('title', 'Manage Size')

@section('body')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Size Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Size</a></li>
                <li class="breadcrumb-item active" aria-current="page">Manage Size</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->
    <div class="container-fluid px-4 py-4">
        <div class="row row-sm">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header border-bottom">
                        <h3 class="card-title">Manage Size Table</h3>
                    </div>
                    <div class="card-body">
                        @include('admin.notify')
                        <div class="table-responsive">
                            <table class="table table-bordered text-nowrap border-bottom" id="example3">
                                <thead>
                                    <tr class="text-center">
                                        <th scope="col">Sl No</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Code</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sizes as $size)
                                        <tr class="text-center">
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $size->name }}</td>
                                            <td>{{ $size->code }}</td>
                                            <td>{{ $size->description }}</td>
                                            <td>{{ $size->status == 1 ? 'Published' : 'Unpublished' }}</td>
                                            <td>
                                                <div class="d-flex gap-2 justify-content-center">
                                                    <a href="{{ route('size.edit', $size->id) }}"
                                                        class="btn btn-sm btn-outline-success"><i
                                                            class="fa fa-edit"></i></a>
                                                    <form action="{{ route('size.destroy', $size->id) }}" method="POST">
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
    </div>
@endsection
