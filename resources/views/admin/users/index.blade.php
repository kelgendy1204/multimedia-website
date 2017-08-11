@extends('layouts.adminapp')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading text-center"><h4>Users</h4></div>
                <div class="list-group rtl">
                    @if ($users)
                        @foreach ($users as $user)
                          <a href="{{ route('edituser', ['user' => $user->id]) }}" class="list-group-item">{{$user->name}}</a>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
