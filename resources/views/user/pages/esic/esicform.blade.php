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
            <div class="tab-content">
                <div class="tab-pane preview-tab-pane active" role="tabpanel"
                    aria-labelledby="tab-dom-switch"
                    id="dom-switch">
                    <ul class="nav nav-pills" id="pill-switch" role="tablist">
                        <li class="nav-item"><a class="nav-link active" id="esic-new-home" data-bs-toggle="tab"
                                href="#esic-new" role="tab" aria-controls="esic-new"
                                aria-selected="true">New</a>
                        </li>
                        <li class="nav-item"><a class="nav-link" id="esic-existing-home" data-bs-toggle="tab"
                                href="#esic-existing" role="tab" aria-controls="esic-existing"
                                aria-selected="false">Existing</a></li>

                    </ul>
                    <div class="tab-content mt-3" id="pill-switchContent">
                        <!------------------tab 1----------------->
                        @include('user.pages.esic.new')
                        <!------------Tab 2 ------------>
                        @include('user.pages.esic.existing')

                    </div>
                </div>
            </div>
            @include('user.partials.footer')
        </div>
    </div>
</main>
<!-- ===============================================-->
<!--    End of Main Content-->
<!-- ===============================================-->
<!--- add Partner JS  -->

@endsection