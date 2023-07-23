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
                        <h6 class="mb-0 mt-2 d-flex align-items-center">All User Related Form Details</h6>
                    </div>
                    <div class="card-body d-flex flex-column justify-content-end">
                     
                       @include('admin.pages.users.forms.pan_details') 
                       @include('admin.pages.users.forms.tan_details') 
                       @include('admin.pages.users.forms.epf_details')

                       @include('admin.pages.users.forms.esic_details')
                       @include('admin.pages.users.forms.trademark_details')
                       @include('admin.pages.users.forms.company_details')
                       @include('admin.pages.users.forms.partnership_details')

                       @include('admin.pages.users.forms.huf_details')
                       @include('admin.pages.users.forms.trust_details')
                       @include('admin.pages.users.forms.udamy_details')
                       @include('admin.pages.users.forms.importexport_details')

                       @include('admin.pages.users.forms.labour_details')
                       @include('admin.pages.users.forms.shop_details') 
                       @include('admin.pages.users.forms.iso_details') 

                       @include('admin.pages.users.forms.fssai_details')
                       @include('admin.pages.users.forms.itr_details') 
                       @include('admin.pages.users.forms.taxaudit_details') 
                       @include('admin.pages.users.forms.tds_details') 
                       @include('admin.pages.users.forms.factorylicense_details') 
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

<!-- {{--@push('custom_scripts)--}} -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    crossorigin="anonymous">
 
<script src="https://code.jquery.com/jquery-3.2.1.min.js" crossorigin="anonymous">
</script>
 
<!-- {{--@endpush--}} -->

 



