@extends('reader.layouts.admin')

@section('content')
 <section class="content">
    <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-10">
                            <div class="row">       
                                <div class="col-lg-6">
                                    <div class="box box-primary">
                                            <div class="box-header">
                                                <h3 class="box-title">Concessionaires List</h3>
                                            
                                            </div><!-- /.box-header -->
                                            <div class="box-body table-responsive no-padding">
                                                <table class="table table-hover" id="table">
                                                    <tbody><tr>
                                                        <th>ID</th>
                                                        <th>Meter Number</th>
                                                        <th>Name</th>
                                                        <th>Clark</th>
                                                        <th>Category</th>
                                                     
                                                        <th>Action</th>
                                                    </tr>
                                                    @foreach($dataUsers as $User)
                                            
                                                    <!-- <?php 
                                                    echo $date = date('Y-m');
                                                    echo $Billdate = $User->bill->monthlyBillDate;
                                                    if($User->bill->monthlyBillDate == $date ) {   
                                                    }
                                                    else {?> -->
                                                    <tr class="item{{$User->id}}">
                                                    <td>{{$User->id}}</td>
                                                    <td>{{$User->meternum}}</td>
                                                        <td> <a class="name" href="concessionaires/{{$User->id}}">{{$User->user->lname}}, {{$User->user->fname}} {{$User->user->mname}}</a> </td>
                                                       <td>
                                                       {{$User->clark}}             
                                                       </td>
                                                       <td>
                                                       {{$User->rate->name}}             
                                                       </td>
                                                       
                                                        <td class="td-actions">
                                                            <a href="javascript:;" class="edit-modal btn btn-primary btn-flat" 
                                                            data-id="{{$User->id}}" 
                                                            data-fname="{{$User->user->fname}}" 
                                                            data-lname="{{$User->user->lname}}" 
                                                            data-mname="{{$User->user->mname}}"
                                                            data-mincub="{{$User->rate->minimum}}"
                                                            data-rate="{{$User->rate->rate}}"
                                                            data-excessrate="{{$User->rate->excessrate}}"
                                                            data-prevbill=" {{$User->bill->newrec}}"
                                                            data-meternum = "{{$User->meternum}}">Add Bill Record</a></td>
                                                        
                                                    </tr>
                                                    <?php }?>
                                                    @endforeach
                                                    
                                                    </tbody>
                                                </table>
                                               
                                            </div><!-- /.box-body -->
                                            
                                        </div><!-- /.box -->
                                        <div>{{ $dataUsers->links() }}</div>
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
                                <label class="control-label" for="id">Bill Date</label>
  								<input type="text" class="form-control billdate" id="billdate" value="<?php echo date('Y-m'); ?>">
  							</div>
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