@extends('layouts.adminapp')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-primary">
				<div class="panel-heading text-center"><h4>Create a url</h4></div>
				<div class="panel-body">
					<form method="post" action="/admin/links">
						{{ csrf_field() }}
						<div class="form-group">
							<input type="text" class="form-control" name="link" id="link" placeholder="Type a link - i.e. : http://www.example.com" />
						</div>
						@include('partials.errors')
					</form>
					@if (session('link'))
						<hr />
						<div class="well text-center">
							<a href="/generatelink/{{ session('link') }}">
								{{URL::to('/')}}/generatelink/{{ session('link')}}
							</a>
						</div>
					@endif
				</div>
			</div>
		</div>
	</div>
</div>
@endsection