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
		<form action="{{ route('storemark') }}" method="POST" enctype="multipart/form-data">
			@csrf
			<div class="row">
				<div class="col-25">
					<label for="class_id">Select Student: <font color='#f00'>*</font></label>
				</div>
				<div class="col-75">
					<select name="student_id">
						<option value="">--Select Student--</option>
						@foreach ($studentArray as $student)
							<option {{ (old("student_id") == $student->id ? "selected":"") }} value="{{ $student->id }}">{{ $student->name }}</option>
						@endforeach
					</select>
				</div>
			</div>			
			<div class="row">
				<div class="col-25">
					<label for="fname">Maths: <font color='#f00'>*</font></label>
				</div>
				<div class="col-75">
					<input type="text" name="maths" placeholder="Name" value="{{ old('maths') }}">
				</div>
			</div>
			<div class="row">
				<div class="col-25">
					<label for="fname">Science: <font color='#f00'>*</font></label>
				</div>
				<div class="col-75">
					<input type="text" name="science" placeholder="Name" value="{{ old('science') }}">
				</div>
			</div>
			<div class="row">
				<div class="col-25">
					<label for="fname">History: <font color='#f00'>*</font></label>
				</div>
				<div class="col-75">
					<input type="text" name="history" placeholder="Name" value="{{ old('history') }}">
				</div>
			</div>
			<div class="row">
				<div class="col-25">
					<label for="term">Select Term: <font color='#f00'>*</font></label>
				</div>
				<div class="col-75">
					<select name="term">
						<option value="">--Select Term--</option>
						<option value="one">One</option>
						<option value="two">Two</option>
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