@extends('reader.layouts.admin')

@section('content')
 <section class="content">
    <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-10">
                            <div class="row">       
                                <div class="col-lg-6">
                                    <div class="box box-primary">
                                            <div class="box-header">
                                                <h3 class="box-title">Concessionaires List</h3>
                                            
                                            </div><!-- /.box-header -->
                                            <div class="box-body table-responsive no-padding">
                                                <table class="table table-hover" id="table">
                                                    <tbody><tr>
                                                        <th>ID</th>
                                                        <th>Meter Number</th>
                                                        <th>Name</th>
                                                        <th>Clark</th>
                                                        <th>Category</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    @foreach($dataUsers as $User)
                                                    <tr class="item{{$User->user->id}}">
                                                    <td>{{$User->user->id}}</td>
                                                    <td>{{$User->meternum}}</td>
                                                        <td> <a class="name" href="concessionaires/{{$User->user->id}}">{{$User->user->lname}}, {{$User->user->fname}} {{$User->user->mname}}</a> </td>
                                                       <td>
                                                       {{$User->clark}}             
                                                       </td>
                                                       <td>
                                                       {{$User->rate->name}}             
                                                       </td>
                                                      
                                                        <td class="td-actions">
                                                            <a href="concessionaires/{{$User->user->id}}" class="edit-modal btn btn-primary btn-flat" >View Bill Record</a></td>
                                                        
                                                        </tr>
                                                    @endforeach
                                                    
                                                    </tbody>
                                                </table>
                                            </div><!-- /.box-body -->
                                        </div><!-- /.box -->
                                        <div>{{ $dataUsers->links() }}</div>
                                </div>
                            </div>
                        </div>
                       
                    <!-- /.row -->
                    </div>
</section><!-- /.content -->
    <script src="{{ asset('js/app.js') }}"></script>
@endsection