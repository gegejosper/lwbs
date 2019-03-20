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
                                                <h3 class="box-title">{{$filtername}} Concessionaires List</h3>
                                                
                                            </div><!-- /.box-header -->
                                            <div class="box-body table-responsive no-padding">
                                                <table class="table table-hover" id="table">
                                                    <tbody><tr>
                                                        <th>ID</th>
                                                        <th>Meter Number</th>
                                                        <th>Name</th>
                                                        <th>Clark</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    @forelse($dataUser as $User)
                                                    <tr class="item{{$User->id}}">
                                                    <td>{{$User->id}}</td>
                                                    <td>{{$User->meternum}}</td>
                                                        <td> <a class="name" href="/admin/concessionaire/{{$User->user->id}}">{{$User->user->lname}}, {{$User->user->fname}} {{$User->user->mname}}</a> </td>     
                                                    <td>{{$User->clark}}</td>
                                                    
                                                    <td>
                                                        <a href="/admin/applicants/approved/{{$User->userId}}" type="button" class="btn btn-block btn-success btn-flat">Approve</a> 
                                                        <a type="button" class="btn btn-block btn-danger btn-flat">Decline</a>
                                                    </td>
                                                    
                                                    </tr>
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