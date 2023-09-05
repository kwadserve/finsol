<!DOCTYPE html>
<html data-bs-theme="light" lang="en-US" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>Finsol | Sampurna Suvidha Kendra</title>

    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/img/favicons/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/img/favicons/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/img/favicons/favicon-16x16.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicons/favicon.ico') }}">
    <link rel="manifest" href="{{ asset('assets/img/favicons/manifest.json') }}">
    <meta name="msapplication-TileImage" content="{{ asset('assets/img/favicons/mstile-150x150.png') }}">
    <meta name="theme-color" content="#ffffff">
    <script src="{{ asset('assets/js/config.js') }}"></script>
    <script src="{{ asset('vendors/simplebar/simplebar.min.js') }}"></script>

    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link href="{{ asset('vendors/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com/">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700%7cPoppins:300,400,500,600,700,800,900&amp;display=swap"
        rel="stylesheet">
    <link href="{{ asset('vendors/simplebar/simplebar.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/theme-rtl.min.css') }}" rel="stylesheet" id="style-rtl">
    <link href="{{ asset('assets/css/theme.min.css') }}" rel="stylesheet" id="style-default">
    <link href="{{ asset('assets/css/user-rtl.min.css') }}" rel="stylesheet" id="user-style-rtl">
    <link href="{{ asset('assets/css/user.min.css') }}" rel="stylesheet" id="user-style-default">
    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet" id="user-style-default">
    <script>
        var isRTL = JSON.parse(localStorage.getItem('isRTL'));
        if (isRTL) {
            var linkDefault = document.getElementById('style-default');
            var userLinkDefault = document.getElementById('user-style-default');
            linkDefault.setAttribute('disabled', true);
            userLinkDefault.setAttribute('disabled', true);
            document.querySelector('html').setAttribute('dir', 'rtl');
        } else {
            var linkRTL = document.getElementById('style-rtl');
            var userLinkRTL = document.getElementById('user-style-rtl');
            linkRTL.setAttribute('disabled', true);
            userLinkRTL.setAttribute('disabled', true);
        }
    </script>
</head>

<link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet" id="custom">
<style>
    .card-span .card-span-img {
        border-radius: 1rem;
    }
</style>

<body>
    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
        <nav class="navbar navbar-standard navbar-expand-lg fixed-top navbar-dark"
            data-navbar-darken-on-scroll="data-navbar-darken-on-scroll">
            <div class="container"><a class="navbar-brand" href="{{ route('home') }}"><img class="logoimgwidth"
                        src="{{ asset('assets/img/logos/finsollogo.svg') }}"></a><button
                    class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarStandard" aria-controls="navbarStandard" aria-expanded="false"
                    aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse scrollbar" id="navbarStandard">

                    <ul class="navbar-nav ms-auto">

                        <li class="nav-item dropdown"><a class="nav-link logincolor" href="#about" role="button"
                                aria-haspopup="true" aria-expanded="false">About</a>
                        </li>

                        <li class="nav-item dropdown"><a class="nav-link logincolor" href="#services" role="button"
                                aria-haspopup="true" aria-expanded="false">Services</a>
                        </li>

                        <li class="nav-item dropdown"><a class="nav-link logincolor" href="#contact" role="button"
                                aria-haspopup="true" aria-expanded="false">Contact</a>
                        </li>

                        @auth
                            <li class="nav-item dropdown"><a class="nav-link logincolor" href="{{ route('home') }}"
                                    role="button" aria-haspopup="true" aria-expanded="false">Dashboard</a>
                            @else
                            <li class="nav-item dropdown"><a class="nav-link logincolor" href="{{ route('login_page') }}"
                                    role="button" aria-haspopup="true" aria-expanded="false">Login</a>
                            </li>
                        @endauth




                    </ul>
                </div>
            </div>
        </nav>


        <style>
            [data-custom-class='body'],
            [data-custom-class='body'] * {
                background: transparent !important;
            }

            [data-custom-class='title'],
            [data-custom-class='title'] * {
                font-family: Arial !important;
                font-size: 26px !important;
                color: #000000 !important;
            }

            [data-custom-class='subtitle'],
            [data-custom-class='subtitle'] * {
                font-family: Arial !important;
                color: #595959 !important;
                font-size: 14px !important;
            }

            [data-custom-class='heading_1'],
            [data-custom-class='heading_1'] * {
                font-family: Arial !important;
                font-size: 19px !important;
                color: #000000 !important;
            }

            [data-custom-class='heading_2'],
            [data-custom-class='heading_2'] * {
                font-family: Arial !important;
                font-size: 17px !important;
                color: #000000 !important;
            }

            [data-custom-class='body_text'],
            [data-custom-class='body_text'] * {
                color: #595959 !important;
                font-size: 14px !important;
                font-family: Arial !important;
            }

            [data-custom-class='link'],
            [data-custom-class='link'] * {
                color: #3030F1 !important;
                font-size: 14px !important;
                font-family: Arial !important;
                word-break: break-word !important;
            }
        </style>

        <div class="container mt-10 mb-10">
            <div data-custom-class="body">
                <div>
                    <div align="center" class="MsoNormal" style="text-align:center;line-height:115%;"><a
                            name="_2cipo4yr3w5d"></a>
                        <div align="center" class="MsoNormal" style="text-align: left; line-height: 150%;">
                            <strong><span style="font-size: 26px;"><span data-custom-class="title">RETURN
                                        POLICY</span></span></strong></div>
                        <div align="center" class="MsoNormal" style="text-align: left; line-height: 150%;"><br></div>
                        <div align="center" class="MsoNormal" style="text-align: left; line-height: 150%;"><span
                                style="font-size: 15px;"><span style="color: rgb(89, 89, 89);"><strong><span
                                            data-custom-class="subtitle">Last updated <bdt class="question">July 20,
                                                2023</bdt></span></strong></span></span></div>
                        <div align="center" class="MsoNormal" style="text-align: left; line-height: 150%;"><br></div>
                        <div align="center" class="MsoNormal" style="text-align: left; line-height: 150%;"><span
                                style="font-size: 15px;"><br><a name="_2cipo4yr3w5d"></a></span></div>
                    </div>
                    <div class="MsoNormal" data-custom-class="body_text" style="line-height: 1.5;"><span
                            style="font-size: 15px; line-height: 115%; font-family: Arial; color: rgb(89, 89, 89);">
                            <bdt class="block-component"></bdt>
                        </span></div>
                    <div data-custom-class="heading_1"><strong><span style="font-size: 19px;">REFUNDS</span></strong>
                    </div>
                    <div style="line-height: 1.5;"><br></div>
                    <div data-custom-class="body_text" style="line-height: 1.5;"><span style="font-size: 15px;">All
                            sales are final and no refund will be issued.<bdt class="block-component"></bdt></span>
                    </div>
                    <div style="line-height: 1.5;"><br></div>
                    <div data-custom-class="heading_1" style="line-height: 1.5;"><span
                            style="font-size: 19px; color: rgb(0, 0, 0);"><strong>QUESTIONS</strong></span></div>
                    <div style="line-height: 1.5;"><br></div>
                    <div data-custom-class="body_text" style="line-height: 1.5;"><span
                            style="font-size: 15px; color: rgb(89, 89, 89);">If you have any questions concerning our
                            return policy, please contact us at:</span></div>
                    <div data-custom-class="body_text" style="line-height: 1.1;"><br></div>
                    <div data-custom-class="body_text" style="line-height: 1.5;"><span style="font-size: 15px;">
                            <bdt class="block-component"></bdt>
                        </span></span></div>
                    <div data-custom-class="body_text" style="line-height: 1.5;"><span
                            style="font-size: 15px; color: rgb(89, 89, 89);">
                            <bdt class="question">contact@sampurnasuvidhakendra.com</bdt>
                        </span></div>
                    <style>
                        ul {
                            list-style-type: square;
                        }

                        ul>li>ul {
                            list-style-type: circle;
                        }

                        ul>li>ul>li>ul {
                            list-style-type: square;
                        }

                        ol li {
                            font-family: Arial;
                        }
                    </style>
                </div>


            </div>


    </main><!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->



    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->
    <script src="{{ asset('vendors/popper/popper.min.js') }}"></script>
    <script src="{{ asset('vendors/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendors/anchorjs/anchor.min.js') }}"></script>
    <script src="{{ asset('vendors/is/is.min.js') }}"></script>
    <script src="{{ asset('vendors/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('vendors/typed.js/typed.js') }}"></script>
    <script src="{{ asset('vendors/fontawesome/all.min.js') }}"></script>
    <script src="{{ asset('vendors/lodash/lodash.min.js') }}"></script>
    <script src="{{ asset('polyfill.io/v3/polyfill.min58be.js?features=window.scroll') }}"></script>
    <script src="{{ asset('vendors/list.js/list.min.js') }}"></script>
    <script src="{{ asset('assets/js/theme.js') }}"></script>


</body>




</html>
