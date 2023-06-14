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
                                 @include('admin.pages.users.gst.section1')

                                  <!------------------section 2----------------->
                                  @include('admin.pages.users.gst.section2')

                                   <!------------------section 3----------------->
                                  
                                 @include('admin.pages.users.gst.partnerslist')
                                 @include('admin.pages.users.gst.companylist')

                                 
           

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

 

 

