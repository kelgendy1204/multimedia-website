@extends('layouts.adminapp')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
          @if (Auth::user()->hasRole('super_admin'))
              <div class="panel panel-primary">
                  <div class="panel-heading text-center"><strong>Users</strong></div>
                  <div class="list-group">
                    <a href="{{ route('adduser') }}" class="list-group-item">
                      Create User
                    </a>
                    <a href="{{ route('showusers') }}" class="list-group-item">
                      Users List
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
                    <a href="{{ route('adsindex') }}" class="list-group-item">
                      Edit Advertisement
                    </a>
                  </div>
              </div>
              <hr />
          @endif
          <div class="panel panel-primary">
              <div class="panel-heading text-center"><strong>Posts</strong></div>
              <div class="list-group">
                <a href="{{ route('createpost') }}" class="list-group-item">
                  Create Post
                </a>
                <a href="{{ route('showadminposts') }}" class="list-group-item">
                  Show posts
                </a>
              </div>
          </div>
          @if (Auth::user()->hasRole('super_admin'))
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
          @endif
          @if (Auth::user()->hasRole('super_admin') || Auth::user()->hasRole('admin'))
            <hr />
            <div class="panel panel-primary">
                <div class="panel-heading text-center"><strong>Shorten a url</strong></div>
                <div class="list-group">
                  <a href="/admin/links/create" class="list-group-item">
                    Create link
                  </a>
                </div>
            </div>
          @endif
        </div>
    </div>
</div>
@endsection
