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
                    <div class="card-header pb-0">
                        <h6 class="mb-0 mt-2 d-flex align-items-center">List of Users</h6>
                    </div>
                    <div class="card-body d-flex flex-column justify-content-end">
                        <div class="row">
                            <div class="col-12">
                            @if (session()->has('message'))
    <p class="alert alert-success alert-dismissible fade show" role="alert">{{ session('message') }}
   
  </p>
@endif
                                <div id="tableExample"
                                    data-list='{"valueNames":["name","email","age"],"page":5,"pagination":true}'>
                                    <div class="table-responsive scrollbar">
                                    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                                        <table class="table table-bordered table-striped fs--1 mb-0">
                                            <thead class="bg-200 text-900">
                                                <tr>
                                                    <th class="sort" data-sort="name">Name</th>
                                                    <th class="sort" data-sort="email">Email</th>
                                                    <th class="sort" data-sort="age">Status</th>
                                                    
                                                    <th class="sort" data-sort="age">Details</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody class="list">
                                                @foreach ($users as $keyname => $user)
                                                <tr>
                                                    <td class="name">{{$user['name']}}</td>
                                                    <td class="email">{{$user['email']}}</td>
                                                    <td class="age">{{$user['status']}}</td>
                                                    
                                                    <td class="gst"><a
                                                            href="{{ URL('/admin/user/profile/'.$user['id'] )}}">View Profile</a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="row align-items-center mt-3">
                                        <div class="pagination d-none"></div>
                                        <div class="col">
                                            <p class="mb-0 fs--1">
                                                <span class="d-none d-sm-inline-block"
                                                    data-list-info="data-list-info"></span>
                                                <span class="d-none d-sm-inline-block"> &mdash;</span>
                                                <a class="fw-semi-bold" href="#!" data-list-view="*">View all<span
                                                        class="fas fa-angle-right ms-1"
                                                        data-fa-transform="down-1"></span></a><a
                                                    class="fw-semi-bold d-none" href="#!" data-list-view="less">View
                                                    Less<span class="fas fa-angle-right ms-1"
                                                        data-fa-transform="down-1"></span></a>
                                            </p>
                                        </div>
                                        <div class="col-auto d-flex"><button class="btn btn-sm btn-primary"
                                                type="button"
                                                data-list-pagination="prev"><span>Previous</span></button><button
                                                class="btn btn-sm btn-primary px-4 ms-2" type="button"
                                                data-list-pagination="next"><span>Next</span></button></div>
                                    </div>
                                </div>



                            </div>
                            <div class="col-auto ps-0">
                                <div class="echart-bar-weekly-sales h-100"></div>
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

{{--@push('custom_scripts)--}}
{{--@endpush--}}