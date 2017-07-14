@extends('layouts.main')

@section('content')

<div class="heading">
	<h1>Create Photo Tag Here</h1>
	<p>Create a gallary and start uploading photo</p>
</div>
<br>
<div class="row">
	<div class="col-lg-10">
		<form class="form-horizontal" action="{{route('photo.tag')}}" method="post" enctype="multipart/form-data">
		{{csrf_field()}}
		<div class="form-group">
			<label for="tag" class="col-sm-2 control-label">Create Tag</label>
			<div class="col-sm-8">
				<input type="text" name="tag" class="form-control" id="tag" placeholder="Provide a Photo Tag here">
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-8">
				<button type="submit" class="btn btn-primary">Save Tag</button>
			</div>
		</div>

	</form>
	</div>
</div>
	

@endsection
