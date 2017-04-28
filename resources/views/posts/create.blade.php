<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
{{-- 	<script src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script> --}}
</head>
<body>
	<div class="container">
		<h1>Create a post</h1>

		<form method="POST" action="/posts">

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

		{{-- <div class="form-group">
				<label for="exampleSelect1">Example select</label>
				<select class="form-control" id="exampleSelect1">
					<option>1</option>
					<option>2</option>
					<option>3</option>
					<option>4</option>
					<option>5</option>
				</select>
			</div> --}}

		{{-- <div class="form-group">
				<label for="exampleInputFile">File input</label>
				<input type="file" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp">
				<small id="fileHelp" class="form-text text-muted">This is some placeholder block-level help text for the above input. It's a bit lighter and easily wraps to a new line.</small>
			</div> --}}

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