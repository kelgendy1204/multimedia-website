@extends('layouts.adminapp')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-primary">
				<div class="panel-heading text-center"><h4>Categories</h4></div>
				<div class="panel-body">
					<form method="POST" action="/admin/categories" enctype="multipart/form-data">

						{{ csrf_field() }}

						<div class="form-group">
							<label for="category">Enter category name</label>
							<input type="text" name="category" class="form-control" id="category" placeholder="Enter category name">
						</div>

						<div class="form-group">
							<label for="category_en">Enter category english name</label>
							<input type="text" name="category_en" class="form-control" id="category_en" placeholder="Enter category english name">
						</div>

						<div class="form-group">
							<label for="parent">Choose parent</label>
							<select class="form-control" name="parent" id="parent">
								<option value="0">No parent</option>
								@foreach ($categories as $category)
									<option value="{{$category->id}}"> {{ $category->name }} </option>
								@endforeach
							</select>
						</div>

						<div class="form-group">
							<label for="key_words">Add keywords</label>
							<input type="text" class="form-control" name="key_words" id="key_words" placeholder="Enter keywords separated by commas"/>
						</div>

						<hr />

						<div class="form-group">
							<label for="categoryimage">upload image</label>
							<input type="file" class="form-control-file" name="categoryimage" id="categoryimage" />
						</div>

						<hr />

						<div class="form-group text-center">
							<button type="submit" class="btn btn-primary btn-lg">Create Category</button>
						</div>

					</form>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection