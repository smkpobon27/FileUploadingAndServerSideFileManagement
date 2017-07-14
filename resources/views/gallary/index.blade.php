@extends('layouts.main')

@section('content')
@if(session()->has('message'))
	<h3 class="alert alert-success">{{session('message')}}</h3>
@endif
<div class="heading">
	<h1>Photo Gallaries</h1>
	<p>Create a gallary and start uploading</p>
</div>
<br>
<div class="row">
	@foreach($gallaries as $gallary)
	<div class="col-lg-3" style="text-align: center;">
		<a href="gallary/show/{{$gallary->id}}">
			<img src="{{asset('storage/'.$gallary->cover_image)}}" class="index_img img-responsive img-thumbnail" alt="Responsive image"></a>
			<h3 style="color: red;"><span>Name: </span>{{$gallary->name}}</h3>
			<p style="color: green;"><span>Description: </span>{{$gallary->description}}</p>
		</div>
		@endforeach
	</div>
{{$gallaries->links()}}
@endsection
