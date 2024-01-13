@extends('admin.master')

@section('title', 'Manage Purchase Guide')

@section('body')

    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Purchase Guide Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Purchase Guide</a></li>
                <li class="breadcrumb-item active" aria-current="page">Manage Purchase Guide</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->
    <div class="container-fluid px-4 py-4">
        <div class="row g-4">
            <div class="col-md-10 offset-md-1">
                <div class="card">
                    <div class="card-header border-bottom">
                        <h3 class="card-title">Purchase Guide Form</h3>
                    </div>
                    <div class="card-body">
                        <span class="text-center">@include('notify')</span>
                        <form action="{{ route('setting.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Company Name</label>
                                <input type="text" class="form-control" name="company_name" value="{{ $setting->company_name }}">
                                <span class="text-danger">{{ $errors->has('company_name') ? $errors->first('company_name') : '' }}</span>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Company Slogan</label>
                                <input type="text" class="form-control" name="slogan" value="{{ $setting->slogan }}">

                            </div>
                            <div class="mb-3">
                                <label class="form-label">Company Title</label>
                                <input type="text" class="form-control" name="title" value="{{ $setting->title }}">

                            </div>
                            <div class="mb-3">
                                <label class="form-label">Contact Phone</label>
                                <input type="number" class="form-control" name="contact_phone" value="{{ $setting->contact_phone }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Support Phone</label>
                                <input type="number" class="form-control" name="support_phone" value="{{ $setting->support_phone }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Contact Email</label>
                                <input type="email" class="form-control" name="contact_email" value="{{ $setting->contact_email }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Support Email</label>
                                <input type="email" class="form-control" name="support_email" value="{{ $setting->support_email }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Office Hour</label>
                                <input type="text" class="form-control" name="office_hour" value="{{ $setting->office_hour }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Facebook Link</label>
                                <input type="text" class="form-control" name="facebook_link" value="{{ $setting->facebook_link }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Twitter Link</label>
                                <input type="text" class="form-control" name="twitter_link" value="{{ $setting->twitter_link }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Linkedin Link</label>
                                <input type="text" class="form-control" name="linkedin_link" value="{{ $setting->linkedin_link }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Youtube Link</label>
                                <input type="text" class="form-control" name="youtube_link" value="{{ $setting->youtube_link }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Instagram Link</label>
                                <input type="text" class="form-control" name="instagram_link" value="{{ $setting->instagram_link }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Google Map Api Link</label>
                                <textarea name="google_map_api_link" class="form-control" rows="3">{{  $setting->google_map_api_link  }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Android App Image</label>
                                <input type="file" class="dropify" data-height="200" name="android_app_image">
                                <img src="{{ asset( $setting->android_app_image) }}" alt="" height="150"/>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Android App Url Link</label>
                                <input type="text" class="form-control" name="android_app_url" value="{{ $setting->android_app_url }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Ios App Image</label>
                                <input type="file" class="dropify" data-height="200" name="ios_app_image" >
                                <img src="{{ asset( $setting->ios_app_image) }}" alt="" height="150"/>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Ios App Url Link</label>
                                <input type="text" class="form-control" name="ios_app_url" value="{{ $setting->ios_app_url }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Company Address</label>
                                <textarea name="company_address" class="form-control" rows="3">{{  $setting->company_address  }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Logo Jpg</label>
                                <input type="file" class="dropify" data-height="200" name="logo_jpg" >
                                <img src="{{ asset( $setting->logo_jpg) }}" alt="" height="150"/>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Logo Png</label>
                                <input type="file" class="dropify" data-height="200" name="logo_png">
                                <img src="{{ asset( $setting->logo_png) }}" alt="" height="150"/>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Logo Favicon</label>
                                <input type="file" class="dropify" data-height="200" name="favicon">
                                <img src="{{ asset( $setting->favicon) }}" alt="" height="150"/>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Payment Method Image</label>
                                <input type="file" class="dropify" data-height="200" name="payment_method_image">
                                <img src="{{ asset( $setting->payment_method_image) }}" alt="" height="150"/>
                            </div>
                            <button type="submit" class="btn btn-primary rounded-0 float-end">Update Information</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
