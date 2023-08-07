<form class="needs-validation" novalidate="novalidate" action="{{route('factorylicense.register')}}" method="post"
     enctype="multipart/form-data">
     @csrf


     <div class="detailsmargin card-header d-flex flex-between-center bg-light py-2">
         <h6 class="detailspadding mb-0">Details of your Factory License</h6>
     </div>

     <div class="mt-1 row g-2">
         <div class="col-6">
             <div class="mb-3">
                 <label class="form-label" for="bootstrap-wizard-validation-wizard-company">Name of Factory License
                 </label><input class="form-control" type="text" name="name_of_facl" placeholder="Name of Factory License"
                     required="required" />
                 <div class="invalid-feedback">Please provide name of Factory License</div>
             </div>
         </div>

         <div class="col-6">
             <div class="mb-3">
                 <label class="form-label" for="bootstrap-wizard-validation-wizard-email">Business
                     Email</label><input class="form-control" type="email" name="facl_email" placeholder="Email address"
                     pattern="^([a-zA-Z0-9_.-])+@(([a-zA-Z0-9-])+.)+([a-zA-Z0-9]{2,4})+$" required="required"
                     id="bootstrap-wizard-validation-wizard-email" data-wizard-validate-email="true" />
                 <div class="invalid-feedback">You must add email</div>
             </div>
         </div>
         <div class="col-6">
             <div class="mb-3">
                 <label class="form-label" for="form-wizard-progress-wizard-addregnum">Mobile
                     number
                     registered with aadhar</label><input class="form-control" required="" type="text"
                     name="facl_mobile" maxlength="10" placeholder="Enter Mobile No" id="form-wizard-progress-wizard-addregnum" />
                 <div class="invalid-feedback">Please provide Mobile
                     number</div>
             </div>
         </div>
     </div>

     <div class="mt-1 row g-2">


         @foreach ($factory_license_images as $keyname => $image)
         <div class="col-6 mb-3">
             <div class="mb-3">
                 <label>{{$image['doc_name']}} :</label>
                 <input type="file" name="trustmember[0][{{$image['doc_key_name']}}][]" id="image-upload"
                     class="myfrm form-control" multiple />
             </div>
         </div>
         @endforeach
 

     </div>





     <br />
     <br />
     <div class="col-4">
         <div class="mb-3">
             <button class="btn btn-primary me-1 mb-1" type="submit">Submit and Pay</button>
             <p>Amount : ₹1500</p>
         </div>
     </div>
 </form>