@extends('layouts.adminapp')

@section('content')
<div class="container">
    <div class="row">
        @foreach ($categories as $category)
        <div class="col-sm-2 pull-right form-group">
            <a href="{{Request::url()}}?category={{$category->name_en}}" class="text-center btn btn-primary btn-block" role="button">
                {{$category->name}}
            </a>
        </div>
        @endforeach
    </div>

    <hr />

    <div class="row text-center">
        <form class="form-inline col-sm-6" method="get" action="/admin/posts">
            <div class="form-group">
                <input type="text" class="form-control" id="search" name="search" placeholder="Search">
            </div>
            <button type="submit" class="btn btn-primary">Search</button>
        </form>
        <div class="col-sm-6 text-center">
            <a class="btn btn-primary" href="/admin/posts/create" role="button">Create Post +</a>
        </div>
    </div>

    <hr />

    <div class="items">
        @foreach ($posts as $post)
        <a href="/admin/posts/{{$post->id}}/edit" class="item {{$post->category_name_en}} {{$post->visible ? "" : "notvisible"}}">
            @if($post->pinned)
                <button type="button" class="btn btn-primary pinned" aria-label="Left Align">
                    <span class="glyphicon glyphicon-pushpin" aria-hidden="true"></span>
                </button>
            @endif
            @if($post->visits)
                <span class="label label-danger visits">{{$post->visits}}</span>
            @endif

            <div class="img" style="background-image: url('{{$post->photo_url}}')"></div>
            <p>{{$post->title}}</p>
        </a>
        @endforeach
    </div>

    <hr />

    <div class="text-center">
        {{ $posts->appends($parameters)->links() }}
    </div>

</div>
@endsection
