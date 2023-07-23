

@if($factorylicenseDetails)
              <div class="card mb-3">
                <div class="card-header">
                  <h5 class="mb-0">FACTORY LICENSE Details</h5>
                </div>
                <div class="card-body bg-light row">
                    <div class="col-lg-6 mb-3"> <label class="form-label" for="gst-type">Name of Firm : </label>{{$factorylicenseDetails->name_of_facl}}</div>
                    <div class="col-lg-6 mb-3"> <label class="form-label" for="factorylicense-number">Firm Number : </label>{{$factorylicenseDetails->facl_number}}</div>
                    <div class="col-lg-6 mb-3"> <label class="form-label" for="mobile">Mobile : </label>{{$factorylicenseDetails->mobile_number}}</div>
                    <div class="col-lg-6 mb-3"> <label class="form-label" for="email1">Email : </label>{{$factorylicenseDetails->email_id}}</div>
                      
                </div>
              </div>
              @if (session('filenotexistsection1'))
                            <div class="alert alert-danger border-2 d-flex align-items-center" role="alert">
                                <div class="bg-danger me-3 icon-item"><sfactorylicense
                                        class="fas fa-check-circle text-white fs-3"></sfactorylicense>
                                </div>
                                <p class="mb-0 flex-1">{{ session('filenotexistsection1') }}</p>
                                <button class="btn-close" type="button" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                            @endif
              @if($factorylicenseDetails->type == 'New FactoryLicense Registration')
              <div class="card mb-3">


            
                <div class="card-header">
                  <h5 class="mb-0">FACTORY LICENSE Documents</h5>
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
foreach ($factorylicenseDocuments as $row){
?>  
        <div class="col-md-<?php echo $bootstrapColWidth; ?>">
        <h6>{{$row->doc_name}}</h6> 
        <div class="thumbnail">
          @php 
          $keyname =$row->doc_key_name;
          @endphp

        <form action="{{ url('admin/user/files/'.$factorylicenseDetails->user_id) }}" method="POST">
          @csrf
  
          
              <input type="hidden" name="files" value="{{$factorylicenseDetails[$keyname] }}">
              <input type="hidden" name="id" value="{{ $factorylicenseDetails->id }}">  
              <input type="hidden" name="form_type" value="FactoryLicense">  
          
            <button class="btn btn-primary btn-xs mt-2 bsgstdwbtn" type="submit"><small>Download File</small>&nbsp;&nbsp;<sfactorylicense  class="text-500 fas fa-download"></sfactorylicense></button>  
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
            