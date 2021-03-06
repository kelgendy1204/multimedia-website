@extends('layouts.adminapp')

@section('content')
<div class="container">

    @if (count($categories) > 0)
        <div class="row">
            @foreach ($categories as $category)
            <div class="col-sm-2 pull-right form-group">
                <a href="{{route('adminpostsbycategory', ['categoryname' => $category->name])}}" class="text-center btn btn-primary btn-block" role="button">
                    {{$category->name}}
                </a>
            </div>
            @endforeach
        </div>

        <hr />
    @endif

    <div class="row text-center">
        <form class="form-inline col-sm-6 mb" method="get" action="{{ route('showadminposts') }}">
            <div class="form-group">
                <input type="text" class="form-control" id="search" name="search" placeholder="Search">
            </div>
            <button type="submit" class="btn btn-primary">Search</button>
        </form>
        <div class="col-sm-6 text-center mb">
            <a class="btn btn-primary" href="{{ route('createpost') }}" role="button">Create Post +</a>
        </div>
    </div>

    <hr />

    <div class="items">
        @foreach ($posts as $post)
        <div class="item {{$post->visible ? "" : "notvisible"}}">
            <a href="/admin/posts/{{$post->id}}/edit">
                @if($post->pinned)
                    <button type="button" class="btn btn-primary pinned" aria-label="Left Align">
                        <span class="glyphicon glyphicon-pushpin" aria-hidden="true"></span>
                    </button>
                @endif
                @if($post->visits)
                    <span class="label label-danger visits">{{$post->visits}}</span>
                @endif
                @if ($post->username)
                    <p class="username">{{$post->username}}</p>
                @endif
                <div class="img" style="background-image: url('{{$post->photo_url}}')"></div>
                <p>{{$post->title}}</p>
            </a>
            @if ( Auth::user()->hasRole('super_admin') || Auth::user()->hasRole('admin') )
                <form method="post" action="{{ route('deletepost', ['postid' => $post->id]) }}" class="deletepost delete">
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-danger btn-lg btn-block">Delete post</button>
                </form>
            @endif
        </div>
        @endforeach
    </div>

    <hr />

    <div class="text-center">
        {{ $posts->appends($parameters)->links() }}
    </div>

</div>
@endsection
