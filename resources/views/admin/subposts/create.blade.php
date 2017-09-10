@extends('layouts.adminapp')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-primary">
				<div class="panel-heading text-center"><h4>{{isset($subpost) ? "Edit Subpost" : "Add Subposts"}}</h4></div>
				<div class="panel-body">

					<div class="row form-group">
						<div class="col-sm-4 col-sm-offset-4">
							<img src="{{$post->photo_url}}" alt="{{$post->description}}" class="img-rounded img-responsive">
						</div>
					</div>

					@if (!isset($subpost))
						<div id="serverscontainer" class="form-group">
							<textarea id="allservers" placeholder="enter servers here" class="form-control mb-15" rows="10"></textarea>
							<button id="splitservers" type="button" class="btn btn-primary btn-lg center-block">Create servers</button>
						</div>
					@endif

					<form method="POST" action="{{isset($subpost) ? route('editsubpost', [ 'post' => $post->id , 'subpost' => $subpost->id ]) : route('storesubpost', [ 'post' => $post->id ]) }}" enctype="multipart/form-data" class="well form-horizontal">

					{{ csrf_field() }}

						<div class="form-group">
							<label for="post-title" class="col-sm-2 control-label">
								<div class="text-left">
									Online title
								</div>
							</label>
							<div class="col-sm-10">
								<input name="title" type="text" class="form-control" id="post-title" placeholder="Enter Post Title" value="{{isset($subpost) ? $subpost->title : ""}}" />
							</div>
						</div>

						<hr />

						<div class="text-center">
							<h4 for="text-center post-title">Servers</h4>
						</div>

						<div class="servers">
							@isset($subpost)
								@if (count($subpost->servers))
									@foreach ($subpost->servers as $server)
										<div class="form-group server">
											<div class="col-sm-4">
												<input name="servername[]" type="text" class="form-control" placeholder="Server name" value="{{$server->name}}" />
											</div>
											<div class="col-sm-6">
												<input name="serverlink[]" type="text" class="form-control" placeholder="Server link" value="{{$server->link}}" />
											</div>

											<div class="col-sm-2">
												<input name="serverposition[]" type="text" class="form-control" placeholder="server position" value="{{$server->position}}" />
											</div>

										</div>
									@endforeach
								@endif
							@endisset
						</div>

						<div class="text-center">
							<a class="btn btn-primary btn-sm" role="button" id="addserver">Add online watch post</a>
						</div>

						<hr />

						<div class="form-check">
							<label class="form-check-label">
								<input name="visible" type="checkbox" class="form-check-input" {{ (isset($subpost) && $subpost->visible ) ? 'checked' : ''}}>
								Is Visible?
							</label>
						</div>

						<hr />

						@if (isset($subpost))
							<div class="row form-group">
								<h1 class="text-center">Subpost photo</h1>
							</div>
							@isset ($subpost->photo_url)
								<div class="row form-group">
									<div class="col-md-4 col-md-offset-4">
										<img src="{{$subpost->photo_url}}" alt="subpost photo" class="img-rounded img-responsive">
									</div>
								</div>
							@endisset
						@endif

						<div class="form-group row">
							<label for="photo_url" class="col-xs-12">Upload subpost photo</label>
							<input type="file" class="form-control-file col-xs-12" name="photo_url" id="photo_url">
						</div>

						<div class="form-check text-center">
							<button type="submit" class="btn btn-primary btn-lg">{{isset($subpost) ? "Edit online post" : "Create online post"}}</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	var addServer = $('#addserver');
	var servers = $('.servers');
	addServer.on('click', function (e) {
		e.preventDefault();
		var i = $('.server').size() + 1;
		var element = `<div class="form-group server">
							<div class="col-sm-4">
								<input name="servername[]" type="text" class="form-control" placeholder="Server name">
							</div>
							<div class="col-sm-6">
								<input name="serverlink[]" type="text" class="form-control" placeholder="Server link">
							</div>
							<div class="col-sm-2">
								<input name="serverposition[]" type="text" class="form-control" placeholder="server position" />
							</div>
						</div>`;

		servers.append(element);
	});


	var textId = 'allservers',
		btnId = 'splitservers';
		serverscontainerId = 'serverscontainer';

	$(`#${btnId}`).on('click', function () {
		var serversLinks = $(`#${textId}`).val().split(/\r?\n/);
		serversLinks.forEach(function (value, index) {
			value = value.trim();
			servers.append(
				`<div class="form-group server">
					<div class="col-sm-4">
						<input name="servername[]" type="text" class="form-control" placeholder="Server name" value="سيرفر ${index + 1}">
					</div>
					<div class="col-sm-6">
						<input name="serverlink[]" type="text" class="form-control" placeholder="Server link" value=${value} >
					</div>
					<div class="col-sm-2">
						<input name="serverposition[]" type="text" class="form-control" placeholder="server position" value=${index} />
					</div>
				</div>`);
		});
		$(`#${serverscontainerId}`).toggle(500);
	});
</script>

@endsection