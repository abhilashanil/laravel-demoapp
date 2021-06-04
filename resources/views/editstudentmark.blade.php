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
		<form action="{{ route('updatestudentmark',$studentMark->id) }}" method="POST" enctype="multipart/form-data">
			@csrf
			<div class="row">
				<div class="col-25">
					<label for="fname">Student Name: <font color='#f00'>*</font></label>
				</div>
				<div class="col-75">
					<input type="text" name="student_name" placeholder="Name" value="{{ $studentMark->student->name }}" disabled>
				</div>
			</div>
			<div class="row">
				<div class="col-25">
					<label for="fname">Maths: <font color='#f00'>*</font></label>
				</div>
				<div class="col-75">
					<input type="text" name="maths" placeholder="Maths" value="{{ $studentMark->maths }}">
				</div>
			</div>
			<div class="row">
				<div class="col-25">
					<label for="fname">Science: <font color='#f00'>*</font></label>
				</div>
				<div class="col-75">
					<input type="text" name="science" placeholder="Science" value="{{ $studentMark->science }}">
				</div>
			</div>
			<div class="row">
				<div class="col-25">
					<label for="fname">History: <font color='#f00'>*</font></label>
				</div>
				<div class="col-75">
					<input type="text" name="history" placeholder="History" value="{{ $studentMark->history }}">
				</div>
			</div>
			<div class="row">
				<div class="col-25">
					<label for="term">Select Term: <font color='#f00'>*</font></label>
				</div>
				<div class="col-75">
					<select name="term">
						<option value="">--Select Term--</option>
						<option @if($studentMark->term == 'one') selected @endif value="one">One</option>
						<option @if($studentMark->term == 'two') selected @endif value="two">Two</option>						
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