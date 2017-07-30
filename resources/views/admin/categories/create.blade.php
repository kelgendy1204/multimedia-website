@extends('layouts.adminapp')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-primary">
				<div class="panel-heading text-center">
				@if (isset($activecategory))
					<img src="{{$activecategory->photo_url}}" width="31" height="31" />
					<h4>Edit Category - {{$activecategory->name}}</h4>
				@else
					<h4>Categories</h4>
				@endif
				</div>
				<div class="panel-body">
					<form method="POST" action="{{ isset($activecategory)? route('updatecategory', ['category' => $activecategory->id]) : route('storecategory') }}" enctype="multipart/form-data">

						{{ csrf_field() }}

						<div class="form-group">
							<label for="category">Enter category name</label>
							<input type="text" name="category" class="form-control" id="category" placeholder="Enter category name" value="{{isset($activecategory) ? $activecategory->name : ""}}">
						</div>

						<div class="form-group">
							<label for="category_en">Enter category english name</label>
							<input type="text" name="category_en" class="form-control" id="category_en" placeholder="Enter category english name" value="{{isset($activecategory) ? $activecategory->name_en : ""}}">
						</div>

						<div class="form-group">
							<label for="parent">Choose parent</label>
							<select class="form-control" name="parent" id="parent">
								<option value="0">No parent</option>
								@foreach ($categories as $category)
									<option value="{{$category->id}}" {{isset($activecategory) && $activecategory->parent_id == $category->id ? "selected": ""}}> {{ $category->name }} </option>
								@endforeach
							</select>
						</div>

						<div class="form-group">
							<label for="color">Choose color</label>
							<select class="form-control" name="color" id="color">
								<option value="default">default</option>
								@foreach ($colors as $color)
									<option value="{{$color}}" {{isset($activecategory) && $activecategory->color == $color ? "selected": ""}}> {{ $color }} </option>
								@endforeach
							</select>
						</div>

						<div class="form-group">
							<label for="key_words">Add keywords</label>
							<input type="text" class="form-control" name="key_words" id="key_words" placeholder="Enter keywords separated by commas" value="{{isset($activecategory) ? $activecategory->key_words : ""}}"/>
						</div>

						<div class="form-group">
							<label for="meta_description">Add meta description</label>
							<input type="text" class="form-control" name="meta_description" id="meta_description" placeholder="Add meta description" value="{{isset($activecategory) ? $activecategory->meta_description : ""}}"/>
						</div>

						<hr />

						<div class="form-group">
							<label for="categoryimage">upload image</label>
							<input type="file" class="form-control-file" name="categoryimage" id="categoryimage" />
						</div>

						<hr />

						@isset ($activecategory)
							@if ($activecategory->category_banner)
								<div class="row form-group">
									{{-- <div class="col-md-4 col-md-offset-4"> --}}
									<div class="col-md-12">
										<img src="{{$activecategory->category_banner}}" alt="category banner" class="img-rounded img-responsive">
									</div>
								</div>
							@endif
						@endisset

						<div class="form-group row">
							<label for="category_banner" class="col-xs-12">Upload banner</label>
							<input type="file" class="form-control-file col-xs-12" name="category_banner" id="category_banner">
						</div>

						<div class="form-group text-center">
							<button type="submit" class="btn btn-primary btn-lg">{{isset($activecategory) ? "Edit Category" : "Create Category"}}</button>
						</div>

					</form>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection