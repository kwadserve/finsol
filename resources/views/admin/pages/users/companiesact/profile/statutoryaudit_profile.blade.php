@if ($statutoryauditDetails)
    <div class="card mb-3">
        <div class="card-header">
            <h5 class="mb-0">Satutory Audit Details</h5>
        </div>
        <div class="card-body bg-light row">
            <div class="col-lg-6 mb-3"> <label class="form-label" for="gst-type">Name of Compaany :
                </label>{{ $statutoryauditDetails->name_of_company }}</div>
            <div class="col-lg-6 mb-3"> <label class="form-label" for="pan-number">Company Number :
                </label>{{ $statutoryauditDetails->company_number }}</div>
            <div class="col-lg-6 mb-3"> <label class="form-label" for="mobile">Mobile :
                </label>{{ $statutoryauditDetails->mobile_number }}</div>
            <div class="col-lg-6 mb-3"> <label class="form-label" for="email1">Email :
                </label>{{ $statutoryauditDetails->email_id }}
            </div>

        </div>
    </div>
    @if (session('filenotexistsection1'))
        <div class="alert alert-danger border-2 d-flex align-items-center" role="alert">
            <div class="bg-danger me-3 icon-item"><span class="fas fa-check-circle text-white fs-3"></span>
            </div>
            <p class="mb-0 flex-1">{{ session('filenotexistsection1') }}</p>
            <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if ($statutoryauditDetails->type == 'New StatutoryAudit Registration')
        <div class="card mb-3">

            <div class="card-header">
                <h5 class="mb-0">Documents</h5>
            </div>
            <div class="card-body bg-light">

                @include('admin.pages.users.companiesact.profile.common', [
                    'documents' => $statutoryauditDocuments,
                    'form_type' => 'Mgt',
                    'details' => $statutoryauditDetails,
                ])
            </div>

        </div>
    @endif
@endif
