@extends('admin.layouts.admin')

@section('content')
 <section class="content">

    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-lg-9">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Unpaid Bills List</h3>
                    <div class="col-lg-4 push-right" style="float:right; margin-top:10px;">
                    <form method="get" action="/admin/bills/search">
                        <div class="input-group input-group-sm">
                            
                            <input type="text" class="form-control" placeholder="Search Consumer" name="q">
                            <span class="input-group-btn">
                                <button class="btn btn-info btn-flat" type="submit">Search</button>
                            </span>
                            {{ csrf_field() }}
                        </div>
                    </form>
                    </div>
                </div><!-- /.box-header -->
               
                <div class="box-body table-responsive padding">
                    <table class="table table-hover" id="table">
                        <tbody>
                            <tr>
                                <th>Meter Number</th>
                                <th>Name</th>
                                <th>Clark</th>
                                <th>Category</th>
                                <th>Amount</th>
                                <th>Action</th>
                            </tr>
                            @foreach($consumers as $consumer)
                                @if($consumer->monthly_bill->status == 'unpaid')
                                <tr class="item{{$consumer->id}}">
                                    <td>{{$consumer->meternum}}</td>
                                        <td> <a class="name" href="/admin/consumer/{{$consumer->id}}">{{$consumer->last_name}}, {{$consumer->first_name}}</a> </td>
                                    <td>
                                        {{$consumer->purok}}             
                                    </td>
                                   
                                    <td>
                                        {{$consumer->rate->name}}             
                                    </td>
                                    <td> {{number_format($consumer->monthly_bill->billAmount,2)}}    </td>
                                    <td class="td-actions">
                                        <a href="/admin/payment/{{$consumer->id}}" class="edit-modal btn btn-info btn-flat" ><i class="fa fa-plus"></i></a><a href="/admin/consumer/{{$consumer->id}}" class="edit-modal btn btn-primary btn-flat" ><i class="fa fa-search"></i></a>
                                    </td>
                                </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
        <!-- /.col-lg-4 -->
    </div>
   
</section><!-- /.content -->
@endsection