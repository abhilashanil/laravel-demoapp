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
					<th>Age</th>
					<th>Gender</th>
					<th>Reporting Teacher</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				@if(count($students) > 0)
					@foreach ($students as $key)
						<tr>
							<td>{{ $key->id }}</td>
							<td>{{ ucwords($key->name) }}</td>
							<td>{{ $key->age }}</td>
							<td>{{ $key->gender }}</td>
							<td>{{ ucwords($key->teacher->name) }}</td>
							<td>
								<a href='{{ url("/editstudent/$key->id") }}'>Edit</a>
								<a href='{{ url("/removestudent/$key->id") }}'>Remove</a>
							</td>
						</tr>						
					@endforeach
				@else
					<tr>
						<td colspan="6" style="text-color:red;">No record(s) found</td>
					</tr>
				@endif
			</tbody>
		</table>
		{{ $students->links() }}
	</div>
@endsection