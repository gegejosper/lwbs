@extends('admin.layouts.admin')

@section('content')
 <section class="content">
    <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-10">
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="box box-primary">
                                            <div class="box-header">
                                                <h3 class="box-title">{{$headername}} List</h3>
                                                
                                            </div><!-- /.box-header -->
                                            <div class="box-body table-responsive no-padding">
                                                <table class="table table-hover" id="table">
                                                    <tbody><tr>
                                                        <th>Bill Number</th>
                                                        <th>Meter Number</th>
                                                        <th>Concessionaire</th>
                                                        <th>Due Date</th>
                                                        <th>Clark</th>
                                                        <th>Bill Amount</th>
                                                       
                                                    </tr>
                                                    <?php $collectibles = 0; ?>
                                                    @forelse($dataBill as $Bill)
                                                    <tr class="item{{$Bill->id}}">
                                                    <td>{{$Bill->id}}</td>
                                                    <td>{{$Bill->meternum}}</td>
                                                    <td>{{$Bill->user->fname}}</td>
                                                    <td>{{$Bill->monthlyDueDate}}</td>
                                                    <td>{{$Bill->concessionaire->clark}}</td>
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