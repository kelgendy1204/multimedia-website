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
            <form class="form-inline" method="get" action="/admin/posts">
              <div class="form-group">
                <input type="text" class="form-control" id="search" name="search" placeholder="Search">
              </div>
              <button type="submit" class="btn btn-primary">Search</button>
            </form>
        </div>

        <hr />

        <div class="items">
            @foreach ($posts as $post)
                <a href="/admin/posts/{{$post->id}}/edit" class="item {{$post->category_name_en}}">
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
