<div class="tab-pane fade" id="pill-tab-profile" role="tabpanel"
                                aria-labelledby="profile-tab">
                                <form class="needs-validation" novalidate="novalidate" action="{{ route('gst.uploaddocumentscreate') }}" method="post"enctype="multipart/form-data">
                                    @csrf
                                  <div class="detailsmargin card-header d-flex flex-between-center bg-light py-2">
                                    <h6 class="detailspadding mb-0">Select Business</h6>
                                  </div>
                                  <div class="mt-1 row g-2">
                                    <div class="col-6">
                                      <div class="mb-3">
                                      <label class="form-label" for="form-wizard-progress-wizard-legalnamename">Select
                                          GST Number</label>
                                        <select name="gstnumber" class="form-select" id="gstSelect2" required="required" onChange="getTradeName2()"
                                          aria-label="Default select example">
                                          <option value="">GST Number</option>
                                           @foreach ($gstNumbers  as $key => $numbers)
                                                <option value="{{ $numbers->gst_number }}">{{ $numbers->gst_number }}</option>
                                            @endforeach
                                        </select>
                                         
                                        <input type="hidden" name="doc_type" value="Quarterly"  />
                                        <div class="invalid-feedback">Please select GST Number</div>
                                      </div>
                                    </div>
                                    <div class="col-6">
                                      <div class="mb-3">
                                        <label class="form-label" for="form-wizard-progress-wizard-legalnamename">Trade
                                          Name of
                                          the
                                          Business</label><input required="" class="form-control tradeName2" type="text" disabled
                                          name="name" placeholder="Legal Name of Business"
                                          id="form-wizard-progress-wizard-legalname"
                                          data-wizard-validate-legal-name="true" />
                                        <div class="invalid-feedback">Please provide Trade Name</div>
                                      </div>
                                    </div>
                                    <div class="detailsmargin card-header d-flex flex-between-center bg-light py-2">
                                      <h6 class="detailspadding mb-0">Select Year and Month</h6>
                                    </div>
                                  </div>
                                  <div class="mt-1 row g-2">
                                    <div class="col-6">
                                      <div class="mb-3">
                                        <label class="form-label" for="form-wizard-progress-wizard-legalnamename">Select
                                          Year</label>
                                          <select class="form-select" required="required" name="year" aria-label="Default select example">
                                            @php
                                                $currentYear = date('Y');
                                                $startYear = $currentYear - 20;
                                                $endYear = $currentYear;
                                            @endphp
                                            <option value="">Select Year</option>
                                            @for ($year = $endYear; $year >= $startYear; $year--)
                                                <option value="{{ $year }}">{{ $year }}</option>
                                            @endfor
                                        </select>
                                        <div class="invalid-feedback">Please select Year</div>
                                      </div>
                                    </div>
                                    <div class="col-6">
                                      <div class="mb-3">
                                        <label class="form-label" for="form-wizard-progress-wizard-legalnamename">Select
                                          Quarter</label>

                                          <select class="form-select" required="required" name="quarter">
                                          <option value="">Select Quarter</option>
     
     <option value="{{ 'January-March' }}">{{ 'January-March' }}</option>
     <option value="{{ 'April-June'  }}">{{ 'April-June'  }}</option>
     <option value="{{ 'July-September' }}">{{ 'July-September' }}</option>
     <option value="{{ 'October-December' }}">{{ 'October-December' }}</option>
</select>

                                        
                                        <div class="invalid-feedback">Please select Quarter</div>
                                      </div>
                                    </div>
                                    <div class="detailsmargin card-header d-flex flex-between-center bg-light py-2">
                                      <h6 class="detailspadding mb-0">Upload documents to file returns</h6>
                                    </div>
                                    <div class="col-12">
                                    <input type="file" name="documents[]" required="required" class="form-control" multiple /> 
                                      <!-- <div class="bg-light">
                                        <div class="tab-content">
                                          <div class="tab-pane preview-tab-pane active" role="tabpanel"
                                            aria-labelledby="tab-dom-77cd7e82-0ae3-4189-b6e8-f4e60ff78ac7"
                                            id="dom-77cd7e82-0ae3-4189-b6e8-f4e60ff78ac7">
                                            <div class="dropzone dropzone-multiple p-0" id="my-awesome-dropzone"
                                              data-dropzone="data-dropzone" action="#!">
                                              <div class="fallback"><input name="file" type="file"
                                                  multiple="multiple" /></div>
                                              <div class="dz-message" data-dz-message="data-dz-message"> <img
                                                  class="me-2" src="assets/img/icons/cloud-upload.svg" width="25"
                                                  alt="" />CLick or Drop your
                                                files here
                                              </div>
                                              <div class="dz-preview dz-preview-multiple m-0 d-flex flex-column">
                                                <div class="d-flex media mb-3 pb-3 border-bottom btn-reveal-trigger">
                                                  <img class="dz-image" src="assets/img/generic/image-file-2.png"
                                                    alt="..." data-dz-thumbnail="data-dz-thumbnail" />
                                                  <div class="flex-1 d-flex flex-between-center">
                                                    <div>
                                                      <h6 data-dz-name="data-dz-name"></h6>
                                                      <div class="d-flex align-items-center">
                                                        <p class="mb-0 fs--1 text-400 lh-1" data-dz-size="data-dz-size">
                                                        </p>
                                                        <div class="dz-progress"><span class="dz-upload"
                                                            data-dz-uploadprogress=""></span></div>
                                                      </div>
                                                      <span class="fs--2 text-danger"
                                                        data-dz-errormessage="data-dz-errormessage"></span>
                                                    </div>
                                                    <div class="dropdown font-sans-serif">
                                                      <button
                                                        class="btn btn-link text-600 btn-sm dropdown-toggle btn-reveal dropdown-caret-none"
                                                        type="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false"><span
                                                          class="fas fa-ellipsis-h"></span></button>
                                                      <div class="dropdown-menu dropdown-menu-end border py-2"><a
                                                          class="dropdown-item" href="#!"
                                                          data-dz-remove="data-dz-remove">Remove
                                                          File</a>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                      </div> -->
                                    </div>
                                    <div class="col-4"></div>
                                    <div class="col-4">
                                      <div class="mb-3">
                                        <button class="mt-4 btn btn-primary me-1 mb-1" type="submit">Upload Quarter Documents</button>
                                      </div>
                                    </div>
                                    <div class="col-4"></div>
                                  </div>

                                </form>
                              </div>

                            