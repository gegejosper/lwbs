@extends('admin.layouts.admin')

@section('content')
 <section class="content">
    <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-3">
<!-- start shortcut -->
                            <div class="panel panel-primary">
                               
                                <div class="panel-body">
                                    
                                <div class="panel panel-default">
                        <div class="panel-heading">
                        View Concessionaire By Clarck
                        </div>
                        <!-- /.panel-heading -->
                            <div class="panel-body text-left">
                                            <a href="/admin/concessionaires/clark/Quarry" type="button" class="btn btn-info btn-flat">Quarry</a>
                                            <a href="/admin/concessionaires/clark/Makabibihag"  type="button" class="btn btn-info btn-flat">Makabibihag</a>
                                            <a href="/admin/concessionaires/clark/Palo" type="button" class="btn btn-info btn-flat">Palo</a>
                                            <a href="/admin/concessionaires/clark/Tinago" type="button" class="btn btn-info btn-flat">Tinago</a>
                                            <a href="/admin/concessionaires/clark/KM31" type="button" class="btn btn-info btn-flat">KM31</a>
                                            <a href="/admin/concessionaires/clark/Ambongan" type="button" class="btn btn-info btn-flat">Ambongan</a>
                                            <a href="/admin/concessionaires/clark/Masahan" type="button" class="btn btn-info btn-flat">Masahan</a>
                                            <a href="/admin/concessionaires/clark/Malipayon" type="button" class="btn btn-info btn-flat">Malipayon</a>
                                            <a href="/admin/concessionaires/clark/Kalubian" type="button" class="btn btn-info  btn-flat">Kalubian</a>
                            </div>
                        <!-- /.panel-body -->
                        </div>
                                </div>
                            </div>
<!-- end shortcu -->
                                    <div class="box box-primary">
                                        <div class="box-header">
                                            <h3 class="box-title">Add Concessionaire</h3>
                                            
                                        </div><!-- /.box-header -->
                                        <div class="box-body table-responsive padding">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                            <div class="input-group input-group-sm">
                                                                {{ csrf_field() }}   
                                                                   
                                                                   <input type="text" class="form-control margin-bottom" name="fname" placeholder="First Name" required>      
                                                                   <input type="text" class="form-control margin-bottom" name="lname" placeholder="Last Name" required>
                                                                   <input type="text" class="form-control margin-bottom" name="mname" placeholder="Middle Name" required>
                                                                   <input type="email" class="form-control margin-bottom" name="email" placeholder="Email Address" required>
                                                                   <input type="password" class="form-control margin-bottom" name="password" placeholder="Password" id="password" required>
                                                                   <input type="password" class="form-control margin-bottom" name="repassword" placeholder="Retype Password" required>        
                                                            </div>
                                                </div>
                                                <div class="col-lg-12">
                                                            <div class="input-group input-group-sm">
                                                               
                                                                   
                                                                  
                                                                   <input type="text" class="form-control margin-bottom" name="meternum" placeholder="Meter Number" required>
                                                                   <label for="clark">Clark</label>
                                                                   <select name="clark" id="clark" class="form-control margin-bottom">
                                                                   <option value="Quarry">Quarry</option>
                                                                   <option value="Makabibihag">Makabibihag</option>
                                                                   <option value="Palo">Palo</option>
                                                                   <option value="Tinago">Tinago</option>
                                                                   <option value="KM 31">KM31</option>
                                                                   <option value="Ambongan">Ambongan</option>
                                                                   <option value="Masahan">Masahan</option>
                                                                   <option value="Malipayon">Malipayon</option>
                                                                   <option value="Kalubian">Kalubian</option>
                                                                   </select>
                                                                   <label for="categories">Category</label>
                                                                   <select name="categories" id="categories" class="form-control margin-bottom">
                                                                   @foreach($dataRate as $Category)
                                                                   <option value="{{$Category->id}}">{{$Category->name}}</option>
                                                                    @endforeach
                                                                   </select>

                                                                    <button class="btn btn-info btn-flat" type="submit" id="add">Save</button>
                                                                   
                                                              
                                                            </div>
                                                </div>

                                            </div>
                                        </div><!-- /.box-body -->
                                    </div><!-- /.box -->
                                </div>
                                
                                <div class="col-lg-8">
                                    <div class="box box-primary">
                                            <div class="box-header">
                                                <h3 class="box-title">Concessionaires List</h3>
                                                <div class="col-lg-4 push-right" style="float:right; margin-top:10px;">
                                                <form action="/admin/search" method="get">
                                                {{ csrf_field() }} 
                                                    <div class="input-group">
                                                    <input type="text" name="q" placeholder="Seach Concessionaire" class="form-control">
                                                        <span class="input-group-btn">
                                                            <button type="submit" class="btn btn-primary btn-flat">Search</button>
                                                        </span>
                                                    </div>
                                                </form></div>
                                                
                                            </div><!-- /.box-header -->
                                            <div class="box-body table-responsive no-padding">
                                                <table class="table table-hover" id="table">
                                                    <tbody><tr>
                                                        <th>ID</th>
                                                        <th>Meter Number</th>
                                                        <th>Name</th>
                                                        
                                                        <th>Action</th>
                                                    </tr>
                                                    @forelse($dataUser as $User)
                                                    <tr class="item{{$User->id}}">
                                                    <td>{{$User->id}}</td>
                                                    <td>{{$User->meternum}}</td>
                                                        <td> <a class="name" href="concessionaire/{{$User->id}}">{{$User->lname}}, {{$User->fname}} {{$User->mname}}</a> </td>
                                                       
                                                        <td class="td-actions">
                                                            <a href="javascript:;" class="edit-modal btn btn-small btn-success" 
                                                            data-id="{{$User->id}}" 
                                                            data-fname="{{$User->fname}}" 
                                                            data-lname="{{$User->lname}}" 
                                                            data-mname="{{$User->mname}}"
                                                            data-clark=""
                                                            data-password="{{$User->password}}" 
                                                            data-email="{{$User->email}}"><i class="fa fa-pencil"> </i></a><a href="javascript:;" class="delete-modal btn btn-danger btn-small" data-id="{{$User->id}}"><i class="fa fa-times" style="color:#fff;"> </i></a></td>
                                                        
                                                    </tr>
                                                    @empty
                                                    <tr><td colspan="6">No Data</td></tr>
                                                    @endforelse
                                                    
                                                    </tbody>
                                                </table>
                                            </div><!-- /.box-body -->
                                        </div><!-- /.box -->
                                        <div>{{ $dataUser->links() }}</div>
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
  							<label class="control-label col-sm-2" for="fedit_name" >First Name:</label>
  							<div class="col-sm-10">
  								<input type="text" class="form-control" id="fedit_name" >
  							</div>
                        </div>
                        <div class="form-group">
  							<label class="control-label col-sm-2" for="ledit_name" >Last Name:</label>
  							<div class="col-sm-10">
  								<input type="text" class="form-control" id="ledit_name" >
  							</div>
                        </div>
                        <div class="form-group">
  							<label class="control-label col-sm-2" for="medit_name" >Middle Name:</label>
  							<div class="col-sm-10">
  								<input type="text" class="form-control" id="medit_name" >
  							</div>
                        </div>
                        <div class="form-group">
  							<label class="control-label col-sm-2" for="edit_password" >Category</label>
  							<div class="col-sm-10">
                                <select name="editcategories"  class="form-control margin-bottom">
                                    <option id="categories"></option>
                                    @foreach($dataRate as $Category)
                                    <option value="{{$Category->id}}">{{$Category->name}}</option>
                                     @endforeach
                                </select>
  							</div>
                        </div>
                        <div class="form-group">
  							<label class="control-label col-sm-2" for="edit_password" >Clark</label>
  							<div class="col-sm-10">
                                <select name="clark" class="form-control margin-bottom">
                                    <option id="editcclark" selected></option>
                                    <option value="Quarry">Quarry</option>
                                    <option value="Makabibihag">Makabibihag</option>
                                    <option value="Palo">Palo</option>
                                    <option value="Tinago">Tinago</option>
                                    <option value="KM 31">KM31</option>
                                    <option value="Ambongan">Ambongan</option>
                                    <option value="Masahan">Masahan</option>
                                    <option value="Malipayon">Malipayon</option>
                                    <option value="Kalubian">Kalubian</option>
                                </select>
  							</div>
                        </div>
                        <div class="form-group">
  							<label class="control-label col-sm-2" for="edit_email" >Email Address</label>
  							<div class="col-sm-10">
  								<input type="text" class="form-control" id="edit_email" >
  							</div>
                        </div>
                        <div class="form-group">
  							<label class="control-label col-sm-2" for="edit_password" >Password</label>
  							<div class="col-sm-10">
  								<input type="text" class="form-control" id="edit_password" >
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
    <div id="errorModal" class="modal fade" role="dialog">
  		<div class="modal-dialog">
  			<!-- Modal content-->
  			<div class="modal-content">
  				<div class="modal-header">
  					<button type="button" class="close" data-dismiss="modal">&times;</button>
  					<h4 class="modal-title">Error</h4>
  				</div>
  				<div class="modal-body">
                  <div class="errormessages">
                  <p id="errormessage"></p>  
                  </div>
                    
  					<div class="modal-footer">
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
    <script src="{{ asset('js/concessionairescript.js') }}"></script>
@endsection