@if($usersAoc) 
<div class="row">  <h5>AOC Form Details</h5>
                            <div class="col-12">
                                <div id="tableExample"
                                    data-list='{"valueNames":["name","email","age"],"page":5,"pagination":true}'>
                                    <div class="table-responsive scrollbar">
                                   
                                     
                                        <table class="table table-bordered table-striped fs--1 mb-0">
                                            <thead class="bg-200 text-900">
                                                <tr>
                                                    <!-- <th scope="col"></th> -->
                                                    
                                                    <th scope="col">Email Id</th>
                                                    <th scope="col">Type</th>
                                                    <th scope="col">Admin Note</th>
                                                    <th scope="col">User Note</th>
                                                    <th scope="col">Details</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Note/Approve</th>
                                                </tr>
                                            </thead>

                                            <tbody class="list">
                                                @if($usersAoc)
                                                @foreach($usersAoc as $detail)
                                                <tr class="align-middle">
                         

                                                    <td class="text-nowrap">{{($detail->email_id)?$detail->email_id:'--'}}</td>

                                                    <td class="text-nowrap">{{($detail->type)?$detail->type:''}}</td>
                                                    <td>{{($detail->admin_note)?$detail->admin_note:''}}</td>
                                                    <td>{{($detail->user_note)?$detail->user_note:''}}</td>
                                                    <td><a href="{{ url('admin/user/companiesact/details/aoc/'.$detail->id) }}">Details</a></td>
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
                                                             @if($detail->additional_img!="")        
                                                         <form action="{{ url('admin/user/companiesact/additional/file/' . $detail->user_id) }}" method="POST">
                                                                                    @csrf
                                                                                        <input type="hidden" name="form_type" value="Aoc">
                                                                                        <input type="hidden" name="files" value="{{ $detail->additional_img }}">
                                                                                    
                                                                                      <button class="btn btn-primary btn-xs mt-2 bsgstdwbtn" type="submit"><small>Download File</small>&nbsp;&nbsp;<span  class="text-500 fas fa-download"></span></button>  
                                                                                </form>
                                                                                @endif

                                                        </div>

                                                        @else
                                                        @if($detail->status == 4)
                                                        <span
                                                            class="badge badge rounded-pill d-block p-2 badge-subtle-success">Approved<span
                                                                class="ms-1 fas fa-check"
                                                                data-fa-transform="shrink-2"></span></span>

                                                                @if($detail->approved_img!="")        
                                                                     <form action="{{ url('admin/user/companiesact/approved/file/' . $detail->user_id) }}" method="POST">
                                                                                    @csrf
                                                                                        <input type="hidden" name="form_type" value="Aoc">
                                                                                        <input type="hidden" name="files" value="{{ $detail->approved_img }}">
                                                                                    
                                                                                      <button class="btn btn-primary btn-xs mt-2 bsgstdwbtn" type="submit"><small>Download File</small>&nbsp;&nbsp;<span  class="text-500 fas fa-download"></span></button>  
                                                                                </form>
                                                                                @endif

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
                                                    <td colspan=6 style="display:flex;">
                                                        <span class="btn btn-info ml-1 mb-1 btn-sm" title="Add Note"
                                                            type="button"  onclick="openAocNoteModal({{ $detail->id }})"
                                                           href="{{ url('companiesact/statusview/'.$detail->id) }}" data-target="#myAocNoteModal">
                                                            Note<span class="glyphicon glyphicon-eye-open ms-1"></span>
                                                        </span> 

 
                                                         <span class="btn btn-success ml-1 mb-1 btn-sm  " title="Change Status"
                                                            type="button" data-toggle="modal"  onclick="openAocApproveModal({{ $detail->id }})"
                                                             
                                                            data-target="#myAocApprovedModal"> 
                                                            Approve<span
                                                                class="glyphicon glyphicon-eye-open ms-1"></span>
                                                        </span>
                                                        @else @if($detail->status == 4)
                                                     
                                                        <span></span>
                                                     
                                                   


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

                        @endif

                        <script>
                                                         var urlpath="{{ $routeurl }}";
                                                            function openAocNoteModal(itemId) {
                                                                // Make an AJAX GET request to fetch the item details
                                                                $.ajax({
                                                                    //url: urlpath+'/user/forms/statusview' +'?pan=' + itemId,
                                                                    url: urlpath+'/user/companiesact/statusview' +'?for=note&formtype=aoc&id=' + itemId,
                                                                    type: 'GET',
                                                                    success: function (data) {
                                                                        $('#myCaCommonNoteModal').modal('show');
                                                                        $('#ca-note-modal-body-div').html(data.modalBody);
                                                                        // $('#myAocNoteModal #userid').val(data.user_id);
                                                                        // $('#myAocNoteModal #panid').val(data.id);
                                                                        // $('#myAocNoteModal #routeis').val('pan');
                                                                    },
                                                                    error: function (xhr) {
                                                                        // Handle error cases
                                                                        console.log(xhr.responseText);
                                                                    }
                                                                });
                                                            }


                                                            function openAocApproveModal(itemId) {
                                                                // Make an AJAX GET request to fetch the item details
                                                                $.ajax({
                                                                    // url:  urlpath+'/user/forms/statusview' +'?pan=' + itemId,
                                                                    url: urlpath+'/user/companiesact/statusview' +'?for=approve&formtype=aoc&id=' + itemId,
                                                                    type: 'GET',
                                                                    success: function (data) {
                                
                                                                        $('#myCaCommonApprovedModal').modal('show');
                                                                        $('#ca-approve-modal-body-div').html(data.modalBody);
                                                                        // $('#myAocApprovedModal #userid').val(data.user_id);
                                                                        // $('#myAocApprovedModal #panid').val(data.id);
                                                                        // $('#myAocApprovedModal #nameofpan').val(data.name_of_pan);
                                                                        // $('#myAocApprovedModal #type').val('approve');
                                                                    },
                                                                    error: function (xhr) {
                                                                        // Handle error cases
                                                                        console.log(xhr.responseText);
                                                                    }
                                                                });
                                                            }
                                                        </script>