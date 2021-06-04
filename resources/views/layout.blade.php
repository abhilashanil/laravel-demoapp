<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>{{ config('app.name') }}</title>

<!-- Fonts -->
<link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

<!-- Styles -->
<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" >
</head>
<body>
	<div class="title flex-center">
		{{ config('app.name') }}
	</div>
	<div class="flex-center position-ref full-height">
		<div class="content">
			<div class="flex-center position-ref">
				<div class="links">
					<a class="{{ (request()->is('/')) ? 'active' : '' }}" href="{{ url('/') }}">Home</a>
					<a class="{{ (request()->is('addstudent')) ? 'active' : '' }}" href="{{ url('/addstudent') }}">Add a Student</a>
					<a class="{{ (request()->is('studentmarks')) ? 'active' : '' }}" href="{{ url('/studentmarks') }}">Student Marks</a>
					<a class="{{ (request()->is('addstudentmark')) ? 'active' : '' }}" href="{{ url('/addstudentmark') }}">Add Student Marks</a>
				</div>
			</div>
			@yield('main')
		</div>
	</div>
</body>
</html>