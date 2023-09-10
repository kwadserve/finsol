@extends('user.layouts.app')
@section('content')
@php
use App\Models\UserGstDetail;
@endphp
<!-- ===============================================-->
<!--    Main Content-->
<!-- ===============================================-->
<main class="main" id="top">
    <div class="container" data-layout="container">
        @include('user.partials.header')
        <div class="content">
            @include('user.partials.aside')
            <div class="row g-3">
                <div class="col-xl-12">
                    <div class="card mb-3">
                        <!-- ============================================-->
                        <!-- <section> begin ============================-->
                        <section class="text-center">
                            <div class="card-body">

                                <div class="row mt-2 g-3">
                                    <div class="card-body" bis_skin_checked="1">

                                        <div class="table-responsive scrollbar">
                                            <div class="container">
                                                <div class="col-md-12">
                                                    <div class="panel panel-default">
                                                        <div class="panel-body">

                                                        <b>Payment Report</b> <br/><br/>  
 
<table class="table table-condensed table-striped">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Payment Status</th>
                <th scope="col">Type</th>
                <th scope="col">Amount</th>
                <th scope="col">Payment Id</th>
                <th scope="col">Payment Request Id</th>
                <th scope="col">Created at</th>

            </tr>
        </thead>

        <tbody>
             @php $t=1; @endphp
            @foreach($payment_history as $detail)
            <tr class="align-middle">

            @php
            $payment_status = $detail->staus;
            if($detail->staus == 'Credit'){
                $payment_status = 'Success';
            }
            @endphp
                <td class="text-nowrap">{{$t}}</td>

                <td class="text-nowrap">
                {{$payment_status}}
                </td>
                <td class="text-nowrap">
                {{$detail->type}}
                </td>
                <td class="text-nowrap">
                ₹{{$detail->amount}}
                </td>
                <td class="text-nowrap">
                {{$detail->payment_id}}
                </td>
                <td class="text-nowrap">
                {{$detail->payment_request_id}}
                </td>
                <td class="text-nowrap">
                {{$detail->created_at}}
                </td>

            </tr>
            @php $t++; @endphp
            @endforeach
            
        </tbody>
        </table>
 
                                                           
                                                        </div>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!------ GST options drop close ------->
                            </div><!-- end of .container-->
                        </section><!-- <section> close ============================-->
                        <!-- ============================================-->
                    </div>
                </div>
            </div>
            @include('user.partials.footer')
        </div>
    </div>
</main><!-- ===============================================-->
<!--    End of Main Content-->
<!-- ===============================================-->
@endsection

<style>
.hiddenRow {
    padding: 0 !important;
}

.hiddenRow1 {
    padding: 0 !important;
}

.hiddenRow2 {
    padding: 0 !important;
}
</style>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" crossorigin="anonymous">
</script>