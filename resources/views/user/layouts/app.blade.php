<!DOCTYPE html>
<html data-bs-theme="light" lang="en-US" dir="ltr">
@include('user.partials.head')

<body>
    <div id="app">
        @yield('content')
    </div>
    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->
    <script src="{{ asset('vendors/popper/popper.min.js')}}">
    </script>
    <script src="{{ asset('vendors/bootstrap/bootstrap.min.js')}}"></script>
    <script src="{{ asset('vendors/anchorjs/anchor.min.js')}}"></script>
    <script src="{{ asset('vendors/is/is.min.js')}}"></script>
    <script src="{{ asset('vendors/dropzone/dropzone.min.js')}}"></script>
    <script src="{{ asset('vendors/fontawesome/all.min.js')}}"></script>
    <script src="{{ asset('vendors/lodash/lodash.min.js')}}"></script>
    <script src="{{ asset('polyfill.io/v3/polyfill.min58be.js?features=window.scroll')}}"></script>
    <script src="{{ asset('vendors/list.js/list.min.js')}}"></script>
    <script src="{{ asset('assets/js/theme.js')}}"></script>
</body>


</html>