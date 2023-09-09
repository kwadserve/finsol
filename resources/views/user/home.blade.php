@extends('user.layouts.app')

@section('content')
    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
        <div class="container" data-layout="container">
            <script>
                var isFluid = JSON.parse(localStorage.getItem('isFluid'));
                if (isFluid) {
                    var container = document.querySelector('[data-layout]');
                    container.classList.remove('container');
                    container.classList.add('container-fluid');
                }
            </script>



            @include('user.partials.header')

            <script>
                var navbarPosition = localStorage.getItem('navbarPosition');
                var navbarVertical = document.querySelector('.navbar-vertical');
                var navbarTopVertical = document.querySelector('.content .navbar-top');
                var navbarTop = document.querySelector('[data-layout] .navbar-top:not([data-double-top-nav');
                var navbarDoubleTop = document.querySelector('[data-double-top-nav]');
                var navbarTopCombo = document.querySelector('.content [data-navbar-top="combo"]');

                if (localStorage.getItem('navbarPosition') === 'double-top') {
                    document.documentElement.classList.toggle('double-top-nav-layout');
                }

                if (navbarPosition === 'top') {
                    navbarTop.removeAttribute('style');
                    navbarTopVertical.remove(navbarTopVertical);
                    navbarVertical.remove(navbarVertical);
                    navbarTopCombo.remove(navbarTopCombo);
                    navbarDoubleTop.remove(navbarDoubleTop);
                } else if (navbarPosition === 'combo') {
                    navbarVertical.removeAttribute('style');
                    navbarTopCombo.removeAttribute('style');
                    navbarTop.remove(navbarTop);
                    navbarTopVertical.remove(navbarTopVertical);
                    navbarDoubleTop.remove(navbarDoubleTop);
                } else if (navbarPosition === 'double-top') {
                    navbarDoubleTop.removeAttribute('style');
                    navbarTopVertical.remove(navbarTopVertical);
                    navbarVertical.remove(navbarVertical);
                    navbarTop.remove(navbarTop);
                    navbarTopCombo.remove(navbarTopCombo);
                } else {
                    navbarVertical.removeAttribute('style');
                    navbarTopVertical.removeAttribute('style');
                    navbarTop.remove(navbarTop);
                    navbarDoubleTop.remove(navbarDoubleTop);
                    navbarTopCombo.remove(navbarTopCombo);
                }
            </script>
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
                                            {{ Auth::user()->name }}! <br>Welcome to <font color="#ec465f">Finsol</font>
                                        </h1>
                                        <p class="lead">Explore things you will get right out of the box with Finsol.</p>
                                    </div>
                                </div>
                                <!--    <div class="row mt-6">
                                        <div class="col-lg-4">
                                            <div onclick="location.href='{{ route('gst') }}'" type="button">
                                                <div class="card card-span h-100">
                                                    <div class="roundlogobg card-span-img">
                                                        <h2 class="roundtext">GST</h2>
                                                    </div>
                                                    <div class="card-body pt-6 pb-4">
                                                        <h5 class="mb-2">GST</h5>
                                                        <p>One of the best cloud platforms to make new GST registration, analyse
                                                            taxes, manage
                                                            filings and services online at one place</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-4 mt-6 mt-lg-0">
                                            <div onclick="location.href='{{ route('pan.register_form') }}'" type="button">
                                                <div class="card card-span h-100">
                                                    <div class="roundlogobgred card-span-img">
                                                        <h2 class="roundtext">PAN</h2>
                                                    </div>
                                                    <div class="card-body pt-6 pb-4">
                                                        <h5 class="mb-2">PAN</h5>
                                                        <p>With your purchased copy of Falcon, you will get all the uncompressed
                                                            & documented SCSS and
                                                            Javascript source code files.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 mt-6 mt-lg-0">
                                            <div onclick="location.href='{{ route('tan.register_form') }}'" type="button">
                                                <div class="card card-span h-100">
                                                    <div class="roundlogobg card-span-img">
                                                        <h2 class="roundtext">TAN</h2>
                                                    </div>
                                                    <div class="card-body pt-6 pb-4">
                                                        <h5 class="mb-2">TAN</h5>
                                                        <p>All the painful or time-consuming tasks in your development workflow
                                                            such as compiling the
                                                            SCSS or transpiring the JS are automated.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row mt-6">
                                        <div class="col-lg-4">
                                            <div onclick="location.href='{{ route('epf.register_form') }}'" type="button">
                                                <div class="card card-span h-100">
                                                    <div class="roundlogobgred card-span-img">
                                                        <h2 class="roundtext">EPF</h2>
                                                    </div>
                                                    <div class="card-body pt-6 pb-4">
                                                        <h5 class="mb-2">EPF</h5>
                                                        <p>Build your webapp with the world's most popular front-end component
                                                            library along with
                                                            Falcon's 32 sets of carefully designed elements.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 mt-6 mt-lg-0">
                                            <div onclick="location.href='{{ route('esic.register_form') }}'" type="button">
                                                <div class="card card-span h-100">
                                                    <div class="roundlogobg card-span-img">
                                                        <h2 class="roundtext">ESIC</h2>
                                                    </div>
                                                    <div class="card-body pt-6 pb-4">
                                                        <h5 class="mb-2">ESIC</h5>
                                                        <p>With your purchased copy of Falcon, you will get all the uncompressed
                                                            & documented SCSS and
                                                            Javascript source code files.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 mt-6 mt-lg-0">
                                            <div onclick="location.href='{{ route('trademark.register_form') }}'" type="button">
                                                <div class="card card-span h-100">
                                                    <div class="roundlogobgred card-span-img">
                                                        <h2 class="roundtext">TM</h2>
                                                    </div>
                                                    <div class="card-body pt-6 pb-4">
                                                        <h5 class="mb-2">Trademark</h5>
                                                        <p>With your purchased copy of Falcon, you will get all the uncompressed
                                                            & documented SCSS and
                                                            Javascript source code files.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->


                            </div><!-- end of .container-->
                        </section><!-- <section> close ============================-->
                        <!-- ============================================-->



                    </div>
                </div>


                @include('user.partials.footer')
            </div>
            @include('user.partials.authmodal')
        </div>
    </main><!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->




    <!-- <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Dashboard Page for User</div>

                        <div class="card-body">
                            @if (session('status'))
    <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
    @endif

                            You are logged in!
                        </div>
                        
                    </div>
                </div>
            </div>
        </div> -->
@endsection
