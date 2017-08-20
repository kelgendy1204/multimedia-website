@extends('layouts.adminapp')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                @if (isset($user))
                    <div class="panel-heading">Edit User : {{$user->name}}</div>
                @else
                    <div class="panel-heading">Add User</div>
                @endif
                <div class="panel-body">
                    <form class="form-horizontal well" role="form" method="POST" action="{{ isset($user) ? route('updateuser', ['user' => $user]) : route('storeuser') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{isset($user) ? $user->name : old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ isset($user) ? $user->email : old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            @if (isset($user))
                                <label for="password" class="col-md-4 control-label">New Password</label>
                            @else
                                <label for="password" class="col-md-4 control-label">Password</label>
                            @endif

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password">

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
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="role_ids" class="col-md-4 control-label">User roles</label>
                            <div class="col-md-6">
                                <select multiple class="form-control" name="role_ids[]" id="role_ids">
                                    @foreach ($roles as $role)
                                        <option value="{{$role->id}}" {{ isset($user) && $user->hasRole($role->name) ? "selected" : false }}> {{ $role->name }} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                @if (isset($user))
                                    <button type="submit" class="btn btn-primary">
                                        Edit User
                                    </button>
                                @else
                                    <button type="submit" class="btn btn-primary">
                                        Add User
                                    </button>
                                @endif
                            </div>
                        </div>
                    </form>
                    @if (isset($user))
                        <div class="row">
                            <div class="col-md-6">
                                <form method="post" action="{{ route('deleteuser', ['user' => $user->id]) }}" class="delete">
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-danger btn-lg btn-block">Delete User</button>
                                </form>
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('showadminposts', ['userid' => $user->id]) }}" class="btn btn-block btn-lg btn-primary">
                                    Show user posts
                                </a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
