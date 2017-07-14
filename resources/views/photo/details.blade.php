@extends('layouts.main')

@section('content')
<a href="/gallary/show/{{$photo->gallary_id}}">Back to Photo view</a>
<div class="heading">
	<h1><span>Title: <span> {{$photo->title}}</h1>
	<p><span>Description: </span>{{$photo->description}}</p>
</div>
<br>
<div class="row">
	<div class="col-lg-3 details" style="text-align: center;">
		<img src="{{asset('storage/images/'.$photo->image)}}" class="index_img img-responsive img-thumbnail" alt="Responsive image">
		
		<h4 style="color: blue;"><span>Location: </span>{{$photo->location}}</h4>
		<p style="color: red;"><span>Uploaded at: </span>{{$photo->created_at->diffforhumans()}}</p>
	</div>
@endsection