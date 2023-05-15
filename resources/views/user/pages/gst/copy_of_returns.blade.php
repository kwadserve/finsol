 @extends('user.layouts.app')
 @section('content')
 <!-- ===============================================-->
 <!--    Main Content-->
 <!-- ===============================================-->
 <main class="main" id="top">
     <div class="container" data-layout="container">
         @include('user.partials.header')
         <div class="content">
             @include('user.partials.aside')
             <div class="row g-3">
                 <div class="col-md-12 col-xxl-3">
                     <div class="card h-md-100 ecommerce-card-min-width">
                         <!-- ============================================-->
                         <!-- <section> begin ============================-->
                         <section class="text-center">
                             <div class="container">
                                 <div class="row">
                                     <div class="col">
                                         <h1 style="color: #2a3468;" class="fs-2 fs-sm-4 fs-md-5">
                                             <font color="#ec465f">Copy Of Returns</font>
                                         </h1>
                                         <p class="lead">Things you will get right out of the box with Finsol.</p>
                                     </div>
                                 </div>

                                 <!------ GST options drop ------->

                                 <div class="mt-1 row g-2">
                                     <div class="col-3">
                                         <div class="mb-3">
                                             <label class="form-label"
                                                 for="form-wizard-progress-wizard-legalnamename">GST
                                                 Number</label><input required="" class="form-control" type="text"
                                                 name="gst_number" placeholder="Gst Number"
                                                 id="form-wizard-progress-wizard-legalname"
                                                 data-wizard-validate-legal-name="true" />
                                             <div class="invalid-feedback">Please provide GST Number
                                             </div>
                                         </div>
                                     </div>

                                     <div class="col-3">
                                         <div class="mb-3">
                                             <label class="form-label"
                                                 for="form-wizard-progress-wizard-legalnamename">Year</label>
                                             <select class="form-control" id="year" name="year">
                                                 <option value="0">Select Year</option>
                                                 @for($i = date('Y'); $i >= 2020; $i--)
                                                 <option value="{{ $i }}">{{ $i }}</option>
                                                 @endfor
                                             </select>
                                             <div class="invalid-feedback">Please provide Year
                                             </div>
                                         </div>
                                     </div>

                                     <div class="col-3">
                                         <div class="mb-3">
                                             <label class="form-label"
                                                 for="form-wizard-progress-wizard-legalnamename">Month/Quarter</label>
                                             <select class="form-control" id="month" name="month">
                                                 <option value="0">Select Month/Quarter</option>
                                                 <option value="1">January</option>
                                                 <option value="2">February</option>
                                                 <option value="3">March</option>
                                                 <option value="4">April</option>
                                                 <option value="5">May</option>
                                                 <option value="6">June</option>
                                                 <option value="7">July</option>
                                                 <option value="8">August</option>
                                                 <option value="9">September</option>
                                                 <option value="10">October</option>
                                                 <option value="11">November</option>
                                                 <option value="12">December</option>
                                                 <option value="Q1">1st Quarter</option>
                                                 <option value="Q2">2nd Quarter</option>
                                                 <option value="Q3">3rd Quarter</option>
                                                 <option value="Q4">4th Quarter</option>
                                             </select>
                                             <div class="invalid-feedback">Please provide Month Or Quarter
                                             </div>
                                         </div>
                                     </div>


                                     <div class="col-3">
                                         <div class="mb-3">
                                             <label class="form-label">Find</label>
                                             <input class="form-control btn btn-primary" type="submit" name="submit"
                                                 value="Search" />
                                         </div>
                                     </div>

                                 </div>


                                 <!------ GST options drop close ------->
                             </div>
                     </div><!-- end of .container-->
                     </section><!-- <section> close ============================-->
                     <!-- ============================================-->



                 </div>
             </div>
             @include('user.partials.footer')
         </div>
     </div>
     </div>
 </main><!-- ===============================================-->
 <!--    End of Main Content-->
 <!-- ===============================================-->
 @endsection