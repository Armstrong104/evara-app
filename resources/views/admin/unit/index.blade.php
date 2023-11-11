@extends('admin.master')

@section('title', 'Manage Unit')

@section('body')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Unit Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Unit</a></li>
                <li class="breadcrumb-item active" aria-current="page">Manage Unit</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->
    <div class="container-fluid px-4 py-4">
        <div class="row row-sm">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header border-bottom">
                        <h3 class="card-title">Manage Unit Table</h3>
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
                                    @foreach ($units as $unit)
                                        <tr class="text-center">
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $unit->name }}</td>
                                            <td>{{ $unit->code }}</td>
                                            <td>{{ $unit->description }}</td>
                                            <td>{{ $unit->status == 1 ? 'Published' : 'Unpublished' }}</td>
                                            <td>
                                                <div class="d-flex gap-2 justify-content-center">
                                                    <a href="{{ route('unit.edit', $unit->id) }}"
                                                        class="btn btn-sm btn-outline-success"><i
                                                            class="fa fa-edit"></i></a>
                                                    <form action="{{ route('unit.destroy', $unit->id) }}" method="POST">
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
