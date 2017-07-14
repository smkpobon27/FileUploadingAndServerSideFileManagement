@extends('layouts.main')

@section('content')
<div class="heading">
	<h1>Create Gallary</h1>
	<p>Create a gallary and start uploading</p>
</div>
<br>
<div class="row">

	<form class="form-horizontal" action="{{route('gallary.store')}}" method="post" enctype="multipart/form-data">
		{{csrf_field()}}
		<div class="form-group">
			<label for="name" class="col-sm-2 control-label">Name</label>
			<div class="col-sm-8">
				<input type="text" name="name" class="form-control" id="name" placeholder="Gallary Name">
			</div>
		</div>
		<div class="form-group">
			<label for="description" class="col-sm-2 control-label">Description</label>
			<div class="col-sm-8">
				<input type="text" name="description" class="form-control" id="description" placeholder="Gallary Description">
			</div>
		</div>
		<div class="form-group">
			<label for="cover_image" class="col-sm-2 control-label">Select Image</label>
			<div class="col-sm-8">
				<input type="file"  id="cover_image" name="cover_image">
			</div>
		</div>
		<div class="form-group">
			<label for="cover_image" class="col-sm-2 control-label">Select Privacy</label>
			<div class="col-sm-8">
				{{Form::select('privacy', [ 0 => 'Private',1 => 'Public'], 0)}}
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-8">
				<button type="submit" class="btn btn-primary">Create Gallary</button>
			</div>
		</div>

	</form>
</div>


@endsection