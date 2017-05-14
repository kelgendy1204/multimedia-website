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

					<form method="POST" action="{{isset($downloadlink) ? route('updatedownloadlink', ['postid' => $post->id, 'downloadlinkid' => $downloadlink->id]) :  route('storedownloadlink', ['id' => $post->id]) }}" class="well form-horizontal">

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

						<div class="servers">
							@isset($downloadlink)
								@if (count($downloadlink->downloadservers))
									@foreach ($downloadlink->downloadservers as $downloadserver)
										<div class="form-group server">
											<div class="col-sm-4">
												<input name="downloadservername[]" type="text" class="form-control" placeholder="Server name" value="{{$downloadserver->name}}" />
											</div>
											<div class="col-sm-8">
												<input name="downloadserverlink[]" type="text" class="form-control" placeholder="Server link" value="{{$downloadserver->link}}" />
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
								<input name="visible" type="checkbox" class="form-check-input" {{ (isset($downloadlink) && $downloadlink->visible ) ? 'checked' : ''}}>
								Is Visible?
							</label>
						</div>

						<hr />

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
	addServer.on('click', function (e) {
		e.preventDefault();
		var i = $('.server').size() + 1;
		var servers = $('.servers');
		var element = '<div class="form-group server"><div class="col-sm-4"><input name="downloadservername[]" type="text" class="form-control" placeholder="Server name"></div><div class="col-sm-8"><input name="downloadserverlink[]" type="text" class="form-control" placeholder="Server link"></div></div>';

		servers.append(element);
	});
</script>

@endsection