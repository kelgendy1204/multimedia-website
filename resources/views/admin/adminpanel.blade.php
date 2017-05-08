@extends('layouts.adminapp')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading text-center"><strong>Posts</strong></div>
                <div class="list-group">
                  <a href="/posts/create" class="list-group-item">
                    Create Post
                  </a>
                </div>
            </div>
            <hr />
            <div class="panel panel-primary">
                <div class="panel-heading text-center"><strong>Categories</strong></div>
                <div class="list-group">
                  <a href="/categories/create" class="list-group-item">
                    Create Category
                  </a>
                </div>
            </div>
            <hr />
            <div class="panel panel-primary">
                <div class="panel-heading text-center"><strong>Shorten a url</strong></div>
                <div class="list-group">
                  <a href="/links/create" class="list-group-item">
                    Create link
                  </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
