@extends('admin.master')

@section('title', 'Manage Courier')

@section('body')

    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Courier Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Courier</a></li>
                <li class="breadcrumb-item active" aria-current="page">Manage Courier</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->
    <div class="row row-sm">
        <div class="col-12">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Manage Courier Table</h3>
                </div>
                <div class="card-body">
                    <span class="text-center">@include('notify')</span>
                    <div class="table-responsive">
                        <table class="table table-bordered text-nowrap border-bottom" id="example3">
                            <thead>
                                <tr class="text-center">
                                    <th scope="col">Sl No</th>
                                    <th scope="col">Courier Name</th>
                                    <th scope="col">Courier Email</th>
                                    <th scope="col">Courier Mobile</th>
                                    <th scope="col">Courier Address</th>
                                    <th scope="col">Shipping Cost</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($couriers as $courier)
                                    <tr class="text-center">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $courier->name }}</td>
                                        <td>{{ $courier->email }}</td>
                                        <td>{{ $courier->mobile }}</td>
                                        <td>{{ $courier->address }}</td>
                                        <td>{{ $courier->shipping_cost }}</td>
                                        <td>{{ $courier->status == 1 ? 'Available' : 'Unavailable' }}</td>
                                        <td>
                                            <div class="d-flex gap-2 justify-content-center">
                                                <a href="{{ route('courier.edit', $courier->id) }}"
                                                    class="btn btn-sm btn-outline-success"><i class="fa fa-edit"></i></a>
                                                <form action="{{ route('courier.destroy', $courier->id) }}"
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
