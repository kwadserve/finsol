<div class="col-lg-4 ps-lg-2">
              <div class="sticky-sidebar top-navbar-height">
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


                @if($gstDetails->gst_type == 'Firm')

                @include('admin.pages.users.gst.partners')
 

@endif


@if($gstDetails->gst_type == 'Company')

                @include('admin.pages.users.gst.company')
 

@endif


              </div>


              

            </div>



           