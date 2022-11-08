@extends('admin.layouts.admin')

@section('content')
 <section class="content">

    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-lg-9">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Unpaid Bills List</h3>
                
                </div><!-- /.box-header -->
                <!-- <div class="col-lg-8 padding pull-right" style="margin-bottom:20px;">
                    <form method="get" action="/collector/search">
                        <div class="input-group input-group-sm">
                            
                            <input type="text" class="form-control" placeholder="Search Consumer" name="q">
                            <span class="input-group-btn">
                                <button class="btn btn-info btn-flat" type="submit">Search</button>
                            </span>
                            {{ csrf_field() }}
                        </div>
                    </form>
                </div> -->
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
                            @foreach($collectibles as $collectible)
                                <tr class="item{{$collectible->id}}">
                                    <td>{{$collectible->consumer_details->meternum}}</td>
                                        <td> <a class="name" href="/admin/consumer/{{$collectible->consumer_details->id}}">{{$collectible->consumer_details->last_name}}, {{$collectible->consumer_details->first_name}}</a> </td>
                                    <td>
                                        {{$collectible->consumer_details->purok}}             
                                    </td>
                                   
                                    <td>
                                        {{$collectible->consumer_details->rate->name}}             
                                    </td>
                                    <td> {{number_format($collectible->billAmount,2)}}    </td>
                                    <td class="td-actions">
                                        <a href="/admin/payment/{{$collectible->consumer_details->id}}" class="edit-modal btn btn-info btn-flat" ><i class="fa fa-plus"></i></a><a href="/admin/consumer/{{$collectible->consumer_details->id}}" class="edit-modal btn btn-primary btn-flat" ><i class="fa fa-search"></i></a>
                                    </td>
                                </tr>
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