@php 
if($user_type =='admin'){
    $layout ='admin';
}else {
    $layout ='reader';
}
@endphp

@extends($layout.'.layouts.admin')

@section('content')
 <section class="content">
    <div class="container-fluid">
    <div class="row">
        <div class="col-lg-3">
            <div class="panel panel-primary">
                <div class="panel-body">
                            
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        Consumers By Purok
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body text-left">
                            <a href="/{{$user_type}}/concessionaires/purok/Lumboy" type="button" class="btn btn-info btn-sm">Lumboy</a>
                            <a href="/{{$user_type}}/concessionaires/purok/San Antonio"  type="button" class="btn btn-info btn-sm">San Antonio</a>
                            <a href="/{{$user_type}}/concessionaires/purok/Mangga" type="button" class="btn btn-info btn-sm">Mangga</a>
                            <a href="/{{$user_type}}/concessionaires/purok/Madasigon" type="button" class="btn btn-info btn-sm">Madasigon</a>
                            <a href="/{{$user_type}}/concessionaires/purok/Maharlika" type="button" class="btn btn-info btn-sm">Maharlika</a>
                            <a href="/{{$user_type}}/concessionaires/purok/Masanayon" type="button" class="btn btn-info btn-sm">Masanayon</a>
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
                                <h3 class="box-title">Consumers List</h3>
                            </div><!-- /.box-header -->
                            <div class="box-body table-responsive no-padding">
                                <table class="table table-hover" id="table">
                                    <tbody><tr>
                                        <th>Meter Number</th>
                                        <th>Name</th>
                                        <th>Purok</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    @foreach($data_consumers as $Consumer)
                            
                                    <?php 
                                    $date = date('Y-m');
                                    if($Consumer->bill != null && $Consumer->bill->monthlyBillDate == $date) {   
                                    }
                                    else {?>
                                    <tr class="item{{$Consumer->id}}">
                                        <td>{{$Consumer->meternum}}</td>
                                    
                                        <td> {{$Consumer->last_name}}, {{$Consumer->first_name}} {{$Consumer->middle_name}}</td>
                                        <td>
                                        {{$Consumer->purok}}             
                                        </td>
                                        <td>
                                        {{$Consumer->status}}             
                                        </td>
                                        @php 
                                        $new_rec = 0;
                                        if($Consumer->bill != null ){
                                            $new_rec = $Consumer->bill->newrec;
                                        }
                                        @endphp
                                        <td class="td-actions">
                                            <a href="javascript:;" class="edit-modal btn btn-primary btn-flat" 
                                            data-id="{{$Consumer->id}}" 
                                            data-fname="{{$Consumer->first_name}}" 
                                            data-lname="{{$Consumer->last_name}}" 
                                            data-mname="{{$Consumer->middle_name}}"
                                            data-mincub="{{$Consumer->rate->minimum}}"
                                            data-rate="{{$Consumer->rate->rate}}"
                                            data-excessrate="{{$Consumer->rate->excessrate}}"
                                            data-prevbill=" {{$new_rec}}"
                                            data-meternum = "{{$Consumer->meternum}}"> <i class="fa fa-plus"></i> Bill</a></td>
                                        
                                    </tr>
                                    <?php }?>
                                    @endforeach
                                    
                                    </tbody>
                                </table>
                                
                            </div><!-- /.box-body -->
                            
                        </div><!-- /.box -->
                        <div>{{ $data_consumers->links() }}</div>
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
                    <div class="col-lg-12 invoice-col">
                    <form class="form-horizontal" role="form">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <div class="col-sm-6">
                                <label class="control-label" for="id">Account</label>
                                <input type="text" class="form-control account" id="account" readonly="readonly">
                            </div>
                            <div class="col-sm-6">
                                <label class="control-label" for="id">Meter Number: </label>
                                <input type="text" class="form-control meternum" id="meternum" readonly="readonly">
                            </div>
                            <div class="col-sm-6">
                                <label class="control-label" for="id">Bill Date</label>
                                <input type="text" class="form-control billdate" id="billdate" value="<?php echo date('Y-m'); ?>">
                            </div>
                                <div class="col-sm-6">
                                <label class="control-label" for="id">New Cubic Record</label>
                                <input type="number" class="form-control newrec key" id="newrec">
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
                                <input type="hidden" class="form-control " name="billdid" id="billdid">
                                <input type="hidden" class="form-control" name="meternum" id="hiddenmeternum">
                                <input type="hidden" class="form-control" name="usertype" id="usertype" value="{{$layout}}">
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
                    </div>
                </div>
                    
               
                <div class="modal-footer">
                    <button type="button" class="btn actionBtn" id="submitBill" data-dismiss="modal">
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
</div>
<div id="printBillModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-sm">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12" align="center">
                        <img src="{{asset('assets/img/water.png')}}" class="img-responsive" style="width:60px; text-align:center;">
                        <h3 class="text-center">ROMARATE WATER BILLING SYSTEM</h3>
                        <table class="table text-left" style="width:220px;">
                            <tr>
                                <td><b>Account:</b></td>
                                <td> <p id="account_name"></p></td> 
                            </tr>
                            <tr>
                                <td><b>Meter Number:</b></td>
                                <td> <p id="meternum_bill"></p></td> 
                            </tr>
                            <tr>
                                <td><b>Due Date:</b></td>
                                <td><p id="due_date"></p></td>
                            </tr>
                            <tr>
                                <td><b>Disconnection:</b></td>
                                <td><p id="disconnection"></p></td>
                            </tr>
                            <tr>
                                <td colspan='2' style="text-align:center"><b>PERIOD COVERED:</b> <span id="period_covered"></span></td>
                            </tr>
                            <tr>
                                <td><b>PRESENT:</b></td>
                                <td><b>PREVIOUS:</b></td>
                                
                            </tr>
                            <tr>
                                <td><p id="present_rec"></p></td>
                                <td><p id="previous_rec"></p></td>
                                
                            </tr>
                            <tr>
                                <td><b>USED:</b></td>
                                <td><b>AMOUNT:</b></td>
                            </tr>
                            <tr>
                                <td><p id="used_rec"></p></td>
                                <td><p id="amount_rec"></p></td>
                            </tr>
                        </table>

                        <p>Prepared by: </p>
                        <h5> 
                            <strong>{{ Auth::user()->fname }} {{ Auth::user()->mname }} {{ Auth::user()->lname }}</strong>
                        </h5>
                    </div>
                </div>
                <div class="modal-footer no-print">
                    <button type="button print" class="btn" onclick="window.print();">
                        Print
                    </button>
                    <button type="button" class="btn btn-warning" data-dismiss="modal">
                        <span class='glyphicon glyphicon-remove'></span> Close
                    </button>
                </div>
            </div>
        </div>
        </div>
    </div>
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
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/readerconcessionairescript.js') }}"></script>
@endsection