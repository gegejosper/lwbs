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
                                                        <th>Bill Number</th>
                                                        <th>Meter Number</th>
                                                        <th>Concessionaire</th>
                                                        <th>Due Date</th>
                                                        <th>Clark</th>
                                                        <th>Action</th>
                                                       
                                                    </tr>
                                                   
                                                    @forelse($dataBill as $Bill)
                                                    <tr class="item{{$Bill->id}}">
                                                    <td>{{$Bill->id}}</td>
                                                    <td><a href="/admin/concessionaire/{{$Bill->user->id}}">{{$Bill->meternum}}</a></td>
                                                    <td><a href="/admin/concessionaire/{{$Bill->user->id}}">{{$Bill->user->fname}}</a></td>
                                                    <td>{{$Bill->monthlyDueDate}}</td>
                                                    <td>{{$Bill->concessionaire->clark}}</td>
                                                    <td>
                                                    <a href="/admin/disconnect/{{$Bill->meternum}}" class="btn btn-danger btn-flat">Disconnect</a>
                                                    </td>
                                                    
                                                    </tr>
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
                        <i class="fa fa-dashboard"></i> Concessionaire Overview
                        </div>
                      
                        <div class="panel-body">
                            
                            <div class="small-box bg-aqua">
                                    <div class="inner">
                                        <h3>
                                            {{$dataApplicant}}
                                        </h3>
                                        <p>
                                            Applicants
                                        </p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-person-stalker"></i>
                                    </div>
                                    <a href="/admin/concessionaire/pending" class="small-box-footer">
                                        More info <i class="fa fa-arrow-circle-right"></i>
                                    </a>
                            </div>

                            <div class="small-box bg-aqua">
                                    <div class="inner">
                                        <h3>
                                            {{$dataConcessionaireAll}}
                                        </h3>
                                        <p>
                                            Total Concessionaire
                                        </p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-arrow-graph-up-right"></i>
                                    </div>
                                    <a href="/admin/concessionaire" class="small-box-footer">
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
                                    <a href="/admin/concessionaire/connected" class="small-box-footer">
                                        More info <i class="fa fa-arrow-circle-right"></i>
                                    </a>
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
                                    <a href="/admin/concessionaire/disconnected" class="small-box-footer">
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
                        <i class="fa  fa-cogs"> </i> Settings
                        </div>
                        @foreach($dataSetting as $Setting)
                        <div class="panel-body">
                            <label>Penalty</label>
                            <form method="post" action="{{url('/admin/settings/penalty')}}">
                            {{ csrf_field() }}
                            <div class="form-group input-group">
                                <input type="hidden" value="{{ $Setting->id }}" name="id">
                                <input type="text" class="form-control" placeholder="100" value="{{ $Setting->penalty }}" name="penalty">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="submit"><i class="fa ion-edit"></i></button>
                                </span>
                           
                            </div>
                            </form>
                            <label>Due Date</label>
                            <form method="post" action="{{url('/admin/settings/duedate')}}">
                            {{ csrf_field() }}
                            <div class="form-group input-group">
                                <input type="hidden" value="{{ $Setting->id }}" name="id">
                                <input type="text" class="form-control" placeholder="100" value="{{ $Setting->duedate }}" name="duedate">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="submit"><i class="fa ion-edit"></i>
                                    </button>
                                </span>
                            </div>
                            </form>
                            <label>Discount</label>
                            <form method="post" action="{{url('/admin/settings/discount')}}">
                            {{ csrf_field() }}
                            <div class="form-group input-group">
                                <input type="hidden" value="{{ $Setting->id }}" name="id">
                                <input type="text" class="form-control" placeholder="100" value="{{ $Setting->discount }}" name="discount">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="submit"><i class="fa ion-edit"></i>
                                    </button>
                                </span>
                            </div>
                            </form>
                        </div>
                        @endforeach
                    </div>
                </div>
                <!-- /.col-lg-4 -->
            </div>
                    

                    <!-- top row -->
                    <div class="row">
                        <div class="col-xs-12 connectedSortable">
                            
                        </div><!-- /.col -->
                    </div>
                    <!-- /.row -->
                
                   
                    <!-- Main row -->
                   

                </section><!-- /.content -->
@endsection