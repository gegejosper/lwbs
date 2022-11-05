@extends('collector.layouts.admin')

@section('content')
 <section class="content">

    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-lg-9">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Unpaid Bills List</h3>
                
                </div><!-- /.box-header -->
                <div class="col-lg-8 padding pull-right" style="margin-bottom:20px;">
                    <form method="get" action="/collector/search">
                        <div class="input-group input-group-sm">
                            
                            <input type="text" class="form-control" placeholder="Search Consumer" name="q">
                            <span class="input-group-btn">
                                <button class="btn btn-info btn-flat" type="submit">Search</button>
                            </span>
                            {{ csrf_field() }}
                        </div>
                    </form>
                </div>
                <div class="box-body table-responsive padding">
                    <table class="table table-hover" id="table">
                        <tbody>
                            <tr>
                                <th>Meter Number</th>
                                <th>Name</th>
                                <th>Clark</th>
                                <th>Category</th>
                                <th>Amount</th>
                                <th>Action</th>
                            </tr>
                            @foreach($collectibles as $collectible)
                                <tr class="item{{$collectible->id}}">
                                    <td>{{$collectible->consumer_details->meternum}}</td>
                                        <td> <a class="name" href="consumers/{{$collectible->consumer_details->id}}">{{$collectible->consumer_details->last_name}}, {{$collectible->consumer_details->first_name}}</a> </td>
                                    <td>
                                        {{$collectible->consumer_details->purok}}             
                                    </td>
                                   
                                    <td>
                                        {{$collectible->consumer_details->rate->name}}             
                                    </td>
                                    <td> {{number_format($collectible->billAmount,2)}}    </td>
                                    <td class="td-actions">
                                        <a href="payment/{{$collectible->consumer_details->id}}" class="edit-modal btn btn-info btn-flat" ><i class="fa fa-plus"></i></a><a href="consumers/{{$collectible->consumer_details->id}}" class="edit-modal btn btn-primary btn-flat" ><i class="fa fa-search"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
        <!-- /.col-lg-4 -->
        <div class="col-lg-3">
            <!-- <div class="panel panel-primary">
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
            </div> -->
            <!-- <div class="panel panel-primary">
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
             -->
        </div>
    </div>
    <!-- top row -->
    <div class="row">
        <div class="col-xs-12 connectedSortable">
            
        </div><!-- /.col -->
    </div>
    <!-- /.row -->
</section><!-- /.content -->
@endsection