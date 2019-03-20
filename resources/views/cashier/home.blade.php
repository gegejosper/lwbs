@extends('cashier.layouts.admin')

@section('content')
 <section class="content">

                    <!-- Small boxes (Stat box) -->
            <div class="row">
            <div class="col-lg-8">
                                    <div class="box box-primary">
                                            <div class="box-header">
                                                <h3 class="box-title">Concessionaires List</h3>
                                            
                                            </div><!-- /.box-header -->
                                            <div class="col-lg-8 padding pull-right" style="margin-bottom:20px;">
                                            <form method="get" action="/cashier/search">
                                            <div class="input-group input-group-sm">
                                                
                                                    <input type="text" class="form-control" placeholder="Search Concessionaire" name="q">
                                                    <span class="input-group-btn">
                                                        <button class="btn btn-info btn-flat" type="submit">Search</button>
                                                    </span>
                                                    {{ csrf_field() }}
                                                
                                            </div>
                                            </form>
                                            </div>
                                            <div class="box-body table-responsive padding">
                                                <table class="table table-hover" id="table">
                                                    <tbody><tr>
                                                        <th>ID</th>
                                                        <th>Meter Number</th>
                                                        <th>Name</th>
                                                        <th>Clark</th>
                                                        <th>Category</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    @foreach($dataUsers as $User)

                                
                                                   
                                                    <tr class="item{{$User->id}}">
                                                    <td>{{$User->user->id}}</td>
                                                    <td>{{$User->meternum}}</td>
                                                        <td> <a class="name" href="concessionaires/{{$User->user->id}}">{{$User->user->lname}}, {{$User->user->fname}} {{$User->user->mname}}</a> </td>
                                                       <td>
                                                       {{$User->clark}}             
                                                       </td>
                                                       <td>
                                                       {{$User->rate->name}}             
                                                       </td>
                                                        <td class="td-actions">
                                                            <a href="payment/{{$User->userId}}" class="edit-modal btn btn-info btn-flat" >Add Payment</a><a href="concessionaires/{{$User->user->id}}" class="edit-modal btn btn-primary btn-flat" >View Account Record</a></td>
                                                        
                                                    </tr>
                                               
                                                    @endforeach
                                                    
                                                    </tbody>
                                                </table>
                                            </div><!-- /.box-body -->
                                        </div><!-- /.box -->
                                
                                </div>
                <!-- /.col-lg-4 -->
                <div class="col-lg-3">
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
                                <form action="/cashier/report/generate" method="post">
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
                                    <a href="#" class="small-box-footer">
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
                                    <a href="#" class="small-box-footer">
                                        More info <i class="fa fa-arrow-circle-right"></i>
                                    </a>
                            </div>
                            
                            
                        </div>
                        
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