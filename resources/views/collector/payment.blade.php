@php 
if($user_type =='admin'){
    $layout ='admin';
}else {
    $layout ='collector';
}
@endphp

@extends($layout.'.layouts.admin')
@section('content')
<section class="content invoice">                    
                    <!-- title row -->
                    <div class="row">
                        <div class="col-xs-12">
                            <h2 class="page-header">
                                <i class="fa fa-male"></i> {{$Account->last_name}}, {{$Account->first_name}}
                                <small class="pull-right">Date: <?php echo date('m/d/Y');?></small>
                            </h2>                            
                        </div><!-- /.col -->
                    </div>
                    <!-- info row -->
                    <div class="row invoice-info">
                        <div class="col-sm-12 invoice-col">
                        <table class="table table-striped">
                                <thead>
                                    <tr>
                                    <th>Meter Number</th>
                                    <th>Purok</th>
                                    <th>Category</th>
                                    <th>Status</th>
                                    </tr>                                    
                                </thead>
                                <tr>
        
                                    <td> {{$Account->meternum}}</td>
                                    <td>{{$Account->purok}}</td>
                                    <td>{{$Account->rate->name}}</td>
                                    <td>{{$Account->status}}</td>
                                </tr>
                            
                            </table>
                           
                        </div><!-- /.col -->
                    </div><!-- /.row -->

                    <!-- Table row -->
                    
                    <div class="row">
                        <div class="col-lg-12 table-responsive">
                            <h3 class="box-title">Monthly Bill</h3>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                    <th>Bill Number</th>
                                    <th>Previous</th>
                                    <th>Present</th>
                                    <th>Cubic Count</th>
                                    <th>Due Date</th>
                                    <td>Amount</td>
                                    
                                    <th>Action</th>
                                    </tr>                                    
                                </thead>
                                <tbody>
                                @foreach($Bills as $Bill)
                                    @if(empty($Bill->temp_bill))
                                    <tr>
                                        <td>{{$Bill->monthlyBillDate}}-{{$Bill->id}}</td>
                                        
                                        <td>{{$Bill->prevrec}}</td>
                                        <td>{{$Bill->newrec}}</td>
                                        <td>{{$Bill->cubicCount}}</td>
                                        <td>{{$Bill->monthlyDueDate}}</td>
                                        <td>{{number_format($Bill->billAmount,2)}}</td>
                                       
                                        <td><a href="pay/{{$Account->id}}/{{$Bill->id}}/{{$Bill->billAmount}}" class="btn btn-danger" style="color:#fff;"><i class="fa fa-plus" ></i></a></td>
                                    </tr>
                                    @endif
                                @endforeach
                                
                                </tbody>
                            </table>                            
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                    
                    <div class="row">
                        <!-- accepted payments column -->
                        <div class="col-lg-6">
                            <p class="lead">Bills to Pay</p>
                            
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                    <th>Bill Number</th>
                                    <th>Penalty</th>
                                    <th>Amount</th>
                                    <th>Action</th>
                                    </tr> 
                                    <?php $tempamount =0; 
                                        $penalty = 0;
                                    ?>
                                    @foreach($TempBills as $TempBill)
                                    <tr> 
                                       
                                        <td>{{$TempBill->monthly_bill->monthlyBillDate}}-{{$TempBill->monthly_bill->id}}</td>
                                        <td>

                                        <?php 
                                            $today = date("Y-m-d");
                                            $duedate  = $TempBill->monthly_bill->monthlyDueDate;
                                            if ($duedate < $today) {
                                                $penalty += $dataSetting->penalty;
                                                $individual_penalty = $dataSetting->penalty;
                                            }
                                            else {
                                                $penalty = 0;
                                                $individual_penalty = 0;
                                            }
                                        ?>
                                        {{number_format($individual_penalty,2)}}
                                        </td>
                                        <td>{{number_format($TempBill->billAmount,2)}}</td>
                                        <td><a href="removepay/{{$Account->id}}/{{$TempBill->id}}" class="edit-modal btn btn-warning btn-flat" ><i class="fa fa-times"></i></a></td>
                                        <?php $tempamount = $tempamount + $TempBill->billAmount; ?>
                                    </tr> 
                                    
                                    @endforeach                                  
                                </thead> 
                                <tbody>
                            </table>

                        </div>
                        <div class="col-lg-2"></div><!-- /.col -->
                        <div class="col-lg-4">
                           
                            <div class="table-responsive">
                            <form class="form-horizontal" role="form" action="/{{$layout}}/processpayment" method="post">
                            {{ csrf_field() }}    
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>Penalty</th>
                                        <td><input type="text" class="form-control penalty" name="penalty" id="penalty" readonly="readonly" value="{{$penalty}}"></td>
                                    </tr>
                                    <tr>
                                        <th>Bill Amount:</th>
                                        <td><input type="text" class="form-control amount" name="amount" id="amount" readonly="readonly" value="<?php echo $tempamount;?>"></td>
                                    </tr>
                                    <tr>
                                        <th>Total:</th>
                                        <td><input type="text" class="form-control totalamount" name="amount" id="amount" readonly="readonly" value="<?php 
                                        $totalAmount = ($tempamount + $penalty);
                                        echo $totalAmount?>">
                                            </td>
                                    </tr>
                                    <tr>
                                        <th style="width:50%">Cash Rendered:</th>
                                        <td><input type="number" class="form-control cash_rendered" name="cash_rendered" id="cash_rendered"  minimum="<?php echo $totalAmount; ?>" required></td>
                                    </tr>
                                    <tr>
                                        <th style="width:50%">OR Number:</th>
                                        <td><input type="text" class="form-control officialReciept" name="officialReciept" id="officialReciept"  required></td>
                                    </tr>
                                    
                                </tbody>
                            </table>
                            @if(session('warning'))
                            <div class="alert alert-danger" role="alert">
                                <em>{{ session('warning') }}</em>
                            </div>
                            @endif
                            </div>
                        </div><!-- /.col -->
                        
                    </div><!-- /.row -->

                    <!-- this row will not appear when printing -->
                    <div class="row no-print">
                        <div class="col-xs-12">
                        <input type="hidden" class="form-control userId" name="userId" id="userId" value="{{$Account->id}}">
                            <!-- <button class="btn btn-default" onclick="window.print();"><i class="fa fa-print"></i> Print</button> -->
                            <button type="submit" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment</button>  
                            </form>
                        </div>
                    </div>
</section>
<!-- /.content -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/concessionairescript.js') }}"></script>
@endsection