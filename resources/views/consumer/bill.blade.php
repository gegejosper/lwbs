@extends('consumer.layouts.admin')

@section('content')
 <section class="content">
    <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-2">
                                    <div class="box box-primary">
                                        <div class="box-header">
                                            <h3 class="box-title">Bill Details</h3>
                                            
                                        </div><!-- /.box-header -->
                                        <div class="box-body table-responsive padding">
                                            <div class="row">
                                                <div class="col-lg-12" align="center">
                                               
                                                <ul class="list-group list-group-flush text-left">
                                                <li class="list-group-item"> <label>Bill Number: </label> {{$billHistory->id}}</li>
                                                <li class="list-group-item"><label for="Meter Number">Meter Number: {{$billHistory->meternum}}</label> </li>
                                                <li class="list-group-item"><label for="Clark">Previous Cubic Record: {{$billHistory->prevrec}}</label> </li>
                                                <li class="list-group-item"><label for="Clark">New Cubic Record: {{$billHistory->newrec}}</label> </li>
                                                <li class="list-group-item"><label for="Clark">Consume Cubic Count: {{$billHistory->cubicCount}}</label></li>
                                                <li class="list-group-item"><label for="Clark">Date Billed: {{$billHistory->monthlyRecordDate}}</label></li>
                                                <li class="list-group-item"><label for="Clark">Due Date: {{$billHistory->monthlyDueDate}}</label></li>
                                                <li class="list-group-item"><label for="Clark">Amount: {{number_format($billHistory->billAmount, 2)}}</label></li>
                                                </ul>
                                               
                                                </div>
                                                
                                            </div>
                                        </div><!-- /.box-body -->
                                    </div><!-- /.box -->
                                </div>
                               
                                
                            </div>
                        </div>
                       
                    <!-- /.row -->
                    </div>
</section><!-- /.content -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/concessionairescript.js') }}"></script>
@endsection