@php 
if($user_type =='admin'){
    $layout ='admin';
}else {
    $layout ='reader';
}
@endphp

@extends($layout.'.layouts.admin')

@section('content')
<section class="content invoice">                    

<div class="container-fluid">      
    <div class="row">
        <div class="col-xs-12 col-lg-4">
            <h3>Bill Details</h3>
            <b>Date: </b>{{$Bill->created_at->format('Y-m-d')}}</b> <br>
            <label><b>Name: </b></label> {{$Bill->consumer_details->last_name}}, {{$Bill->consumer_details->first_name}} {{$Bill->consumer_details->middle_name}}</b>
            <br>
            <label for="Meter Number"><b>Meter Number:</b> </label> {{$Bill->consumer_details->meternum}}
            <br>
            <label for="Previous"><b>Previous:</b> </label> {{$Bill->prevrec}}
            <br>
            <label for="Present"><b>Present:</b> </label> {{$Bill->newrec}}
            <br>
            <label for="Cubic"><b>Cubic Consumed:</b> </label> {{$Bill->cubicCount}}
            <br>
            <label for="Amount"><b>Amount:</b> </label> {{number_format($Bill->billAmount,2)}}
            <br>
            <label for="Due Date"><b>Due Date:</b> </label> {{$Bill->monthlyDueDate}}
            <br>
            <label for="Status"><b>Status:</b> </label> {{$Bill->status}}
            <br>
            <label for="Disconnection Date"><b>Disconnection Date:</b> </label> {{$Bill->disconnection}}
            <br>
            <label for="Reader"><b>Reader:</b> </label> {{$Bill->reader_detail->lname}}, {{$Bill->reader_detail->fname}}
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