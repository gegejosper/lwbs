@extends('admin.layouts.admin')

@section('content')
 <section class="content">
    @php 
        $for_disconnection = 0;
    @endphp
    @forelse($dataBill as $Bill)                       
    @if($Bill[0]->concessionaire->status != 'disconnected')
        @php 
        $for_disconnection += 1;
        @endphp
    @endif
    @empty
    @endforelse
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-lg-2">
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3>
                        {{$dataConcessionaireAll}}
                    </h3>
                    <p>
                        Total Consumers
                    </p>
                </div>
                <div class="icon">
                    <i class="ion ion-arrow-graph-up-right"></i>
                </div>
                <a href="/admin/consumers" class="small-box-footer">
                    More info <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <div class="col-lg-2">
            <div class="small-box bg-green">
                    <div class="inner">
                        <h3>
                            {{$dataConcessionaire}}
                        </h3>
                        <p>
                            Total Connected
                        </p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="/admin/consumer/connected" class="small-box-footer">
                        More info <i class="fa fa-arrow-circle-right"></i>
                    </a>
            </div>
        </div>
        <div class="col-lg-2">
            <div class="small-box bg-orange">
                <div class="inner">
                    <h3>
                    {{$for_disconnection}}
                    </h3>
                    <p>
                        For disconnection
                    </p>
                </div>
                <div class="icon">
                    <i class="ion ion-alert-circled"></i>
                </div>
                <a href="/admin/report/consumers/disconnection" class="small-box-footer">
                    More info <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <div class="col-lg-2">
            <div class="small-box bg-red">
                <div class="inner">
                    <h3>
                    {{$dataConcessionairediscon}}
                    </h3>
                    <p>
                        Total Disconnected
                    </p>
                </div>
                <div class="icon">
                    <i class="ion ion-alert-circled"></i>
                </div>
                <a href="/admin/consumer/disconnected" class="small-box-footer">
                    More info <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <div class="col-lg-2">
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3>
                        {{number_format($amount,2)}}
                    </h3>
                    <p>
                        Total Collectibles
                    </p>
                </div>
                <div class="icon">
                    <i class="ion ion-social-usd"></i>
                </div>
                <a href="/admin/report/collectibles" class="small-box-footer">
                    More info <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <div class="col-lg-2">
            <div class="small-box bg-blue">
                <div class="inner">
                    <h3>
                    {{number_format($paymentsamount,2)}}
                    </h3>
                    <p>
                        Total Payments
                    </p>
                </div>
                <div class="icon">
                    <i class="ion ion-social-usd-outline"></i>
                </div>
                <a href="/admin/report/payments" class="small-box-footer">
                    More info <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div> 
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
        
            <div class="panel panel-success">
                <div class="panel-heading">
                    <i class="fa fa-money"> </i> Income Chart
                </div>
                <div class="panel-body">
                    <canvas id="VerticalChart"></canvas>
                </div>
            </div>
        </div>
        <!-- <div class="col-lg-6">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <i class="fa fa-money"> </i> Payments Per Month
                </div>
                <div class="panel-body">
                    <canvas id="BillsPaid"></canvas>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <i class="fa fa-money"> </i> Collectibles
                </div>
                <div class="panel-body">
                    <canvas id="CollectiblesChart"></canvas>
                </div>
            </div>
        </div> -->
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                <i class="fa fa-bars"> </i> List for Disconnection 
                </div>
                <div class="panel-body">
                    <div class="box box-info">
                        <table class="table table-hover" id="table">
                            <tbody><tr>
                                
                                <th>Meter Number</th>
                                <th>Consumer</th>
                                <th>Disconnection Date</th>
                                <th>Purok</th>
                                <th>Action</th>
                                
                            </tr>
                            
                            @forelse($dataBill as $Bill)
                            
                            @if($Bill[0]->concessionaire->status != 'disconnected')
                                <tr class="item{{$Bill[0]->id}}">
                                    
                                    <td><a href="/admin/consumer/{{$Bill[0]->concessionaire->id}}">{{$Bill[0]->meternum}}</a></td>
                                    <td><a href="/admin/consumer/{{$Bill[0]->concessionaire->id}}">{{$Bill[0]->concessionaire->last_name}}, {{$Bill[0]->concessionaire->first_name}}</a></td>
                                    <td>{{$Bill[0]->disconnection}}</td>
                                    <td>{{$Bill[0]->concessionaire->purok}}</td>
                                    <td>
                                        <!-- <a href="/admin/disconnect/{{$Bill[0]->meternum}}" class="btn btn-danger btn-flat">Disconnect</a> -->
                                        <a href="javascript:;" class="btn btn-danger btn-disconnect" data-id="{{$Bill[0]->concessionaire->id}}">Disconnect</a>
                                    </td>
                                </tr>
                            @endif
                            @empty
                            <tr><td colspan="6">No Data</td></tr>
                            @endforelse
                            
                            </tbody>
                        </table>
                    </div>    
                </div>
            </div>
            
        </div>
        <div class="col-lg-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                <i class="fa fa-bars"> </i> List for Due Date
                </div>
                <div class="panel-body">
                    <div class="box box-info">
                        
                        <table class="table table-hover" id="table">
                            <tbody><tr>
                                
                                <th>Meter Number</th>
                                <th>Consumer</th>
                                <th>Due Date</th>
                                <th>Purok</th>
                                <th>Action</th>
                                
                            </tr>
                            
                            @forelse($due_bills as $due_bill)
                            
                            @if($due_bill[0]->concessionaire->status != 'disconnected')
                            
                            <tr class="item{{$due_bill[0]->id}}">
                                
                                <td><a href="/admin/consumer/{{$due_bill[0]->concessionaire->id}}">{{$due_bill[0]->meternum}}</a></td>
                                <td><a href="/admin/consumer/{{$due_bill[0]->concessionaire->id}}">{{$due_bill[0]->concessionaire->last_name}}, {{$due_bill[0]->concessionaire->first_name}}</a></td>
                                <td>{{$due_bill[0]->monthlyDueDate}}</td>
                                <td>{{$due_bill[0]->concessionaire->purok}}</td>
                                <td>
                                    <a href="/admin/viewbill/{{$due_bill[0]->id}}" class="btn btn-info btn-flat">View Bill</a>
                                </td>
                            </tr>
                            @endif
                            @empty
                            <tr><td colspan="6">No Data</td></tr>
                            @endforelse
                            
                            </tbody>
                        </table>
                    </div> 
                    
                </div>
                
            </div>
        </div>
        <!-- /.col-lg-4 -->
        <!-- <div class="col-lg-3">
            <div class="panel panel-primary">
                <div class="panel-heading">
                <i class="fa fa-dashboard"></i> Consumer's Overview
                </div>
                
                <div class="panel-body">
                    <div class="small-box bg-aqua">
                            <div class="inner">
                                <h3>
                                    {{$dataConcessionaireAll}}
                                </h3>
                                <p>
                                    Total Consumers
                                </p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-arrow-graph-up-right"></i>
                            </div>
                            <a href="/admin/consumers" class="small-box-footer">
                                More info <i class="fa fa-arrow-circle-right"></i>
                            </a>
                    </div>
                    <div class="small-box bg-green">
                            <div class="inner">
                                <h3>
                                    {{$dataConcessionaire}}
                                </h3>
                                <p>
                                    Total Connected
                                </p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="/admin/consumer/connected" class="small-box-footer">
                                More info <i class="fa fa-arrow-circle-right"></i>
                            </a>
                    </div>
                    <div class="small-box bg-orange">
                        <div class="inner">
                            <h3>
                            {{$for_disconnection}}
                            </h3>
                            <p>
                                For disconnection
                            </p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-alert-circled"></i>
                        </div>
                    </div>
                    <div class="small-box bg-red">
                        <div class="inner">
                            <h3>
                            {{$dataConcessionairediscon}}
                            </h3>
                            <p>
                                Total Disconnected
                            </p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-alert-circled"></i>
                        </div>
                        <a href="/admin/consumer/disconnected" class="small-box-footer">
                            More info <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- /.col-lg-4 -->
        <!-- <div class="col-lg-3">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <i class="fa fa-money"> </i> Cashier Report
                </div>
                <div class="panel-body">
                    <div class="small-box bg-red">
                        <div class="inner">
                            <h3>
                                {{number_format($amount,2)}}
                            </h3>
                            <p>
                                Total Collectibles
                            </p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-social-usd"></i>
                        </div>
                        <a href="/admin/report/collectibles" class="small-box-footer">
                            More info <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                    <div class="small-box bg-blue">
                        <div class="inner">
                            <h3>
                            {{number_format($paymentsamount,2)}}
                            </h3>
                            <p>
                                Total Payments
                            </p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-social-usd-outline"></i>
                        </div>
                        <a href="/admin/report/payments" class="small-box-footer">
                            More info <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div> 
                </div>
            </div>
        </div> -->
        <!-- /.col-lg-4 -->
    </div>
</section><!-- /.content -->
<script src="{{ asset('js/app.js') }}"></script>
@include('admin.includes.modal-disconnection')

<script>

// const labelsBillsPaid = ['January', 'February', 'March', 'April', 'May', 'June', 'July'];
// const dataBillsPaid = {
//   labels: labelsBillsPaid,
//   datasets: [{
//     label: 'Payments recieved per month',
//     data: [65, 59, 80, 81, 56, 55, 40],
//     backgroundColor: [
//       'rgba(255, 99, 132, 0.2)',
//       'rgba(255, 159, 64, 0.2)',
//       'rgba(255, 205, 86, 0.2)',
//       'rgba(75, 192, 192, 0.2)',
//       'rgba(54, 162, 235, 0.2)',
//       'rgba(153, 102, 255, 0.2)',
//       'rgba(201, 203, 207, 0.2)'
//     ],
//     borderColor: [
//       'rgb(255, 99, 132)',
//       'rgb(255, 159, 64)',
//       'rgb(255, 205, 86)',
//       'rgb(75, 192, 192)',
//       'rgb(54, 162, 235)',
//       'rgb(153, 102, 255)',
//       'rgb(201, 203, 207)'
//     ],
//     borderWidth: 1
//   }]
// };

// const configBillsPaid = {
//   type: 'bar',
//   data: dataBillsPaid,
//   options: {
//     scales: {
//       y: {
//         beginAtZero: true
//       }
//     }
//   },
// };
// const BillPaidChart = new Chart(
//     document.getElementById('BillsPaid'),
//     configBillsPaid
// );

// // Collectibles Chart
// const colletibleLabels = ['January', 'February', 'March', 'April', 'May', 'June', 'July'];
// const dataCollectibles = {
//   labels: colletibleLabels,
//   datasets: [{
//     label: 'Collectibles Per Month',
//     data: [65, 59, 80, 81, 56, 55, 40],
//     fill: false,
//     borderColor: 'rgb(75, 192, 192)',
//     tension: 0.1
//   }]
// };

// const configCollectibles = {
//   type: 'line',
//   data: dataCollectibles,
// };
// const CollectiblesChart = new Chart(
//     document.getElementById('CollectiblesChart'),
//     configCollectibles
// );
// // End Collectibles Chart

//Vertical bar Chart
const DATA_COUNT = 7;
const NUMBER_CFG = {count: DATA_COUNT, min: -100, max: 100};

const labelsVerticalChart = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
const dataVerticalChart = {
  labels: labelsVerticalChart,
  datasets: [
    {
        label: 'Collectibles',
        data: <?php echo json_encode($collectibles_count_per_month);  ?>,
        backgroundColor: 'rgba(255, 99, 132, 0.2)',
        borderColor: 'rgba(255, 99, 132)',
        borderWidth: 1
    },
    {
        label: 'Payments',
        data: <?php echo json_encode($payment_count_per_month);  ?>,
        backgroundColor:  'rgba(75, 192, 192, 0.2)',
        borderColor:'rgba(75, 192, 192)',
        borderWidth: 1
    }
  ]
};
const configVerticalBar = {
  type: 'bar',
  data: dataVerticalChart,
  options: {
    responsive: true,
    plugins: {
      legend: {
        position: 'top',
      },
      title: {
        display: true,
        text: 'Payments / Collectibles Chart'
      }
    }
  },
};

const CollectiblesVerticalChart = new Chart(
    document.getElementById('VerticalChart'),
    configVerticalBar
);
//End Vertical bar chart
</script>
@endsection