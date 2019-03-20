@extends('admin.layouts.admin')

@section('content')
<section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            LOWBS Report
            <small class="pull-right">Date: <?php echo date('m/d/Y'); ?></small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
     
      <!-- /.row -->

      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table table-striped">
            <thead>
            <tr>
              <th>Date</th>
              <th>OR #</th>
              <th>Concessionaire Name</th>
              <th>Penalty</th>
              <th>Discount</th>
              <th>Amount</th>
            </tr>
            </thead>
            <tbody>
            @foreach($dataReport as $Report)
            <tr>
              <td>{{$Report->datepaid}}</td>
              <td>{{$Report->officialReciept}}</td>
              <td>{{$Report->consumerId}}</td>
              <td>{{$Report->cpenalty}}</td>
              <td>{{$Report->discount}}</td>
              <td>{{$Report->amount}}</td>
            </tr>
            @endforeach
            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->


      <!-- /.row -->

      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-12">
    
          <button class="btn btn-primary hidden-print noprint" align="right" onclick="myFunction()"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> Print</button>
                    <script>
                    function myFunction() {
                    window.print();}
                    </script>
        </div>
      </div>
    </section>
@endsection