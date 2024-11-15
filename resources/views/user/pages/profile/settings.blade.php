@extends('user.layouts.app')
@section('content')
@php
$state = App\Models\State::where('id', $user->state)->first()->name;
$district = App\Models\District::where('id', $user->district)->first()->name;
$block = App\Models\Block::where('id', $user->block)->first()->name;
@endphp
    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
        <div class="container" data-layout="container">
            @include('user.partials.header')
            <div class="content">
                @include('user.partials.aside')
                <div class="row">
                    <div class="col-12">
                        <div class="card mb-3 btn-reveal-trigger">
                            <div class="card-header position-relative min-vh-25 mb-8">
                                <div class="cover-image">
                                    <div class="bg-holder rounded-3 rounded-bottom-0"
                                        style="background-image:url({{url('assets/img/generic/4.jpg')}});"></div>
                                    <!--/.bg-holder-->
                                    <input class="d-none" id="upload-cover-image" type="file" /><label
                                        class="cover-image-file-input" for="upload-cover-image"><span
                                            class="fas fa-camera me-2"></span><span>Change cover photo</span></label>
                                </div>
                                <div class="avatar avatar-5xl avatar-profile shadow-sm img-thumbnail rounded-circle">
                                    <div class="h-100 w-100 rounded-circle overflow-hidden position-relative"> <img
                                            src="{{url('assets/img/team/2.jpg')}}" width="200" alt=""
                                            data-dz-thumbnail="data-dz-thumbnail" /><input class="d-none" id="profile-image"
                                            type="file" /><label class="mb-0 overlay-icon d-flex flex-center"
                                            for="profile-image"><span class="bg-holder overlay overlay-0"></span><span
                                                class="z-1 text-white dark__text-white text-center fs--1"><span
                                                    class="fas fa-camera"></span><span
                                                    class="d-block">Update</span></span></label></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row g-0">
                    <div class="col-lg-12 pe-lg-2">
                        <div class="card mb-3">
                            <div class="card-header">
                                <h5 class="mb-0">Profile Settings</h5>
                            </div>
                            <div class="card-body bg-light">
                                <form class="row g-3">
                                    <div class="col-lg-6"> <label class="form-label" for="first-name">Full
                                            Name</label><input class="form-control" id="first-name" type="text"
                                            value="{{$user->name}}" /></div>
                                    <div class="col-lg-6"> <label class="form-label" for="last-name">Aadhaar Number</label><input
                                            class="form-control" id="last-name" type="text" value="{{$user->aadhaar}}" /></div>
                                    <div class="col-lg-6"> <label class="form-label" for="email1">Email</label><input
                                            class="form-control" id="email1" type="text" value="{{$user->email}}" />
                                    </div>
                                    <div class="col-lg-6"> <label class="form-label" for="email2">Phone</label><input
                                            class="form-control" id="email2" type="text" value="{{$user->phone}}" /></div>
                                    <div class="col-lg-12"><label class="form-label" for="email3">Block</label><input
                                            class="form-control" id="email3" type="text" value="{{$block}}" />
                                    </div>
                                    <div class="col-lg-12"><label class="form-label" for="email4">District</label><input
                                        class="form-control" id="email4" type="text" value="{{$district}}" />
                                    </div>
                                    <div class="col-lg-12"><label class="form-label" for="email5">State</label><input
                                        class="form-control" id="email5" type="text" value="{{$state}}" />
                                    </div>
                                    <div class="col-12 d-flex justify-content-end"><button class="btn btn-primary"
                                            type="submit">Update </button></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @include('user.partials.footer')
            </div>
        </div>
    </main>
    <!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->
    <!--- add Partner JS  -->
@endsection
