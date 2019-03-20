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
                        Concessionaires By Clarck
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body text-left">
                                        <a href="concessionaires/clark/Quarry" type="button" class="btn btn-info btn-lg">Quarry</a>
                                        <a href="concessionaires/clark/Makabibihag"  type="button" class="btn btn-info btn-lg">Makabibihag</a>
                                        <a href="concessionaires/clark/Palo" type="button" class="btn btn-info btn-lg">Palo</a>
                                        <a href="concessionaires/clark/Tinago" type="button" class="btn btn-info btn-lg">Tinago</a>
                                        <a href="concessionaires/clark/KM31" type="button" class="btn btn-info btn-lg">KM31</a>
                                        <a href="concessionaires/clark/Ambongan" type="button" class="btn btn-info btn-lg">Ambongan</a>
                                        <a href="concessionaires/clark/Masahan" type="button" class="btn btn-info btn-lg">Masahan</a>
                                        <a href="concessionaires/clark/Malipayon" type="button" class="btn btn-info btn-lg">Malipayon</a>
                                        <a href="concessionaires/clark/Kalubian" type="button" class="btn btn-info btn-lg">Kalubian</a>
                            <!-- /.table-responsive -->
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