@extends('admin.master')

@section('title', 'Manage Ad Info')

@section('body')

    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Ad Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Ad</a></li>
                <li class="breadcrumb-item active" aria-current="page">Manage Ad</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->
    <div class="row row-sm">
        <div class="col-12">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">All Ad Info</h3>
                </div>
                <div class="card-body">
                    <span class="text-center">@include('notify')</span>
                    <div class="table-responsive">
                        <table class="table table-bordered text-nowrap border-bottom" id="example3">
                            <thead>
                                <tr class="text-center">
                                    <th scope="col">Sl No</th>
                                    <th scope="col">Product Info</th>
                                    <th scope="col">Ad Title</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ads as $ad)
                                    <tr class="text-center">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ isset($ad->product->name) ? $ad->product->name : ' ' }}</td>
                                        <td>{{ $ad->title }}</td>
                                        <td>
                                            <img src="{{ asset($ad->image) }}" alt="" height="70"
                                                width="70">
                                        </td>
                                        <td>{{ $ad->status == 1 ? 'Published' : 'Unpublished' }}</td>
                                        <td>
                                            <div class="d-flex gap-2 justify-content-center">
                                                <a href="{{ route('ad.show', $ad->id) }}"
                                                    class="btn btn-sm btn-outline-success"><i class="fa fa-eye"></i></a>
                                                <a href="{{ route('ad.edit', $ad->id) }}"
                                                    class="btn btn-sm btn-outline-success"><i class="fa fa-edit"></i></a>
                                                <form action="{{ route('ad.destroy', $ad->id) }}"
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
