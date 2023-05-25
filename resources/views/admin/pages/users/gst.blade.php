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
                    <div class="card-header pb-0">
                        <h6 class="mb-0 mt-2 d-flex align-items-center">List of User GST Details</h6>
                    </div>
                    <div class="card-body d-flex flex-column justify-content-end">
                        <div class="row">
                            <div class="col-12">
                                <div id="tableExample"
                                    data-list='{"valueNames":["name","email","age"],"page":5,"pagination":true}'>
                                    <div class="table-responsive scrollbar">


                                        <table class="table table-bordered table-striped fs--1 mb-0">
                                            <thead class="bg-200 text-900">
                                                <tr>
                                                    <!-- <th scope="col"></th> -->
                                                    <th scope="col">Trade Name</th>
                                                    <th scope="col">GST Number</th>
                                                    <th scope="col">Type</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Note</th>
                                                </tr>
                                            </thead>

                                            <tbody class="list">
                                                @if($usersGst)
                                                @foreach($usersGst as $detail)
                                                <tr class="align-middle" data-toggle="collapse"
                                                    data-target="#{{$detail->gst_type}}" class="accordion-toggle">
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

                                                    <td class="text-nowrap">{{$detail->gst_type}}</td>

                                                    <td>
                                                        @if($detail->status == 2)
                                                        <div><span
                                                                class="badge badge rounded-pill d-block p-2 badge-subtle-warning">Query
                                                                Raised<span class="ms-1 fas fa-stream"
                                                                    data-fa-transform="shrink-2"></span></span>

                                                        </div>

                                                        @else
                                                        @if($detail->status == 3)
                                                        <span
                                                            class="badge badge rounded-pill d-block p-2 badge-subtle-success">Approved<span
                                                                class="ms-1 fas fa-check"
                                                                data-fa-transform="shrink-2"></span></span>

                                                        @else
                                                        <span
                                                            class="badge badge rounded-pill d-block p-2 badge-subtle-primary">Processing
                                                            <span class="ms-1 fas fa-redo" data-fa-transform="shrink-2">
                                                            </span>
                                                        </span>
                                                        @endif
                                                        @endif

                                                    </td>

                                                    @if($detail->status == 1)
                                                    <td>
                                                        <button class="btn  btn-xs  btn-block" title="Add Note"
                                                            type="button" data-toggle="modal"
                                                            data-item="{{ $detail->id }}" data-target="#myNoteModal">Add
                                                            Note<span class="glyphicon glyphicon-eye-open ms-1"></span>
                                                        </button>
                                                    </td>
                                                    @else @if($detail->status == 2)
                                                    <td>
                                                        <button class="btn  btn-xs btn-block" title="Change Status"
                                                            type="button" data-toggle="modal"
                                                            data-item="{{ $detail->id }}"
                                                            data-target="#myApprovedModal">Change To
                                                            Approve<span
                                                                class="glyphicon glyphicon-eye-open ms-1"></span>
                                                        </button>
                                                    </td>


                                                    @else @if($detail->status == 3)
                                                    <td>
                                                        NA
                                                    </td>
                                                    @endif
                                                    @endif
                                                    @endif



                                                </tr>
                                                @endforeach
                                                @endif
                                            </tbody>
                                        </table>


                                    </div>
                                    <div class="row align-items-center mt-3">
                                        <div class="pagination d-none"></div>
                                        <div class="col">
                                            <p class="mb-0 fs--1">
                                                <span class="d-none d-sm-inline-block"
                                                    data-list-info="data-list-info"></span>
                                                <span class="d-none d-sm-inline-block"> &mdash;</span>
                                                <a class="fw-semi-bold" href="#!" data-list-view="*">View all<span
                                                        class="fas fa-angle-right ms-1"
                                                        data-fa-transform="down-1"></span></a><a
                                                    class="fw-semi-bold d-none" href="#!" data-list-view="less">View
                                                    Less<span class="fas fa-angle-right ms-1"
                                                        data-fa-transform="down-1"></span></a>
                                            </p>
                                        </div>
                                        <div class="col-auto d-flex"><button class="btn btn-sm btn-primary"
                                                type="button"
                                                data-list-pagination="prev"><span>Previous</span></button><button
                                                class="btn btn-sm btn-primary px-4 ms-2" type="button"
                                                data-list-pagination="next"><span>Next</span></button></div>
                                    </div>
                                </div>



                            </div>
                            <div class="col-auto ps-0">
                                <div class="echart-bar-weekly-sales h-100"></div>
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



<!-- {{--@push('custom_scripts)--}} -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" crossorigin="anonymous">
</script>
<!-- {{--@endpush--}} -->




<script>
// $(document).on("click", ".btn-block", function() {
//     var itemid = $(this).val('data-item');
//     console.log(Object.keys(JSON.stringify(itemid)));
//     $("#gstid").val(itemid)
// });
</script>

<!-- ADD Note Modal -->
<div id="myNoteModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <form action="{{ url('admin/user/gst/change_status') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                </div>
                <div class="modal-body">
                    <p>
                        <input type="hidden" name="userid" value="{{request()->segment(5)}}" />
                        <input type="hidden" id="gstid" name="gstid" value="" />
                        <input type="hidden" name="type" value="note" />
                    <div class="mb-3">
                        <label>Enter Your Query:</label>
                        <textarea name="note" style="height:90px;width:100%"></textarea>
                    </div>
                    </p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary me-1 mb-1" type="submit">Submit</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>

    </div>
</div>


<!-- ADD Note Modal -->
<div id="myApprovedModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <form action="{{ url('admin/user/gst/change_status') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                </div>
                <div class="modal-body">
                    <p>
                        <input type="hidden" name="userid" value="{{request()->segment(5)}}" />
                        <input type="hidden" name="gstid" value="{{$detail->id}}" />
                        <input type="hidden" name="type" value="approve" />
                        <input type="text" name="gst_number" value="" placeholder="Enter the Gst Number" />
                    <div class="mb-3">
                        <label>Upload Doc:</label>
                        <input type="file" name="approved_img[]" id="image-upload" class="myfrm form-control"
                            multiple />
                    </div>
                    </p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary me-1 mb-1" type="submit">Submit</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>

    </div>
</div>