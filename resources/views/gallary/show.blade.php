@extends('layouts.main')

@section('content')
	@if(session()->has('message'))
		<h3 class="alert alert-success">{{session('message')}}</h3>
	@endif
	<div><a href="{{route('gallaries')}}">Back to Gallary</a></div>
<div class="heading">
	<h1><span>Name: </span>{{$gallary->name}}</h1>
	<p><span>Description: </span>{{$gallary->description}}</p>
	<a href="/photo/create/{{$gallary->id}}" class="btn btn-primary" >Upload Photo</a>
</div>
<br>
<div class="row">
	@foreach($gallary->photo() as $photo)
	<div class="col-lg-3" style="text-align: center;">
		<a href="{{route('photo.details',['id'=>$photo->id])}}">
			<img src="{{asset('storage/images/'.$photo->image)}}" class="index_img img-responsive img-thumbnail" alt="Responsive image">
		</a>
		<h3 style="color: red;"><span>Title: </span>{{$photo->title}}</h3>
		<p style="color: green;"><span>Tag: </span>{{$photo->tag}}</p>
		{{-- If this admin user is currently logged in then show delete link --}}
		@if($gallary->user_id == Auth::id())
			<a href="/deletephoto/{{$photo->id}}" class="btn btn-warning">Delete</a>	
		@endif
	</div>
	@endforeach
</div>
{{$gallary->photo()->links()}}
@endsection