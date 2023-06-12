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
                    
                    <div class="card-body d-flex flex-column justify-content-end">
                        <div class="row">
                            <div class="col-12">
                                <div class="row">
                                 
                                <div class="col-lg-8 pe-lg-2">
              <div class="card mb-3">
                <div class="card-header">
                  <h5 class="mb-0">GST Details</h5>
                </div>
                <div class="card-body bg-light row">
                    <div class="col-lg-6 mb-3"> <label class="form-label" for="gst-type">GST Type : </label>{{$gstDetails->gst_type}}</div>
                    <div class="col-lg-6 mb-3"> <label class="form-label" for="gst-number">GST Number : </label>{{$gstDetails->gst_number}}</div>
                    <div class="col-lg-6 mb-3"> <label class="form-label" for="mobile">Mobile : </label>{{$gstDetails->mobile_linked_aadhar}}</div>
                    <div class="col-lg-6 mb-3"> <label class="form-label" for="email1">Email : </label>{{$gstDetails->email_id}}</div>
                      
                </div>
              </div>
              <div class="card mb-3">
                <div class="card-header">
                  <h5 class="mb-0">Documents</h5>
                </div>
                <div class="card-body bg-light">

                 <?php if($gstIndividualDocuments) { 
                    foreach($gstIndividualDocuments as $document) { ?>
                  <div class="d-flex "> 
                    <div class="flex-1 position-relative ps-3">
                      <span class="fs-0 mb-0">{{$document->doc_name}}
                      <a class=" justify-content-between ms-auto" href="#!">Download</a>
                      </span>
                      <div class="border-bottom border-dashed my-3"></div>
                    </div>
                  </div>
                  <?php } } ?>
                </div>
              </div>
            </div>



            <div class="col-lg-4 ps-lg-2">
              <div class="sticky-sidebar">
                <div class="card overflow-hidden">
                  <div class="card-header">
                    <h5 class="mb-0">{{$gstDetails->type}}</h5>
                  </div>
                  <div class="card-body bg-light">
                    <h5 class="fs-0  offset-4">TRADE NAME</h5>
                    <a class="btn btn-falcon-warning d-block" href="#!">{{$gstDetails->trade_name}}</a>
                    <div class="border-bottom border-dashed my-4"></div>
                    <h5 class="fs-0  offset-4">STATUS</h5>
                    <div>
                    @if($gstDetails->status == 2)
                                                        <div><span
                                                                class="badge badge rounded-pill d-block p-2 badge-subtle-warning">Query
                                                                Raised<span class="ms-1 fas fa-stream"
                                                                    data-fa-transform="shrink-2"></span></span>

                                                        </div>

                                                        @else
                                                        @if($gstDetails->status == 3)
                                                        <div><span
                                                                class="badge badge rounded-pill d-block p-2 badge-subtle-warning">Query
                                                                Updated<span class="ms-1 fas fa-stream"
                                                                    data-fa-transform="shrink-2"></span></span>
                                                             @if($gstDetails->additional_img!="")        
                                                         <form action="{{ url('admin/user/gst/download/additional/file/' . $gstDetails->user_id) }}" method="POST">
                                                                                    @csrf
                                                                                    
                                                                                        <input type="hidden" name="files" value="{{ $gstDetails->additional_img }}">
                                                                                    
                                                                                      <button class="btn btn-primary btn-xs mt-2 bsgstdwbtn" type="submit"><small>Download File</small>&nbsp;&nbsp;<span  class="text-500 fas fa-download"></span></button>  
                                                                                </form>
                                                                                @endif

                                                        </div>

                                                        @else
                                                        @if($gstDetails->status == 4)
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
                    </div>
                    
                  </div>
                </div>
              </div>
            </div>




                                </div>
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

 

 

