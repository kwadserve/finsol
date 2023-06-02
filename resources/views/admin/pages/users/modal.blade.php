<!-- myApprovedModal -->
<div id="myApprovedModal" class="modal fade" role="dialog">
    <div class="modal-dialog"> 
       
         
        <div class="modal-content">
            <form action="{{ url('admin/user/gst/change_status') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                </div>
                <div class="modal-body">
                    <p>
                        <input type="hidden" name="userid" id="userid" value="{{request()->segment(5)}}" />
                        <input type="hidden" id="gstid" name="gstid" value="" />
                        <input type="hidden" name="type" value="approve" />
                        <label>GST Number</label>
                        <input type="text" class="form-control"  required="required" name="gst_number" value="" placeholder="Enter the Gst Number" />
                        <label>Trade Name</label>
                        <input type="text" id="tradename" required="required" class="form-control" name="trade_name" value="" placeholder="Trade Name" />
                    <div class="mb-3">
                        <label>Upload Doc:</label>
                        <input type="file" name="approved_img[]" id="image-upload" class="myfrm form-control"
                              />
                    </div>
                    </p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary me-1 mb-1" type="submit">Submit</button>
                    <button type="button" class="btn btn-default close " data-dismiss="modal"  onclick="closeModal1()">Close</button>
                </div>
            </form>
        </div>

    </div>
</div>

<div id="myNoteModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
    
        <div class="modal-content">
            <form action="{{ url('admin/user/gst/change_status') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                </div>
                <div class="modal-body">
                    <p>
                        <input type="hidden" name="userid" id="userid" value="{{request()->segment(5)}}" />
                        <input type="hidden" id="gstid" name="gstid" value="" />
                        <input type="hidden" name="type" id="type"  value="note" />
                        <!-- <input type="text" name="tradename_temp" id="tradename" value="" placeholder="Enter the Trade name" /> -->
                        
                       <div class="mb-3">
                        <label>Enter Your Query:</label>
                        <textarea name="admin_note" required="required" style="height:90px;width:100%"></textarea>
                    </div>
                    <div class="mb-3">
                        <label>Upload Doc:</label>
                        <input type="file" name="raised_img[]"   id="image-upload" class="myfrm form-control"
                            multiple />
                       </div> 
                    </p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary me-1 mb-1" type="submit">Submit</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal"  onclick="closeModal2()">Close</button>
                </div>
            </form>
        </div>

    </div>
</div>

<script>
    function closeModal1() {
        $('#myApprovedModal').modal('hide');
    }

    function closeModal2() {
        $('#myNoteModal').modal('hide');
    }
</script>