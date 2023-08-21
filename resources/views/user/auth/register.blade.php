@extends('user.layouts.app')

@section('content')
<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->
  <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
      <div class="container-fluid">
        <div class="row min-vh-100 flex-center g-0">
          <div class="col-lg-8 col-xxl-5 py-3 position-relative"><img class="bg-auth-circle-shape"
                    src="{{ asset('assets/img/icons/spot-illustrations/bg-shape.png')}}" alt="" width="250"><img
                    class="bg-auth-circle-shape-2" src="{{ asset('assets/img/icons/spot-illustrations/shape-1.png')}}"
                    alt="" width="150">
            <div class="card overflow-hidden z-1">
              <div class="card-body p-0">
                <div class="row g-0 h-100">
                  <div class="col-md-5 text-center bg-card-gradient">
                    <div class="position-relative p-4 pt-md-5 pb-md-7" data-bs-theme="light">
                      <div class="bg-holder bg-auth-card-shape" style="background-image:url({{ asset('assets/img/icons/spot-illustrations/half-circle.png')}});"></div>
                      <!--/.bg-holder-->
                      <div class="z-1 position-relative"><a class="link-light mb-4 font-sans-serif fs-4 d-inline-block fw-bolder" href="#">Finsol</a>
                        <p class="opacity-75 text-white">Save money and Save time with India’s largest tax and financial services software platform Sampurna Suvidha Kendra</p>
                      </div>
                    </div>
                    <div class="mt-3 mb-4 mt-md-4 mb-md-5" data-bs-theme="light">
                      <p class="pt-3 text-white">Have an account?<br><a class="btn btn-outline-light mt-2 px-4" href="#">Log In</a></p>
                    </div>
                  </div>
                  <div class="col-md-7 d-flex flex-center">
                    <div class="p-4 p-md-5 flex-grow-1">
                      <h3>Register</h3>
                      <form class="needs-validation" novalidate=""  method="POST" action="{{ route('register') }}">
                      @csrf
                        <div class="row gx-2">
                          <!-- <div class="mb-3">
                            <label class="form-label" for="aadhar-number">Aadhar Number</label>
                            <input class="form-control" type="number" min="12" autocomplete="on" required="" id="aadhar-number" />
                            <div class="invalid-feedback">Please Provide 16 digit Valid Aadhar Number</div>
                          </div> -->

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
                            <input class="form-control" type="text" name="name"  autocomplete="on" required="" id="" />
                            <div class="invalid-feedback">Please Provide Name</div>
                          </div>

                          <!-- <div class="mb-3">
                            <label class="form-label" for="">Last Name</label>
                            <input class="form-control" type="text"  autocomplete="on" required="" id="" />
                            <div class="invalid-feedback">Please Provide 16 digit Valid Last Name</div>
                          </div> -->

                          <div class="mb-3">
                            <label class="form-label" for="">Email</label>
                            <input class="form-control" type="text" name="email"  autocomplete="on" required="" id="" />
                            <div class="invalid-feedback">Please Provide Email</div>
                          </div>

                          <div class="mb-3">
                            <label class="form-label" for="">Password</label>
                            <input class="form-control" type="password" name="password"  autocomplete="on" required="" id="" />
                            <div class="invalid-feedback">Please Provide Password</div>
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
