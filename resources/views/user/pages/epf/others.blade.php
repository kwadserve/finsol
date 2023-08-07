<div class="tab-pane fade" id="epf-others" role="tabpanel" aria-labelledby="profile-tab">
    <form class="needs-validation" novalidate="novalidate" action="{{route('epf.register.others')}}" method="post"
        enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="epf_type" value="Others" />
        <div class="detailsmargin card-header d-flex flex-between-center bg-light py-2">
            <h6 class="detailspadding mb-0">Details of your Business</h6>
        </div>
        <div class="mt-1 row g-2">
            
               <!-- to be connected to backend --->
                                    <div class="col-6">
                                        <div class="mb-3">
                                         <label class="form-label" for="bootstrap-wizard-validation-wizard-company">Name
                                         </label><input class="form-control" type="text" name="epf_name" placeholder="Name"
                                             required="required" />
                                             <div class="invalid-feedback">Please provide a name</div>
                                        </div>
                                     </div>
                                     <!-- to be connected to backend --->

            <div class="col-6">
                <div class="mb-3">
                    <label class="form-label" for="bootstrap-wizard-validation-wizard-email">Business
                        Email</label><input class="form-control" type="email" name="email_id"
                        placeholder="Email address" pattern="^([a-zA-Z0-9_.-])+@(([a-zA-Z0-9-])+.)+([a-zA-Z0-9]{2,4})+$"
                        required="required" id="bootstrap-wizard-validation-wizard-email"
                        data-wizard-validate-email="true" />
                    <div class="invalid-feedback">You must add email</div>
                </div>
            </div>
            <div class="col-6">
                <div class="mb-3">
                    <label class="form-label" for="form-wizard-progress-wizard-addregnum">Mobile
                        number
                        registered with aadhar</label><input class="form-control" required="" type="text"
                        name="mobile_number" maxlength="10" placeholder="Enter Mobile No"
                        id="form-wizard-progress-wizard-addregnum" />
                    <div class="invalid-feedback">Please provide Mobile
                        number</div>
                </div>
            </div>
            <div class="detailsmargin card-header d-flex flex-between-center bg-light py-2">
                <h6 class="detailspadding mb-0">Upload documents of
                    Epf Others</h6>
            </div>
            <div class="row g-2 ">
                @foreach ($epf_other_images as $keyname => $image)
                <div class="col-6 mb-3">
                    <div class="mb-3">
                        <label>{{$image['doc_name']}} Upload :</label>
                        <!-- required="required"  -->
                        <input type="file" name="{{$image['doc_key_name']}}[]" id="image-upload"
                            class="myfrm form-control" multiple />
                    </div>
                </div>
                @endforeach
            </div>
            <div class="col-4">
                <div class="mb-3">
                    <button class="btn btn-primary me-1 mb-1" type="submit">Submit and Pay</button>
                         <p>Amount : ₹1500</p>
                </div>
            </div>
        </div>
    </form>
</div>