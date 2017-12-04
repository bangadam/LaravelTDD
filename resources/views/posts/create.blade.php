@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Create Blog post</h3>
					</div>
					<div class="panel-body">
						<form method="post" action="/post">
							{{csrf_field()}}
							<div class="form-group">
								<label>Title</label>
								<input type="text" name="title" class="form-control">
							</div>
							<div class="form-group">
								<label>Body</label>
								<textarea class="form-control" name="body" rows="5"></textarea>
							</div>
							<input type="submit" value="Save" class="btn btn-primary">
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection