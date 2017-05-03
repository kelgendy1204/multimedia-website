<!DOCTYPE html>
<html>
<head>
	<title>Create Category</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<form method="POST" action="/categories" enctype="multipart/form-data">

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
				<label for="categoryimage">upload image</label>
				<input type="file" class="form-control-file" name="categoryimage" id="categoryimage">
			</div>

			<button type="submit" class="btn btn-primary">Submit</button>

		</form>

	</div>
</body>
</html>