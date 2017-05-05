<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
	<script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=wrielrrxldl32l2dzcfnesqzblk6q0i9tjm1xau55oiywoaq"></script>
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
				<input name="description" class="form-control" id="description">
			</div>

			<div class="form-group">
				<label for="category">category</label>
				<select class="form-control" name="category" id="category">
					@foreach ($categories as $category)
						<option value="{{$category->id}}"> {{ $category->name }} </option>
					@endforeach
				</select>
			</div>

			<div class="form-group text-center">
				<label for="download_page">download page</label>
				<textarea id="download_page" name="download_page"></textarea>
			</div>

			<div class="form-group text-center">
				<label for="online_page">online page</label>
				<textarea id="online_page" name="online_page"></textarea>
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

	<script type="text/javascript">
		tinymce.init({
			selector: 'textarea',
			theme: 'modern',
			height: 300,
			plugins: [
				'autoresize advlist autolink link image imagetools lists charmap preview hr anchor pagebreak spellchecker',
				'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
				'save table contextmenu directionality emoticons template paste textcolor visualblocks'
			],
			toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | preview media fullpage | forecolor backcolor emoticons codesample fontsizeselect fontselect visualblocks',
			imagetools_toolbar: 'rotateleft rotateright | flipv fliph | editimage imageoptions',
			font_formats: 'Andale Mono=andale mono,times;Arial=arial,helvetica,sans-serif;Arial Black=arial black,avant garde;Book Antiqua=book antiqua,palatino;Comic Sans MS=comic sans ms,sans-serif;Courier New=courier new,courier;Georgia=georgia,palatino;Helvetica=helvetica;Impact=impact,chicago;Symbol=symbol;Tahoma=tahoma,arial,helvetica,sans-serif;Terminal=terminal,monaco;Times New Roman=times new roman,times;Trebuchet MS=trebuchet ms,geneva;Verdana=verdana,geneva;Webdings=webdings;Wingdings=wingdings,zapf dingbats;JF=jf',
			content_css : '/dist/css/post.css'
		});
	</script>
</body>
</html>