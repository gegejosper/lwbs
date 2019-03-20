@extends('cashier.layouts.admin')

@section('content')
 <section class="content">
    <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-10">
                            <div class="row">       
                                <div class="col-lg-4">
                                    <div class="box box-primary">
                                            <div class="box-header">
                                                <h3 class="box-title">Concessionaires List</h3>
                                            
                                            </div><!-- /.box-header -->
                                            <div class="col-lg-8 padding pull-right" style="margin-bottom:20px;">
                                            <form method="get" action="/cashier/search">
                                            <div class="input-group input-group-sm">
                                               
                                                    <input type="text" class="form-control" placeholder="Search Concessionaire" name="q">
                                                    <span class="input-group-btn">
                                                        <button class="btn btn-info btn-flat" type="button">Search</button>
                                                    </span>
                                                    {{ csrf_field() }}
                                                
                                            </div>
                                            </form>
                                            </div>
                                            <div class="box-body table-responsive padding">
                                                <table class="table table-hover" id="table">
                                                    <tbody><tr>
                                                        <th>ID</th>

                                                        <th>Name</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    @foreach($dataUsers as $User)

                                
                                                   
                                                    <tr class="item{{$User->id}}">
                                                    <td>{{$User->id}}</td>

                                                        <td> <a class="name" href="concessionaires/{{$User->id}}">{{$User->lname}}, {{$User->fname}} {{$User->mname}}</a> </td>
                                                      
                                                        <td class="td-actions">
                                                            <a href="concessionaires/{{$User->id}}" class=" btn btn-primary btn-flat" >View Account Record</a></td>
                                                        
                                                    </tr>
                                               
                                                    @endforeach
                                                    
                                                    </tbody>
                                                </table>
                                            </div><!-- /.box-body -->
                                        </div><!-- /.box -->
                                
                                </div>
                            </div>
                        </div>
                       
                    <!-- /.row -->
                    </div>
</section><!-- /.content -->
<script src="{{ asset('js/app.js') }}"></script>
@endsection