@extends('layouts.adminapp')

@section('content')

<script src="/dist_v5/uncompiled/tinymce/tinymce.min.js"></script>

<script type="text/javascript" defer async>
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
		content_css : '/dist_v5/css/tinymce.css',
		style_formats: [
			{title: 'Description title', inline : 'span' ,classes: 'desctitle'}
		],
		style_formats_merge: true
	});
</script>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-primary">
				<div class="panel-heading text-center"><h4>{{ isset($post) ? 'Edit Post' : 'Create Post'}}</h4></div>
				<div class="panel-body">

					@if (isset($post))
						<div class="row form-group">
							<h1 class="text-center">Created by : {{$post->user->name}}</h1>
						</div>
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
							<label for="description">Short description</label>
							<input name="description" placeholder="short description" class="form-control" id="description" value="{{isset($post)? $post->description: ''}}">
						</div>

						<hr />

						<div class="form-group">
							<label for="long_description">First show page description</label>
							<textarea id="long_description" name="long_description">
								@if (isset($post))
									{!! $post->long_description !!}
								@endif
							</textarea>
						</div>

						<hr />

						<div class="form-group">
							<label for="meta_description">Meta description</label>
							<input name="meta_description" placeholder="short meta_description" class="form-control" id="meta_description" value="{{isset($post)? $post->meta_description: ''}}">
						</div>

						<div class="form-group">
							<label for="key_words">Add keywords</label>
							<input name="key_words" placeholder="Enter keywords separated by commas" class="form-control" id="key_words" value="{{isset($post)? $post->key_words: ''}}">
						</div>

						<div class="form-group">
							<label for="alt_link">Alt link</label>
							<input name="alt_link" placeholder="Enter Alt link" class="form-control" id="alt_link" value="{{isset($post)? $post->alt_link: ''}}">
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

						@isset ($post)
							<hr />

							<div class="form-group">
								<label for="position">position </label>
								<span class="label label-danger pull-right">
									<strong>Max position: {{$maxposition}}</strong>
								</span>
								<input name="position" class="form-control" id="position" value="{{$post->position}}">
							</div>
						@endisset

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
							<button type="submit" class="btn btn-primary btn-lg">{{ isset($post) ? 'Done edit post' : 'Create Post' }}</button>
						</div>
					</form>


					@if (isset($post))
						<hr />
						<h2 class="text-center">Online watch</h2>

						@if (count($post->subposts))
							<ul class="list-group">
								@foreach ($post->subposts as $subpost)
									<li class="list-group-item">
										<div class="row">
											<h5 class="col-md-6">
												{{$subpost->title}}
											</h5>
											<div class="col-md-3 mb">
												<a class="btn btn-primary btn-block" href="{{"/admin/posts/" . $post->id . "/online/" . $subpost->id . "/edit"}}" role="button">Edit online post</a>
											</div>
											<div class="col-md-3 mb">
												<form action="{{"/admin/posts/" . $post->id . "/online/" . $subpost->id . "/delete"}}" method="post" class="delete">
													{{ csrf_field() }}
													<button type="submit" class="btn btn-danger btn-block">Delete online post</button>
												</form>
											</div>
										</div>
									</li>
								@endforeach
							</ul>

							<hr />

						@endif
						<div class="form-group text-center">
							<a class="btn btn-primary btn-lg" href="{{"/admin/posts/" . $post->id . "/online/create"}}" role="button">Add online watch post</a>
						</div>
					@endif



					@if (isset($post))
						<hr />
						<h2 class="text-center">Download links</h2>

						@if (count($post->downloadlinks))
							<ul class="list-group">
								@foreach ($post->downloadlinks as $downloadlink)
									<li class="list-group-item">
										<div class="row">
											<h5 class="col-md-6">
												{{$downloadlink->name}}
											</h5>
											<div class="col-md-3 mb">
												<a class="btn btn-primary btn-block" href="{{ route('editdownloadlink', ['postid' => $post->id, 'downloadlinkid' => $downloadlink->id]) }}" role="button">Edit download link</a>
											</div>
											<div class="col-md-3 mb">
												<form action="{{ route('deletedownloadlink', ['postid' => $post->id, 'downloadlinkid' => $downloadlink->id]) }}" method="post" class="delete">
													{{ csrf_field() }}
													<button type="submit" class="btn btn-danger btn-block">Delete download link</button>
												</form>
											</div>
										</div>
									</li>
								@endforeach
							</ul>

							<hr />

						@endif
						<div class="form-group text-center">
							<a class="btn btn-primary btn-lg" href="{{ route('createdownloadlink', ['postid' => $post->id]) }}" role="button">Add download links</a>
						</div>
					@endif




				</div>
			</div>
		</div>
	</div>
</div>

@endsection