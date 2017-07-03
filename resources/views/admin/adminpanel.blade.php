@extends('layouts.adminapp')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading text-center"><strong>Users</strong></div>
                <div class="list-group">
                  <a href="/admin/mzk_admin_adduser" class="list-group-item">
                    Create User
                  </a>
                </div>
            </div>
            <hr />
            <div class="panel panel-primary">
                <div class="panel-heading text-center"><strong>Site data</strong></div>
                <div class="list-group">
                  <a href="{{ route('metadata') }}" class="list-group-item">
                    Edit data
                  </a>
                </div>
            </div>
            <hr />
            <div class="panel panel-primary">
                <div class="panel-heading text-center"><strong>Posts</strong></div>
                <div class="list-group">
                  <a href="/admin/posts/create" class="list-group-item">
                    Create Post
                  </a>
                  <a href="/admin/posts" class="list-group-item">
                    Show posts
                  </a>
                </div>
            </div>
            <hr />
            <div class="panel panel-primary">
                <div class="panel-heading text-center"><strong>Categories</strong></div>
                <div class="list-group">
                  <a href="/admin/categories/create" class="list-group-item">
                    Create Category
                  </a>
                  <a href="{{ route('showcategories') }}" class="list-group-item">
                    Show Categories
                  </a>
                </div>
            </div>
            <hr />
            <div class="panel panel-primary">
                <div class="panel-heading text-center"><strong>Shorten a url</strong></div>
                <div class="list-group">
                  <a href="/admin/links/create" class="list-group-item">
                    Create link
                  </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
