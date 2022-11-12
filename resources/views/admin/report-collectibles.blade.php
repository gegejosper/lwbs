@extends('admin.layouts.admin')

@section('content')
 <section class="content">
    <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-3 hidden-print noprint">
                            <div class="panel panel-primary">
                                <div class="panel-body">
                                    <div class="box box-info">
                                        <div class="box-header">
                                            <i class="fa fa-envelope"></i>
                                            <h3 class="box-title">Date Range</h3> 
                                        </div>
                                        <form action="/admin/report/collectibles/date_range" method="get">
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
                        <div class="col-lg-9">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="box box-primary">
                                            <div class="box-header">
                                                <h3 class="box-title">{{$headername}} List</h3>
                                                
                                            </div><!-- /.box-header -->
                                            <div class="box-body table-responsive no-padding">
                                                <table class="table table-hover" id="table">
                                                    <tbody><tr>
                                                        <th>Bill Number</th>
                                                        <th>Meter Number</th>
                                                        <th>Consumer</th>
                                                        <th>Due Date</th>
                                                        <th>Purok</th>
                                                        <th>Bill Amount</th>
                                                       
                                                    </tr>
                                                    <?php $collectibles = 0; ?>
                                                    @forelse($dataBill as $Bill)
                                                    <tr class="item{{$Bill->id}}">
                                                    <td>{{$Bill->monthlyBillDate}}-{{$Bill->id}}</td>
                                                    <td>{{$Bill->meternum}}</td>
                                                    <td>{{$Bill->concessionaire->last_name}},{{$Bill->concessionaire->first_name}}</td>
                                                    <td>{{$Bill->monthlyDueDate}}</td>
                                                    <td>{{$Bill->concessionaire->purok}}</td>
                                                    <td>{{number_format($Bill->billAmount,2) }}</td>
                                                    
                                                    </tr>
                                                    <?php  $collectibles = $collectibles + $Bill->billAmount ?>
                                                    @empty
                                                    <tr><td colspan="6">No Data</td></tr>
                                                    @endforelse
                                                    <tr><td colspan="5" align="right"><strong>Total</strong></td><td><strong>{{number_format($collectibles, 2)}}</strong></td></tr>
                                                    </tbody>
                                                </table>
                                            </div><!-- /.box-body -->
                                        </div><!-- /.box -->
                                        <style type="text/css">
                                            @media print {
                                                a[href]:after {
                                                display: none;
                                                visibility: hidden;
                                                }
                                            }
                                        </style>
                                        <button class="btn btn-primary hidden-print noprint" align="right" onclick="myFunction()"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> Print</button>
                                        <script>
                                        function myFunction() {
                                        window.print();}
                                        </script>
                                       
                                </div>
                            </div>
                        </div>
                       
                    <!-- /.row -->
                    </div>
</section><!-- /.content -->
@endsection