

@if($taxauditDetails)

                  
              <div class="card mb-3">
                <div class="card-header">
                  <h5 class="mb-0">TAXAUDIT Details</h5>
                </div>
                <div class="card-body bg-light row">
                    <div class="col-lg-6 mb-3"> <label class="form-label" for="gst-type">Name of Taxaudit : </label>{{$taxauditDetails->name_of_taxaudit}}</div>
                    <div class="col-lg-6 mb-3"> <label class="form-label" for="pan-number">TAXAUDIT Number : </label>{{$taxauditDetails->taxaudit_number}}</div>
                    <div class="col-lg-6 mb-3"> <label class="form-label" for="mobile">Mobile : </label>{{$taxauditDetails->mobile_number}}</div>
                    <div class="col-lg-6 mb-3"> <label class="form-label" for="email1">Email : </label>{{$taxauditDetails->email_id}}</div>
                      
                </div>
              </div>
              @if (session('filenotexistsection1'))
                            <div class="alert alert-danger border-2 d-flex align-items-center" role="alert">
                                <div class="bg-danger me-3 icon-item"><span
                                        class="fas fa-check-circle text-white fs-3"></span>
                                </div>
                                <p class="mb-0 flex-1">{{ session('filenotexistsection1') }}</p>
                                <button class="btn-close" type="button" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                            @endif
              @if($taxauditDetails->type == 'New TAXAUDIT Registration')
              <div class="card mb-3">


            
                <div class="card-header">
                  <h5 class="mb-0">TAXAUDIT Documents</h5>
                </div>
                <div class="card-body bg-light">

                
                <?php
//Columns must be a factor of 12 (1,2,3,4,6,12)
$numOfCols = 3;
$rowCount = 0;
$bootstrapColWidth = 12 / $numOfCols;
?>
<div class="row">
<?php
foreach ($taxauditDocuments as $row){
?>  
        <div class="col-md-<?php echo $bootstrapColWidth; ?>">
        <h6>{{$row->doc_name}}</h6> 
        <div class="thumbnail">
          @php 
          $keyname =$row->doc_key_name;
          @endphp

        <form action="{{ url('admin/user/files/'.$taxauditDetails->user_id) }}" method="POST">
          @csrf
  
          
              <input type="hidden" name="files" value="{{$taxauditDetails[$keyname]}}">
              <input type="hidden" name="id" value="{{ $taxauditDetails->id }}">  
              <input type="hidden" name="form_type" value="Taxaudit">  
          
            <button class="btn btn-primary btn-xs mt-2 bsgstdwbtn" type="submit"><small>Download File</small>&nbsp;&nbsp;<span  class="text-500 fas fa-download"></span></button>  
       </form>

        <!-- <a class=" justify-content-between ms-auto" href="#!">
         Download
        </a> -->
       
        </div>
        <br/>
        </div>
<?php
    $rowCount++;
    if($rowCount % $numOfCols == 0) echo '</div><div class="row">';
}
?>
</div>


                
                </div>
                @endif
              </div>
           
@endif
            