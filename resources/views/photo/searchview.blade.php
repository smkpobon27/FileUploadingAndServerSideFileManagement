@extends('layouts.main')

@section('content')
<a href="/gallaries">Back to Gallary</a>
<div class="heading">
	<h1>All Searched Photos</h1>
	<p>Result of searched photos according to photo tag</p>
</div>
<br>
<div class="row">
	@if(!$searchedPhoto)
		<h1>No Photo Found by this Search.</h1>
	@else
		<h1 style="color: crimson;margin-left: 20px;">All Public Photos by Search results:</h1>
		@foreach($searchedPhoto as $photo)
			<div class="col-lg-3 details" style="text-align: center;">
				<img src="{{asset('storage/images/'.$photo->image)}}" class="index_img img-responsive img-thumbnail" alt="Responsive image" style="width: 200px;height: 200px">
				<h1 style="color: red;"><span>Title: </span> {{$photo->title}}</h1>
			    <p style="color: green;"><span>Description: </span>{{$photo->description}}</p>
				<h4 style="color: blue;"><span>Location: </span>{{$photo->location}}</h4>
				<p style="color: red;"><span>Uploaded at: </span>{{$photo->created_at->diffforhumans()}}</p>
				<p style="color: brown;"><span>Tag: </span>{{$photo->tag}}</p>
			</div>
		@endforeach
</div>
<div class="row">
		<h1 style="color: crimson;margin-left: 20px;">Your Private Photos by Search results:</h1>
		@foreach($searchedPrivatePhotoOfCurrentUser as $photo)
			<div class="col-lg-3 details" style="text-align: center;">
				<img src="{{asset('storage/images/'.$photo->image)}}" class="index_img img-responsive img-thumbnail" alt="Responsive image" style="width: 200px;height: 200px">
				<h1 style="color: red;"><span>Title: </span> {{$photo->title}}</h1>
			    <p style="color: green;"><span>Description: </span>{{$photo->description}}</p>
				<h4 style="color: blue;"><span>Location: </span>{{$photo->location}}</h4>
				<p style="color: red;"><span>Uploaded at: </span>{{$photo->created_at->diffforhumans()}}</p>
				<p style="color: brown;"><span>Tag: </span>{{$photo->tag}}</p>
			</div>
		@endforeach
	@endif
</div>
@endsection