@extends('layout')
@section('main')
	<div class="m-b-md">
		@if ($message = Session::get('success'))
			<div class="alert alert-success">
				<p>{{ $message }}</p>
			</div>
		@endif
		@if ($message = Session::get('error'))
			<div class="alert alert-danger">
				<p>{{ $message }}</p>
			</div>
		@endif
		<table>
			<thead>
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Maths</th>
					<th>Science</th>
					<th>History</th>
					<th>Term</th>
					<th>Total</th>
					<th>Created On</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				@if(count($studentMarks) > 0)
					@foreach ($studentMarks as $key)
						<tr>
							<td>{{ $key->id }}</td>
							<td>{{ ucwords($key->student->name) }}</td>
							<td>{{ $key->maths }}</td>
							<td>{{ $key->science }}</td>
							<td>{{ $key->history }}</td>
							<td>{{ $key->term }}</td>
							<td>{{ $key->maths + $key->science + $key->history }}</td>
							<td>{{ ucwords($key->teacher_id) }}</td>
							<td>
								<a href='{{ url("/editstudentmark/$key->id") }}'>Edit</a>
								<a href='{{ url("/removestudentmark/$key->id") }}'>Remove</a>
							</td>
						</tr>						
					@endforeach
				@else
					<tr>
						<td colspan="9" style="text-color:red;">No record(s) found</td>
					</tr>
				@endif
			</tbody>
		</table>
	</div>
@endsection