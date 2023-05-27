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
                                                    <th scope="col">Admin Note</th>
                                                    <th scope="col">User Note</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Note/Approve</th>
                                                </tr>
                                            </thead>

                                            <tbody class="list">
                                                @if($usersGst)
                                                @foreach($usersGst as $detail)
                                                <tr class="align-middle" data-toggle="collapse"
                                                    data-target="#{{$detail->gst_type}}" class="accordion-toggle">
                                                  
                                                    <td class="text-nowrap">
                                                        <div class="align-items-center">

                                                            <div class="ms-2">{{$detail->trade_name}}
                                                            </div>
                                                        </div>
                                                    </td>

                                                    <td class="text-nowrap">{{($detail->gst_number)?$detail->gst_number:'--'}}</td>

                                                    <td class="text-nowrap">{{($detail->gst_type)?$detail->gst_type:'NA'}}</td>
                                                    <td class="text-nowrap">{{($detail->admin_note)?$detail->admin_note:'NA'}}</td>
                                                    <td class="text-nowrap">{{($detail->user_note)?$detail->user_note:'NA'}}</td>
                                                    <td>
                                                        @if($detail->status == 2)
                                                        <div><span
                                                                class="badge badge rounded-pill d-block p-2 badge-subtle-warning">Query
                                                                Raised<span class="ms-1 fas fa-stream"
                                                                    data-fa-transform="shrink-2"></span></span>

                                                        </div>

                                                        @else
                                                        @if($detail->status == 3)
                                                        <div><span
                                                                class="badge badge rounded-pill d-block p-2 badge-subtle-warning">Query
                                                                Updated<span class="ms-1 fas fa-stream"
                                                                    data-fa-transform="shrink-2"></span></span>

                                                        </div>

                                                        @else
                                                        @if($detail->status == 4)
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
                                                        @endif
                                                    </td>

                                                    @if($detail->status == 1 || $detail->status == 3)
                                                    <td colspan=6>
                                                        <span class="btn  btn-xs" title="Add Note"
                                                            type="button"  onclick="openNoteModal({{ $detail->id }})"
                                                           href="{{ url('gst/statusview/'.$detail->id) }}" data-target="#myNoteModal">
                                                            Note<span class="glyphicon glyphicon-eye-open ms-1"></span>
                                                        </span> 

                                                       


                                                        @if($detail->status == 3)
                                                        | <span class="btn  btn-xs  " title="Change Status"
                                                            type="button" data-toggle="modal"  onclick="openApproveModal({{ $detail->id }})"
                                                             
                                                            data-target="#myApprovedModal"> 
                                                            Approve<span
                                                                class="glyphicon glyphicon-eye-open ms-1"></span>
                                                        </span>
                                                        @else @if($detail->status == 4)
                                                     
                                                        <span><NA/span>
                                                     
                                                    @endif


                                                    @endif
                                                    
                                                    </td>
                                                     


                                                     
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

@include('admin.pages.users.modal')

<!-- {{--@push('custom_scripts)--}} -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    crossorigin="anonymous">
 
<script src="https://code.jquery.com/jquery-3.2.1.min.js" crossorigin="anonymous">
</script>
 
<!-- {{--@endpush--}} -->

 
<script>
                                                            
                                                            function openNoteModal(itemId) {
                                                                // Make an AJAX GET request to fetch the item details
                                                                $.ajax({
                                                                    url: '/admin/gst/statusview/' + itemId,
                                                                    type: 'GET',
                                                                    success: function (data) {
                                                                        
                                                                        // $('#myNoteModal .modal-body').html(data);
                                                                        $('#myNoteModal').modal('show');
                                                                        $('#myNoteModal #userid').val(data.user_id);
                                                                        $('#myNoteModal #gstid').val(data.id);
                                                                        $('#myNoteModal #tradename').val(data.trade_name);
                                                                        $('#myNoteModal #type').val('note');
                                                              
                                                                    },
                                                                    error: function (xhr) {
                                                                        // Handle error cases
                                                                        console.log(xhr.responseText);
                                                                    }
                                                                });
                                                            }


                                                            function openApproveModal(itemId) {
                                                                // Make an AJAX GET request to fetch the item details
                                                                $.ajax({
                                                                    url: '/admin/gst/statusview/' + itemId,
                                                                    type: 'GET',
                                                                    success: function (data) {
                                
                                                                        $('#myApprovedModal').modal('show');
                                                                        $('#myApprovedModal #userid').val(data.user_id);
                                                                        $('#myApprovedModal #gstid').val(data.id);
                                                                        $('#myApprovedModal #type').val('approve');
                                                                    },
                                                                    error: function (xhr) {
                                                                        // Handle error cases
                                                                        console.log(xhr.responseText);
                                                                    }
                                                                });
                                                            }
                                                        </script>


