@extends('admin.layouts.admin')

@section('content')
 <section class="content">

                    <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                    <i class="fa fa-bars"> </i> List for Disconnection
                    </div>
                    <div class="panel-body">
                        <div class="box box-info">
                            
                            <table class="table table-hover" id="table">
                                <tbody><tr>
                                   
                                    <th>Meter Number</th>
                                    <th>Consumer</th>
                                    <th>Due Date</th>
                                    <th>Purok</th>
                                    <th>Action</th>
                                    
                                </tr>
                                @php 
                                $for_disconnection = 0;
                                @endphp
                                @forelse($dataBill as $Bill)
                                
                                @if($Bill[0]->concessionaire->status != 'disconnected')
                                
                                <tr class="item{{$Bill[0]->id}}">
                                   
                                    <td><a href="/admin/consumer/{{$Bill[0]->concessionaire->id}}">{{$Bill[0]->meternum}}</a></td>
                                    <td><a href="/admin/consumer/{{$Bill[0]->concessionaire->id}}">{{$Bill[0]->concessionaire->last_name}}, {{$Bill[0]->concessionaire->first_name}}</a></td>
                                    <td>{{$Bill[0]->monthlyDueDate}}</td>
                                    <td>{{$Bill[0]->concessionaire->purok}}</td>
                                    <td>
                                        <a href="/admin/disconnect/{{$Bill[0]->meternum}}" class="btn btn-danger btn-flat">Disconnect</a>
                                    </td>
                                </tr>
                                @php 
                                $for_disconnection += 1;
                                @endphp
                                @endif
                                @empty
                                <tr><td colspan="6">No Data</td></tr>
                                @endforelse
                                
                                </tbody>
                            </table>
                        </div> 
                        
                    </div>
                    
                </div>
            </div>
                <!-- /.col-lg-4 -->
                <div class="col-lg-3">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                        <i class="fa fa-dashboard"></i> Consumer's Overview
                        </div>
                      
                        <div class="panel-body">
                            <div class="small-box bg-aqua">
                                    <div class="inner">
                                        <h3>
                                            {{$dataConcessionaireAll}}
                                        </h3>
                                        <p>
                                            Total Consumers
                                        </p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-arrow-graph-up-right"></i>
                                    </div>
                                    <a href="/admin/consumers" class="small-box-footer">
                                        More info <i class="fa fa-arrow-circle-right"></i>
                                    </a>
                            </div>

                            <div class="small-box bg-green">
                                    <div class="inner">
                                        <h3>
                                            {{$dataConcessionaire}}
                                        </h3>
                                        <p>
                                            Total Connected
                                        </p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-stats-bars"></i>
                                    </div>
                                    <a href="/admin/consumer/connected" class="small-box-footer">
                                        More info <i class="fa fa-arrow-circle-right"></i>
                                    </a>
                            </div>
                            <div class="small-box bg-orange">
                                <div class="inner">
                                    <h3>
                                    {{$for_disconnection}}
                                    </h3>
                                    <p>
                                        For disconnection
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-alert-circled"></i>
                                </div>
                            </div>
                            <div class="small-box bg-red">
                                <div class="inner">
                                    <h3>
                                    {{$dataConcessionairediscon}}
                                    </h3>
                                    <p>
                                        Total Disconnected
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-alert-circled"></i>
                                </div>
                                <a href="/admin/consumer/disconnected" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.col-lg-4 -->
                <div class="col-lg-3">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <i class="fa fa-money"> </i> Cashier Report
                        </div>
                        <div class="panel-body">
                            <div class="small-box bg-red">
                                <div class="inner">
                                    <h3>
                                        {{number_format($amount,2)}}
                                    </h3>
                                    <p>
                                        Total Collectibles
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-social-usd"></i>
                                </div>
                                <a href="/admin/collectibles" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                            <div class="small-box bg-blue">
                                <div class="inner">
                                    <h3>
                                    {{number_format($paymentsamount,2)}}
                                    </h3>
                                    <p>
                                        Total Payments
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-social-usd-outline"></i>
                                </div>
                                <a href="/admin/payments" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div> 
                        </div>
                    </div>
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                        <i class="fa fa-envelope-o"> </i> Cashier Report
                        </div>
                        <div class="panel-body">
                            <div class="box box-info">
                                <div class="box-header">
                                    <i class="fa fa-envelope"></i>
                                    <h3 class="box-title">Date Range</h3>
                                    
                                </div>
                                <form action="/admin/report/generate" method="post">
                        {{ csrf_field() }}   
                                       
                                <div class="box-body">
                                        <div class="form-group">
                                        <label for="">From: </label>
                                            <input type="date" class="form-control" name="from" />
                                        </div>
                                        <div class="form-group">
                                        <label for="">To: </label>
                                            <input type="date" class="form-control" name="to"/>
                                        </div>
                                       
                                   
                                </div>
                                <div class="box-footer clearfix">
                                    <button type="submit" class="pull-right btn btn-default" id="sendEmail">Generate Report <i class="fa fa-arrow-circle-right"></i></button>
                                </div>
                                </form>
                            </div> 
                            
                        </div>
                        
                    </div>
                </div>
                <!-- /.col-lg-4 -->
            </div>
                    
                    <!-- Main row -->
                   

                </section><!-- /.content -->
@endsection