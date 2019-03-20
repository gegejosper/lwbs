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
                                            <h3 class="box-title">Profile</h3>
                                            
                                        </div><!-- /.box-header -->
                                        <div class="box-body table-responsive padding">
                                            <div class="row">
                                                <div class="col-lg-12" align="center">
                                                <img src="{{ asset('img/profile.png') }}" class="img-circle text-center" alt="User Image" style="width:100px;" align="center"/><br><br>
                                                <ul class="list-group list-group-flush text-left">
                                                <li class="list-group-item"> <label>Name: </label> {{$Concessionaire->lname}}, {{$Concessionaire->fname}} {{$Concessionaire->mname}} </li>
                                                <li class="list-group-item"><label for="Meter Number">Meter Number: </label> {{$Concessionaire->concessionaire->meternum}}</li>
                                                <li class="list-group-item"><label for="Clark">Clark: </label> {{$Concessionaire->concessionaire->clark}}</li>
                                                <li class="list-group-item"><label for="Clark">Category: </label> {{$Rate->name}}</li>
                                                <li class="list-group-item"><label for="Clark">Status: </label> {{$Concessionaire->concessionaire->status}}</li>
                                                </ul>
                                               
                                                </div>
                                                
                                            </div>
                                        </div><!-- /.box-body -->
                                    </div><!-- /.box -->
                                </div>
                                <div class="col-lg-6">
                                    <div class="box box-primary">
                                            <div class="box-header">
                                                <h3 class="box-title">Recent Bill History</h3>
                                                <div class="box-body table-responsive padding">
                                                    <table class="table table-hover" id="table">
                                                        <tbody><tr>
                                                            <th>Bill Number</th>
                                                            <th>Date</th>
                                                            <th>Cubic Meter</th>
                                                            <th>Amount</th>
                                                            <th>Status</th>

                                                        </tr>

                                                        @foreach($billHistory as $History)
                                                        <tr>
                                                            <td>{{$History->id}}</td>
                                                            <td><a href="/consumer/bill/{{$History->id}}" style="color:blue;">{{$History->monthlyRecordDate}}</a></td>
                                                            <td>{{$History->newrec}}</td>
                                                            <td>{{$History->billAmount}}</td>
                                                            <td><?php
                                                                if($History->status == 1){
                                                                    echo "PAID";
                                                                }
                                                                else {
                                                                    echo "UNPAID";
                                                                }
                                                               
                                                                ?></td>
                                                           
                                                        </tr>
                                                        @endforeach
                                                    </table>
                                                </div>    
                                            </div><!-- /.box-header -->
                                    </div><!-- /.box -->
                                </div>
                                <div class="col-lg-4">
                                    <div class="box box-primary">
                                            <div class="box-header">
                                                <h3 class="box-title">Payment History</h3>
                                                <div class="box-body table-responsive padding">
                                                    <table class="table table-hover" id="table">
                                                        <tbody><tr>
                                                            <th>ID</th>
                                                            <th>Date</th>
                                                            <th>OR Number</th>
                                                            <th>Amount</th>
                                                            <th>Status</th>
                                                           
                                                        </tr>
                                                        @foreach($paymentHistory as $Payment)
                                                        <tr>
                                                            <td>{{$Payment->id}}</td>
                                                            <td>{{$Payment->datepaid}}</td>
                                                            <td>{{$Payment->officialReciept}}</td>
                                                            <td>{{$Payment->amount}}</td>
                                                            <td><?php
                                                                if($Payment->status== 1){
                                                                    echo "PAID";
                                                                }
                                                                else {
                                                                    echo "UNPAID";
                                                                }
                                                               
                                                                ?></td>
                                                           
                                                        </tr>
                                                        @endforeach
                                                    </table>
                                                </div>    
                                            </div><!-- /.box-header -->
                                            <div class="box-body table-responsive no-padding">
                                                
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