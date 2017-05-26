@extends('layouts.adminapp')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading text-center"><h4>Categories</h4></div>
                <div class="list-group rtl">
                    @if ($categories)
                        @foreach ($categories as $category)
                          <a href="{{ route('editcategory', ['category' => $category->id]) }}" class="list-group-item">{{$category->name}}</a>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
