@extends('layouts.main')

@section('content')
<div class="heading">
	<h1>Upload Photo</h1>
	<p>Upload Photos to this gallary.</p>
</div>
<br>
<div class="row">

	<form class="form-horizontal" action="{{route('photo.store')}}" method="post" enctype="multipart/form-data">
		{{csrf_field()}}
		<div class="form-group">
			<label for="name" class="col-sm-2 control-label">Title</label>
			<div class="col-sm-8">
				<input type="text" name="title" class="form-control" id="name" placeholder="Photo Title">
			</div>
		</div>
		<div class="form-group">
			<label for="description" class="col-sm-2 control-label">Description</label>
			<div class="col-sm-8">
				<input type="text" name="description" class="form-control" id="description" placeholder="Photo Description">
			</div>
		</div>
		<div class="form-group">
			<label for="location" class="col-sm-2 control-label">Location</label>
			<div class="col-sm-8">
				<input type="text" name="location" class="form-control" id="location" placeholder="Photo Location">
			</div>
		</div>
		<div class="form-group">
			<label for="image" class="col-sm-2 control-label">Select Photo</label>
			<div class="col-sm-8">
				<input type="file"  id="image" name="image">
			</div>
		</div>
		<div class="form-group">
			<label for="image" class="col-sm-2 control-label">Select Tag</label>
			<div class="col-sm-8">
				 <select name="select_tag">
				 <option value="NULL">Select one...</option>
				 @foreach($tags as $tag)
					<option value="{{$tag->tag}}">{{ucfirst($tag->tag)}}</option>
				 @endforeach
				</select> 		
			</div>
		</div>
		<input type="hidden" name="gallary_id" value="{{$gallary_id}}">
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-8">
				<button type="submit" class="btn btn-primary">Upload Photo</button>
			</div>
		</div>

	</form>
</div>


@endsection