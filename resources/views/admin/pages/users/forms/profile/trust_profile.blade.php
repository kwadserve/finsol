

@if($trustDetails)

                  
              <div class="card mb-3">
                <div class="card-header">
                  <h5 class="mb-0">TRUST Details</h5>
                </div>
                <div class="card-body bg-light row">
                    <div class="col-lg-6 mb-3"> <label class="form-label" for="gst-type">Name of Trust : </label>{{$trustDetails->name_of_trust}}</div>
                    <div class="col-lg-6 mb-3"> <label class="form-label" for="pan-number">TRUST Number : </label>{{$trustDetails->trust_number}}</div>
                    <div class="col-lg-6 mb-3"> <label class="form-label" for="mobile">Mobile : </label>{{$trustDetails->trust_mobile}}</div>
                    <div class="col-lg-6 mb-3"> <label class="form-label" for="email1">Email : </label>{{$trustDetails->trust_email}}</div>
                      
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
                             
              @if($trustDetails->type == 'New Trust Registration')
              <div class="card mb-3">
               

            
                <div class="card-header">
                  <h5 class="mb-0">TRUST Documents</h5>
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
foreach ($trustDocuments as $row){
?>  
        <div class="col-md-<?php echo $bootstrapColWidth; ?>">
        <h6>{{$row->doc_name}}</h6> 
        <div class="thumbnail">
          @php 
          $keyname =$row->doc_key_name;
          @endphp

        <form action="{{ url('admin/user/files/'.$trustDetails->user_id) }}" method="POST">
          @csrf
  
          
              <input type="hidden" name="files" value="{{$trustDetails[$keyname]}}">
              <input type="hidden" name="id" value="{{ $trustDetails->id }}">  
              <input type="hidden" name="form_type" value="Trust">  
          
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




              
<?php   if($trustMember) { 
  foreach($trustMember  as $index => $dir) {
                   ?>
            

<div class="card mb-3">
                <div class="card-header">
                  <h5 class="mb-0">Member {{$index+1}} Details / Documents </h5>
                  <h6><span>Member Name :{{$dir->name_of_member}}</span>&nbsp;&nbsp;&nbsp;
                  </h6>
                </div>
                <div class="card-body bg-light">

               

                        <?php
//Columns must be a factor of 12 (1,2,3,4,6,12)
$numOfCols1 = 3;
$rowCount1 = 0;
$bootstrapColWidth1 = 12 / $numOfCols1;
?>
<div class="row">
<?php
foreach ($trustMemberDocuments as $row){
?>  
        <div class="col-md-<?php echo $bootstrapColWidth1; ?>">
        <h6>{{$row->doc_name}}</h6> 
        @php 
          $keyname =$row->doc_key_name;
          @endphp

        <form action="{{ url('admin/user/files/'.$trustDetails->user_id) }}" method="POST">
          @csrf
  
          <input type="hidden" name="files" value="{{$trustDetails[$keyname] }}">
              <input type="hidden" name="id" value="{{ $trustDetails->id }}">  
              <input type="hidden" name="form_type" value="Trust">  
 
            <button class="btn btn-primary btn-xs mt-2 bsgstdwbtn" type="submit"><small>Download File</small>&nbsp;&nbsp;<span  class="text-500 fas fa-download"></span></button>  
       </form>
        <br/>
        </div>
<?php
    $rowCount1++;
    if($rowCount1 % $numOfCols1 == 0) echo '</div><div class="row">';
}
?>
</div>


                       

                          
 
                           
                       
                  </div>
                



                </div>
              </div>
              <?php  
                } } ?>
           
@endif
            