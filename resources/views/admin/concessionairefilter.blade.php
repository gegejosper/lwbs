@extends('admin.layouts.admin')

@section('content')
 <section class="content">
    <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-10">
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="box box-primary">
                                            <div class="box-header">
                                                <h3 class="box-title">{{$filtername}} Consumer's List</h3>
                                                
                                            </div><!-- /.box-header -->
                                            <div class="box-body table-responsive no-padding">
                                                <table class="table table-hover" id="table">
                                                    <tbody><tr>
                                                        <th>#</th>
                                                        <th>Meter Number</th>
                                                        <th>Name</th>
                                                        <th>Purok</th>
                                                        <th>Status</th>
                                                    </tr>
                                                    @php 
                                                        $count = 1;
                                                    @endphp 
                                                    @forelse($dataUser as $User)
                                                    <tr class="item{{$User->id}}">
                                                    
                                                    <td>{{$count}}</td>
                                                    <td>{{$User->meternum}}</td>
                                                        <td> <a class="name" href="/admin/consumer/{{$User->id}}">{{$User->last_name}}, {{$User->first_name}} {{$User->middle_name}}</a> </td>     
                                                    <td>{{$User->purok}}</td>
                                                    <td>{{$User->status}}</td>
                                                    </tr>
                                                    @php 
                                                        $count += 1;
                                                    @endphp 
                                                    @empty
                                                    <tr><td colspan="6">No Data</td></tr>
                                                    @endforelse
                                                    
                                                    </tbody>
                                                </table>
                                            </div><!-- /.box-body -->
                                        </div><!-- /.box -->
                                        <style type="text/css">
                                      @media print {
                                        a[href]:after {
                                           display: none;
                                           visibility: hidden;
                                        }
                                     }
                                        </style>
                                        <button class="btn btn-primary hidden-print noprint" align="right" onclick="myFunction()"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> Print</button>
                                        <script>
                                        function myFunction() {
                                        window.print();}
                                        </script>
                                        <div>{{ $dataUser->links() }}</div>
                                </div>
                            </div>
                        </div>
                       
                    <!-- /.row -->
                    </div>
</section><!-- /.content -->
@endsection