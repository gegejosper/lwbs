@extends('admin.layouts.admin')

@section('content')
 <section class="content">
    <div class="container-fluid">
                    <div class="row">
                        @include('admin.includes.settingshortcut')
                        <div class="col-lg-10">
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="box box-primary">
                                        <div class="box-header">
                                            <h3 class="box-title">Add Category</h3>
                                            
                                        </div><!-- /.box-header -->
                                        <div class="box-body table-responsive padding">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                <div class="input-group input-group-sm">
                                                                {{ csrf_field() }}   
                                                                               
                                                                   <input type="text" class="form-control" name="cat_name" placeholder="Category Name" >
                                                                   <span class="input-group-btn">
                                                                       <button class="btn btn-info btn-flat" type="submit" id="add">Save</button>
                                                                   </span>
                                                              
                                                           </div>
                                                </div>

                                            </div>
                                        </div><!-- /.box-body -->
                                    </div><!-- /.box -->
                                </div>
                                
                                <div class="col-lg-4">
                                    <div class="box box-primary">
                                            <div class="box-header">
                                                <h3 class="box-title">Categories</h3>
                                            
                                            </div><!-- /.box-header -->
                                            <div class="box-body table-responsive no-padding">
                                                <table class="table table-hover" id="table">
                                                    <tbody><tr>
                                                        <th>ID</th>
                                                        <th>Category</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    @foreach($data as $Category)
                                                    <tr class="item{{$Category->id}}">
                                                    <td>{{$Category->id}}</td>
                                                        <td> <a class="name" href="#">{{$Category->cat_name}}</a> </td>
                                                        <td class="td-actions"><a href="javascript:;" class=" edit-modal btn btn-small btn-success" data-id="{{$Category->id}}" data-name="{{$Category->cat_name}}"><i class="fa fa-pencil"> </i></a><a href="javascript:;" class="delete-modal btn btn-danger btn-small" data-id="{{$Category->id}}" data-name="{{$Category->cat_name}}"><i class="fa fa-times" style="color:#fff;"> </i></a></td>
                                                        
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
<div id="myModal" class="modal fade" role="dialog">
  		<div class="modal-dialog">
  			<!-- Modal content-->
  			<div class="modal-content">
  				<div class="modal-header">
  					<button type="button" class="close" data-dismiss="modal">&times;</button>
  					<h4 class="modal-title"></h4>
  				</div>
  				<div class="modal-body">
  					<form class="form-horizontal" role="form">
                      {{ csrf_field() }}
  						<div class="form-group">
  							<label class="control-label col-sm-2" for="id">ID:</label>
  							<div class="col-sm-10">
  								<input type="text" class="form-control" id="fid" disabled>
  							</div>
  						</div>
  						<div class="form-group">
  							<label class="control-label col-sm-2" for="cat_name" >Category Name:</label>
  							<div class="col-sm-10">
  								<input type="text" class="form-control" id="catedit_name" >
  							</div>
                          </div>
            
  					</form>
  					<div class="deleteContent">
  						Are you Sure you want to delete <span class="dname"></span> ? <span
  							class="hidden did"></span>
  					</div>
  					<div class="modal-footer">
  						<button type="button" class="btn actionBtn" data-dismiss="modal">
  							<span id="footer_action_button" class='glyphicon'> </span>
  						</button>
  						<button type="button" class="btn btn-warning" data-dismiss="modal">
  							<span class='glyphicon glyphicon-remove'></span> Close
  						</button>
  					</div>
  				</div>
  			</div>
		  </div>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/categoryscript.js') }}"></script>
@endsection