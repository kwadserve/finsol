@extends('admin.layouts.admin')

{{--@push('custom_styles')--}}
{{--@endpush--}}

@section('content')
<!-- ===============================================-->
<!--    Main Content-->
<!-- ===============================================-->
<main class="main" id="top">
    <div class="container" data-layout="container">
        @include('admin.partials.aside')
        <div class="row g-3 mb-3">

            <div class="col-md-12 col-xxl-3">


                <div class="card h-md-100 ecommerce-card-min-width">
                    <div class="card-header pb-0">
                        <h6 class="mb-0 mt-2 d-flex align-items-center">USER PROFILE </h6>
                    </div>
                    <div class="card-body d-flex flex-column justify-content-end">
                        <div class="row">
                            <div class="col-12">

                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title">GST Overview</h5>
                                                <p class="card-text">With supporting text below as a natural lead-in to
                                                    additional content.</p>
                                                <a href="{{ URL('/admin/user/gst/details/'.$userId )}}"
                                                    class="btn btn-primary">GST</a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title">Copy of Returns</h5>
                                                <p class="card-text">With supporting text below as a natural lead-in to
                                                    additional content.</p>
                                                <a href="{{ URL('/admin/user/gst/copyofreturns/'.$userId )}}"
                                                    class="btn btn-primary">Copy of Returns</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title"> User Documents </h5>
                                                <p class="card-text">With supporting text below as a natural lead-in to
                                                    additional content.</p>
                                                <a href="{{ URL('/admin/user/gst/uploaddocuments/'.$userId )}}"
                                                    class="btn btn-primary"> Documents</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                                <div class="row mt-3">
                                    <div class="col-sm-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title">Registrations</h5>
                                                <p class="card-text">With supporting text below as a natural lead-in to
                                                    additional content.</p>
                                                <a href="{{ URL('/admin/user/forms/dashboard/details/'.$userId )}}"
                                                    class="btn btn-primary">Registrations</a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title">Companies Act</h5>
                                                <p class="card-text">With supporting text below as a natural lead-in to
                                                    additional content.</p>
                                                <a href="{{ URL('/admin/user/companiesact/dashboard/details/'.$userId )}}"
                                                    class="btn btn-primary">Companies Act</a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title">Certification</h5>
                                                <p class="card-text">With supporting text below as a natural lead-in to
                                                    additional content.</p>
                                                <a href="{{ URL('/admin/user/certification/dashboard/details/'.$userId )}}"
                                                    class="btn btn-primary">Certification</a>
                                            </div>
                                        </div>
                                    </div>

                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('admin.partials.footer')
    </div>
</main><!-- ===============================================-->
<!--    End of Main Content-->
<!-- ===============================================-->
@endsection