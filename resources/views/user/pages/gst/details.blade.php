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
            <div class="row g-3 mb-3">
                <div class="col-md-12 col-xxl-3">
                    <div class="card h-md-100 ecommerce-card-min-width">
                        <!-- ============================================-->
                        <!-- <section> begin ============================-->
                        <section class="text-center">
                            <div class="container">
                                <div class="row">
                                    <div class="col">
                                        <h1 style="color: #2a3468;" class="fs-2 fs-sm-4 fs-md-5">Hello
                                            {{Auth::user()->name}}, Welcome to
                                            <font color="#ec465f">Finsol GST</font>
                                        </h1>
                                        <p class="lead">Things you will get right out of the box with Finsol.</p>
                                    </div>

                                    <!------ GST options drop ------->
                                    <div class="row mt-6">
                                        <div class="col-lg-3">

                                            <div class="card card-span h-100">
                                                <div class="roundlogobg topcurves">
                                                    <h2 class="roundtext">Add Business</h2>
                                                </div>
                                                <div class="card-body">
                                                    <p>Add your existing GST business</p>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-lg-3">
                                            <div onclick="location.href='{{route('gst.register_form')}}'" type="button">
                                                <div class="card card-span h-100">
                                                    <div class="roundlogobg topcurves">
                                                        <h2 class="roundtext">New Registration</h2>
                                                    </div>
                                                    <div class="card-body">
                                                        <p>Add your existing GST business</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">

                                            <div class="card card-span h-100">
                                                <div class="roundlogobg topcurves">
                                                    <h2 class="roundtext">GSTR-1</h2>
                                                </div>
                                                <div class="card-body">
                                                    <p>Add your existing GST business</p>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-lg-3">

                                            <div class="card card-span h-100">
                                                <div class="roundlogobg topcurves">
                                                    <h2 class="roundtext">GSTR 2A Report</h2>
                                                </div>
                                                <div class="card-body">
                                                    <p>Add your existing GST business</p>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-lg-3 mt-4">

                                            <div class="card card-span h-100">
                                                <div class="roundlogobg topcurves">
                                                    <h2 class="roundtext">GSTR 3B</h2>
                                                </div>
                                                <div class="card-body">
                                                    <p>Add your existing GST business</p>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-lg-3 mt-4">

                                            <div class="card card-span h-100">
                                                <div class="roundlogobg topcurves">
                                                    <h2 class="roundtext">CMP 8</h2>
                                                </div>
                                                <div class="card-body">
                                                    <p>Add your existing GST business</p>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-lg-3 mt-4">

                                            <div class="card card-span h-100">
                                                <div class="roundlogobg topcurves">
                                                    <h2 class="roundtext">GSTR-9</h2>
                                                </div>
                                                <div class="card-body">
                                                    <p>Add your existing GST business</p>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-lg-3 mt-4">

                                            <div class="card card-span h-100">
                                                <div class="roundlogobg topcurves">
                                                    <h2 class="roundtext">GSTR 9C</h2>
                                                </div>
                                                <div class="card-body">
                                                    <p>Add your existing GST business</p>
                                                </div>
                                            </div>

                                        </div>

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