 <form class="needs-validation" novalidate="novalidate" action="{{route('huf.register')}}" method="post"
     enctype="multipart/form-data">
     @csrf


     <div class="detailsmargin card-header d-flex flex-between-center bg-light py-2">
         <h6 class="detailspadding mb-0">Details of your Company</h6>
     </div>
       <div class="mt-1 row g-2" id="hufdetails">
     <div class="col-6">
        <div class="mb-3">
         <label class="form-label" for="bootstrap-wizard-validation-wizard-company">Name of HUF
         </label><input class="form-control" type="text" name="email_id" placeholder="Name of Company"
             required="required" />
             <div class="invalid-feedback">Please provide name of HUF</div>
        </div>
     </div>
     <div class="col-6">
             <div class="mb-3">
                 <label class="form-label" for="bootstrap-wizard-validation-wizard-email">
                     Email</label><input class="form-control" type="email" name="companysignatory[0][email]"
                     placeholder="Email address" pattern="^([a-zA-Z0-9_.-])+@(([a-zA-Z0-9-])+.)+([a-zA-Z0-9]{2,4})+$" required="required"
                     id="bootstrap-wizard-validation-wizard-email" data-wizard-validate-email="true" />
                 <div class="invalid-feedback">You must add email</div>
             </div>
     </div>
      <div class="col-6">
        <div class="mb-3">
         <label class="form-label" for="bootstrap-wizard-validation-wizard-company">Name of Karta
         </label><input class="form-control" type="text" name="email_id" placeholder="Name of Karta"
             required="required" />
              <div class="invalid-feedback">Please provide name of Karta</div>
        </div>
     </div>
      <div class="col-6">
             <div class="mb-3">
                 <label class="form-label" for="form-wizard-progress-wizard-addregnum">
                     Mobile number
                     </label><input class="form-control" type="text"
                     name="companysignatory[0][mobile]" required="required" placeholder="Enter Mobile No"
                     id="form-wizard-progress-wizard-addregnum" />
                 <div class="invalid-feedback">Please provide Mobile
                     number</div>
             </div>
         </div>
     </div>
    
       
     </div>
     
  
    

     <div class="mt-1 row g-2" id="companysignatoryGroup">
         <div class="detailsmargin card-header d-flex flex-between-center bg-light py-2">
             <h6 class="detailspadding mb-0">Upload documents of Member</h6>
        </div> 
         
         <div class="col-6">
        <div class="mb-3">
         <label class="form-label" for="bootstrap-wizard-validation-wizard-company">Name of Member
         </label><input class="form-control" type="text" name="email_id" placeholder="Name of Karta"
             required="required" />
              <div class="invalid-feedback">Please provide name of Member</div>
        </div>
     </div>
         
       
         <div class="col-6 mb-3">
             <div class="mb-3">
                 <label>KYC of Member</label>
                 <!-- required="required"  -->
                 <input type="file" name="#" id="image-upload"
                     class="myfrm form-control" multiple />
             </div>
         </div>
       
     </div>
     <div class="mt-1 row g-2">
         <button class="addcompanysignatory btn btn-primary me-1 mb-1" type="button">
             <span class="fas fa-plus me-1" data-fa-transform="shrink-3"></span>Add Member
         </button>
     </div>

     <br />
     <br />
     <div class="col-4">
         <div class="mb-3">
             <button class="btn btn-primary me-1 mb-1" type="submit">Submit and Pay</button>
             <p>Amount : ₹1500 (Inclusive of Government Challan)</p>
         </div>
     </div>
 </form>


 <script>
var companysignatoryIndex = 0;
$('.addcompanysignatory').click(function() {
    companysignatoryIndex++;
    $(this).before(
        '<div class="mt-1 row g-2" id="companysignatoryGroup"> <div class="detailsmargin card-header d-flex flex-between-center bg-light py-2"> <h6 class="detailspadding mb-0">Upload documents of Member</h6> </div> <div class="col-6"> <div class="mb-3"> <label class="form-label" for="bootstrap-wizard-validation-wizard-email"> Email</label><input class="form-control" type="email" name="companysignatory[' +companysignatoryIndex +
        '][email]" placeholder="Email address" pattern="^([a-zA-Z0-9_.-])+@(([a-zA-Z0-9-])+.)+([a-zA-Z0-9]{2,4})+$" id="bootstrap-wizard-validation-wizard-email" data-wizard-validate-email="true"> <div class="invalid-feedback">You must add email</div> </div> </div> <div class="col-6"> <div class="mb-3"> <label class="form-label" for="form-wizard-progress-wizard-addregnum"> Mobile number registered with aadhar</label><input class="form-control" type="text" name="companysignatory[' +
        companysignatoryIndex +
        '][mobile]" placeholder="Enter Registration No" id="form-wizard-progress-wizard-addregnum"> <div class="invalid-feedback">Please provide Mobile number</div> </div> </div> <div class="col-4 mb-3"> <div class="mb-3"> <label> Aadhar :</label> <!-- required="required" --> <input type="file" name="companysignatory[' +
        companysignatoryIndex +
        '][company_sign_pan_img][]" id="image-upload" class="myfrm form-control" multiple=""> </div> </div> <div class="col-4 mb-3"> <div class="mb-3"> <label> PAN :</label> <!-- required="required" --> <input type="file" name="companysignatory[' +
        companysignatoryIndex +
        '][company_sign_aadhar_img][]" id="image-upload" class="myfrm form-control" multiple=""> </div> </div> <div class="col-4 mb-3"> <div class="mb-3"> <label> Photo :</label> <!-- required="required" --> <input type="file" name="companysignatory[' +
        companysignatoryIndex +
        '][company_sign_photo_img][]" id="image-upload" class="myfrm form-control" multiple=""> </div> </div> <div class="col-4 mb-3"> <div class="mb-3"> <label> Spaceman signature :</label> <!-- required="required" --> <input type="file" name="companysignatory[' +
        companysignatoryIndex +
        '][company_sign_spaceman_img][]" id="image-upload" class="myfrm form-control" multiple=""> </div> </div> <div class="col-4 mb-3"> <div class="mb-3"> <label> Declaration :</label> <!-- required="required" --> <input type="file" name="companysignatory[' +
        companysignatoryIndex +
        '][company_sign_declare_img][]" id="image-upload" class="myfrm form-control" multiple=""> </div> </div> <div class="col-4 mb-3"> <div class="mb-3"> <label> Attorney and affidavit (Formet Attached)  :</label> <!-- required="required" --> <input type="file" name="companysignatory[' +
        companysignatoryIndex +
        '][comp_sign_declare_img][]" id="image-upload" class="myfrm form-control" multiple=""> </div> </div> <div class="mt-1 row g-2"> <button class="deletecompanysignatory btn btn-outline-primary me-1 mb-1" type="button"><span class="fas fa-trash me-1" data-fa-transform="shrink-3"></span> Delete Member</button> </div></div>'


    );
});

$(document).on('click', '.deletecompanysignatory', function() {
    $(this).parents("#companysignatoryGroup").remove();
});
 </script>