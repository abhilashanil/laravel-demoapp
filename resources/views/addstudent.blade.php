@extends('layout')
@section('main')
	<div class="m-b-md">
		@if ($errors->any())
		<div class="alert alert-danger">
			@foreach ($errors->all() as $error)
				<div>{{ $error }}</div>
			@endforeach
		</div>
		@endif
		<form action="{{ route('store') }}" method="POST" enctype="multipart/form-data">
			@csrf
			<div class="row">
				<div class="col-25">
					<label for="fname">Student Name: <font color='#f00'>*</font></label>
				</div>
				<div class="col-75">
					<input type="text" name="student_name" placeholder="Name" value="{{ old('student_name') }}">
				</div>
			</div>
			<div class="row">
				<div class="col-25">
					<label for="address">Age: <font color='#f00'>*</font></label>
				</div>
				<div class="col-75">
					<input type="text" name="age" placeholder="Age" value="{{ old('age') }}">
				</div>
			</div>
			<div class="row">
				<div class="col-25">
					<label for="gender">Gender: </label>
				</div>
				<div class="col-75">
					<input type="radio" name="gender" checked value="male">Male
					<input type="radio" name="gender" @if(old('gender') == 'female') checked @endif value="female">Female
				</div>
			</div>			
			<div class="row">
				<div class="col-25">
					<label for="class_id">Select Reporting Teacher: <font color='#f00'>*</font></label>
				</div>
				<div class="col-75">
					<select name="teacher_id">
						<option value="">--Select Reporting Teacher--</option>
						@foreach ($teacherArray as $teacher)
							<option {{ (old("teacher_id") == $teacher->id ? "selected":"") }} value="{{ $teacher->id }}">{{ $teacher->name }}</option>
						@endforeach
					</select>
				</div>
			</div>
			<div class="row">
				<button type="submit" name="submit" class="btn btn-submit">Submit</button>
				<button type="submit" name="cancel" class="btn btn-cancel">Cancel</button>
			</div>
		</form>
	</div>
@endsection