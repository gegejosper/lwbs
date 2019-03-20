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
                                            <h3 class="box-title">Add Rate</h3>
                                            
                                        </div><!-- /.box-header -->
                                        <div class="box-body table-responsive padding">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                <div class="input-group input-group-sm">
                                                                {{ csrf_field() }}   
                                                                   <!-- <select name="category" id="categories" class="form-control margin-bottom">
                                                                   @foreach($dataCategory as $Category)
                                                                   <option value="{{$Category->id}}">{{$Category->cat_name}}</option>
                                                                    @endforeach
                                                                   </select> -->
                                                                   <input type="text" class="form-control margin-bottom" name="cat_name" placeholder="Category Name">      
                                                                   <input type="number" class="form-control margin-bottom" name="minimum" placeholder="Minimum Cubic Meter">
                                                                   <input type="number" class="form-control margin-bottom" name="rate" placeholder="Rate" >
                                                                   <input type="number" class="form-control margin-bottom" name="erate" placeholder="Excess Rate" >
                                                                  
                                                                    <button class="btn btn-info btn-flat" type="submit" id="add">Save</button>
                                                                   
                                                              
                                                           </div>
                                                </div>

                                            </div>
                                        </div><!-- /.box-body -->
                                    </div><!-- /.box -->
                                </div>
                                
                                <div class="col-lg-6">
                                    <div class="box box-primary">
                                            <div class="box-header">
                                                <h3 class="box-title">Rates</h3>
                                            
                                            </div><!-- /.box-header -->
                                            <div class="box-body table-responsive no-padding">
                                                <table class="table table-hover" id="table">
                                                    <tbody><tr>
                                                        <th>ID</th>
                                                        <th>Category</th>
                                                        <th>Minimum</th>
                                                        <th>Rate</th>
                                                        <th>Excess Rate</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    @foreach($dataRate as $Rate)
                                                    <tr class="item{{$Rate->id}}">
                                                    <td>{{$Rate->id}}</td>
                                                        <td> <a class="name" href="#">{{$Rate->name}}</a> </td>
                                                        <td> {{$Rate->minimum}} </td>
                                                        <td> {{$Rate->rate}} </td>
                                                        <td> {{$Rate->excessrate}} </td>
                                                        <td class="td-actions"><a href="javascript:;" class=" edit-modal btn btn-small btn-success" data-id="{{$Rate->id}}" data-catname="{{$Rate->name}}" data-minimum="{{$Rate->minimum}}" data-rate="{{$Rate->rate}}" data-erate="{{$Rate->excessrate}}"><i class="fa fa-pencil"> </i></a><a href="javascript:;" class="delete-modal btn btn-danger btn-small" data-id="{{$Rate->id}}"><i class="fa fa-times" style="color:#fff;"> </i></a></td>
                                                        
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
  							<label class="control-label col-sm-2" for="catedit_name" >Category Name:</label>
  							<div class="col-sm-10">
  								<input type="text" class="form-control" id="catedit_name" >
  							</div>
                        </div>
                        <div class="form-group">
  							<label class="control-label col-sm-2" for="minimumedit_name" >Minimum:</label>
  							<div class="col-sm-10">
  								<input type="number" class="form-control" id="minimumedit_name" >
  							</div>
                        </div>
                        <div class="form-group">
  							<label class="control-label col-sm-2" for="rateedit_name" >Rate:</label>
  							<div class="col-sm-10">
  								<input type="number" class="form-control" id="rateedit_name" >
  							</div>
                        </div>
                        <div class="form-group">
  							<label class="control-label col-sm-2" for="erateedit_name" >Excess Rate:</label>
  							<div class="col-sm-10">
  								<input type="number" class="form-control" id="erateedit_name" >
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
    <script src="{{ asset('js/ratescript.js') }}"></script>
@endsection