@extends('admin.layouts.admin')

{{-- @push('custom_styles') --}}
{{-- @endpush --}}

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

                        <div class="card-body d-flex flex-column justify-content-end">
                            <div class="row">
                                <div class="col-12">
                                    <div class="row">

                                        <!------------------section 1----------------->
                                        <div class="col-lg-12 pe-lg-2">
                                            @if (session('filenotexist'))
                                                <div class="alert alert-danger border-2 d-flex align-items-center"
                                                    role="alert">
                                                    <div class="bg-danger me-3 icon-item"><span
                                                            class="fas fa-check-circle text-white fs-3"></span>
                                                    </div>
                                                    <p class="mb-0 flex-1">{{ session('filenotexist') }}</p>
                                                    <button class="btn-close" type="button" data-bs-dismiss="alert"
                                                        aria-label="Close"></button>
                                                </div>
                                            @endif

                                            @if ($details)
                                                <div class="card mb-3">
                                                    <div class="card-header">
                                                        <h5 class="mb-0">Legal Work Details</h5>
                                                    </div>
                                                    <div class="card-body bg-light row">
                                                        <div class="col-lg-6 mb-3"> <label class="form-label"
                                                                for="gst-type">Name of Compaany :
                                                            </label>{{ $details->name_of_company }}</div>
                                                        <div class="col-lg-6 mb-3"> <label class="form-label"
                                                                for="pan-number">Company Number :
                                                            </label>{{ $details->company_number }}</div>
                                                        <div class="col-lg-6 mb-3"> <label class="form-label"
                                                                for="mobile">Mobile :
                                                            </label>{{ $details->mobile_number }}</div>
                                                        <div class="col-lg-6 mb-3"> <label class="form-label"
                                                                for="email1">Email : </label>{{ $details->email_id }}
                                                        </div>

                                                    </div>
                                                </div>
                                                @if (session('filenotexistsection1'))
                                                    <div class="alert alert-danger border-2 d-flex align-items-center"
                                                        role="alert">
                                                        <div class="bg-danger me-3 icon-item"><span
                                                                class="fas fa-check-circle text-white fs-3"></span>
                                                        </div>
                                                        <p class="mb-0 flex-1">{{ session('filenotexistsection1') }}</p>
                                                        <button class="btn-close" type="button" data-bs-dismiss="alert"
                                                            aria-label="Close"></button>
                                                    </div>
                                                @endif

                                                @if ($details->type == 'New CA Registration')
                                                    <div class="card mb-3">

                                                        <div class="card-header">
                                                            <h5 class="mb-0">Documents</h5>
                                                        </div>
                                                        <div class="card-body bg-light">

                                                            @include(
                                                                'admin.pages.users.legalWork.profile.common',
                                                                [
                                                                    'documents' => $documents,
                                                                    'form_type' => 'Legal',
                                                                    'details' => $details,
                                                                ]
                                                            )
                                                        </div>

                                                    </div>
                                                @endif
                                            @endif

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

<script>
    $(document).ready(function() {
        setTimeout(function() {
            $(".alert-success").fadeOut("slow", function() {
                $(this).remove();
            });
            $(".alert-danger").fadeOut("slow", function() {
                $(this).remove();
            });
        }, 3000);
    });
</script>
