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
                                        <h1 style="color: #2a3468;" class="fs-2 fs-sm-4 fs-md-5">Business <font
                                                color="#ec465f">Status
                                            </font>
                                        </h1>
                                        <p class="lead">Things you will get right out of the box with Finsol.</p>
                                    </div>
                                </div>

                                <!------ GST options drop ------->

                                <div class="row mt-2 g-3">

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
                                                        <table class="table table-condensed table-striped">
                                                            <thead>
                                                                <tr>
                                                                    <!-- <th scope="col"></th> -->
                                                                    <th scope="col">Trade Name</th>
                                                                    <th scope="col">GST Number</th>
                                                                    <th scope="col">Type</th>
                                                                    <th scope="col">Status</th>
                                                                    <th scope="col">Download</th>
                                                                    <th scope="col">Note</th>

                                                                </tr>
                                                            </thead>

                                                            <tbody>
                                                                @if($userGstDetails)
                                                                @foreach($userGstDetails as $detail)
                                                                <tr class="align-middle" data-toggle="collapse"
                                                                    data-target="#{{$detail->gst_type}}"
                                                                    class="accordion-toggle">
                                                                    <!-- <td><button class="btn btn-default btn-xs"><span
                                                                                class="glyphicon glyphicon-eye-open"></span></button>
                                                                    </td> -->
                                                                    <td class="text-nowrap">
                                                                        <div class="align-items-center">

                                                                            <div class="ms-2">{{$detail->trade_name}}
                                                                            </div>
                                                                        </div>
                                                                    </td>

                                                                    <td class="text-nowrap">{{$detail->gst_number}}</td>

                                                                    <td class="text-nowrap">New GST Registration</td>

                                                                    <td>
                                                                        @if($detail->status == 2)
                                                                        <span
                                                                            class="badge badge rounded-pill d-block p-2 badge-subtle-warning">Query
                                                                            Raised<span class="ms-1 fas fa-stream"
                                                                                data-fa-transform="shrink-2"></span></span>


                                                                        @else
                                                                        @if($detail->status == 3)

                                                                        <span
                                                                            class="badge badge rounded-pill d-block p-2 badge-subtle-success">Approved<span
                                                                                class="ms-1 fas fa-check"
                                                                                data-fa-transform="shrink-2"></span></span>

                                                                        @else
                                                                        <span
                                                                            class="badge badge rounded-pill d-block p-2 badge-subtle-primary">Processing
                                                                            <span class="ms-1 fas fa-redo"
                                                                                data-fa-transform="shrink-2">
                                                                            </span>
                                                                        </span>
                                                                        @endif
                                                                        @endif

                                                                    </td>

                                                                    <td class="text-nowrap">
                                                                        @if($detail->status == 3)
                                                                        <button class="btn btn-link p-0" type="button"
                                                                            data-bs-toggle="tooltip"
                                                                            data-bs-placement="top"
                                                                            title="download"><span
                                                                                class="text-500 fas fa-download"></span></button>
                                                                        @endif
                                                                    </td>

                                                                    <td>
                                                                        @if($detail->status == 2)
                                                                        @if($detail->last_update_by == 'user')
                                                                        <button
                                                                            class="btn btn-secondary btn-xs">Note<span
                                                                                class="glyphicon glyphicon-eye-open ms-1 fas fa-check"></span>
                                                                        </button>
                                                                        @else
                                                                        <button
                                                                            class="btn btn-secondary btn-xs">Note<span
                                                                                class="glyphicon glyphicon-eye-open ms-1 fas fa-times-circle fa-w-16 text-danger"></span>
                                                                        </button>
                                                                        @endif
                                                                        @endif
                                                                    </td>
                                                                </tr>
                                                                @if($detail->status == 2)
                                                                <tr>
                                                                    <td colspan="6" class="hiddenRow">
                                                                        <div id="{{$detail->gst_type}}"
                                                                            class="accordian-body collapse">
                                                                            <!-- {{$detail->gst_type}} -->
                                                                            <br /><br />
                                                                            <div class="col">
                                                                                <form class="needs-validation"
                                                                                    novalidate="novalidate"
                                                                                    action="{{route('gst.query_raised')}}"
                                                                                    method="post"
                                                                                    enctype="multipart/form-data">
                                                                                    @csrf
                                                                                    <span
                                                                                        class="badge badge rounded-pill d-block p-2 badge-subtle-warning">Query
                                                                                        Raised
                                                                                    </span>
                                                                                    <br />
                                                                                    <div class="mb-3"><label
                                                                                            class="form-label"
                                                                                            for="note">
                                                                                            {{$detail->note}}
                                                                                        </label> </div>

                                                                                    <input type="hidden" name="gstid"
                                                                                        value="{{$detail->id}}" />
                                                                                    <div class="mb-3">
                                                                                        <label>Upload Required
                                                                                            doc:</label>
                                                                                        <input type="file"
                                                                                            name="additional_img[]"
                                                                                            id="image-upload"
                                                                                            class="myfrm form-control"
                                                                                            multiple />
                                                                                    </div>

                                                                                    <div class="mb-3">
                                                                                        <button
                                                                                            class="btn btn-primary me-1 mb-1"
                                                                                            type="submit">Save</button>
                                                                                    </div>
                                                                                </form>
                                                                            </div>
                                                                            <br />
                                                                        </div>
                                                                    </td>


                                                                </tr>
                                                                @endif

                                                                @endforeach
                                                                @endif
                                                            </tbody>
                                                        </table>
                                                    </div>

                                                </div>

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

<style>
.hiddenRow {
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