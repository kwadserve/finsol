@extends('user.layouts.app')
@section('content')
@php
use App\Models\UserGstDetail;
@endphp
<!-- ===============================================-->
<!--    Main Content-->
<!-- ===============================================-->
<main class="main" id="top">
    <div class="container" data-layout="container">
        @include('user.partials.header')
        <div class="content">
            @include('user.partials.aside')
            <div class="row g-3">
                <div class="col-xl-12">
                    <div class="card mb-3">
                        <!-- ============================================-->
                        <!-- <section> begin ============================-->
                        <section class="text-center">
                            <div class="card-body">
                                 <div class="row">
                                    <div class="col">
                                        <h1 style="color: #2a3468;" class="fs-2 fs-sm-4 fs-md-5">Certification<font
                                                color="#ec465f">Status
                                            </font>
                                        </h1>
                                        <p class="lead">Things you will get right out of the box with Finsol.</p>
                                    </div>
                                </div>  

                                <!------ GST options drop ------->

                                <div class="row mt-2 g-3">
                                    <div class="card-body" bis_skin_checked="1">

                                        <div class="table-responsive scrollbar">
                                            <div class="container">
                                                <div class="col-md-12">
                                                    <div class="panel panel-default">
                                                        <div class="panel-body">
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
                                                            @include('user.pages.certification.dashboard.ca')
                                                            @include('user.pages.certification.dashboard.networth')
                                                            @include('user.pages.certification.dashboard.turnover')                                                       
                                                                                              
                                                        </div>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!------ GST options drop close ------->
                            </div><!-- end of .container-->
                        </section><!-- <section> close ============================-->
                        <!-- ============================================-->
                    </div>
                </div>
            </div>
            @include('user.partials.footer')
        </div>
    </div>
</main><!-- ===============================================-->
<!--    End of Main Content-->
<!-- ===============================================-->
@endsection

<style>
.hiddenRow {
    padding: 0 !important;
}

.hiddenRow1 {
    padding: 0 !important;
}

.hiddenRow2 {
    padding: 0 !important;
}
</style>



<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" crossorigin="anonymous">
</script>

<script>

// window.onload = function() {
//     var errorMessage = document.querySelector('.alert-danger');
//     errorMessage.scrollIntoView({ behavior: 'smooth', block: 'start' });
// };
</script>