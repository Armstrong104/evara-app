@extends('admin.master')


@section('title', 'Ad Info Details')

@section('body')

    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Ad Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Ad</a></li>
                <li class="breadcrumb-item active" aria-current="page">Ad Info Details</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->
    <div class="container-fluid px-4 py-4">
        <div class="row g-4">
            <div class="col-md-10 offset-md-1">
                <div class="card">
                    <div class="card-header bAd-bottom">
                        <h3 class="card-title">Ad Info Details </h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bAded table-hover">
                            <tr>
                                <th>Product Info</th>
                                <td>{{isset($ad->product->name) ? $ad->product->name : ' '}}</td>
                            </tr>
                            <tr>
                                <th>Ad Title</th>
                                <td>{{ $ad->title }}</td>
                            </tr>
                            <tr>
                                <th>Ad Sub Title</th>
                                <td>{{ $ad->sub_title }}</td>
                            </tr>
                            <tr>
                                <th>Offer Price</th>
                                <td>{{ $ad->offer_price }}</td>
                            </tr>
                            <tr>
                                <th>Discount</th>
                                <td>{{ $ad->discount }}</td>
                            </tr>
                            <tr>
                                <th>Position</th>
                                <td>{{ $ad->position }}</td>
                            </tr>

                            <tr>
                                <th>Image</th>
                                <td><img src="{{ asset($ad->image) }}" alt="" height="70"
                                    width="70"></td>
                            </tr>
                            <tr>
                                {{ $ad->status == 1 ? 'Published' : 'Unpublished' }}
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
