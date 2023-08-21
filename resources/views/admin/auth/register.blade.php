@extends('admin.layouts.admin')

{{--@push('custom_styles')--}}
{{--@endpush--}}

@section('content')
<!-- ===============================================-->
<!--    Main Content-->
<!-- ===============================================-->
<main class="main" id="top">
    <div class="container" data-layout="container">
        @include('admin.partials.aside')
        <div class="row g-3 mb-3">

        <div class="col-md-12 col-xxl-3">
                <div class="card h-md-100 ecommerce-card-min-width">

                    <div class="card-body d-flex flex-column justify-content-end">
                        <div class="row">
                            <div class="col-8">
                            <form class="needs-validation" novalidate=""  action="{{ url('admin/users/adduser') }}" method="POST" >
                      @csrf
                                <div class="row">


                                @if ($errors->any())    
    <ul>
    @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
    </ul>
@endif

@if (session()->has('message'))
    <p class="alert alert-success alert-dismissible fade show" role="alert">{{ session('message') }}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  </p>
@endif

<div class="mb-3">
                            <label class="form-label" for="">Name</label>
                            <input class="form-control" required="required" type="text" name="name"  autocomplete="on" required="" id="" />
                            <div class="invalid-feedback">Please Provide Name</div>
                          </div>

                        
                          <div class="mb-3">
                            <label class="form-label" for="">Email</label>
                            <input class="form-control" type="text" required="required" name="email"  autocomplete="on" required="" id="" />
                            <div class="invalid-feedback">Please Provide Email</div>
                          </div>

                          <div class="mb-3">
                            <label class="form-label" for="">Password</label>
                            <input class="form-control" required="required" type="password" name="password"  autocomplete="on" required="" id="" />
                            <div class="invalid-feedback">Please Provide Password</div>
                          </div>

                          <div class="mb-3">
                            <label for="typeofuser" class="form-label">Select Type Of User:</label>
                            <select class="form-select" name="type_of_user" required id="typeofuser">
                              <option value="">Type Of User</option>
                                <option value="Head Office">Head Office</option>
                                <option value="State Office">State Office</option>
                                <option value="District Office">District Office</option>
                                <option value="Block Office">Block Office</option>
                            </select>
                          </div>

                          <div class="mb-3">
                            <label for="stateSelect" class="form-label">Select State:</label>
                            <select class="form-select" name="state" id="stateSelect">
                              <option value="">Select State</option>
                              @foreach ($states as $state)
                                <option value="{{ $state->id }}">{{ $state->name }}</option>
                              @endforeach
                            </select>
                          </div>
  
                          <div class="mb-3">
                            <label for="districtSelect" class="form-label">Select District:</label>
                            <select class="form-select" name="district" id="districtSelect">
                              <option value="">Select District</option>
                            </select>
                          </div>
  
                            <div class="mb-3">
                              <label for="blockSelect" class="form-label">Select Block:</label>
                              <select class="form-select" name="block" id="blockSelect">
                                <option value="">Select Block</option>
                              </select>
                            </div>
                          
                          
                          
                            <div class="mb-3">
                              <button class="btn btn-primary d-block w-100 mt-3" type="submit" name="submit">Create User</button>
                            </div>
                       
                          
                      </form>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('admin.partials.footer')
    </div>
</main><!-- ===============================================-->
<!--    End of Main Content-->
<!-- ===============================================-->
@endsection

     
   
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  var urlpath="{{ $routeUrl }}";

$(document).ready(function() {
  $('#stateSelect').change(function() {
       
    var stateId = $(this).val();
    console.log('urlpath',urlpath); 
    if (stateId) {
      $.ajax({
        url:  urlpath+'/get-districts/' + stateId,
        type: 'GET',
        dataType: 'json',
        success: function(data) {
          $('#districtSelect').empty().append('<option value="">Select District</option>');
          $.each(data, function(key, value) {
            $('#districtSelect').append('<option value="' + value.d_code + '">' + value.name + '</option>');
          });
        }
      });
    } else {
      $('#districtSelect').empty().append('<option value="">Select District</option>');
      $('#blockSelect').empty().append('<option value="">Select Block</option>');
    }
  });

  $('#districtSelect').change(function() {
    var districtId = $(this).val();
    if (districtId) {
      $.ajax({
        url:  urlpath+'/get-blocks/' + districtId,
        type: 'GET',
        dataType: 'json',
        success: function(data) {
          $('#blockSelect').empty().append('<option value="">Select Block</option>');
          $.each(data, function(key, value) {
            $('#blockSelect').append('<option value="' + value.id + '">' + value.name + '</option>');
          });
        }
      });
    } else {
      $('#blockSelect').empty().append('<option value="">Select Block</option>');
    }
  });
});
</script>
