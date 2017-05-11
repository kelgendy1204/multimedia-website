@extends('layouts.adminapp')

@section('content')

<script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=wrielrrxldl32l2dzcfnesqzblk6q0i9tjm1xau55oiywoaq"></script>

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

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-primary">
				<div class="panel-heading text-center"><h4>{{ isset($post) ? 'Edit Posts' : 'Posts'}}</h4></div>
				<div class="panel-body">

					@if (isset($post))
						<div class="row form-group">
							<div class="col-md-4 col-md-offset-4">
								<img src="{{$post->photo_url}}" alt="{{$post->description}}" class="img-rounded img-responsive">
							</div>
						</div>
					@endif


					<form method="POST" action="{{isset($post)? '/admin/posts/' . $post->id . '/update' : '/admin/posts'}}" enctype="multipart/form-data" class="{{isset($post) ? "well": ""}}">

					{{ csrf_field() }}

						<div class="form-group">
							<label for="post-title">Post Title</label>
							<input name="title" type="text" class="form-control" id="post-title" placeholder="Enter Post Title" value="{{isset($post)? $post->title : ''}}">
						</div>

						<div class="form-group">
							<label for="description">Description</label>
							<input name="description" class="form-control" id="description" value="{{isset($post)? $post->description: ''}}">
						</div>

						<div class="form-group">
							<label for="category">Category</label>
							<select class="form-control" name="category" id="category">
								@foreach ($categories as $category)
									<option value="{{$category->id}}"  {{ (isset($post) && ($category->id == $post->category_id)) ? 'selected' : ''}}> {{ $category->name }} </option>
								@endforeach
							</select>
						</div>

						<hr />

						@if (isset($post))
							<div class="row">
								<h5 class="col-md-4"><strong>Add online watch:</strong></h5>
								<div class="col-md-8">
									<a class="btn btn-primary btn-sm" href="/admin/posts/3/online/create" role="button">Add online watch post</a>
								</div>
							</div>
							<hr />
						@endif


						<div class="form-group">
							<label for="download_page">Download page</label>
							<textarea id="download_page" name="download_page">
								@if (isset($post))
									{!! $post->download_page !!}
								@endif
							</textarea>
						</div>

						<hr />

						<div class="">
							<label for="postimage">Upload image</label>
							<input type="file" class="form-control-file" name="postimage" id="postimage">
						</div>

						<hr />

						<div class="form-check">
							<label class="form-check-label">
								<input name="visible" type="checkbox" class="form-check-input" {{ (isset($post) && $post->visible ) ? 'checked' : ''}}>
								Is Visible?
							</label>
						</div>

						<div class="form-check">
							<label class="form-check-label">
								<input name="pinned" type="checkbox" class="form-check-input" {{ (isset($post) && $post->pinned) ? 'checked' : ''}}>
								Is pinned?
							</label>
						</div>

						<hr />
						<div class="form-check text-center">
							<button type="submit" class="btn btn-primary btn-lg">{{ isset($post) ? 'Edit post' : 'Create Post' }}</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection