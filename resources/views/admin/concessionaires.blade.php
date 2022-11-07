@extends('admin.layouts.admin')

@section('content')
 <section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="box box-primary">
                            <div class="box-header">
                                <h3 class="box-title">Add Consumer</h3>
                            </div><!-- /.box-header -->
                            <div class="box-body table-responsive padding">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="input-group input-group-sm">
                                            @csrf
                                                
                                            <input type="text" class="form-control margin-bottom" name="fname" placeholder="First Name" required>      
                                            <input type="text" class="form-control margin-bottom" name="lname" placeholder="Last Name" required>
                                            <input type="text" class="form-control margin-bottom" name="mname" placeholder="Middle Name" required>
                                            <!-- <input type="email" class="form-control margin-bottom" name="email" placeholder="Email Address" required>
                                            <input type="password" class="form-control margin-bottom" name="password" placeholder="Password" id="password" required>
                                            <input type="password" class="form-control margin-bottom" name="repassword" placeholder="Retype Password" required>         -->
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="input-group input-group-sm">
                                            <input type="text" class="form-control margin-bottom" name="meternum" placeholder="Meter Number" required>
                                            <label for="clark">Clark</label>
                                            <select name="add_purok" id="add_purok" class="form-control margin-bottom">
                                                <option value="Lumboy">Lumboy</option>
                                                <option value="San Antonio">San Antonio</option>
                                                <option value="Mangga">Mangga</option>
                                                <option value="Madasigon">Madasigon</option>
                                                <option value="Maharlika">Maharlika</option>
                                                <option value="Masanayon">Masanayon</option>
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
                        <!-- <div class="panel panel-primary">  
                            <div class="panel-body"> 
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        View Consumers By Purok
                                    </div>
                                   
                                    <div class="panel-body text-left">
                                        <a href="/admin/consumers/clark/Quarry" type="button" class="btn btn-info btn-flat">Quarry</a>
                                        <a href="/admin/consumers/clark/Makabibihag"  type="button" class="btn btn-info btn-flat">Makabibihag</a>
                                        <a href="/admin/consumers/clark/Palo" type="button" class="btn btn-info btn-flat">Palo</a>
                                        <a href="/admin/consumers/clark/Tinago" type="button" class="btn btn-info btn-flat">Tinago</a>
                                        <a href="/admin/consumers/clark/KM31" type="button" class="btn btn-info btn-flat">KM31</a>
                                        <a href="/admin/consumers/clark/Ambongan" type="button" class="btn btn-info btn-flat">Ambongan</a>
                                        <a href="/admin/consumers/clark/Masahan" type="button" class="btn btn-info btn-flat">Masahan</a>
                                        <a href="/admin/consumers/clark/Malipayon" type="button" class="btn btn-info btn-flat">Malipayon</a>
                                        <a href="/admin/consumers/clark/Kalubian" type="button" class="btn btn-info  btn-flat">Kalubian</a>
                                    </div>
                            
                                </div>
                            </div>
                        </div>   -->
                    </div>
                    <div class="col-lg-8">
                        <div class="box box-primary">
                            <div class="box-header">
                                <h3 class="box-title">Consumer's List</h3>
                                <!-- <div class="col-lg-4 push-right" style="float:right; margin-top:10px;">
                                    <form action="/admin/search" method="get">
                                        {{ csrf_field() }} 
                                        <div class="input-group">
                                        <input type="text" name="q" placeholder="Seach Concessionaire" class="form-control">
                                            <span class="input-group-btn">
                                                <button type="submit" class="btn btn-primary btn-flat">Search</button>
                                            </span>
                                        </div>
                                    </form>
                                </div>  -->
                            </div><!-- /.box-header -->
                            <div class="box-body table-responsive no-padding">
                                <table class="table table-hover" id="table">
                                    <tbody><tr>
                                        <th>ID</th>
                                        <th>Meter Number</th>
                                        <th>Name</th>
                                        <th>Purok</th>
                                        <th>Category</th>
                                        <th>Action</th>
                                    </tr>
                                    @forelse($dataUser as $Consumer)
                                    <tr class="item{{$Consumer->id}}">
                                    <td>{{$Consumer->id}}</td>
                                    <td>{{$Consumer->meternum}}</td>
                                        <td> <a class="name" href="/admin/consumer/{{$Consumer->id}}">{{$Consumer->last_name}}, {{$Consumer->first_name}} {{$Consumer->middle_name}}</a> </td>
                                        <td>{{$Consumer->purok}}</td>
                                        <td>{{$Consumer->rate->name}}</td>
                                        <td class="td-actions">
                                            <a href="javascript:;" class="edit-modal btn btn-small btn-success" 
                                            data-id="{{$Consumer->id}}" 
                                            data-fname="{{$Consumer->first_name}}" 
                                            data-lname="{{$Consumer->last_name}}" 
                                            data-mname="{{$Consumer->middle_name}}"
                                            data-clark=""><i class="fa fa-pencil"> </i></a>
                                            <a href="javascript:;" class="delete-modal btn btn-danger btn-small" data-id="{{$Consumer->id}}"><i class="fa fa-times" style="color:#fff;"> </i></a></td>
                                        
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
        </div>
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
  							<label class="control-label col-sm-2" for="edit_purok" >Purok</label>
  							<div class="col-sm-10">
                                <select name="purok" class="form-control margin-bottom">
                                    <option id="editpurok" selected></option>
                                    <option value="Lumboy">Lumboy</option>
                                    <option value="San Antonio">San Antonio</option>
                                    <option value="Mangga">Mangga</option>
                                    <option value="Madasigon">Madasigon</option>
                                    <option value="Maharlika">Maharlika</option>
                                    <option value="Masanayon">Masanayon</option>
                                </select>
  							</div>
                        </div>
                        <!-- <div class="form-group">
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
                        </div> -->
            
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