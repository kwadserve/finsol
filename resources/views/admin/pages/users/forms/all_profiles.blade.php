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
                                                            <button class="btn-close" type="button"
                                                                data-bs-dismiss="alert" aria-label="Close"></button>
                                                        </div>
                                                        @endif
                                 @include('admin.pages.users.forms.profile.pan_profile')
                                 @include('admin.pages.users.forms.profile.tan_profile')
                                 @include('admin.pages.users.forms.profile.epf_profile')

                                 @include('admin.pages.users.forms.profile.esic_profile')
                                 @include('admin.pages.users.forms.profile.trademark_profile')
                                 @include('admin.pages.users.forms.profile.company_profile')
                                 @include('admin.pages.users.forms.profile.partnership_profile')

                                 @include('admin.pages.users.forms.profile.huf_profile')
                                 @include('admin.pages.users.forms.profile.trust_profile')
                                 @include('admin.pages.users.forms.profile.udamy_profile')
                                 @include('admin.pages.users.forms.profile.importexport_profile')

                                 @if($labourDetails)
                                    @include('admin.pages.users.forms.profile.labour_profile')
                                 @endif

                                 @include('admin.pages.users.forms.profile.shop_profile')
                                
                                 @include('admin.pages.users.forms.profile.iso_profile')
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
 

