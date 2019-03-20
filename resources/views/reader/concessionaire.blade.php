@extends('reader.layouts.admin')

@section('content')
 <section class="content">
    <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-10">
                            <div class="row">
                                <div class="col-lg-3">
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
                                                <h3 class="box-title">Bill History</h3>
                                                <div class="box-body table-responsive padding">
                                                    <table class="table table-hover" id="table">
                                                        <tbody><tr>
                                                            <th>ID</th>
                                                            <th>Date</th>
                                                            <th>OR Number</th>
                                                            <th>Amount</th>
                                                            <th>Status</th>
                                                            <th>Action</th>
                                                        </tr>
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