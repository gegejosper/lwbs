@extends('admin.layouts.admin')

@section('content')
 <section class="content">
    <div class="container-fluid">
                    <div class="row">
                        
                        <div class="col-lg-12">
                            <div class="row">
                            @include('admin.includes.settingshortcut')
                            @foreach($dataSetting as $Settings)
                                <div class="col-lg-9">
                                        <div class="box box-info">
                                        <div class="box-header">
                                            <h3 class="box-title">Penalty / Due Date</h3>
                                        </div>
                                        <div class="box-body">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="box box-danger">
                                                        <div class="box-header">
                                                            <h3 class="box-title">Due Date</h3>
                                                        </div>
                                                        <div class="box-body"> <label for="">Days After Reading</label>
                                                            <div class="input-group input-group-sm">
                                                                
                                                                 {{ csrf_field() }}   
                                                                                
                                                                    <input type="text" class="form-control" value="{{$Settings->duedate}}" name="duedate">
                                                                    <span class="input-group-btn">
                                                                        <button class="btn btn-info btn-flat" type="submit" id="SaveDuedate">Save</button>
                                                                    </span>
                                                                    <input type="hidden" class="form-control" id="fid" value="{{$Settings->id}}">     
                                                               
                                                            </div>
                                                        </div><!-- /.box-body -->
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="box box-danger">
                                                        <div class="box-header">
                                                            <h3 class="box-title">Penalty</h3>
                                                        </div>
                                                        <div class="box-body"> <label for="">Penalty After Due Date</label>
                                                            <div class="input-group input-group-sm">
                                                            
                                                                <input type="text" class="form-control" value="{{$Settings->penalty}}" name="penalty">
                                                                <span class="input-group-btn">
                                                                    <button class="btn btn-info btn-flat" type="submit" id="SavePenalty">Save</button>
                                                                </span>
                                                            </div>
                                                        </div><!-- /.box-body -->
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                    <div class="box box-primary">
                                        <div class="box-header">
                                            <h3 class="box-title">Minimum Rate</h3>
                                            <div class="box-tools pull-right">
                                            <a class="btn btn-info btn-flat btn-sm" href="/admin/rate">Modify</a>
                                            </div>
                                        </div><!-- /.box-header -->
                                        <div class="box-body table-responsive no-padding">
                                            <table class="table table-hover">
                                                <tbody><tr>
                                                    <th>ID</th>
                                                    <th>Category</th>
                                                    <th>Minimum</th>
                                                    <th>Rate</th>
                                                    <th>Excess Rate</th>
                                                </tr>
                                                @foreach($dataRate as $Rate)
                                                    <tr class="item{{$Rate->id}}">
                                                    <td>{{$Rate->id}}</td>
                                                        <td> <a class="name" href="#">{{$Rate->name}}</a> </td>
                                                        <td>{{$Rate->minimum}}</td>
                                                        <td>{{$Rate->rate}} php</td>
                                                        <td>{{$Rate->excessrate}} php</td>  
                                                    </tr>
                                                @endforeach
                                                
                                                </tbody>
                                            </table>
                                        </div><!-- /.box-body -->
                                    </div><!-- /.box -->
                                </div>
                              
                                                <div class="col-lg-6">
                                                    <div class="box box-danger">
                                                        <div class="box-header">
                                                            <h3 class="box-title">Notice of Disconnection</h3>
                                                        </div>
                                                        <div class="box-body"> <label for="">Number of Days after due date</label>
                                                            <div class="input-group input-group-sm">
                                                            
                                                                <input type="text" class="form-control" value="{{$Settings->days}}" name="days">
                                                                <span class="input-group-btn">
                                                                    <button class="btn btn-info btn-flat" type="submit" id="SaveNotice">Save</button>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- <div class="col-lg-6">
                                                    <div class="box box-danger">
                                                        <div class="box-header">
                                                            <h3 class="box-title">Discount</h3>
                                                        </div>
                                                        <div class="box-body"> <label for="">Discount Before Due Date</label>
                                                            <div class="input-group input-group-sm">
                                                            
                                                                <input type="text" class="form-control" value="{{$Settings->discount}}" name="discount">
                                                                <span class="input-group-btn">
                                                                    <button class="btn btn-info btn-flat" type="submit" id="SaveDiscount">Save</button>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> -->
                                            </div>
                                            
                                            
                                        </div><!-- /.box-body -->
                                    </div>
                                </div>
                            @endforeach
                                
                                <!-- <div class="col-lg-6">
                                    <div class="box box-primary">
                                        <div class="box-header">
                                            <h3 class="box-title">Positions</h3>
                                            <div class="box-tools pull-right">
                                            <a class="btn btn-info btn-flat btn-sm" href="/admin/position">Modify</a>
                                            </div>
                                        </div>
                                        <div class="box-body table-responsive no-padding">
                                            <table class="table table-hover">
                                                <tbody><tr>
                                                    <th>ID</th>
                                                    <th>Position</th>
                                                    
                                                </tr>
                                                @foreach($dataPosition as $Position)
                                                    <tr class="item{{$Position->id}}">
                                                    <td>{{$Position->id}}</td>
                                                        <td> <a class="name" href="#">{{$Position->name}}</a> </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                
                                </div> -->
                            </div>
                        </div>
                       
                    <!-- /.row -->
                    </div>
</section><!-- /.content -->
<div id="myModal" class="modal fade" role="dialog">
  		<div class="modal-dialog">
  			<!-- Modal content-->
  			<div class="modal-content">
  				<div class="modal-header">
  					<button type="button" class="close" data-dismiss="modal">&times;</button>
  					<h4 class="modal-title">Settings Updated</h4>
  				</div>
  				<div class="modal-body">
  					<div class="deleteContent">
  						Setting Successfully Updated!
  					</div>
  					<div class="modal-footer">

  						<button type="button" class="btn btn-warning" data-dismiss="modal">
  							<span class='glyphicon glyphicon-remove'></span> Close
  						</button>
  					</div>
  				</div>
  			</div>
		  </div>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
    </div>
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/settingsscript.js') }}"></script>
@endsection