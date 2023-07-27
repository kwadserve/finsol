

@if($labourDetails)

                  
              <div class="card mb-3">
                <div class="card-header">
                  <h5 class="mb-0">LABOUR Details</h5>
                </div>
                <div class="card-body bg-light row">
                    <div class="col-lg-6 mb-3"> <label class="form-label" for="gst-type">Name of Labour : </label>{{$labourDetails->name_of_labour}}</div>
                    <div class="col-lg-6 mb-3"> <label class="form-label" for="pan-number">LABOUR Number : </label>{{$labourDetails->labour_number}}</div>
                    <div class="col-lg-6 mb-3"> <label class="form-label" for="mobile">Mobile : </label>{{$labourDetails->labour_mobile}}</div>
                    <div class="col-lg-6 mb-3"> <label class="form-label" for="email1">Email : </label>{{$labourDetails->labour_email}}</div>
                      
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
              @if($labourDetails->type == 'New Labour Registration')
              <div class="card mb-3">


            
                <div class="card-header">
                  <h5 class="mb-0">LABOUR Documents</h5>
                </div>
                <div class="card-body bg-light">
                @include('admin.pages.users.forms.profile.common',
        ['documents'=> $labourDocuments,'form_type'=>'Labour', 'details'=>$labourDetails])

                
              
</div>


                
                </div>
                @endif
              </div>




              
<?php if($labourSignatory) { 
  foreach($labourSignatory  as $index => $sign) {
                   ?>
            

<div class="card mb-3">
                <div class="card-header">
                  <h5 class="mb-0">Signatory {{$index+1}} Details / Documents </h5>
                  <h6><span>Signatory Email :{{$sign->labour_sign_email}}</span>&nbsp;&nbsp;&nbsp;
                  &nbsp;&nbsp;&nbsp;<span>Signatory Mobile :{{$sign->labour_sign_mobile}}</span></h6>
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
foreach ($labourSignatoryDocuments as $row){
?>  
        <div class="col-md-<?php echo $bootstrapColWidth1; ?>">
        <h6>{{$row->doc_name}}</h6> 
        @php 
          $keyname =$row->doc_key_name;
          @endphp

        <form action="{{ url('admin/user/files/'.$labourDetails->user_id) }}" method="POST">
          @csrf
  
          <input type="hidden" name="files" value="{{$labourDetails[$keyname] }}">
              <input type="hidden" name="id" value="{{ $labourDetails->id }}">  
              <input type="hidden" name="form_type" value="Labour">  
 
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
            