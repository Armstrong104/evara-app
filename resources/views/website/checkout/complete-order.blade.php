@extends('website.master')

@section('title', 'Complete Order Page')

@section('body')
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="index-2.html" rel="nofollow">Order</a>
                <span></span> Shop
                <span></span> Checkout
            </div>
        </div>
    </div>

    <section class="py-5 bg-secondary-light">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="card card-body">
                        <p class="text-center">{{ session('msg') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
