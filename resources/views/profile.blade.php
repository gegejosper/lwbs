@php 
if($user_type =='collector'){
    $layout ='collector';
}else {
    $layout ='reader';
}
@endphp

@extends($layout.'.layouts.admin')

@section('content')
 <section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                @if(session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
				@endif
                <form class="form-horizontal" role="form" action="/save/profile" method="post"> 
                      {{ csrf_field() }}
                        <input type="hidden" class="form-control" name="user_id" value="{{$user_details->id}}">
  						
  						<div class="form-group">
  							<label class="control-label col-sm-2" for="fedit_name" >First Name:</label>
  							<div class="col-sm-10">
  								<input type="text" class="form-control" name="fname" value="{{$user_details->fname}}">
  							</div>
                        </div>
                        <div class="form-group">
  							<label class="control-label col-sm-2" for="ledit_name" >Last Name:</label>
  							<div class="col-sm-10">
  								<input type="text" class="form-control" name="lname" value="{{$user_details->lname}}">
  							</div>
                        </div>
                        <div class="form-group">
  							<label class="control-label col-sm-2" for="medit_name" >Middle Name:</label>
  							<div class="col-sm-10">
  								<input type="text" class="form-control" name="mname" value="{{$user_details->mname}}">
  							</div>
                        </div>
                        <div class="form-group">
  							<label class="control-label col-sm-2" for="medit_username" >Username:</label>
  							<div class="col-sm-10">
  								<input type="text" class="form-control" name="username" value="{{$user_details->username}}">
  							</div>
                        </div>

                        <div class="form-group">
  							<label class="control-label col-sm-2" for="edit_password">Password</label>
  							<div class="col-sm-10">
  								<input type="password" class="form-control" name="password" value="{{$user_details->password}}">
  							</div>
                        </div>
                        <button class="btn btn-success" type="submit">Save</button>
  					</form>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </div>
</section><!-- /.content -->
@endsection