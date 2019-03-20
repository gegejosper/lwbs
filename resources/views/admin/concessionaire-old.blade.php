@extends('admin.layouts.admin')

@section('content')
 <section class="content">
     <div class="container-fluid">
	<div class="row">
		<div class="col-lg-3">
			<div class="panel-body"> 
				<div class="panel panel-default">
					<div class="panel-heading">
							<strong>Add Concessionaires</strong>
					</div>
					<div class="panel-body">
							<div class="form-group row add">
									<div class="col-md-12">
                                    <form enctype="multipart/form-data" method="post" action="{{url('/admin/concessionaire/addconcessionaire')}}">
                                            <div class="form-group">
                                                <label for="imageInput">Concessionaires Picture</label>
                                                <input data-preview="#preview" name="input_img" type="file" id="imageInput" required>
                                                <img class="col-sm-6" id="preview"  src="" ></img>
                                                 <!-- <p class="help-block">Example block-level help text here.</p>  -->
                                            </div>
                                            {{ csrf_field() }}
                                            <input type="text" class="form-control" id="meternum" name="meternum"
                                            placeholder="Meter Number" required><br>
                                            <input type="text" class="form-control" id="fname" name="fname"
                                            placeholder="Enter First Name" required><br>
                                            <input type="text" class="form-control" id="mname" name="mname"
											placeholder="Enter Middle Name" required><br>
                                            <input type="text" class="form-control" id="lname" name="lname"
                                            placeholder="Enter Last Name" required><br>
	
											<select class="form-control" name="clark" id="clark">
												<option value="Makabibihag">Makabibihag</option>
												<option value="Tinago">Tinago</option>
												<option value="Palo">Palo</option>
												<option value="Kalubian">Kalubian</option>
												<option value="Quary">Quary</option>
												<option value="Ambongan">Ambongan</option>
											</select><br>
											<button class="btn btn-primary" type="submit" id="add">
											<span class="glyphicon glyphicon-plus"></span> ADD
											</button>
											
											<p class="error text-center alert alert-danger hidden">Please Correct Details</p>
                                        </form>
									</div>
							</div>
					</div>
                </div>
                
            </div> 
            
        </div> <!-- End Column 4-->
        <div class="col-lg-9">
                <div class="panel-body"> 
                    <div class="panel panel-default">
                        <div class="panel-heading">
                                <strong>List of Concessionaires</strong>
                        </div>
                        <div class="panel-body">
                        
                        <div class="col-lg-12">		
                                <div class="panel-body">                
                                    <div class="panel panel-default">
                                            
								
                    <div class="panel-heading"> <i class="fa fa-user fa-fw"></i>List of Registrants</div>
                    <div class="panel-body">
                        <table class="table">
                            
                            <tr>
                                <td>Meter No.</td>
                                <td>Full Name </td>
                                <td>Clark</td>
                                <td>Action</td>
                            
                            
                            </tr>
                            @forelse($dataConcessionaire as $Concessionaire)
                            <tr>
                                <td>{{ $Concessionaire->meternum }}</td>
                                <td> {{ $Concessionaire->lname }}, {{ $Concessionaire->fname }} {{ $Concessionaire->mname }}</td>
                                <td>{{ $Concessionaire->clark }}</td>
                            
                                <td>
                                   
								<a  class="btn btn-default" href="/admin/concessionaire/{{$Concessionaire->id }}"><i class="fa fa-search fa-fw"></i> View Account</a>	
                                <button class="edit-modal btn btn-info" data-id="{{ $Concessionaire->id }}" data-fname="{{$Concessionaire->fname}}" data-lname="{{$Concessionaire->lname}}" data-mname="{{$Concessionaire->mname}}" data-clark="{{$Concessionaire->clark}}" data-meternum="{{$Concessionaire->meternum}}" id="editbut">
																	<span class="glyphicon glyphicon-edit"></span> Edit
														</button>
														<button class="delete-modal btn btn-danger"
															data-id="{{$Concessionaire->id}}">
																<span class="glyphicon glyphicon-trash"></span> Delete
                                                        </button> 
                                </td>
                            
                            </tr>
                            @empty
                            @endforelse
                        </table>
                        <div>{{ $dataConcessionaire->links() }}</div>
                    </div>   

        </div>
                                           
                                            <!-- /.panel-body -->
                                    </div>
                                </div>
                        </div>	
                      
                        </div>
                    </div>
                </div>
        </div>
	</div> <!--End Container-->
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
                          <input type="text" class="form-control" id="editmeternum" name="editmeternum"
                                            placeholder="Enter Meter Number" required><br>
                          <input type="text" class="form-control" id="editfname" name="editfname"
                                            placeholder="Enter First Name" required><br>
                                            
                                            <input type="text" class="form-control" id="editmname" name="editmname"
											placeholder="Enter Middle Name" required><br>
                                            <input type="text" class="form-control" id="editlname" name="editlname"
                                            placeholder="Enter Last Name" required><br>
                                            <select class="form-control" name="editclark" id="editclark">
												<option value="Makabibihag">Makabibihag</option>
												<option value="Tinago">Tinago</option>
												<option value="Palo">Palo</option>
												<option value="Kalubian">Kalubian</option>
												<option value="Quary">Quary</option>
												<option value="Ambongan">Ambongan</option>
											</select><br>
											{{ csrf_field() }}
											<p class="error text-center alert alert-danger hidden">Please Correct Details</p>
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
    <script src="{{ asset('js/app.js') }}"></script>
      <script src="{{ asset('js/concessionaires.js') }}"></script>
</section><!-- /.content -->
@endsection