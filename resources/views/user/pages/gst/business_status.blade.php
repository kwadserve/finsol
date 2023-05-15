@extends('user.layouts.app')
@section('content')
<!-- ===============================================-->
<!--    Main Content-->
<!-- ===============================================-->
<main class="main" id="top">
    <div class="container" data-layout="container">
        @include('user.partials.header')
        <div class="content">
            @include('user.partials.aside')
            <div class="row g-3">
                <div class="col-md-12 col-xxl-3">
                    <div class="card h-md-100 ecommerce-card-min-width">
                        <!-- ============================================-->
                        <!-- <section> begin ============================-->
                        <section class="text-center">
                            <div class="container">
                                <div class="row">
                                    <div class="col">
                                        <h1 style="color: #2a3468;" class="fs-2 fs-sm-4 fs-md-5">
                                            <font color="#ec465f">Business Status</font>
                                        </h1>
                                        <p class="lead">Things you will get right out of the box with Finsol.</p>
                                    </div>
                                </div>

                                <!------ GST options drop ------->



                                <div class="row mt-2 g-3">
                                    @if($userGstDetails)
                                    @foreach($userGstDetails as $detail)
                                    <div class="col-lg-4 border-top border-bottom">
                                        <div class="h-100">
                                            <div class="text-center p-4">
                                                <h2 class="fw-normal my-0">{{$detail->gst_type}}</h2>
                                                <p class="mt-3">For teams that need to create project plans with
                                                    confidence.</p>
                                                <h4 class="fw-medium my-4">
                                                    @if($detail->status == 2)
                                                    <span>Query Raised</span>
                                                    @else
                                                    <span>Approved</span>
                                                    @endif
                                                </h4>
                                                @if($detail->status == 2)
                                                <a class="btn btn-outline-primary"
                                                    href="../../app/e-commerce/billing.html">Add Note</a>
                                                @endif
                                            </div>
                                            <hr class="border-bottom-0 m-0">

                                        </div>
                                    </div>
                                    @endforeach
                                    @endif
                                </div>

                                <!------ GST options drop close ------->
                            </div>
                    </div><!-- end of .container-->
                    </section><!-- <section> close ============================-->
                    <!-- ============================================-->



                </div>
            </div>
            @include('user.partials.footer')
        </div>
    </div>
    </div>
</main><!-- ===============================================-->
<!--    End of Main Content-->
<!-- ===============================================-->
@endsection