@extends('admin.layouts.admin')

@section('content')
 <section class="content">
    <div class="row">
        <div class="col-lg-12">
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
                                        <a href="/admin/disconnect/{{$Bill[0]->meternum}}" class="btn btn-danger btn-flat">Disconnect</a>
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
    </div>
</section><!-- /.content -->

@endsection