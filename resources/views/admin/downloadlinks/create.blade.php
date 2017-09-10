@extends('layouts.adminapp')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-primary">
				<div class="panel-heading text-center"><h4>{{isset($downloadlink) ? "Edit Download links" : "Add Download links"}}</h4></div>
				<div class="panel-body">

					<div class="row form-group">
						<div class="col-sm-4 col-sm-offset-4">
							<img src="{{$post->photo_url}}" alt="{{$post->description}}" class="img-rounded img-responsive">
						</div>
					</div>

					@if (!isset($downloadlink))
						<div id="linkscontainer" class="form-group">
							<textarea id="alllinks" placeholder="enter links here" class="form-control mb-15" rows="10"></textarea>
							<button id="splitlinks" type="button" class="btn btn-primary btn-lg center-block">Create links</button>
						</div>
					@endif

					<form method="POST" action="{{isset($downloadlink) ? route('updatedownloadlink', ['postid' => $post->id, 'downloadlinkid' => $downloadlink->id]) :  route('storedownloadlink', ['id' => $post->id]) }}" class="well form-horizontal" enctype="multipart/form-data">

					{{ csrf_field() }}

						<div class="form-group">
							<label for="post-name" class="col-sm-2 control-label">
								<div class="text-left">
									Links name
								</div>
							</label>
							<div class="col-sm-10">
								<input name="name" type="text" class="form-control" id="post-name" placeholder="Enter Post Title" value="{{isset($downloadlink) ? $downloadlink->name : ""}}" />
							</div>
						</div>

						<hr />

						<div class="text-center">
							<h4 for="text-center post-title">Servers</h4>
						</div>

						<div class="servers" id="appendlinks">
							@isset($downloadlink)
								@if (count($downloadlink->downloadservers))
									@foreach ($downloadlink->downloadservers as $downloadserver)
										<div class="form-group server">
											<div class="col-sm-4">
												<input name="downloadservername[]" type="text" class="form-control" placeholder="Server name" value="{{$downloadserver->name}}" />
											</div>
											<div class="col-sm-6">
												<input name="downloadserverlink[]" type="text" class="form-control" placeholder="Server link" value="{{\Helpers\Urlshorten::getLinkByHash(\Helpers\Urlshorten::getHashFromLink($downloadserver->link))->url}}" />
											</div>
											<div class="col-sm-2">
												<input name="downloadserverposition[]" type="text" class="form-control" placeholder="Server position" value="{{$downloadserver->position}}" />
											</div>
										</div>
									@endforeach
								@endif
							@endisset
						</div>

						<div class="text-center">
							<a class="btn btn-primary btn-sm" role="button" id="addserver">Add new download links</a>
						</div>

						<hr />

						<div class="form-check">
							<label class="form-check-label">
								<input name="visible" type="checkbox" class="form-check-input" {{ (isset($downloadlink) && $downloadlink->visible ) ? 'checked' : ''}}>
								Is Visible?
							</label>
						</div>

						<hr />

						@if (isset($downloadlink))
							<div class="row form-group">
								<h1 class="text-center">Links photo</h1>
							</div>
							@isset ($downloadlink->photo_url)
								<div class="row form-group">
									<div class="col-md-4 col-md-offset-4">
										<img src="{{$downloadlink->photo_url}}" alt="downloadlink photo" class="img-rounded img-responsive">
									</div>
								</div>
							@endisset
						@endif

						<div class="form-group row">
							<label for="photo_url" class="col-xs-12">Upload links photo</label>
							<input type="file" class="form-control-file col-xs-12" name="photo_url" id="photo_url">
						</div>

						<div class="form-check text-center">
							<button type="submit" class="btn btn-primary btn-lg">{{isset($downloadlink) ? "Edit download links" : "Create download links"}}</button>
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
								<input name="downloadservername[]" type="text" class="form-control" placeholder="Server name">
							</div>
							<div class="col-sm-6">
								<input name="downloadserverlink[]" type="text" class="form-control" placeholder="Server link">
							</div>
							<div class="col-sm-2">
								<input name="downloadserverposition[]" type="text" class="form-control" placeholder="Server position" />
							</div>
						</div>`;

		servers.append(element);
	});


	var textId = 'alllinks',
		btnId = 'splitlinks';
		linkscontainerId = 'linkscontainer';

	$(`#${btnId}`).on('click', function () {
		var links = $(`#${textId}`).val().split(/\r?\n/);
		links.forEach(function (value, index) {
			value = value.trim();
			var nameRegex = /https?:\/\/(\w+)./;
			var name = nameRegex.exec(value) ? nameRegex.exec(value)[1].trim() : '';
			servers.append(
				`<div class="form-group server">
					<div class="col-sm-4">
						<input name="downloadservername[]" type="text" class="form-control" placeholder="Server name" value=${name} />
					</div>
					<div class="col-sm-6">
						<input name="downloadserverlink[]" type="text" class="form-control" placeholder="Server link" value=${value} />
					</div>
					<div class="col-sm-2">
						<input name="downloadserverposition[]" type="text" class="form-control" placeholder="Server position" value=${index} />
					</div>
				</div>`);
		});
		$(`#${linkscontainerId}`).toggle(500);
	});
</script>

@endsection