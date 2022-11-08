@extends('collector.layouts.admin')

@section('content')
 <section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">       
                    <div class="col-lg-8">
                        <div class="box box-primary">
                            <div class="box-header">
                                <h3 class="box-title">Consumers List</h3>
                            
                            </div><!-- /.box-header -->
                            <div class="col-lg-8 padding pull-right" style="margin-bottom:20px;">
                                <form method="get" action="/collector/search">
                                    <div class="input-group input-group-sm">
                                    
                                        <input type="text" class="form-control" placeholder="Search Concessionaire" name="q">
                                        <span class="input-group-btn">
                                            <button class="btn btn-info btn-flat" type="submit">Search</button>
                                        </span>
                                        {{ csrf_field() }}
                                    
                                    </div>
                                </form>
                            </div>
                            <div class="box-body table-responsive padding">
                                <table class="table table-hover" id="table">
                                    <tbody><tr>
                                        <th>Meter Number</th>
                                        <th>Name</th>
                                        <th>Purok</th>
                                        <th>Category</th>
                                        <th>Action</th>
                                    </tr>
                                    @foreach($consumers as $consumer)

                
                                    
                                    <tr class="item{{$consumer->id}}">
                                    <td>{{$consumer->meternum}}</td>
                                        <td> <a class="name" href="consumer/{{$consumer->id}}">{{$consumer->last_name}}, {{$consumer->first_name}}</a> </td>
                                        <td>
                                        {{$consumer->purok}}             
                                        </td>
                                        <td>
                                        {{$consumer->rate->name}}   
                                                    
                                        </td>
                                        
                                        <td class="td-actions">
                                            <a href="/collector/payment/{{$consumer->id}}" class="edit-modal btn btn-info btn-flat" ><i class="fa fa-plus"></i></a><a href="/collector/consumer/{{$consumer->id}}" class="btn btn-primary btn-flat" ><i class="fa fa-search"></i></a>        
                                            <!-- <a href="/collector/consumers/{{$consumer->id}}" class="btn btn-primary btn-flat" >View Account Record</a> -->
                                        </td>
                                        
                                        
                                        
                                    </tr>
                                
                                    @endforeach
                                    
                                    </tbody>
                                </table>
                            </div><!-- /.box-body -->
                        </div><!-- /.box -->
                    
                    </div>
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
  					<h4 class="modal-title"></h4>
  				</div>
  				<div class="modal-body">
                        <div class="row">
                        <div class="col-sm-6 invoice-col">
                            <b>Bill #007612</b><br>
                            <br>
                            <b>Account:</b> <p id="account"></p>
                            <b>Meter Number: </b> <p id="meternum"></p>
                        
                        </div>
                        <div class="col-sm-6 invoice-col">
                            
                            <b>Record Date: </b> <p id="recorddate">1/20/2018 - 2/20/2018 </p> 
                        </div>
                        </div>
                        
  					<form class="form-horizontal" role="form">
                      {{ csrf_field() }}
  						<div class="form-group">
  					
  							<div class="col-sm-6">
                                <label class="control-label" for="id">New Cubic Record</label>
  								<input type="number" class="form-control newrec key" id="newrec" >
  							</div>
                            <div class="col-sm-6">
                                <label class="control-label" for="id">Previous Cubic Record</label>
  								<input type="text" class="form-control prevrec key" id="prevrec" disabled>
                                
  							</div>
                            
                            <div class="col-sm-6">
                                <label class="control-label" for="fedit_name" >Minimum Rate:</label>
                                <input type="text" class="form-control minimumrate" name="minimumrate" readonly="readonly">
  							</div>
                              <div class="col-sm-6">
                                <label class="control-label" for="fedit_name" >Excess Rate:</label>
                                <input type="text" class="form-control excesspayment" name="excesspayment" readonly="readonly">
  							</div>
                            <div class="col-sm-6">
                            <input type="hidden" class="form-control " name="bildid" id="bildid">
                              <input type="hidden" class="form-control" name="meternum" id="hiddenmeternum">
                              <input type="hidden" class="form-control mincub" name="mincub" id="mincub">
                              <input type="hidden" class="form-control rate" name="rate" id="rate">
                              <input type="hidden" class="form-control excessrate" name="excessrate" id="excessrate">
                              <label class="control-label" for="fedit_name" >Total Cubic Meter:</label>
                              <input type="text" class="form-control cubic" name="cubic" id="cubic" readonly="readonly">
  							</div>
                              <div class="col-sm-6">
                                <label class="control-label" for="fedit_name" >Total Payment:</label>
                                <input type="text" class="form-control payment" name="payment" id="payment" readonly="readonly">
  							</div>
  						</div>
  					</form>
  	
  					<div class="modal-footer">
  						<button type="button" class="btn actionBtn" data-dismiss="modal">
  							<span id="footer_action_button" class='glyphicon'> </span>
  						</button>
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
    <div id="errorModal" class="modal fade" role="dialog">
  		<div class="modal-dialog">
  			<!-- Modal content-->
  			<div class="modal-content">
  				<div class="modal-header">
  					<button type="button" class="close" data-dismiss="modal">&times;</button>
  					<h4 class="modal-title">Error</h4>
  				</div>
  				<div class="modal-body">
                  <div class="errormessages">
                  <p id="errormessage"></p>  
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
    <script src="{{ asset('js/readerconcessionairescript.js') }}"></script>
@endsection