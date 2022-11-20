@extends('admin.layouts.admin')

@section('content')
 <section class="content">
    <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-10">
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="box box-primary">
                                        <div class="box-header">
                                            <h3 class="box-title">Add Users</h3>
                                            
                                        </div><!-- /.box-header -->
                                        <div class="box-body table-responsive padding">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                <div class="input-group input-group-sm">
                                                                {{ csrf_field() }}   
                                                                   
                                                        <input type="text" class="form-control margin-bottom" name="fname" placeholder="First Name">      
                                                        <input type="text" class="form-control margin-bottom" name="lname" placeholder="Last Name">
                                                        <input type="text" class="form-control margin-bottom" name="mname" placeholder="Middle Name" >
                                                        <input type="email" class="form-control margin-bottom" name="email" placeholder="Email Address" >
                                                        <input type="text" class="form-control margin-bottom" name="username" placeholder="Username" >
                                                        <input type="password" class="form-control margin-bottom" name="password" placeholder="Password" id="password">
                                                        <input type="password" class="form-control margin-bottom" name="repassword" placeholder="Retype Password" >
                                                        <select name="position" id="categories" class="form-control margin-bottom">
                                                        @foreach($dataPosition as $Position)
                                                        <option value="{{$Position->name}}">{{$Position->name}}</option>
                                                        @endforeach
                                                        </select>
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
                                                <h3 class="box-title">Users</h3>
                                            
                                            </div><!-- /.box-header -->
                                            <div class="box-body table-responsive no-padding">
                                                <table class="table table-hover" id="table">
                                                    <tbody><tr>
                                                        <th>ID</th>
                                                        <th>Name</th>
                                                        <th>Gender</th>
                                                       
                                                        <th>Contact Number</th>
                                                        <th>Usertype</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    @foreach($dataUser as $User)
                                                    <tr class="item{{$User->id}}">
                                                    <td>{{$User->id}}</td>
                                                        <td> <a class="name" href="#">{{$User->lname}}, {{$User->fname}} {{$User->mname}}</a> </td>
                                                        <td> </td>
                                                        <td> </td>
                                                        <td> {{$User->usertype}} </td>
                                                        <td class="td-actions">
                                                            <a href="javascript:;" class="edit-modal btn btn-small btn-success" 
                                                            data-id="{{$User->id}}" 
                                                            data-fname="{{$User->fname}}" 
                                                            data-lname="{{$User->lname}}" 
                                                            data-mname="{{$User->mname}}"
                                                            data-username="{{$User->username}}"
                                                            data-password="{{$User->password}}" 
                                                            data-email="{{$User->email}}" 
                                                            data-position="{{$User->usertype}}"><i class="fa fa-pencil"> </i></a><a href="javascript:;" class="delete-modal btn btn-danger btn-small" data-id="{{$User->id}}"><i class="fa fa-times" style="color:#fff;"> </i></a></td>
                                                        
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
                        <input type="hidden" class="form-control" id="fid" disabled>
  						
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
  							<label class="control-label col-sm-2" for="medit_username" >Username:</label>
  							<div class="col-sm-10">
  								<input type="text" class="form-control" id="medit_username" >
  							</div>
                        </div>
                        <div class="form-group">
  							<label class="control-label col-sm-2" for="edit_password" >Position</label>
  							<div class="col-sm-10">
                                <select name="editposition"  class="form-control margin-bottom">
                                    <option id="position"></option>
                                    @foreach($dataPosition as $Position)
                                    
                                    <option class="position" value="{{$Position->name}}">{{$Position->name}}</option>
                                     @endforeach
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
  								<input type="password" class="form-control" id="edit_password" >
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
    <script src="{{ asset('js/userscript.js') }}"></script>
@endsection