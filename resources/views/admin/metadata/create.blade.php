@extends('layouts.adminapp')

@section('content')


<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-primary">
				<div class="panel-heading text-center"><h4>Edit Site Metadata</h4></div>
				<div class="panel-body">

					<form method="POST" action="{{ route('editmetadata') }}" class="well form-horizontal" enctype="multipart/form-data">

					{{ csrf_field() }}

						<div class="form-group">
							<label for="post-title" class="col-sm-2 control-label">
								<div class="text-left">
									Keywords
								</div>
							</label>
							<div class="col-sm-10">
								<textarea name="keywords" class="form-control" rows="2">{{ $keywords->value }}</textarea>
							</div>
						</div>

						<hr />

						<div class="form-group">
							<label for="post-title" class="col-sm-2 control-label">
								<div class="text-left">
									Description
								</div>
							</label>
							<div class="col-sm-10">
								<textarea name="description" class="form-control" rows="2">{{ $description->value }}</textarea>
							</div>
						</div>

						<hr />

						<div class="form-group">
							<label for="post-title" class="col-sm-2 control-label">
								<div class="text-left">
									Scripts
								</div>
							</label>
							<div class="col-sm-10">
								<textarea name="scripts" class="form-control" rows="5">{{ $scripts->value }}</textarea>
							</div>
						</div>

						<hr />

						@if ($home_banner->value)
							<div class="row form-group">
								<div class="col-md-4 col-md-offset-4">
									<img src="{{$home_banner->value}}" alt="{{$home_banner->name}}" class="img-rounded img-responsive">
								</div>
							</div>
						@endif


						<div class="form-group row">
							<label for="home_banner" class="col-xs-12">Upload home banner</label>
							<input type="file" class="form-control-file col-xs-12" name="home_banner" id="home_banner">
						</div>

						<div class="form-check text-center">
							<button type="submit" class="btn btn-primary btn-lg">Edit metadata</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection