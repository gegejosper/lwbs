@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row" style="margin-top: 100px;">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Online Registration</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="/applysuccess">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="fname" class="col-md-4 control-label">First Name</label>

                            <div class="col-md-6">
                                <input id="fname" type="text" class="form-control" name="fname" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('fname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('fname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('lname') ? ' has-error' : '' }}">
                            <label for="lname" class="col-md-4 control-label">Last Name</label>

                            <div class="col-md-6">
                                <input id="lname" type="text" class="form-control" name="lname" value="{{ old('lname') }}" required autofocus>

                                @if ($errors->has('lname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('lname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('mname') ? ' has-error' : '' }}">
                            <label for="mname" class="col-md-4 control-label">Middle Name</label>

                            <div class="col-md-6">
                                <input id="mname" type="text" class="form-control" name="mname" value="{{ old('mname') }}" required autofocus>

                                @if ($errors->has('mname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('mname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('meternum') ? ' has-error' : '' }}">
                            <label for="mname" class="col-md-4 control-label">Meter Number</label>

                            <div class="col-md-6">
                                <input id="mname" type="text" class="form-control" name="meternum" value="{{ old('meternum') }}" required autofocus>

                                @if ($errors->has('meternum'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('meternum') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('Clark') ? ' has-error' : '' }}">
                        <label for="Clark" class="col-md-4 control-label">Clark</label>

                            <div class="col-md-6">
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
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
                            <label for="category" class="col-md-4 control-label">Category</label>

                            <div class="col-md-6">
                               <select name="categories" id="categories" class="form-control">
                               @forelse($dataCategory as $Category)
                                <option value="{{$Category->id}}">{{$Category->name}}</option>
                               @empty
                               <option value="1">Defualt</option>
                               @endforelse
                               </select>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
