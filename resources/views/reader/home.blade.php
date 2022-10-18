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
                        Concessionaires By Purok
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body text-left">
                            <a href="concessionaires/purok/Lumboy" type="button" class="btn btn-info btn-lg">Lumboy</a>
                            <a href="concessionaires/purok/San Antonio"  type="button" class="btn btn-info btn-lg">San Antonio</a>
                            <a href="concessionaires/purok/Mangga" type="button" class="btn btn-info btn-lg">Mangga</a>
                            <a href="concessionaires/purok/Madasigon" type="button" class="btn btn-info btn-lg">Madasigon</a>
                            <a href="concessionaires/purok/Maharlika" type="button" class="btn btn-info btn-lg">Maharlika</a>
                            <a href="concessionaires/purok/Masanayon" type="button" class="btn btn-info btn-lg">Masanayon</a>
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