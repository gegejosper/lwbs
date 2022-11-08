@php 
if($user_type =='admin'){
    $layout ='admin';
}else {
    $layout ='collector';
}
@endphp

@extends($layout.'.layouts.admin')

@section('content')
<section class="content invoice">                    

<div class="container-fluid">      
    <div class="row">
        <div class="col-xs-12 col-lg-4">
            <h3>Payment Details</h3>
            <b>Date: </b>{{$Bill->created_at->format('Y-m-d')}}</b> <br>
            <label><b>Name: </b></label> {{$Bill->consumer_details->last_name}}, {{$Bill->consumer_details->first_name}} {{$Bill->consumer_details->middle_name}}</b>
            <br>
            <label for="Meter Number"><b>Meter Number:</b> </label> {{$Bill->consumer_details->meternum}}
            <br>
            <label for="OR Number"><b>OR Number:</b> </label> {{$Bill->officialReciept}}
            <br>
            <label for="OR Number"><b>Amount paid:</b> </label> {{number_format($Bill->amount,2)}}
            <br>
            <label for="OR Number"><b>Cash Rendered:</b> </label> {{number_format($Bill->cash_rendered,2)}}
            <br>
            <label for="OR Number"><b>Change:</b> </label> {{$Bill->change}}
            <br>
            <label for="OR Number"><b>Processed by:</b> </label> {{$Bill->user_details->lname}}, {{$Bill->user_details->fname}}
            <br>

        </div><!-- /.col -->
    </div><!-- /.row -->
    <!-- this row will not appear when printing -->
    <div class="row no-print">
        <div class="col-xs-12">
            <button class="btn btn-default" onclick="window.print();"><i class="fa fa-print"></i> Print</button>
        </div>
    </div>
</div>
</section>
<!-- /.content -->
    <script src="{{ asset('js/app.js') }}"></script>
@endsection