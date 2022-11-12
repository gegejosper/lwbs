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
                            <form action="/admin/report/consumers/date_range" method="get">
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
                        <div class="panel panel-default">
                            <div class="panel-heading">
                            Consumers By Purok
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body text-left">
                                <a href="/admin/report/consumers/purok/Lumboy" type="button" class="btn btn-info btn-sm">Lumboy</a>
                                <a href="/admin/report/consumers/purok/San Antonio"  type="button" class="btn btn-info btn-sm">San Antonio</a>
                                <a href="/admin/report/consumers/purok/Mangga" type="button" class="btn btn-info btn-sm">Mangga</a>
                                <a href="/admin/report/consumers/purok/Madasigon" type="button" class="btn btn-info btn-sm">Madasigon</a>
                                <a href="/admin/report/consumers/purok/Maharlika" type="button" class="btn btn-info btn-sm">Maharlika</a>
                                <a href="/admin/report/consumers/purok/Masanayon" type="button" class="btn btn-info btn-sm">Masanayon</a>
                            </div>
                        <!-- /.panel-body -->
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                            Consumers By Status
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body text-left">
                                <a href="/admin/consumer/connected" type="button" class="btn btn-info btn-sm">Connected</a>
                                <a href="/admin/consumer/disconnected"  type="button" class="btn btn-warning btn-sm">Disconnected</a>
                                
                            </div>
                        <!-- /.panel-body -->
                        </div>
                        
                    </div> 
                </div>
            </div>
            <div class="col-lg-9">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="box box-primary">
                            <div class="box-header">
                                <h3 class="box-title">{{$filtername}} Consumer's List</h3>
                                
                            </div><!-- /.box-header -->
                            <div class="box-body table-responsive no-padding">
                                <table class="table table-hover" id="table">
                                    <tbody><tr>
                                        <th>#</th>
                                        <th>Meter Number</th>
                                        <th>Name</th>
                                        <th>Purok</th>
                                        <th>Status</th>
                                    </tr>
                                    @php 
                                        $count = 1;
                                    @endphp 
                                    @forelse($dataUser as $User)
                                    <tr class="item{{$User->id}}">
                                    
                                    <td>{{$count}}</td>
                                    <td>{{$User->meternum}}</td>
                                        <td> <a class="name" href="/admin/consumer/{{$User->id}}">{{$User->last_name}}, {{$User->first_name}} {{$User->middle_name}}</a> </td>     
                                    <td>{{$User->purok}}</td>
                                    <td>{{$User->status}}</td>
                                    </tr>
                                    @php 
                                        $count += 1;
                                    @endphp 
                                    @empty
                                    <tr><td colspan="6">No Data</td></tr>
                                    @endforelse
                                    
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
                        <div>{{ $dataUser->links() }}</div>
                    </div>
                </div>
            </div>
        </div>
    <!-- /.row -->
    </div>
</section><!-- /.content -->
@endsection