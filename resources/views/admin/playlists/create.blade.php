@extends('layouts.adminapp')

@section('content')


<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-primary">
				<div class="panel-heading text-center"><h4>{{isset($playlist) ? "Edit Playlist" : "Add Playlists"}}</h4></div>
				<div class="panel-body">

					<div class="row form-group">
						<div class="col-sm-4 col-sm-offset-4">
							<img src="{{$post->photo_url}}" alt="{{$post->description}}" class="img-rounded img-responsive">
						</div>
					</div>

					<form method="POST" action="{{isset($playlist) ? route('updateplaylist', ['post' => $post->id, 'playlist' => $playlist->id ]) : route('storeplaylist', ['post' => $post->id]) }}" class="well form-horizontal" enctype="multipart/form-data">

					{{ csrf_field() }}

						<div class="form-group">
							<label for="post-title" class="col-sm-2 control-label">
								<div class="text-left">
									Playlist title
								</div>
							</label>
							<div class="col-sm-10">
								<input name="title" type="text" class="form-control" id="post-title" placeholder="Enter playlist title" value="{{isset($playlist) ? $playlist->title : ""}}" />
							</div>
						</div>

						<hr />

						<div class="text-center">
							<h4 for="text-center post-title">Audios</h4>
						</div>

						<div class="audios">
							@isset($playlist)
								@if (count($playlist->audios))
									@foreach ($playlist->audios as $audio)

										<div class="form-group audio">
											<div class="col-sm-4">
												<input name="audioname[]" type="text" class="form-control" placeholder="Audio name" value="{{$audio->name}}">
											</div>
											<div class="col-sm-4">
												<input name="audiolink[]" type="text" class="form-control" placeholder="Audio link" value="{{$audio->link}}">
											</div>
											<div class="col-sm-1 control-label">
												<strong> - OR - </strong>
											</div>
											<div class="col-sm-3 control-label">
												<input type="file" class="form-control-file" name="audiofile[]">
											</div>
										</div>


									@endforeach
								@endif
							@endisset
						</div>

						<div class="text-center">
							<a class="btn btn-primary btn-sm" role="button" id="addaudio">Add audio</a>
						</div>

						<hr />

						<div class="form-check">
							<label class="form-check-label">
								<input name="visible" type="checkbox" class="form-check-input" {{ (isset($playlist) && $playlist->visible ) ? 'checked' : ''}}>
								Is Visible?
							</label>
						</div>

						<hr />

						<div class="form-check text-center">
							<button type="submit" class="btn btn-primary btn-lg">{{isset($playlist) ? "Edit playlist" : "Create playlist"}}</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	var addAudio = $('#addaudio');
	addAudio.on('click', function (e) {
		e.preventDefault();
		var i = $('.audio').size() + 1;
		var audios = $('.audios');
		var element = `<div class="form-group audio">
							<div class="col-sm-4">
								<input name="audioname[]" type="text" class="form-control" placeholder="Audio name">
							</div>
							<div class="col-sm-4">
								<input name="audiolink[]" type="text" class="form-control" placeholder="Audio link">
							</div>
							<div class="col-sm-1 control-label">
								<strong> - OR - </strong>
							</div>
							<div class="col-sm-3 control-label">
								<input type="file" class="form-control-file" name="audiofile[]">
							</div>
						</div>`;

		audios.append(element);
	});
</script>

@endsection