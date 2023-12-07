@extends('admin.layouts.admin')

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
                            <h6 class="mb-0 mt-2 d-flex align-items-center">All User Related Form Details</h6>
                        </div>
                        <div class="card-body d-flex flex-column justify-content-end">

                            @if (session('success'))
                                <div class="alert alert-success border-2 d-flex align-items-center"
                                    role="alert">
                                    <div class="bg-success me-3 icon-item"><span
                                            class="fas fa-check-circle text-white fs-3"></span>
                                    </div>
                                    <p class="mb-0 flex-1">{{ session('success') }}</p>
                                    <button class="btn-close" type="button"
                                        data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif
                            @include('admin.pages.users.certification.ca_details');
                            @include('admin.pages.users.certification.networth_details');
                            @include('admin.pages.users.certification.turnover_details');
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

@include('admin.pages.users.modal')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.2.1.min.js" crossorigin="anonymous"></script>
