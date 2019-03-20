@extends('cashier.layouts.admin')

@section('content')
<section class="content invoice">                    
                    <!-- title row -->
                    <div class="row">
                        <div class="col-xs-12">
                            <h2 class="page-header">
                                <i class="fa fa-male"></i> {{$Concessionaire->lname}}, {{$Concessionaire->fname}} {{$Concessionaire->mname}}
                                <small class="pull-right">Date: <?php echo date('m/d/Y');?></small>
                            </h2>                            
                        </div><!-- /.col -->
                    </div>
                    <!-- info row -->
                    <div class="row invoice-info">
                        <div class="col-sm-4 invoice-col">
                            <label><b>Name: </b></label> {{$Concessionaire->lname}}, {{$Concessionaire->fname}} {{$Concessionaire->mname}}</b>
                            <br>
                            <label for="Meter Number"><b>Meter Number:</b> </label> {{$Concessionaire->concessionaire->meternum}}
                            <br>
                            <label for="Clark"><b>Clark: </b></label> {{$Concessionaire->concessionaire->clark}}
                            <br>
                            <label for="Clark"><b>Category: </b></label> {{$Rate->name}}
                            <br>
                            <label for="Clark"><b>Status: </b></label> {{$Concessionaire->concessionaire->status}}
                        </div><!-- /.col -->
                    </div><!-- /.row -->

                    <!-- Table row -->
                    <div class="row">
                   
                        <div class="col-xs-12 table-responsive">
                        <h3 class="box-title">Monthly Bill</h3>
                            <table class="table table-striped">
                                
                                <thead>
                                    <tr>
                                    <th>Bill Number</th>
                                    <th>Cubic Count</th>
                                    <th>Due Date</th>
                                    <td>Amount</td>
                                    
                                    <th>Action</th>
                                    </tr>                                    
                                </thead>
                                <tbody>
                                @foreach($Bills as $Bill)
                                                    <tr>
                                                        <td>{{$Bill->id}}</td>
                                                        <td>{{$Bill->cubicCount}}</td>
                                                        <td>{{$Bill->monthlyDueDate}}</td>
                                                        <td>{{$Bill->billAmount}}</td>
                                                        <?php $duedate = $Bill->monthlyDueDate;?>
                                                        <td><a href="pay/{{$Account->userId}}/{{$Bill->id}}/{{$Bill->billAmount}}" class="edit-modal btn btn-info btn-flat" >Add Payment</a></td>
                                                    </tr>
                                @endforeach
                                </tbody>
                            </table>                            
                        </div><!-- /.col -->
                    </div><!-- /.row -->

                    <div class="row">
                        <!-- accepted payments column -->
                        <div class="col-xs-6">
                            <p class="lead">Bills to Pay</p>
                            
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                    <th>Bill Number</th>
                                    <th>Amount</th>
                                    <th>Action</th>
                                    </tr> 
                                    <?php $tempamount =0; ?>
                                    @foreach($TempBills as $TempBill)
                                    <tr> 
                                       
                                        <td>{{$TempBill->MonthlyBillId}}</td>
                                        <td>{{$TempBill->billAmount}}</td>
                                        <td><a href="/cashier/payment/removepay/{{$Account->userId}}/{{$TempBill->id}}" class="edit-modal btn btn-warning btn-flat" >Remove</a></td>
                                        <?php $tempamount = $tempamount + $TempBill->billAmount?>
                                    </tr> 
                                    @endforeach                                  
                                </thead> 
                                <tbody>
                            </table>

                        </div>
                        <div class="col-xs-2"></div><!-- /.col -->
                        <div class="col-xs-4">
                            <p class="lead">Amount Due On <?php echo $duedate;?></p>
                            <div class="table-responsive">
                            <form class="form-horizontal" role="form" action="/cashier/processpayment" method="post">
                            {{ csrf_field() }}    
                            <table class="table">
                                    <tbody>
                                    <tr>
                                        <th style="width:50%">OR Number:</th>
                                        <td><input type="text" class="form-control officialReciept" name="officialReciept" id="officialReciept"  ></td>
                                    </tr>
                                    <tr>
                                        <th style="width:50%">Discount:</th>
                                        <td><input type="text" class="form-control discount" name="discount" id="discount" readonly="readonly" value="<?php 
                                            $today = date("Y-m-d");
                                            if ($duedate > $today) {
                                                echo $dataSetting->penalty;
                                                $discount =$dataSetting->discount;
                                            }
                                            else {
                                                echo 0;
                                                $discount = 0;
                                            }
                                            
                                        
                                        ?>"></td>
                                    </tr>
                                    <tr>
                                        <th>Penalty</th>
                                        <td><input type="text" class="form-control penalty" name="penalty" id="penalty" readonly="readonly" value="<?php 
                                            $today = date("Y-m-d");
                                            if ($duedate < $today) {
                                                echo $dataSetting->penalty;
                                                $penalty =$dataSetting->penalty;
                                            }
                                            else {
                                                echo 0;
                                                $penalty = 0;

                                            }
                                            
                                        
                                        ?>"></td>
                                    </tr>
                                    <tr>
                                        <th>Bill Amount:</th>
                                        <td><input type="text" class="form-control amount" name="amount" id="amount" readonly="readonly" value="<?php echo $tempamount;?>"></td>
                                    </tr>
                                    <tr>
                                        <th>Sub Total:</th>
                                        <td><input type="text" class="form-control totalamount" name="amount" id="amount" readonly="readonly" value="<?php 
                                        $totalAmount = ($tempamount + $penalty) - $discount;
                                        echo $totalAmount?>">
                                            </td>
                                    </tr>
                                </tbody></table>
                            
                            </div>
                        </div><!-- /.col -->
                        
                    </div><!-- /.row -->

                    <!-- this row will not appear when printing -->
                    <div class="row no-print">
                        <div class="col-xs-12">
                        <input type="hidden" class="form-control userId" name="userId" id="userId" value="{{$Account->userId}}">
                            <button class="btn btn-default" onclick="window.print();"><i class="fa fa-print"></i> Print</button>
                            <button type="submit" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment</button>  
                            </form>
                        </div>
                    </div>
</section>
<!-- /.content -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/concessionairescript.js') }}"></script>
@endsection