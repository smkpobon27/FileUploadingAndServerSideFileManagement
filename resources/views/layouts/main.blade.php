<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Photo Gallary</title>
	<link rel="stylesheet" href="/css/bootstrap.min.css">
	<link rel="stylesheet" href="/css/custom.css">
</head>
<body>
	<div class="container-fluid">
	<br>
		<div class="row">
			<div class="col-lg-2">
				<ul class="nav nav-pills nav-stacked">
					

					 <!-- Authentication Links -->
                        @if (Auth::guest())
                        	<li role="presentation" class="active"><a href="/">Home</a></li>
                            <li role="presentation"><a href="{{ route('login') }}">Login</a></li>
                            <li role="presentation"><a href="{{ route('register') }}">Register</a></li>
                        @else
                  
							<li role="presentation" class="user_name"><a href="/gallaries">{{ Auth::user()->name }}</a></li>

							<li role="presentation"><a href="{{ route('gallaries') }}">My Gallaries</a></li>
							<li role="presentation"><a href="{{ route('public.gallary') }}">Public Gallaries</a></li>
                               <li role="presentation"><a href="{{route('gallary.create')}}">Create Gallary</a></li>
                               <li role="presentation"><a href="{{route('photo.tag')}}">Create Photo Tag</a></li>
                                    <li role="presentation">
                                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Logout</a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li> 
                                    {{-- Photo Search Field by Tags--}}
                                    <form method="get" action="{{route('photo.search')}}">
                                    {{-- {{csrf_field()}} --}}
									  <div class="form-group">
									    <input name="query" type="text" class="form-control" id="search" placeholder="Search by Tags">
									  </div>
									  <button type="submit" class="btn btn-primary">Search</button>
									</form>

                        @endif	
				</ul>
			</div>
			<div class="col-lg-10">
				
				@section('content')
					@show
			</div>
		</div>
		
	</div>
	
	<script src="/js/jquery-1.11.3.js"></script>
	<script src="/js/bootstrap.min.js"></script>
</body>
</html>