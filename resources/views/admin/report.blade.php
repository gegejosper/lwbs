@extends('admin.layouts.admin')

@section('content')
 <section class="content">
    <div class="container-fluid">
                               <!-- Small boxes (Stat box) -->
            <div class="row">
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

</div>
<!-- /.col-lg-4 -->
</div>
    
    </div>
           

</section><!-- /.content -->
@endsection