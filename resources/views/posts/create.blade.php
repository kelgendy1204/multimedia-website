<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<h1>Create a post</h1>

		<form method="POST" action="/posts" enctype="multipart/form-data">

		{{ csrf_field() }}

			<div class="form-group">
				<label for="post-title">Post Title</label>
				<input name="title" type="text" class="form-control" id="post-title" placeholder="Enter Post Title">
			</div>

			<div class="form-group">
				<label for="description">description</label>
				<textarea name="description" class="form-control" id="description"></textarea>
			</div>

			<div class="form-group">
				<label for="short_description">short description</label>
				<textarea name="short_description" class="form-control" id="short_description"></textarea>
			</div>

			<div class="form-group">
				<label for="category"></label>
				<select class="form-control" name="category" id="category">
					@foreach ($categories as $category)
						<option value="{{$category->id}}"> {{ $category->name }} </option>
					@endforeach
				</select>
			</div>

			<div class="form-group">
				<label for="postimage">upload image</label>
				<input type="file" class="form-control-file" name="postimage" id="postimage">
			</div>

			<div class="form-check">
				<label class="form-check-label">
					<input name="visible" type="checkbox" class="form-check-input">
					Is Visible?
				</label>
			</div>

			<div class="form-check">
				<label class="form-check-label">
					<input name="pinned" type="checkbox" class="form-check-input">
					Is pinned?
				</label>
			</div>

			<button type="submit" class="btn btn-primary">Submit</button>
		</form>
	</div>
</body>
</html>