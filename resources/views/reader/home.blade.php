@extends('reader.layouts.admin')

@section('content')
 <section class="content">

                    <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-5 ">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                        <i class="fa fa-gears"></i> Reading Shortcut
                        </div> 
                        <div class="panel-body">
                                    
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                Consumers By Purok
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body text-left">
                                    <a href="/reader/concessionaires/purok/Lumboy" type="button" class="btn btn-info btn-sm">Lumboy</a>
                                    <a href="/reader/concessionaires/purok/San Antonio"  type="button" class="btn btn-info btn-sm">San Antonio</a>
                                    <a href="/reader/concessionaires/purok/Mangga" type="button" class="btn btn-info btn-sm">Mangga</a>
                                    <a href="/reader/concessionaires/purok/Madasigon" type="button" class="btn btn-info btn-sm">Madasigon</a>
                                    <a href="/reader/concessionaires/purok/Maharlika" type="button" class="btn btn-info btn-sm">Maharlika</a>
                                    <a href="/reader/concessionaires/purok/Masanayon" type="button" class="btn btn-info btn-sm">Masanayon</a>
                                </div>
                            <!-- /.panel-body -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.col-lg-4 -->
                
                    

                    <!-- top row -->
                    <div class="row">
                        <div class="col-xs-12 connectedSortable">
                            
                        </div><!-- /.col -->
                    </div>
                    <!-- /.row -->
                
                   
                    <!-- Main row -->
                   

                </section><!-- /.content -->
@endsection