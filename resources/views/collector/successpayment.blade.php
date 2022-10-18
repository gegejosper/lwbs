@extends('collector.layouts.admin')

@section('content')
<section class="content invoice">                    
                    <!-- title row -->
                
    <div class="row invoice-info">
        <div class="col-xs-4 invoice-col">
            <small>Date: <?php echo date('m/d/Y');?></small> <br>
            <label><b>Name: </b></label> {{$Account->last_name}}, {{$Account->first_name}} {{$Account->middle_name}}</b>
            <br>
            <label for="Meter Number"><b>Meter Number:</b> </label> {{$Account->meternum}}
            <br>
            <label for="Clark"><b>Purok: </b></label> {{$Account->purok}}
            <br>
            <label for="Clark"><b>Category: </b></label> {{$Account->rate->name}}
            <br>
            <label for="Clark"><b>Status: </b></label> {{$Account->status}}
        </div><!-- /.col -->
        <div class="col-xs-4">
            <div class="table-responsive">
            <table class="table">
                    <tbody>
                    @foreach($Bill as $infoBill)
                    
                    <tr>
                        <th style="width:50%">OR Number:</th>
                        <td><?php  
                                echo $infoBill->officialReciept;
                        ?></td>
                    </tr>
                    
                    <tr>
                        <th>Penalty</th>
                        <td><?php 

                                echo number_format($infoBill->cpenalty,2);
                        ?></td>
                    </tr>
                    
                    <tr>
                        <th>Sub Total:</th>
                        <td><?php 
                        echo number_format($infoBill->amount,2); ?>
                            </td>
                    </tr>
                @endforeach
                </tbody></table>
            </div>
    </div><!-- /.row -->
    <!-- this row will not appear when printing -->
    <div class="row no-print">
        <div class="col-xs-12">
        <input type="hidden" class="form-control userId" name="userId" id="userId" value="{{$Account->userId}}">
            <button class="btn btn-default" onclick="window.print();"><i class="fa fa-print"></i> Print</button>
            
            
        </div>
    </div>
</section>
<!-- /.content -->
    <script src="{{ asset('js/app.js') }}"></script>
@endsection